@extends('layouts.layout')

@section('header_style')
<style>
    form {
        display:inline-block;
    }
</style>
@endsection

@section('content')

<table style="border: 2px solid black">
    <tr>
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
