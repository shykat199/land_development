@extends('admin.layout.master')
@section('title','Site Setting')
@push('admin.style')

@endpush

@section('admin-content')

        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <!-- Heading -->
                        <h4 class="card-title mb-4">
                            Create Site Setting
                        </h4>

                        <!-- Form -->
                        <form method="post" action="{{route('admin.site-setting')}}">
                            @csrf

                            <div class="row">

                                <!-- User Name -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">বাংলাদেশ ফরম নং</label>
                                    <input type="text" placeholder="বাংলাদেশ ফরম নং" name="form_number" class="form-control">
                                    @error('form_number') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">ক্রমিক নং</label>
                                    <input type="email" placeholder="ক্রমিক নং" name="form_number" class="form-control">
                                    @error('form_number') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <!-- Password -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">পরিশিষ্ট</label>
                                    <input type="text" placeholder="পরিশিষ্ট" name="appendix" class="form-control">
                                    @error('appendix') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <!-- City Corporation -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">অনুচ্ছেদ</label>
                                    <input type="text" placeholder="অনুচ্ছেদ" name="paragraph" class="form-control">
                                    @error('paragraph') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <!-- JL No -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">অর্থবছর</label>
                                    <input type="text" name="fiscal_year" placeholder="অর্থবছর" class="form-control">
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
