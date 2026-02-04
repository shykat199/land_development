<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $perPage = (int) $request->get('per_page', 10);

            $query = User::query();

            if ($search = $request->get('search')) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('university_id', 'like', "%{$search}%");
            }

            switch ($request->get('order')) {
                case 'ace':
                    $query->orderBy('name');
                    break;
                case 'dec':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->orderBy('id', 'desc');
            }

            $universities = $query->paginate($perPage);

            $data = $universities->map(function ($u) {
                return [
                    'id' => $u->id,
                    'name' => $u->name,
                    'role' => $u->role,
                    'email' => $u->email,
                    'created_at' => $u->created_at->format('d M Y'),

                    'edit_url' => route('admin.user-details', $u->id),
                    'delete_url' => route('admin.delete-user', $u->id),
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

    public function providerList(Request $request)
    {
        if ($request->ajax()) {

            $data = Provider::orderBy('id', 'desc');
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $deleteUrl = route('admin.delete-provider', $row->id);

                    $actions = '<div class="d-flex align-items-center gap-2">';
                    $actions .= ' <a href="javascript:void(0)"
                                   class="editProviderBtn"
                                   data-id="'.$row->id.'"
                                   data-name="'.$row->name.'"
                                   data-status="'.$row->status.'">
                                    <i class="fa-regular fa-pen-to-square fa-2x text-warning"></i>
                                </a>';

                    $actions .= '<a href="javascript:void(0);" onclick="showSwal(\'passing-parameter-execute-cancel\', \'' . e($deleteUrl) . '\')">';
                    $actions .= '<i class="fa-solid fa-trash fa-2x text-danger" aria-hidden="true"></i>';
                    $actions .= '</a>';

                    $actions .= '</div>';

                    return $actions;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.university.provider');
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
}
