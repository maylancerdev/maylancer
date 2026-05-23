<?php

use App\Providers\AppServiceProvider;
use App\Providers\BladeComponentServiceProvider;
use App\Providers\Filament\AdminPanelProvider;
use App\Providers\NavigationServiceProvider;

return [
    AppServiceProvider::class,
    BladeComponentServiceProvider::class,
    AdminPanelProvider::class,
    NavigationServiceProvider::class,
];
