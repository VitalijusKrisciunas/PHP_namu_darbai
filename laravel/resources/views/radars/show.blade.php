<table style="border: 2px solid black">
    <tr>
        <td>Data</td>
        <td>Numeris</td>
        <td>Atstumas</td>
    </tr>
    <tr>
        <td>{{$radar->date}}</td>
        <td>{{$radar->number}}</td>
        <td>{{$radar->distance}}</td>
        <td>{{ $radar->driver->name }}</td>
        <td>{{ $radar->driver->city }}</td>
    </tr>
</table>