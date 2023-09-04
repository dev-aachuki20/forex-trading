@extends('layouts.frontend')
@section('title', 'Technology')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.how-funding-works.technology',['localeid' => $localeid])
@endsection

@section('scripts')
@stop
