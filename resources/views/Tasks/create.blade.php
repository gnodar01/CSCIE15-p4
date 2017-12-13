@extends('layouts.master')

@push('nav')
<li><a href='/group/create'>Add a Group</a></li>
<li><a href='/group/{{ $gId }}/activity/create'>Add an Activity</a></li>
<li><a href='/group/{{ $gId }}/activity/{{ $aId }}/role/create'>Add a Role</a></li>
@endpush

@section('content')
    <h1>Add Task</h1>

    <form method='POST' action='/group/{{ $gId }}/activity/{{ $aId }}/task'>

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='name'>* Name</label>
        <input type='text' name='name' id='name' value='{{ old('name') }}'>
        @include('modules.error-field', ['fieldName' => 'name'])

        <label for='description'>* Description</label>
        <input type='text' name='description' id='description' value='{{ old('description') }}'>
        @include('modules.error-field', ['fieldName' => 'description'])

        <br>
        <input type='submit' value='Save changes' class='btn btn-primary btn-small'>
        <a href='{{$prevUrl}}' class='btn btn-secondary btn-small'>Cancel</a>
    </form>
@endsection
