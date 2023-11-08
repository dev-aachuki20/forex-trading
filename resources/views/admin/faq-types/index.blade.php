@extends('layouts.master')
@section('title','FAQ Types')

@section('content')
    @livewire('admin.faq-types.index',['locale' => $locale])
@endsection