@extends('layouts.master')

@push('head')
@endpush

@section('content')
    <h1>Groups</h1>

    @if(isset($groups))
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

@endsection