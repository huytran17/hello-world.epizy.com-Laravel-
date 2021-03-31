<?php

namespace App\Traits;

trait IsAlready {

	public function isDeleted()
	{
	    return self::isAlready('deleted_at');
	}

	public function isVerified()
    {
        return self::isAlready('email_verified_at');
    }

    public function isSubscribed()
    {
        return self::isAlready('email_subscribed_at');
    }

	public function isAlready($attribute)
    {
        return $this->attributes[$attribute]===null ? true : false;
    }

}

?>