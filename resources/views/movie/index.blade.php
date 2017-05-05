@extends('layouts.master')

@section('title', 'Movies')

@section('content')
    @include('movie.filter')

    @if (! empty($movies))
            @include('movie.list')
    @endif

@endsection