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
            <a href="">Delete</a>
        </div>
    </div>
@endsection