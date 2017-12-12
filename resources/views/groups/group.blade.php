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

    @if(!strpos($path, 'archive'))
    <br>
    <a href="/group/{{$group['id']}}/archive">Vew Expired Activities</a>
    @endif

@endsection
