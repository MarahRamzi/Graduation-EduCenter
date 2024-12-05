<?php

namespace App\Facades;

use App\Models\Role as ModelsRole;
use Illuminate\Support\Facades\Facade;

class Role extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'role';
    }

      /**
     * Expose the role constants.
     */
    public const ROLE_ADMIN = ModelsRole::ROLE_ADMIN;
    public const ROLE_STUDENT = ModelsRole::ROLE_STUDENT;
    public const ROLE_TEACHER = ModelsRole::ROLE_TEACHER;
}
