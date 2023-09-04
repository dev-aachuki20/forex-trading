@extends('layouts.frontend')
@section('title', 'BK Forex Membership')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.resources.bk-forex-membership',['localeid' => $localeid])
@endsection

@section('scripts')
@stop

