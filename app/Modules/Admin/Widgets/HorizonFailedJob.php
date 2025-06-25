<?php

namespace App\Modules\Admin\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HorizonFailedJob extends StatsOverviewWidget
{

    protected function getCards(): array
    {

        $failedJobsCount = DB::table('failed_jobs')->count();

        return [
            Stat::make('Failed Jobs', $failedJobsCount)
                ->description('Jobs com falha que não foram reprocessados')
                ->descriptionIcon('heroicon-o-exclamation-triangle')
                ->color($failedJobsCount > 0 ? 'danger' : 'success'),
        ];
    }

}
