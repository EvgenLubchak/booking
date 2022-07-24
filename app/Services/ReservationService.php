<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Room;
use App\Models\Reservation;
use App\Services\DateRange\DateRangePickerTrait;
use App\Services\Interfaces\DateRangeStringInterface;
use Illuminate\Support\Facades\DB;

class ReservationService implements DateRangeStringInterface
{
    use DateRangePickerTrait;

    /**
     * Reserve room
     *
     * @param array $date
     * @param Room $room
     * @return Reservation
     */
    public function reserve(array $date, Room $room): Reservation
    {
        $date['date_from'] = $this->dateFrom($date['range']);
        $date['date_to'] = $this->dateTo($date['range']);
        unset($date['range']);
        //TODO add validation before create reservation
        return $room->reservations()->create($date);
        //TODO
    }

    /**
     * Return reservation array
     *
     * @param string $dateRange
     * @return array
     */
    public function list(string $dateRange): array
    {
        //TODO add pagination
        $dateFrom = $this->dateFrom($dateRange);
        $durationInDays = $this->durationInDays($dateRange);
        return DB::select('CALL get_reservation(:dateFrom, :durationInDays)',
            [
                'dateFrom'=>$dateFrom,
                'durationInDays'=>$durationInDays,
            ]
        );
    }
}
