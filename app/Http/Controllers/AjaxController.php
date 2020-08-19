<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends MyAjaxController
{
    public function index(Request $request)
    {

        return $this->ajaxOutput();
    }
}
