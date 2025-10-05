<?php

namespace App\Package\Services\Holidays;

use App\Package\Aplications\Datas\Holidays\HolidaysClientInterface;
use App\Package\Models\Holidays\HolidayResult;
use App\Package\Services\Holidays\HolidaysServiceInterface;

class HolidaysService implements HolidaysServiceInterface
{

    public function __construct(
        readonly HolidaysClientInterface $client,
    ) {}

    /**
     * @inheritDoc
     */
    public function getHolidayByDate(string $date): HolidayResult
    {
        $data = $this->client->findHolidaysByDate($date);

        if (is_null($data)) {
            return new HolidayResult($date, false, null);
        }

        return new HolidayResult($date, true, $data['name']);
    }
}
