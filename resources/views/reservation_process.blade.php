@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="list-group mb-4 col-md-4">
            <h1>Reserve room</h1>
            <h3>Name: {{ $room->name }}</h3>
            <h3>ID: {{ $room->id }}</h3>
            <h4>Date range: {{ $date_range }}</h4>
            <form method="POST" action="{{route('do.reservation', ['room' => $room->id])}}">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="range" value="{{ $date_range }}">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Name</span>
                    <input required name="name" min="2" maxlength="50" type="text"
                           class="form-control" placeholder="Type name" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Phone</span>
                    <input name="phone" type="text" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}"
                           class="form-control" placeholder="Type Phone" aria-describedby="basic-addon1">
                    <span class="input-group-text" id="basic-addon1">Format: 26-12-11</span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                    <input name="email" type="email" class="form-control" placeholder="Type email" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Select guest number</span>
                    <select name="guests" required class="form-select">
                        <option selected value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="3">4</option>
                        <option value="3">5</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-primary btn-b" type="submit">RESERVE</button>
                </div>
            </form>
        </div>
    </div>
@endsection
