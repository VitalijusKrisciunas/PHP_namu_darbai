@extends('layouts.layout')

@section('content')

<table style="border: 2px solid black">
    <tr>
        <td>Data</td>
        <td>Numeris</td>
        <td>Atstumas</td>
        <td>Veiksmai</td>
    </tr>
    @foreach ($radars as $radar)
    <tr>
        <td>{{$radar->date}}</td>
        <td>{{$radar->number}}</td>
        <td>{{$radar->distance}}</td>
        <td><a >Taisyti</a></td>
    </tr>
    @endforeach
</table>
{{$radars->links()}}

@endsection
