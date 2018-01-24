@extends('layouts.layout')

@section('content')

<style>
    input {
        width:500px;
        margin:15px;
        text-align:center;
        font-size:24px;
    }
</style>

<h1>Naujas vairuotojo įrašas</h1>
<div style="width:500px">
    <form action="{{route('drivers.store')}}" method="POST">
        {{csrf_field()}}
        <input type="string" name="name" placeholder="Iveskite Varda ir Pavarde">
        <input type="string" name="city" placeholder="Iveskite miesta">
        <input type="submit" value="Prideti">
    </form>
</div>

@endsection
