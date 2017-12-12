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

    @if(isset($users))
    <br>
    <h2>Group Members</h2>
    @foreach($users as $user)
        <div class="user">
            {{ $user['name'] }}
        </div>
    @endforeach
    @endif

    @if(isset($activities))
    <br>
    <h2>Activities</h2>
    @foreach($activities as $activity)
        <div class="activity">
            {{ $activity['name'] }}
            <div class="activity-actions">
                <a href="/activity/{{ $activity['id'] }}">View</a> |
                <a href="/activity/{{ $activity['id'] }}/edit">Edit</a> |
                <a href="/activity/{{ $activity['id'] }}/delete">Delete</a>
            </div>
        </div>
        <br>
    @endforeach
    @endif

    <br>
    @if(!strpos($path, 'archive'))
    <a href="/group/{{$group['id']}}/archive">Include Expired Activities</a>
    @else
    <a href="/group/{{$group['id']}}">Hide Expired Activities</a>
    @endif

@endsection
