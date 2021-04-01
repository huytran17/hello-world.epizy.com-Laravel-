<?php

namespace App\Services;

class UserRoleService {

    public static function getRole($user, $action)
    {
        return $action === 1 ? self::getRoleUpgrade($user) : self::getRoleDowngrade($user);
    }

    public function getRoleUpgrade($user)
    {
        return ($user->isSuperAdmin() or $user->isLowerAdmin()) ? 0 : 1;
    }

    public function getRoleDowngrade($user)
    {
        return ($user->isLowerAdmin() or $user->isClient()) ? 2 : 1;
    }
}