## What to note before installing this package

> Only compatible with laravel 12 and Inertia-vue fresh laravel 12

* How to install this package ---------

Run a fresh Laravel 12 with Inertia-vue option project
> composer require kacedeveloperz/permissionui


Install Spatie Permissions package and set up as directed
> composer require spatie/laravel-permission

Install vue-multiselect": "^3.2.0 package 
> npm i vue-multiselect

Install sweetalert2 package 
> npm i sweetalert2


Install kacedeveloperz/pemissionui
> composer require kacedeveloperz/permissionui

Run the publish command to publish the vue asset files files:
> php artisan vendor:publish --tag=kace-perm-vue --force

Unwrap Resource data: Add the following in your AppServiceProvider boot method:
> JsonResource::withoutWrapping();
* import:
> use Illuminate\Http\Resources\Json\JsonResource;

Run :
> npm run dev

Run : 
> php artisan optimize:clear

# Usages

### usage of Toast in vue component
* import { useToast } from '@/pages/kace-permission/composables/toast';
* const { toast } = useToast();
#### call it like this
* toast("success", "This is a toast message")

# Checking of Roles and Permissions in vue component
* import { usePermission } from '@/pages/kace-permission/composables/permissions';
* const { hasRole, hasPermission, hasRoles, hasPermissions } = usePermission();
#### call it like this
* hasRole('admin')
* hasPermission('view record')
* hasRoles(['admin', 'author'])
* hasPermissions(['view record', 'delete record'])

