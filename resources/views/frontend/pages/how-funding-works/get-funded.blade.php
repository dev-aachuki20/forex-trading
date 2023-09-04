@extends('layouts.frontend')
@section('title', 'Get Funded')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.how-funding-works.get-funded',['localeid' => $localeid])
@endsection

@section('scripts')
@stop

