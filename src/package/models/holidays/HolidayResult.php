<?php

namespace App\Package\Models\Holidays;

class HolidayResult
{
    public function __construct(
      public string $date,
      public bool $isHoliday,
      public ?string $name,
    ) {}
}
