@extends('layouts.master')

@push('nav')
<li><a href='/group/create'>Add a Group</a></li>
<li><a href='/group/{{ $group['id'] }}/activity/create'>Add an Activity</a></li>
@endpush

@section('content')
    <h1>Leave {{$group->name}}</h1>

    <form method='POST' action='/group/{{ $group['id'] }}/leave'>

        {{ method_field('put') }}

        {{ csrf_field() }}

        <div>Are you sure you want to leave {{ $group->name }}?</div>
        
        <input type='submit' value='Leave' class='btn btn-primary btn-small'>
        <a href='{{$prevUrl}}' class='btn btn-secondary btn-small'>Cancel</a>
    </form>
@endsection
