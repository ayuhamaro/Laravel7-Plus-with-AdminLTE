<?php

namespace App\Http\Models;

use DB;

class WelcomeModel extends MyModel
{
    public function show_databases()
    {
        $results = DB::select('SHOW DATABASES;');
        return $results;
    }
}
