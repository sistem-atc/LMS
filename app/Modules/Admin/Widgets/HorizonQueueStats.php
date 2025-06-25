<?php

namespace App\Modules\Admin\Widgets;

use Filament\Widgets\ChartWidget;
use Laravel\Horizon\Contracts\MetricsRepository;

class HorizonQueueStats extends ChartWidget
{
    protected static ?string $heading = 'Jobs Pending in Queues';
    protected int|string|array $columnSpan = 'full';
    protected static ?string $pollingInterval = '10s';

    protected function getData(): array
    {

        $repository = app(MetricsRepository::class);
        $queues = ['default'];

        $datasets = [];
        foreach ($queues as $queue) {
            $metrics = $repository->measuredJobs();
            $datasets[] = [
                'label' => $queue,
                'data' => collect($metrics)->pluck('count')->toArray(),
            ];
        }

        return [
            'labels' => range(1, 60),
            'datasets' => $datasets,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

}
