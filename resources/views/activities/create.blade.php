@extends('layouts.master')

@push('nav')
<li><a href='/group/create'>Add a Group</a>
@endpush

@section('content')
    <h1>Add Activity</h1>

    <form method='POST' action='/group/{{ $gId }}/activity'>

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='name'>* Name</label>
        <input type='text' name='name' id='name' value='{{ old('name') }}'>
        @include('modules.error-field', ['fieldName' => 'name'])

        <label for='description'>* Description</label>
        <input type='text' name='description' id='description' value='{{ old('description') }}'>
        @include('modules.error-field', ['fieldName' => 'description'])

        <label for='location'>* Location</label>
        <input type='text' name='location' id='location' value='{{ old('location') }}'>
        @include('modules.error-field', ['fieldName' => 'location'])

        <label for='date-start'>* Date Start </label>
        <input type='date' name='date-start' id='date-start' value='{{ old('date-start') }}'>
        @include('modules.error-field', ['fieldName' => 'date-start'])

        <label for='date-end'>* Date End </label>
        <input type='date' name='date-end' id='date-end' value='{{ old('date-end') }}'>
        @include('modules.error-field', ['fieldName' => 'date-end'])

        <label for='time-start'>Time Start </label>
        <input type='time' name='time-start' id='time-start' value='{{ old('time-start') }}'>
        @include('modules.error-field', ['fieldName' => 'time-start'])

        <label for='time-end'>Time End </label>
        <input type='time' name='time-end' id='time-end' value='{{ old('time-end') }}'>
        @include('modules.error-field', ['fieldName' => 'time-end'])
        
        <br>
        <input type='submit' value='Save changes' class='btn btn-primary btn-small'>
        <a href='{{ $prevUrl }}' class='btn btn-secondary btn-small'>Cancel</a>
    </form>
@endsection
