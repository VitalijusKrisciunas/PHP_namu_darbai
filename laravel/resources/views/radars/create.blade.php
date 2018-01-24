<style>
    input {
        width: 500px;
        height: 50px;
        font-size: 24px;
        margin: 15px;
        text-align: center;
    }
</style>

<div style="width: 500px;">
    <form action="{{ route('radars.store') }}" method="POST">
        {{ csrf_field() }}

        <input type="string" name="date" placeholder="Iveskite data">
        <input type="string" name="number" placeholder="Iveskite numier">
        <input type="string" name="time" placeholder="Iveskite laika">
        <input type="string" name="distance" placeholder="Iveskite atstuma">
        <input type="submit" value="Pridėti">
    </form>
</div>