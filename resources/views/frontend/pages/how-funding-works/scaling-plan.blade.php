@extends('layouts.frontend')
@section('title', 'Scaling Plan')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.how-funding-works.scaling-plan',['localeid' => $localeid])
@endsection

@section('scripts')
@stop
