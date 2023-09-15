@extends('..adminAuthLayouts.authmaster')

@section('title','Reset Password')

    @section('content')
        @livewire('admin.auth.password-reset',['token'=>$token,'email'=>$email])
    @endsection

@stack('scripts')