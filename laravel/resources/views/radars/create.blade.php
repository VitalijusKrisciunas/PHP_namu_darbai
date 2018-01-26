@extends('layouts.layout')

@section('header_style')
<style>
    input {
        width: 500px;
        height: 50px;
        font-size: 24px;
        margin: 15px;
        text-align: center;
    }
    label {
        font-size: 24px;
        margin-left:15px;
    }
    select {
        font-size: 24px;
    }
</style>
@endsection

@section('content')

@if (count($errors))
    @foreach($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
@endif
    
<div style="width: 500px;">
    <form action="{{ route('radars.store') }}" method="POST">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <input value="{{old('date')}}" type="datetime" name="date" placeholder="Iveskite data">
        <input value="{{old('number')}}" type="string" name="number" placeholder="Iveskite numier">
        <input value="{{old('time')}}" type="string" name="time" placeholder="Iveskite laika">
        <input value="{{old('distance')}}"type="string" name="distance" placeholder="Iveskite atstuma">
        <label>Vairuotojas:</label>
        <select name="driverid">
            @foreach($drivers as $driver)
                <option value="{{$driver->driver_id}}">{{$driver->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="Pridėti">
    </form>
</div>

@endsection