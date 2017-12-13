@extends('layouts.master')

@push('nav')
<li><a href='/group/create'>Add a Group</a></li>
@endpush

@section('content')
    <h1>Groups</h1>
    <br>
    @if(isset($groups) && sizeof($groups) > 0)
    <h2>Your Groups</h2>
    @foreach($groups as $group)
        <br>
        <div class="group">
            {{ $group['name'] }}
            <div class="group-actions">
                <a href="/group/{{ $group['id'] }}">View</a> |
                <a href="/group/{{ $group['id'] }}/edit">Edit</a> |
                <a href="/group/{{ $group['id'] }}/delete">Delete</a>
            </div>
        </div>
    @endforeach
    @endif

    @if(isset($groupsNot) && sizeof($groupsNot) > 0)
    <h2>Available Groups</h2>
    @foreach($groupsNot as $groupNot)
        <br>
        <div class="group">
            {{ $groupNot['name'] }}
            <div class="group-actions">
                <a href="/group/{{ $groupNot['id'] }}">Join</a>
            </div>
        </div>
    @endforeach
    @endif

@endsection