@extends('admin.layout.master')
@section('title','Site Setting')
@push('admin.style')

@endpush

@section('admin-content')

    @php
        $allSetting = getSettingsData(['form_number','cromik_number','appendix','paragraph','fiscal_year']);
    @endphp

        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <!-- Heading -->
                        <h4 class="card-title mb-4">
                            Create Site Setting
                        </h4>

                        <!-- Form -->
                        <form method="post" action="{{route('admin.update-site-setting')}}">
                            @csrf

                            <div class="row">

                                <!-- User Name -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">বাংলাদেশ ফরম নং</label>
                                    <input value="{{getSiteSettingsData($allSetting,'form_number')}}" type="text" placeholder="বাংলাদেশ ফরম নং" name="form_number" class="form-control">
                                    @error('form_number') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">ক্রমিক নং</label>
                                    <input value="{{getSiteSettingsData($allSetting,'cromik_number')}}" type="text" placeholder="ক্রমিক নং" name="cromik_number" class="form-control">
                                    @error('cromik_number') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <!-- Password -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">পরিশিষ্ট</label>
                                    <input value="{{getSiteSettingsData($allSetting,'appendix')}}" type="text" placeholder="পরিশিষ্ট" name="appendix" class="form-control">
                                    @error('appendix') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <!-- City Corporation -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">অনুচ্ছেদ</label>
                                    <input value="{{getSiteSettingsData($allSetting,'paragraph')}}" type="text" placeholder="অনুচ্ছেদ" name="paragraph" class="form-control">
                                    @error('paragraph') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <!-- JL No -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">অর্থবছর</label>
                                    <input value="{{getSiteSettingsData($allSetting,'fiscal_year')}}" type="text" name="fiscal_year" placeholder="অর্থবছর" class="form-control">
                                    @error('fiscal_year') <p class="text-danger">{{$message}}</p> @enderror
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
