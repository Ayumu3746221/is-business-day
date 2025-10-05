<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Holidays\GetHolidayRequest;
use App\Http\Resources\Business\BusinessDayResource;
use App\Package\Services\Business\BusinessServiceInterface;

class BusinessDayController extends Controller
{
    public function __construct(
        private readonly BusinessServiceInterface $businessService
    ) {}

    /**
     * Handle the incoming request.
     *
     * @param GetHolidayRequest $request
     * @return BusinessDayResource
     */
    public function __invoke(GetHolidayRequest $request): BusinessDayResource
    {
        $date = $request->validated()['date'];
        $isBusinessDay = $this->businessService->isBusinessDay($date);

        $result = [
            'date' => $date,
            'is_business' => $isBusinessDay,
        ];

        return new BusinessDayResource($result);
    }
}
