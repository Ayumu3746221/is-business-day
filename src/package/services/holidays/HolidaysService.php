<?php

namespace App\Package\Services\Holidays;

use App\Package\Applications\Datas\Holidays\HolidaysClientInterface;
use App\Package\Applications\Cache\Cacheable;
use App\Package\Models\Holidays\HolidayResult;
use App\Package\Services\Holidays\HolidaysServiceInterface;

class HolidaysService implements HolidaysServiceInterface
{
    use Cacheable;

    public function __construct(
        readonly HolidaysClientInterface $client,
    ) {}

    /**
     * @inheritDoc
     */
    public function getHolidayByDate(string $date): HolidayResult
    {
        $data = $this->rememberCache(
            key: "holiday_{$date}",
            callback: fn() => $this->client->findHolidaysByDate($date),
            ttl: 86400
        );

        if (is_null($data)) {
            return new HolidayResult($date, false, null);
        }

        return new HolidayResult($date, true, $data['name']);
    }
}
