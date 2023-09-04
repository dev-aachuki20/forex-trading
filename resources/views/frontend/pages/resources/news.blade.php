@extends('layouts.frontend')
@section('title', 'News')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.resources.news',['localeid' => $localeid])
@endsection

@section('scripts')
@stop
