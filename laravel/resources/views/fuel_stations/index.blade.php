<table style="border: 2px solid black">
    <tr>
        <td>Degaline</td>
    </tr>
    @foreach ($fuelStations as $fuelStat)
    <tr>
        <td>{{$fuelStat->station_name}}</td>
    </tr>
    @endforeach
</table>