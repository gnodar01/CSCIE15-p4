@extends('layouts.master')

@push('nav')
<li><a href='/group/create'>Add a Group</a></li>
<li><a href='/group/{{ $gId }}/activity/create'>Add an Activity</a></li>
<li><a href='/group/{{ $gId }}/activity/{{ $activity['id'] }}/task/create'>Add a Task</a></li>
<li><a href='/group/{{ $gId }}/activity/{{ $activity['id'] }}/role/create'>Add a Role</a></li>
@endpush

@section('content')
    <h1>Edit {{ $activity['name'] }}</h1>

    <form method='POST' action='/group/{{ $gId }}/activity/{{ $activity['id'] }}'>

        {{ method_field('put') }}

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='name'>* Name</label>
        <input type='text' name='name' id='name' value='{{ old('name', $activity['name']) }}'>
        @include('modules.error-field', ['fieldName' => 'name'])

        <label for='description'>* Description</label>
        <input type='text' name='description' id='description' value='{{ old('description', $activity['description']) }}'>
        @include('modules.error-field', ['fieldName' => 'description'])

        <label for='location'>* Location</label>
        <input type='text' name='location' id='location' value='{{ old('location', $activity['location']) }}'>
        @include('modules.error-field', ['fieldName' => 'location'])

        <label for='date-start'>* Date Start </label>
        <input type='date' name='date-start' id='date-start' value='{{ old('date-start', $activity['date_start']) }}'>
        @include('modules.error-field', ['fieldName' => 'date-start'])

        <label for='date-end'>* Date End </label>
        <input type='date' name='date-end' id='date-end' value='{{ old('date-end', $activity['date_end']) }}'>
        @include('modules.error-field', ['fieldName' => 'date-end'])

        <label for='time-start'>Time Start </label>
        <input type='time' name='time-start' id='time-start' value='{{ old('time-start', $activity['time_start']) }}'>
        @include('modules.error-field', ['fieldName' => 'time-start'])

        <label for='time-end'>Time End </label>
        <input type='time' name='time-end' id='time-end' value='{{ old('time-end', $activity['time_end']) }}'>
        @include('modules.error-field', ['fieldName' => 'time-end'])
        
        <br>
        <input type='submit' value='Save changes' class='btn btn-primary btn-small'>
        <a href='{{ $prevUrl }}' class='btn btn-secondary btn-small'>Cancel</a>
    </form>
@endsection
