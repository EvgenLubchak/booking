<?php

namespace App\Services\Interfaces;

interface DateRangeStringInterface
{
    /**
     * Create default date range string
     *
     * @return string
     */
    public function startRange(): string;

    /**
     * Get reservation start date string
     *
     * @param string $dateRange
     * @return string
     */
    public function dateFrom(string $dateRange): string;

    /**
     * Get reservation end date string
     *
     * @param string $dateRange
     * @return string
     */
    public function dateTo(string $dateRange): string;

    /**
     * Get days interval between start and end of reservation
     *
     * @param string $dateRange
     * @return int
     */
    public function durationInDays(string $dateRange): int;
}
