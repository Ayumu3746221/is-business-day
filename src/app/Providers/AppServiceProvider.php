<?php

namespace App\Providers;

use App\Package\Services\Business\BusinessService;
use App\Package\Services\Business\BusinessServiceInterface;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use App\Package\Services\Holidays\HolidaysService;
use App\Package\Services\Holidays\HolidaysServiceInterface;
use App\Package\Aplications\Datas\Holidays\HolidaysClient;
use App\Package\Aplications\Datas\Holidays\HolidaysClientInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(HolidaysClientInterface::class, HolidaysClient::class);
        $this->app->singleton(HolidaysServiceInterface::class, HolidaysService::class);
        $this->app->singleton(BusinessServiceInterface::class, BusinessService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();
    }
}
