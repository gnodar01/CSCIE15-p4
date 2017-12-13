@extends('layouts.master')

@push('nav')
<li><a href='/group/create'>Add a Group</a>
<li><a href='/group/{{ $group['id'] }}/activity/create'>Add an Activity</a>
@endpush

@section('content')
    <h1>Delete {{$group->name}}</h1>

    <form method='POST' action='/group/{{ $group['id'] }}'>

        {{ method_field('delete') }}

        {{ csrf_field() }}

        <div>Are you sure you want to delete {{ $group->name }}?</div>
        
        <input type='submit' value='Delete' class='btn btn-danger btn-small'>
        <a href='{{$prevUrl}}' class='btn btn-secondary btn-small'>Cancel</a>
    </form>
@endsection
