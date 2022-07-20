<?php

namespace App\Services;

use App\Models\Room;

class RoomService
{
    /**
     * @return mixed
     */
    public function index()
    {
        return Room::paginate(15);
    }
}
