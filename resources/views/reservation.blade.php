@extends('layouts.main')
@section('content')
    <h1>Your reservation</h1>
    <b>reservation id: </b>
    {{$reservation->id}}
    <br>
    <b>name: </b>
    {{$reservation->name}}
    <br>
    <b>phone: </b>
    {{$reservation->phone}}
    <br>
    <b>email: </b>
    {{$reservation->email}}
    <br>
    <b>guests: </b>
    {{$reservation->guests}}
    <br>
    <b>date from: </b>
    {{$reservation->date_from}}
    <br>
    <b>date to: </b>
    {{$reservation->date_to}}
    <br>
    <b>reservation link:</b>
    {{route('reservation.link', ['reservation' => $reservation->id])}}
@endsection
