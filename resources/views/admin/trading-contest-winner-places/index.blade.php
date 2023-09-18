@extends('layouts.master')
@section('title','Trading Contest Winner Places')


@section('content')
@livewire('admin.trading-contest-contestants.index',['contest_id' => $contest_id])
@endsection