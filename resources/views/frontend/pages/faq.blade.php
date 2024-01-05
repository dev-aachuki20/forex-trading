@extends('layouts.frontend')
@section('title', 'Faq')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.faq',['localeid' => $localeid])
@endsection

@section('scripts')
@stop