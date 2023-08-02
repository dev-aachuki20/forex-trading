@extends('..authLauouts.authmaster')

@section('title',{{getLocalization('reset_password')}})

    @section('content')
        @livewire('admin.auth.password-reset',['token'=>$token,'email'=>$email])
    @endsection
