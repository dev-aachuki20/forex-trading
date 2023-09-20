@extends('layouts.frontend')
@section('title', ucwords(str_replace('-',' ',$pageName)))

@section('styles')
@stop

@section('content')
    @livewire('frontend.pages.other-pages',['pageName'=> $pageName,'localeid' => $localeid])
@endsection

@section('scripts')
@stop