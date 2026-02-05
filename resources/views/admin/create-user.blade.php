@extends('admin.layout.master')
@section('title','Create User')
@push('admin.style')

@endpush

@section('admin-content')

        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <!-- Heading -->
                        <h4 class="card-title mb-4">
                            Create New User
                        </h4>

                        <!-- Form -->
                        <form method="post" action="{{route('admin.user.store')}}">
                            @csrf

                            <input type="text" name="fake_username" style="display:none">
                            <input type="password" name="fake_password" style="display:none">

                            <div class="row">

                                <!-- User Name -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">মালিকের নাম</label>
                                    <input type="text" placeholder="মালিকের নাম" name="name" class="form-control">
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">মালিকের ইমেইল</label>
                                    <input
                                        type="email"
                                        placeholder="মালিকের ইমেইল"
                                        name="email"
                                        class="form-control"
                                        autocomplete="new-email"
                                    >
                                    @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>

                                <!-- Password -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">মালিকের Password</label>
                                    <input
                                        type="password"
                                        placeholder="মালিকের Password"
                                        name="password"
                                        class="form-control"
                                        autocomplete="new-password"
                                    >
                                    @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>

                                <!-- City Corporation -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">সিটি কর্পোরেশন</label>
                                    <input type="text" placeholder="সিটি কর্পোরেশন" name="city_corporation" class="form-control">
                                    @error('city_corporation') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <!-- JL No -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">মৌজার নাম ও জে. এল. নং:</label>
                                    <input type="text" name="jl_no" placeholder="মৌজার নাম ও জে. এল. নং:" class="form-control">
                                    @error('jl_no') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <!-- Thana -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">উপজেলা/থানা</label>
                                    <input type="text" name="thana" placeholder="উপজেলা/থানা" class="form-control">
                                    @error('thana') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <!-- District -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">জেলা</label>
                                    <input type="text" name="district" placeholder="জেলা" class="form-control">
                                    @error('district') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <!-- Holding No -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">হোল্ডিং নম্বর</label>
                                    <input type="text" name="holding_no" placeholder="হোল্ডিং নম্বর" class="form-control">
                                    @error('holding_no') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <!-- Khotian No -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">খতিয়ান নং</label>
                                    <input type="text" name="khotian_no" placeholder="খতিয়ান নং" class="form-control">
                                    @error('khotian_no') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <!-- Owner Share -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">মালিকের অংশ</label>
                                    <input type="text" name="owner_share" placeholder="মালিকের অংশ" class="form-control">
                                    @error('owner_share') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                            </div>


                            <button type="submit" class="btn btn-primary w-100">
                                Submit <i class="fa fa-save"></i>
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>

@endsection

@push('admin.script')

@endpush
