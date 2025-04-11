<?php

namespace Kacedeveloperz\Permissionui;

use Illuminate\Support\ServiceProvider;

class PermissionUiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {


        $this->publishes(
            [
                __DIR__ . '/../config/config.php' => config_path('kace_permissionui.php'),
                __DIR__ . '/../resources/js/pages/kace-permission/permission/Create.vue' => resource_path('/js/pages/kace-permission/permission/Create.vue'),
                __DIR__ . '/../resources/js/pages/kace-permission/permission/Edit.vue' => resource_path('/js/pages/kace-permission/permission/Edit.vue'),
                __DIR__ . '/../resources/js/pages/kace-permission/permission/Manage.vue' => resource_path('/js/pages/kace-permission/permission/Manage.vue'),
                __DIR__ . '/../resources/js/pages/kace-permission/role/Create.vue' => resource_path('/js/pages/kace-permission/role/Create.vue'),
                __DIR__ . '/../resources/js/pages/kace-permission/role/Edit.vue' => resource_path('/js/pages/kace-permission/role/Edit.vue'),
                __DIR__ . '/../resources/js/pages/kace-permission/role/Manage.vue' => resource_path('/js/pages/kace-permission/role/Manage.vue'),
                __DIR__ . '/../resources/js/pages/kace-permission/role/AssignPermissions.vue' => resource_path('/js/pages/kace-permission/role/AssignPermissions.vue'),
                __DIR__ . '/../resources/js/pages/kace-permission/components/Pagination.vue' => resource_path('/js/pages/kace-permission/components/Pagination.vue'),
                __DIR__ . '/../resources/js/pages/kace-permission/components/Modal.vue' => resource_path('/js/pages/kace-permission/components/Modal.vue'),
                __DIR__ . '/../resources/js/pages/kace-permission/components/Success.vue' => resource_path('/js/pages/kace-permission/components/Success.vue'),
                __DIR__ . '/../resources/js/pages/kace-permission/components/Button.vue' => resource_path('/js/pages/kace-permission/components/Button.vue'),
                __DIR__ . '/../src/Http/Middleware/HandleInertiaRequests.php' => app_path('/Http/Middleware/HandleInertiaRequests.php'),
            ],
            'kace-perm-vue'
        );

        $this->loadRoutesFrom(__DIR__ . "/../routes/web.php");

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'permissionui');

        $this->loadMigrationsFrom(__DIR__ . "/../database/migrations");
    }
}
