@extends('layouts.layout')

@section('content')

<table style="border: 2px solid black">
    <tr>
        <td>Vardas, Pavarde</td>
        <td>Miestas</td>
    </tr>
    <tr>
        <td>{{$driver->name}}</td>
        <td>{{$driver->city}}</td>
    </tr>
</table>

@endsection
