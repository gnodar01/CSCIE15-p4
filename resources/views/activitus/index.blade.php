@extends('layouts.master')

@push('head')
@endpush

@section('content')
    <h1>Activitus</h1>

    <h2>Activities</h2>

    @if(isset($activities))
    @foreach($activities as $activity)
        <br>
        <div class="activity">
            {{ $activity['name'] }}
            <div class="activity-actions">
                <a href="/activity/{{ $activity['id'] }}">View</a> |
                <a href="/activity/{{ $activity['id'] }}/edit">Edit</a> |
                <a href="">Delete</a>
            </div>
        </div>
    @endforeach
    @endif
@endsection