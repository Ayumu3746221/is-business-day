<?php

namespace App\Package\Services\Business;

use App\Package\Services\Holidays\HolidaysServiceInterface;
use Illuminate\Support\Carbon;

class BusinessService implements BusinessServiceInterface
{
    public function __construct(
        private readonly HolidaysServiceInterface $holidaysService
    ) {}

    /**
     * @inheritDoc
     */
    public function isWeekend(string $date): bool
    {
        return Carbon::parse($date)->isWeekend();
    }

    /**
     * @inheritDoc
     */
    public function isHoliday(string $date): bool
    {
        return $this->holidaysService->getHolidayByDate($date)->isHoliday;
    }

    /**
     * @inheritDoc
     */
    public function isBusinessDay(string $date): bool
    {
        if ($this->isWeekend($date)) {
            return false;
        }

        if ($this->isHoliday($date)) {
            return false;
        }

        return true;
    }
}
