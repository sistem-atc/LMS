<?php

namespace App\Modules\Admin\Widgets;

use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;

class BillingChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {

        $activeFilter = $this->filter;

        return [
            'datasets' => [
                [
                    'label' => 'Faturamento',
                    'data' => [12.5, 13.4, 12.2, 10.7, 14.5, 13.9, 14.1, 11.6, 12.4, 13.6, 16.0, 20.1],
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }

    protected function getOptions(): array|RawJs|null
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
        ];
    }
}
