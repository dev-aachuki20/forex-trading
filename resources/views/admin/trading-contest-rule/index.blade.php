@extends('layouts.master')
@section('title','Trading Contest Rule')


@section('content')
@livewire('admin.trading-contest-rule.index',['contest_id' => $contest_id])
@endsection