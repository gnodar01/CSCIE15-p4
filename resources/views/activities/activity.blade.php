@extends('layouts.master')

@push('head')
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
            <a href="/activity/{{ $activity['id'] }}/edit">Edit</a> |
            <a href="/activity/{{ $activity['id'] }}/delete">Delete</a>
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
        </div>
        <br>
    @endforeach
    @endif
@endsection