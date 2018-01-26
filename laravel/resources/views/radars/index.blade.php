@extends('layouts.layout')

@section('header_style')
<style>
    form {
        display:inline-block;
    }
    table{
        border:2px solid black;
        text-align:center;
    }
    table tr{
        border:1px solid black;
    }
    table td{
        border:1px solid black;
    }
</style>
@endsection

@section('content')

<table>
    <tr style="font-weight:700">
        <td>Data</td>
        <td>Numeris</td>
        <td>Greitis</td>
        <td>Vairuotojas</td>
        <td>Miestas</td>
        <td>Veiksmai</td>
    </tr>

    @foreach($radars as $radar)
    <tr>
        <td>{{ $radar->date }}</td>
        <td>{{ $radar->number }}</td>
        <td>{{ $radar->distance / $radar->time }}</td>
        <td>{{$radar->driver->name}}</td>
        <td>{{$radar->driver->city}}</td>
        <td>
        <form action="{{ route('radars.edit', ['radar' => $radar->id]) }}">
                {{ csrf_field() }}
                <button type="submit">Atnaujinti</button>
            </form>
            <form method="POST" action="{{ route('radars.destroy', ['radar' => $radar->id]) }}">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button type="submit">Trinti</button>
             </form>
        </td>
    </tr>        
    @endforeach
</table>

{{ $radars->links() }}

@endsection
