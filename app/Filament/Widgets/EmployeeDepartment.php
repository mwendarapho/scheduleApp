<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EmployeeDepartment extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Accounts', Employee::query()->where('department', 'accounts')->count()),
            Stat::make('Sales', Employee::query()->where('department', 'sales')->count()),
            Stat::make('ICT', Employee::query()->where('department', 'ICT')->count()),
            Stat::make('Marketing', Employee::query()->where('department', 'marketing')->count()),
        ];
    }
}
