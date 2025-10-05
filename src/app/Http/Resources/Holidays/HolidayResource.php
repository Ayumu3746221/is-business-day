<?php

namespace App\Http\Resources\Holidays;

use App\Package\Models\Holidays\HolidayResult;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin HolidayResult
 */
class HolidayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'date' => $this->date,
            'is_holiday' => $this->isHoliday,
            'name' => $this->when($this->isHoliday, $this->name),
        ];
    }
}
