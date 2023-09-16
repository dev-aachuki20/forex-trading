@extends('layouts.master')
@section('title','Trading Contest Contestants')


@section('content')
@livewire('admin.trading-contest-contestants.index',['contest_id' => $contest_id])
@endsection