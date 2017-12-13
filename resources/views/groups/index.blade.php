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
    <br>
    <h2>Available Groups</h2>
    @foreach($groupsNot as $groupNot)
        <div class="group">
            {{ $groupNot['name'] }}
            <div class="group-actions">
                <a href="/group/{{ $groupNot['id'] }}/join">Join</a>
            </div>
        </div>
    @endforeach
    @endif

@endsection