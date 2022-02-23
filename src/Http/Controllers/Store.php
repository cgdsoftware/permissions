<?php

namespace LaravelEnso\Permissions\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Permissions\Http\Requests\ValidatePermission;
use LaravelEnso\Permissions\Models\Permission;

class Store extends Controller
{
    public function __invoke(ValidatePermission $request, Permission $permission)
    {
        $permission = $permission->storeWithRoles(
            $request->validatedExcept('roles'),
            $request->get('roles'),
        );

        return [
            'message' => __('The permission was created!'),
            'redirect' => 'system.permissions.edit',
            'param' => ['permission' => $permission->id],
        ];
    }
}
