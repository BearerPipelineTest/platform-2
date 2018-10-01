<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Orchid\Composers\MainMenuComposer;
use App\Orchid\Composers\SystemMenuComposer;

class PlatformProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard)
    {
        View::composer('platform::layouts.dashboard', MainMenuComposer::class);
        View::composer('platform::container.systems.index', SystemMenuComposer::class);

        $dashboard
            //->registerPermissions($this->registerPermissionsMain())
            ->registerPermissions($this->registerPermissionsSystems());

        $dashboard->registerGlobalSearch([
          //...Models
        ]);
    }

    /**
     * @return array
     */
    protected function registerPermissionsMain(): array
    {
        return [
            trans('platform::permission.main.main') => [
                [
                    'slug'        => 'platform.index',
                    'description' => trans('platform::permission.main.main'),
                ],
                [
                    'slug'        => 'platform.systems',
                    'description' => trans('platform::permission.main.systems'),
                ],
                [
                    'slug'        => 'platform.systems.index',
                    'description' => trans('platform::permission.systems.settings'),
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    protected function registerPermissionsSystems(): array
    {
        return [
            trans('platform::permission.main.systems') => [
                [
                    'slug'        => 'platform.systems.roles',
                    'description' => trans('platform::permission.systems.roles'),
                ],
                [
                    'slug'        => 'platform.systems.users',
                    'description' => trans('platform::permission.systems.users'),
                ],
                [
                    'slug'        => 'platform.systems.comments',
                    'description' => trans('platform::permission.systems.comment'),
                ],
                [
                    'slug'        => 'platform.systems.category',
                    'description' => trans('platform::permission.systems.category'),
                ],
            ],
        ];
    }
}