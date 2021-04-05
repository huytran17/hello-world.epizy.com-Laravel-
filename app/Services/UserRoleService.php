<?php

namespace App\Services;

class UserRoleService {

    const UP = 1, DOWN = 0;

    public static function getRole($user, $action)
    {
        return $action === self::UP ? self::getRoleUpgrade($user) : self::getRoleDowngrade($user);
    }

    public static function getRoleUpgrade($user)
    {
        return ($user->isSuperAdmin() or $user->isLowerAdmin()) ? 0 : 1;
    }

    public static function getRoleDowngrade($user)
    {
        return ($user->isLowerAdmin() or $user->isClient()) ? 2 : 1;
    }
}