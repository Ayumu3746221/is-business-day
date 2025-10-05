<?php

namespace App\Package\Aplications\Datas\Holidays;

interface HolidaysClientInterface
{
    /**
     * 祝日情報をholidays.jsonから日時を指定して取得する。
     * @param string $date
     * @return array<string, mixed>|null
     */
    public function findHolidaysByDate(string $date) : ?array;
}
