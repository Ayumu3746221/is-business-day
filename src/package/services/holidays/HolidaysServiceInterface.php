<?php

namespace App\Package\Services\Holidays;

use App\Package\Models\Holidays\HolidayResult;

interface HolidaysServiceInterface
{
    /**
     * 休日情報を取得する
     * @param string $date 日時（YYYY-MM-DD）
     * @return HolidayResult 休日情報
     */
    public function getHolidayByDate(string $date): HolidayResult;
}
