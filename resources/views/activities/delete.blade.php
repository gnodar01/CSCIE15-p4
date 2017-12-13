@extends('layouts.master')

@push('nav')
<li><a href='/group/create'>Add a Group</a></li>
<li><a href='/group/{{ $gId }}/activity/create'>Add an Activity</a></li>
<li><a href='/group/{{ $gId }}/activity/{{ $activity['id'] }}/task/create'>Add a Task</a></li>
<li><a href='/group/{{ $gId }}/activity/{{ $activity['id'] }}/role/create'>Add a Role</a></li>
@endpush

@section('content')
    <h1>Delete {{$activity->name}}</h1>

    <form method='POST' action='/group/{{ $gId }}/activity/{{ $activity['id'] }}'>

        {{ method_field('delete') }}

        {{ csrf_field() }}

        <div>Are you sure you want to delete {{ $activity->name }}?</div>
        
        <input type='submit' value='Delete' class='btn btn-danger btn-small'>
        <a href='{{ $prevUrl }}' class='btn btn-secondary btn-small'>Cancel</a>
    </form>
@endsection
