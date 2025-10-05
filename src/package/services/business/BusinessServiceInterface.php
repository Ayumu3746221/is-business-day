<?php

namespace App\Package\Services\Business;

interface BusinessServiceInterface
{
    /**
     * 指定した日付が週末（土日）かどうかを判定する
     * @param string $date 日付（YYYY-MM-DD）
     * @return bool 週末ならtrue、平日ならfalse
     */
    function isWeekend(string $date): bool;

    /**
     * 指定した日付が祝日かどうかを判定する
     * @param string $date 日付（YYYY-MM-DD）
     * @return bool 祝日ならtrue、祝日でなければfalse
     */
    function isHoliday(string $date): bool;

    /**
     * 指定した日付が営業日かどうかを判定する
     * @param string $date 日付（YYYY-MM-DD）
     * @return bool 営業日ならtrue、非営業日ならfalse
     */
    public function isBusinessDay(string $date): bool;
}
