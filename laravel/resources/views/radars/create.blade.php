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
        <input value="{{old('date')}}" type="string" name="date" placeholder="Iveskite data">
        <input value="{{old('date')}}" type="string" name="number" placeholder="Iveskite numier">
        <input value="{{old('date')}}" type="string" name="time" placeholder="Iveskite laika">
        <input value="{{old('date')}}"type="string" name="distance" placeholder="Iveskite atstuma">
        <input type="submit" value="Pridėti">
    </form>
</div>

@endsection