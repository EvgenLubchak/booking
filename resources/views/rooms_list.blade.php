@extends('layouts.main')
@section('content')
    @include('components.datepicker')
    <div class="container">
        <div class="list-group mb-4">
        @if(!$rooms->isEmpty())
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Room ID</th>
                <th scope="col">Room Name</th>
                <th scope="col">Reservation</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->name }}</td>
                <td>
                    <a href="{{route('reservation', ['room'=>$room->id])}}?date-range={{urlencode($date_range)}}">Reserve</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @else
            Empty result. Add more rooms by command:
            <b>./vendor/bin/sail php artisan create:rooms 50<b>
        @endif
        </div>
        {{ $rooms->links() }}
    </div>
    @include('components.reservation_list')
@endsection
