@extends('layouts.master')

@push('head')
@endpush

@section('content')
    <h1>Delete {{$activity->name}}</h1>

    <form method='POST' action='/activity/{{ $activity['id'] }}'>

        {{ method_field('delete') }}

        {{ csrf_field() }}

        <div>Are you sure you want to delete {{ $activity->name }}?</div>
        
        <input type='submit' value='Delete' class='btn btn-danger btn-small'>
        <a href='{{$prevUrl}}' class='btn btn-secondary btn-small'>Cancel</a>
        
    </form>
@endsection
