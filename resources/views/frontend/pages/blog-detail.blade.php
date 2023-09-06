@extends('layouts.frontend')
@section('title', 'Blog Detail')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.blog-detail',['slug'=> $slug,'localeid' => $localeid])
@endsection

@section('scripts')
@stop
