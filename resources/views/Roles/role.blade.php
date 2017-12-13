@extends('layouts.master')

@push('nav')
<li><a href='/group/create'>Add a Group</a>
<li><a href='/group/{{ $gId }}/activity/create'>Add an Activity</a>
<li><a href='/group/{{ $gId }}/activity/{{ $aId }}/task/create'>Add a Task</a>
<li><a href='/group/{{ $gId }}/activity/{{ $aId }}/role/create'>Add a Role</a>
@endpush

@section('content')
    <h1>{{ $role['name'] }}</h1>

    <br>
    <div class="role">
        Name: {{ $role['name'] }}
        <br>
        Description: {{ $role['description'] }}
        <div class="role-actions">
            <a href="/group/{{ $gId }}/activity/{{ $aId }}/role/{{ $role['id'] }}/edit">Edit</a> |
            <a href="/group/{{ $gId }}/activity/{{ $aId }}/role/{{ $role['id'] }}/delete">Delete</a>
        </div>
    </div>
@endsection