<?php

namespace App\Http\Controllers\Api\v3;
use App\Http\Controllers\Traits\ApiResponseTraits;
use App\Http\Controllers\Controller;


class ApiController extends Controller{

    use ApiResponseTraits;

    //TODO: 这里有bug
    public function __construct()
    {
        parent::__construct();
    }
}
