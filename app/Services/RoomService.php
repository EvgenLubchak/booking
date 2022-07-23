<?php

namespace App\Services;

use App\Models\Room;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Services\DateRange\DateRangePickerTrait;
use App\Services\Interfaces\DateRangeStringInterface;

class RoomService implements DateRangeStringInterface
{
    use DateRangePickerTrait;

    /**
     * List of rooms
     *
     * @param string $dateRange
     * @return Paginator
     */
    public function list(string $dateRange): Paginator
    {
        $dateFrom = $this->dateFrom($dateRange);
        $durationInDays = $this->durationInDays($dateRange);
        //TODO add offset and limit parameters to get_free_rooms procedure, end get paginated rows by 1 command
        $reservedRoomIds = DB::select('CALL get_reserved_rooms_ids(:dateFrom, :durationInDays)',
            [
                'dateFrom'=>$dateFrom,
                'durationInDays'=>$durationInDays,
            ]
        );
        $reservedRoomIds = Arr::pluck($reservedRoomIds, 'room_id');
        return Room::whereNotIn('id', $reservedRoomIds)->paginate(15);
        //TODO
    }

    /**
     * @return string
     */
    public function defaultRange(): string
    {
        return $this->startRange();
    }
}
