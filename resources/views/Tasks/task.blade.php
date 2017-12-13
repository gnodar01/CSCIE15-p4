@extends('layouts.master')

@push('nav')
<li><a href='/group/create'>Add a Group</a>
<li><a href='/group/{{ $gId }}/activity/create'>Add an Activity</a>
<li><a href='/group/{{ $gId }}/activity/{{ $aId }}/task/create'>Add a Task</a>
<li><a href='/group/{{ $gId }}/activity/{{ $aId }}/role/create'>Add a Role</a>
@endpush

@section('content')
    <h1>{{ $task['name'] }}</h1>

    <br>
    <div class="task">
        Name: {{ $task['name'] }}
        <br>
        Description: {{ $task['description'] }}
        <div class="task-actions">
            <a href="/group/{{ $gId }}/activity/{{ $aId }}/task/{{ $task['id'] }}/edit">Edit</a> |
            <a href="/group/{{ $gId }}/activity/{{ $aId }}/task/{{ $task['id'] }}/delete">Delete</a>
        </div>
    </div>
@endsection