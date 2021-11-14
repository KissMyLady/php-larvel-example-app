<?php

namespace App\Http\Controllers\Traits;
use App\Http\Controllers\Traits\ApiResponseTraits;
use App\Http\Controllers\Controller;


class Api_Controller extends Controller{

    use ApiResponseTraits;

    public function __construct()
    {
        parent::__construct();
    }


}
