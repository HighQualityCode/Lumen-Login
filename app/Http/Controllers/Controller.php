<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Auth;

class Controller extends BaseController
{
    public function __construct() {
    	// $this->middleware('auth');
    }

    public function index() {
    }

    public function undefined() {
        return response()->json(['status' => 'page does not exist'], 404);
    }
}
