<?php

namespace App\Package\Aplications\Datas\Holidays;

use App\Package\Aplications\Datas\Holidays\HolidaysClientInterface;
use Illuminate\Support\Facades\File;

class HolidaysClient implements HolidaysClientInterface
{
    /**
     * @inheritDoc
     */
    public function findHolidaysByDate(string $date) : ?array
    {
        $filePath = resource_path("data/holidays.json");
        $data = json_decode(File::get($filePath), true);

        foreach ($data as $holiday) {
            if ($holiday['date'] === $date) {
                return $holiday;
            }
        }

        return null;
    }
}
