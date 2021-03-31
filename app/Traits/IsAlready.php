<?php

namespace App\Traits;

trait IsAlready {

    private $__email_verified_at = 'email_verified_at', 
            $__email_subscribed_at = 'email_subscribed_at', 
            $__deleted_at = 'deleted_at';

	public function isDeleted()
	{
	    return self::isAlready($this->__deleted_at);
	}

	public function isVerified()
    {
        return self::isAlready($this->__email_verified_at);
    }

    public function isSubscribed()
    {
        return self::isAlready($this->__email_subscribed_at);
    }

	public function isAlready($attribute)
    {
        return $this->attributes[$attribute]===null ? true : false;
    }

}

?>