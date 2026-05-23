<?php

namespace App\Filament\Widgets;

use App\Models\CustomerTestimony;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminStatsOverview extends BaseWidget
{
    protected ?string $heading = null;

    protected function getStats(): array
    {
        return [
            Stat::make(__('admin.widgets.stats.posts'), Post::count())
                ->descriptionIcon('heroicon-o-document-text')
                ->color('primary'),
            Stat::make(__('admin.widgets.stats.products'), Product::count())
                ->descriptionIcon('heroicon-o-shopping-bag')
                ->color('success'),
            Stat::make(__('admin.widgets.stats.users'), User::count())
                ->descriptionIcon('heroicon-o-users')
                ->color('info'),
            Stat::make(__('admin.widgets.stats.testimonies'), CustomerTestimony::count())
                ->descriptionIcon('heroicon-o-chat-bubble-left-right')
                ->color('warning'),
        ];
    }
}
