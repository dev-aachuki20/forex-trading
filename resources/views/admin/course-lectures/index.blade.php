@extends('layouts.master')
@section('title', 'Course Lectures')


@section('content')
    @livewire('admin.course-lectures.index',['uuid' => $content_id])
@endsection
