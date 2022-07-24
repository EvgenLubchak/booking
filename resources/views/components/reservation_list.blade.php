<div class="container">
    <h4>Reservation list BETA</h4>
    <p>You can see the list of reservations by dates.</p>
    <div class="list-group mb-4">
        @if( !empty($reservations) )
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Reservation ID</th>
                    <th scope="col">Room ID</th>
                    <th scope="col">Room Name</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Guests</th>
                    <th scope="col">Date From</th>
                    <th scope="col">Date To</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($reservations as $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->room_id }}</td>
                        <td>{{ $r->room_name }}</td>
                        <td>{{ $r->name }}</td>
                        <td>{{ $r->phone }}</td>
                        <td>{{ $r->email }}</td>
                        <td>{{ $r->guests }}</td>
                        <td>{{ $r->date_from }}</td>
                        <td>{{ $r->date_to }}</td>
                        <td>
                            <a href="{{route('reservation.delete', ['reservation'=>$r->id])}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            Empty result. Reserve more rooms.
        @endif
    </div>
</div>
