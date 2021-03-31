<?php
	
namespace App\Traits;

use Carbon\Carbon;

trait TimestampFormat {

	private $__created_at = 'created_at', $__updated_at = 'updated_at', $__deleted_at = 'deleted_at';

	public function dmY_HsiCreated()
	{
	    return self::dmY_Hsi($this->__created_at);
	}

	public function dmY_HsiUpdated()
	{
	    return self::dmY_Hsi($this->__updated_at);
	}

	public function dmY_HsiDeleted()
	{
	    return self::dmY_Hsi($this->__deleted_at);
	}

	public function Hs_Created()
	{
	    return self::Hs();
	}

	public function dmY_Hsi($attr)
    {
        return date('d-m-Y H:s:i', strtotime($this->attributes[$attr]));
    }

    public function Hs()
    {
        return date('H:s', strtotime($this->created_at)) .' | '. Carbon::parse($this->created_at)->diffForHumans();
    }
}

?>