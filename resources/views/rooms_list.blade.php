@extends('layouts.main')
@section('content')
    @include('components.datepicker')
    <div class="container">
        <div class="list-group mb-4">
        @if(!$rooms->isEmpty())
            @foreach ($rooms as $room)
                <a href="{{route('reservation', ['room'=>$room->id])}}?date-range={{urlencode($date_range)}}"
                   class="list-group-item list-group-item-action"> ID:{{$room->id}} | Name: {{ $room->name }}</a>
            @endforeach
        @else
            Empty result. Add more rooms by command:
                <b>./vendor/bin/sail php artisan create:rooms 50<b>
        @endif
        </div>
        {{ $rooms->links() }}
    </div>
@endsection
