@extends('layout.app')
@push('custom.style')

@endpush
@section('frontend-content')
    <div class="flex items-center justify-center">
        <div class="flex items-center justify-center bg-gray-100 h-96">
            <div class="bg-white p-8 rounded-xl shadow-md max-w-xl w-full text-center">

                <h1 class="text-2xl font-semibold text-gray-800 mb-4">
                    Welcome 👋
                </h1>

                <p class="text-gray-600 mb-6 text-base leading-relaxed">
                    To get started, please create an admin account or log in as an admin
                    to access the dashboard and manage users.
                </p>

                <div class="flex justify-center">
                    <a href="{{ route('login') }}" class="px-6 py-3 bg-primary text-white rounded-lg font-semibold shadow-md hover:brightness-95 focus:ring-2 focus:ring-primary transition">
                        Login as Admin
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('custom.script')

@endpush
