@extends('layouts.master')

@push('nav')
<li><a href='/group/create'>Add a Group</a></li>
<li><a href="/group/{{ $gId }}">Back to Group</a></li>
<li><a href='/group/{{ $gId }}/activity/create'>Add an Activity</a></li>
<li><a href='/group/{{ $gId }}/activity/{{ $activity['id'] }}/task/create'>Add a Task</a></li>
<li><a href='/group/{{ $gId }}/activity/{{ $activity['id'] }}/role/create'>Add a Role</a></li>
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
        Date:
        {{ date_format(date_create($activity['date_start']),"Y/m/d") }}
        -
        {{ date_format(date_create($activity['date_end']),"Y/m/d") }}

        @if($activity['time_start'] != $activity['time_end'])
        <br>
        Time:
        {{ date_format(date_create($activity['time_start']),"g:i A") }}
        -
        {{ date_format(date_create($activity['time_end']),"g:i A") }}
        @endif

        <div class="activity-actions">
            <a href="/group/{{ $gId }}/activity/{{ $activity['id'] }}/edit">Edit</a> |
            <a href="/group/{{ $gId }}/activity/{{ $activity['id'] }}/delete">Delete</a>
        </div>
    </div>

    @if(isset($tasks) && sizeof($tasks) > 0)
    <br>
    <h2>Tasks</h2>
    @foreach($tasks as $task)
        <div class="task">
            Task: {{ $task['name']}}
            <br>
            Description: {{ $task['description'] }}
            <br>
            Owner: {{ $task->user->name }}
            <div class="task-action">
                <a href="/group/{{ $gId }}/activity/{{ $activity['id'] }}/task/{{ $task['id'] }}">View</a> |
                <a href="/group/{{ $gId }}/activity/{{ $activity['id'] }}/task/{{ $task['id'] }}/edit">Edit</a> |
                <a href="/group/{{ $gId }}/activity/{{ $activity['id'] }}/task/{{ $task['id'] }}/delete">Delete</a>
            </div>
        </div>
        <br>
    @endforeach
    @endif

    @if(isset($roles) && sizeof($roles) > 0)
    <br>
    <h2>Roles</h2>
    @foreach($roles as $role)
        <div class="role">
            Role: {{ $role['name']}}
            <br>
            Description: {{ $role['description'] }}
            <br>
            Owner: {{ $role->user->name }}
            <div class="role-action">
                <a href="/group/{{ $gId }}/activity/{{ $activity['id'] }}/role/{{ $role['id'] }}">View</a> |
                <a href="/group/{{ $gId }}/activity/{{ $activity['id'] }}/role/{{ $role['id'] }}/edit">Edit</a> |
                <a href="/group/{{ $gId }}/activity/{{ $activity['id'] }}/role/{{ $role['id'] }}/delete">Delete</a>
            </div>
        </div>
        <br>
    @endforeach
    @endif
@endsection