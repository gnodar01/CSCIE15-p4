@extends('layouts.master')

@push('head')
@endpush

@section('content')
    <h1>{{ $group['name'] }}</h1>

    <br>
    <div class="group">
        Name: {{ $group['name'] }}
        <br>
        Description: {{ $group['description'] }}
        <br>
        <div class="group-actions">
            <a href="/group/{{ $group['id'] }}/edit">Edit</a> |
            <a href="/group/{{ $group['id'] }}/delete">Delete</a>
        </div>
    </div>
@endsection
