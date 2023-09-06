@extends('layouts.frontend')
@section('title', 'News Detail')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.news-detail',['slug'=> $slug,'localeid' => $localeid])
@endsection

@section('scripts')
@stop