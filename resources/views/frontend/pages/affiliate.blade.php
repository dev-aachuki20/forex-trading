@extends('layouts.frontend')
@section('title', 'Affiliate')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.affiliate',['localeid' => $localeid])
@endsection

@section('scripts')
@stop