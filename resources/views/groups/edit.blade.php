@extends('layouts.master')

@push('nav')
<li><a href='/group/create'>Add a Group</a></li>
<li><a href='/group/{{ $group['id'] }}/activity/create'>Add an Activity</a></li>
@endpush

@section('content')
    <h1>Edit {{ $group['name'] }}</h1>

    <form method='POST' action='/group/{{ $group['id'] }}'>

        {{ method_field('put') }}

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='name'>* Name</label>
        <input type='text' name='name' id='name' value='{{ old('name', $group['name']) }}'>
        @include('modules.error-field', ['fieldName' => 'name'])

        <label for='description'>* Description</label>
        <input type='text' name='description' id='description' value='{{ old('description', $group['description']) }}'>
        @include('modules.error-field', ['fieldName' => 'description'])
        
        <br>
        <input type='submit' value='Save changes' class='btn btn-primary btn-small'>
        <a href='{{ $prevUrl }}' class='btn btn-secondary btn-small'>Cancel</a>
    </form>
@endsection
