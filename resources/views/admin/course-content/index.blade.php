@extends('layouts.master')
@section('title', 'Course Content')


@section('content')
    @livewire('admin.course-content.index',['uuid' => $course_id])
@endsection
