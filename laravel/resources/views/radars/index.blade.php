<table>
    <tr>
        <td>Data</td>
        <td>Numeris</td>
        <td>Greitis</td>
        <td>Veiksmai</td>
    </tr>

    @foreach($radars as $radar)
    <tr>
        <td>{{ $radar->date }}</td>
        <td>{{ $radar->number }}</td>
        <td>{{ $radar->distance / $radar->time }}</td>
        <td><a href="{{ route('radars.edit', ['radar' => $radar->id]) }}">Atnaujinti</a></td>
        <td><a href="{{ route('radars.destroy', ['radar' => $radar->id]) }}">Trinti</a></td>
    </tr>        
    @endforeach
</table>