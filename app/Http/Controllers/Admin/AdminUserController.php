<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use App\Models\UserLandInformation;
use App\Models\UserRevenueInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $perPage = (int) $request->get('per_page', 10);

            $query = User::query()->where('role','!=',ADMIN_ROLE);

            if ($search = $request->get('search')) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('invoice', 'like', "%{$search}%")
                    ->orWhere('user_code', 'like', "%{$search}%");
            }

            switch ($request->get('order')) {
                case 'ace':
                    $query->orderBy('id');
                    break;
                case 'dec':
                    $query->orderBy('id', 'desc');
                    break;
                default:
                    $query->orderBy('id', 'desc');
            }

            $universities = $query->paginate($perPage);

            $data = $universities->map(function ($u) {
                return [
                    'id' => $u->id,
                    'user_code' => $u->user_code,
                    'name' => $u->name,
                    'email' => $u->email,
                    'role' => $u->role,
                    'created_at' => $u->created_at->format('d M Y'),

                    'edit_user_url' => route('admin.user.edit', $u->id),
                    'user_info_url' => route('admin.user.info', $u->id),
                    'delete_url' => route('admin.user.delete', $u->id),
                    'user_dakhila' => route('user.dakhila', $u->user_code),
                ];
            });

            return response()->json([
                'data' => $data,
                'total' => $universities->total(),
                'current_page' => $universities->currentPage(),
                'last_page' => $universities->lastPage(),
            ]);
        }

        return view('admin.user-list');
    }

    public function search(Request $request)
    {
        $search = $request->get('search', '');

        $countries = Country::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->take(10)
            ->get(['id', 'name', 'logo']);

        return response()->json(
            $countries->map(function ($country) {
                return [
                    'id' => $country->id,
                    'name' => $country->name,
                    'flag_url' => $country->logo ? asset('storage/'.$country->logo) : null
                ];
            })
        );
    }

    public function create()
    {
        return view('admin.create-user');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit-user',compact('user'));
    }

    public function info($id)
    {
        $user = User::with(['userLandInfo','userRevenueInfo'])->find($id);
        return view('admin.user-info',compact('user'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'nullable|email|unique:users,email',
            'password'         => 'nullable|string|min:6',

            'city_corporation' => 'nullable|string|max:255',
            'jl_no'            => 'nullable|string|max:255',
            'thana'            => 'nullable|string|max:255',
            'district'         => 'nullable|string|max:255',
            'holding_no'       => 'nullable|string|max:255',
            'khotian_no'       => 'nullable|string|max:255',
            'owner_share'      => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {

            User::create([
                'name'             => $request->name,
                'email'            => $request->email,
                'password'         => Hash::make($request->password),
                'city_corporation' => $request->city_corporation,
                'jln'            => $request->jl_no,
                'role'            => USER_ROLE,
                'thana'            => $request->thana,
                'district'         => $request->district,
                'holding_no'       => $request->holding_no,
                'khotian_no'       => $request->khotian_no,
                'owner_share'      => $request->owner_share,
            ]);

            DB::commit();

            toast('ইউজার সফলভাবে তৈরি হয়েছে!', 'success');
            return redirect()->back();

        } catch (\Exception $e) {

            DB::rollBack();

            toast('কিছু একটা সমস্যা হয়েছে!', 'error');
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'nullable|email',
            'password'         => 'nullable|string|min:6',

            'city_corporation' => 'nullable|string|max:255',
            'jl_no'            => 'nullable|string|max:255',
            'thana'            => 'nullable|string|max:255',
            'district'         => 'nullable|string|max:255',
            'holding_no'       => 'nullable|string|max:255',
            'khotian_no'       => 'nullable|string|max:255',
            'owner_share'      => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {

            $user = User::findOrFail($id);

            $data = [
                'name'             => $request->name,
                'email'            => $request->email,
                'city_corporation' => $request->city_corporation,
                'jl_no'            => $request->jl_no, // fixed key
                'thana'            => $request->thana,
                'district'         => $request->district,
                'holding_no'       => $request->holding_no,
                'khotian_no'       => $request->khotian_no,
                'owner_share'      => $request->owner_share,
            ];

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $user->update($data);

            DB::commit();

            toast('ইউজার সফলভাবে আপডেট হয়েছে!', 'success');
            return redirect()->back();

        } catch (\Exception $e) {

            DB::rollBack();

            toast('কিছু একটা সমস্যা হয়েছে!', 'error');
            return redirect()->back()->withInput();
        }
    }


    public function saveInfo(Request $request,$id)
    {

        DB::beginTransaction();

        try {

            if ($request->has('land')) {

                UserLandInformation::where('user_id', $id)->delete();

                foreach ($request->land as $land) {

                    if (
                        empty($land['dag_no']) &&
                        empty($land['land_class']) &&
                        empty($land['total_land'])
                    ) {
                        continue;
                    }

                    UserLandInformation::create([
                        'user_id'    => $id,
                        'dag_no'     => $land['dag_no'] ?? null,
                        'land_class' => $land['land_class'] ?? null,
                        'land_area'  => $land['land_area'] ?? 0,
                        'total_land' => $land['total_land'] ?? null,
                    ]);
                }
            }

            if ($request->has('revenue')) {

                UserRevenueInformation::where('user_id', $id)->delete();

                foreach ($request->revenue as $revenue) {

                    if (
                        empty($revenue['previous_3_years_arrears']) &&
                        empty($revenue['arrears_of_last_3_years']) &&
                        empty($revenue['current_year_demand_and_surcharge']) &&
                        empty($revenue['total_demand'])
                    ) {
                        continue;
                    }

                    UserRevenueInformation::create([
                        'user_id' => $id,

                        'previous_3_years_arrears' => $revenue['previous_3_years_arrears'] ?? '0',

                        'arrears_of_last_3_years' => $revenue['arrears_of_last_3_years'] ?? '0',

                        'current_year_demand_and_surcharge' => $revenue['current_year_demand_and_surcharge'] ?? '0',

                        'total_demand' => $revenue['total_demand'] ?? '0',

                        'total_arrear' => $revenue['total_arrear'] ?? '0',

                        'total_collection' => $revenue['total_collection'] ?? '0',

                        'total_balance' => $revenue['total_balance'] ?? '0',

                        'remarks' => $revenue['remarks'] ?? null,
                    ]);
                }
            }

            DB::commit();

            toast('ইউজার সকল তথ্য সফলভাবে সংরক্ষণ হয়েছে!', 'success');
            return redirect()->back();

        } catch (\Exception $e) {

            DB::rollBack();
            toast('কিছু একটা সমস্যা হয়েছে! আবার চেষ্টা করুন।', 'error');
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $id = intval($id);

            $university = DB::table('users')->where('id', $id)->first();

            if (!$university) {
                abort(404);
            }

            if (!empty($university->slug)) {
                $baseFolder = "universities/{$university->slug}";
                if (Storage::disk('public')->exists($baseFolder)) {
                    Storage::disk('public')->deleteDirectory($baseFolder);
                }
            }

            DB::table('university_details')->where('university_id', $id)->delete();
            DB::table('university_rankings')->where('university_id', $id)->delete();
            DB::table('university_campus_locations')->where('university_id', $id)->delete();
            DB::table('university_courses')->where('university_id', $id)->delete();
            DB::table('university_requirements')->where('university_id', $id)->delete();
            DB::table('university_scholarships')->where('university_id', $id)->delete();
            DB::table('university_student_supports')->where('university_id', $id)->delete();
            DB::table('university_reviews')->where('university_id', $id)->delete();

            // Finally, delete the main university record
            DB::table('universities')->where('id', $id)->delete();

            DB::commit();

            toast('University and all related data successfully deleted!', 'success');
            return redirect()->route('admin.university-list');

        } catch (Exception $e) {
            DB::rollBack();
            toast('Failed to delete university: ' . $e->getMessage(), 'error');
            return redirect()->back();
        }
    }

    public function print($token)
    {
        $user = User::with(['userLandInfo', 'userRevenueInfo'])->where('user_code', $token)->firstOrFail();

        return view('admin.user-dakhila', compact('user'));
    }
}
