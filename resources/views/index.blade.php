@extends('layout.app')
@section('frontend-content')
<div class="flex items-center justify-center">
    <iframe src="{{ route('user.dakhila', $user->user_code) }}"
        width="100%"
        height="900"
        style="border:1px solid #999;background:#eef7d8">
    </iframe>
</div>
@endsection
