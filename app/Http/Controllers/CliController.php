<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CliController extends MyCliController
{
    public function index(Request $request)
    {

        return $this->cliOutput();
    }
}
