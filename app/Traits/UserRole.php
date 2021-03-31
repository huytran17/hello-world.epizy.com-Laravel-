<?php 

namespace App\Traits;

trait UserRole {

	public function getRoleUpgrade($user)
	{
	    if ($user->isSuperAdmin()) return 0;
        elseif ($user->isLowerAdmin()) return 0;
        else return 1;
	}

	public function getRoleDowngrade($user)
	{
	    if ($user->isSuperAdmin()) return 1;
        elseif ($user->isLowerAdmin()) return 2;
        else return 2;
	}

}

?>