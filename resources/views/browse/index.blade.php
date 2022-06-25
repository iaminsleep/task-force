@extends('layout')

@section('title', 'Задания')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container">
        @include('browse.section-tasks')
        @include('browse.section-search-filters')
    </div>
@endsection
