<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Services\Product\Service;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;

    /**
     * Handle the incoming request.
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
