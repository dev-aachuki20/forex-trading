@extends('..authLauouts.authmaster')

@section('title',trans('global.reset_password'))

    @section('content')
        @livewire('admin.auth.password-reset',['token'=>$token,'email'=>$email])
    @endsection
