<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Website;

class AdminService {

    private const __AMOUNT_OF_MONTH = 12;

    protected $_now, $_post, $_user, $_site;

    public function __construct(Post $post, User $user, Website $site)
    {
        $this->_now = Carbon::now();

        $this->_post = $post;

        $this->_user = $user;

        $this->_site = $site;
    }

    public function newPostInMonth()
    {
        return $this->getInMonth($this->_post);
    }

    public function newUserInMonth()
    {
        return $this->getInMonth($this->_user);
    }

    public function getInMonth($model)
    {
        //date("F", mktime(0, 0, 0, $m, 10))
        $result = [];

        for ($i=0; $i < self::__AMOUNT_OF_MONTH; $i++) {

            $m = $this->_now->month;

            $y = $this->_now->year;

            $result['Tháng '. $m] = $model->getInMonth($m, $y)->count();

            $this->_now->subMonth(1);
        }

        $this->resetTimeNow();

        return collect(array_reverse($result));
    }

    public function resetTimeNow()
    {
        return $this->_now = Carbon::now();
    }

    public function getSite()
    {
        return $this->_site->firstOrFail();
    }
}