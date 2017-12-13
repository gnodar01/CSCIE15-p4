@extends('layouts.master')

@push('head')
@endpush

@push('nav')
{{-- TODO: these --}}
<li><a href='/group/{{ $gId }}/activity/{{ $activity['id'] }}'>Add a Task</a>
<li><a href='/group/{{ $gId }}/activity/{{ $activity['id'] }}'>Add a Role</a>
@endpush

@section('content')
    <h1>{{ $activity['name'] }}</h1>

    <br>
    <div class="activity">
        Name: {{ $activity['name'] }}
        <br>
        Description: {{ $activity['description'] }}
        <br>
        Location: {{ $activity['location'] }}
        <br>
        Date: {{ $activity['date_start'].' - '. $activity['date_end'] }}
        <br>
        Time: {{ $activity['time_start'].' - '.$activity['time_end'] }}
        <div class="activity-actions">
            <a href="/group/{{ $gId }}/activity/{{ $activity['id'] }}/edit">Edit</a> |
            <a href="/group/{{ $gId }}/activity/{{ $activity['id'] }}/delete">Delete</a>
        </div>
    </div>

    @if(isset($tasks))
    <br>
    <h2>Tasks</h2>
    @foreach($tasks as $task)
    @endforeach
        <div class="task">
            Task: {{ $task['name']}}
            <br>
            Description: {{ $task['description'] }}
            <br>
            Owner: {{ $task->user->name }}
        </div>
        <br>
    @endif

    @if(isset($roles))
    <br>
    <h2>Roles</h2>
    @foreach($roles as $role)
        <div class="role">
            Role: {{ $role['name']}}
            <br>
            Description: {{ $role['description'] }}
            <br>
            Owner: {{ $role->user->name }}
        </div>
        <br>
    @endforeach
    @endif
@endsection