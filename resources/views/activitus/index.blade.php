@extends('layouts.master')

@push('head')
@endpush

@section('content')
    <h1>Activities</h1>

    @if(isset($activities))
    @foreach($activities as $activity)
        <br>
        <div class="activity">
            {{ $activity['name'] }}
            <div class="activity-actions">
                <a href="/activity/{{ $activity['id'] }}">View</a> |
                <a href="/activity/{{ $activity['id'] }}/edit">Edit</a> |
                <a href="/activity/{{ $activity['id'] }}/delete">Delete</a>
            </div>
        </div>
    @endforeach
    @endif
@endsection