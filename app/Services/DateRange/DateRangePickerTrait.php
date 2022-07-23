<?php

declare(strict_types=1);

namespace App\Services\DateRange;

use Carbon\Carbon;

/**
 * Realization DateRangeStringInterface for https://www.daterangepicker.com/
 * format 07/13/2022 - 08/23/2022  m/d/Y - m/d/Y
 */
trait DateRangePickerTrait
{
    /**
     * @return string
     */
    public function startRange(): string
    {
        $now = Carbon::now()->format(config('view.date_format'));
        $addDay = Carbon::now()->addDay()->format(config('view.date_format'));
        return  $now . config('view.date_range_separator') . $addDay;
    }

    /**
     * @param string $dateRange
     * @return string
     */
    public function dateFrom(string $dateRange): string
    {
        $dates = explode(config('view.date_range_separator'), $dateRange);
        return Carbon::createFromFormat(config('view.date_format'), $dates[0])->toDateString();
    }

    /**
     * @param string $dateRange
     * @return string
     */
    public function dateTo(string $dateRange): string
    {
        $dates = explode(config('view.date_range_separator'), $dateRange);
        return Carbon::createFromFormat(config('view.date_format'), $dates[1])->toDateString();
    }

    /**
     * @param string $dateRange
     * @return int
     */
    public function durationInDays(string $dateRange): int
    {
        $dates = explode(config('view.date_range_separator'), $dateRange);
        $start = Carbon::createFromFormat(config('view.date_format'), $dates[0]);
        $end = Carbon::createFromFormat(config('view.date_format'), $dates[1]);
        return $start->diffInDays($end);
    }

}
