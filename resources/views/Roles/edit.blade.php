@extends('layouts.master')

@push('nav')
<li><a href='/group/create'>Add a Group</a>
<li><a href='/group/{{ $gId }}/activity/create'>Add an Activity</a>
<li><a href='/group/{{ $gId }}/activity/{{ $aId }}/task/create'>Add a Task</a>
<li><a href='/group/{{ $gId }}/activity/{{ $aId }}/role/create'>Add a Role</a>
@endpush

@section('content')
    <h1>Edit {{ $role['name'] }}</h1>

    <form method='POST' action='/group/{{ $gId }}/activity/{{ $aId }}/role/{{ $role['id'] }}'>

        {{ method_field('put') }}

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='name'>* Name</label>
        <input type='text' name='name' id='name' value='{{ old('name', $role['name']) }}'>
        @include('modules.error-field', ['fieldName' => 'name'])

        <label for='description'>* Description</label>
        <input type='text' name='description' id='description' value='{{ old('description', $role['description']) }}'>
        @include('modules.error-field', ['fieldName' => 'description'])
        
        <br>
        <input type='submit' value='Save changes' class='btn btn-primary btn-small'>
        <a href='{{$prevUrl}}' class='btn btn-secondary btn-small'>Cancel</a>
    </form>
@endsection
