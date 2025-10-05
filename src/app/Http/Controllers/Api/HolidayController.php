<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Holidays\GetHolidayRequest;
use App\Http\Resources\Holidays\HolidayResource;
use App\Package\Services\Holidays\HolidaysServiceInterface;

class HolidayController extends Controller
{
    public function __construct(
        private readonly HolidaysServiceInterface $holidaysService
    ) {}

    /**
     * Handle the incoming request.
     *
     * @param GetHolidayRequest $request
     * @return HolidayResource
     */
    public function __invoke(GetHolidayRequest $request): HolidayResource
    {
        $validated = $request->validated();
        $date = $validated['date'];

        $holidayResult = $this->holidaysService->getHolidayByDate($date);

        return new HolidayResource($holidayResult);
    }
}
