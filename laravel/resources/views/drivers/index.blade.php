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
        <td>Vardas, Pavarde</td>
        <td>Miestas</td>
        <td>Veiksmai</td>
    </tr>
    @foreach ($drivers as $driver)
    <tr>
        <td>{{$driver->name}}</td>
        <td>{{$driver->city}}</td>
        <td>
            <form action="{{ route('drivers.edit', ['driver' => $driver->driver_id]) }}">
                {{ csrf_field() }}
                <button type="submit">Atnaujinti</button>
            </form>
            <form method="POST" action="{{ route('drivers.destroy', ['driver' => $driver->driver_id]) }}">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button type="submit">Trinti</button>
             </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $drivers->links() }}

@endsection
