<?php

namespace App\Http\Controllers;

class MyCliController extends Controller
{
    protected $viewData = array(
        'msg' => 'The controller use at CLI only',
    );

    public function __construct()
    {
        if(strpos(php_sapi_name(), 'cli') === false)
        {
            echo "本控制器只可用於命令列環境";
            exit;
        }
    }

    protected function setViewData($attr, $value)
    {
        $this->viewData[$attr] = $value;
    }

    protected function getViewData($attr = null)
    {
        if( ! is_null($attr) && isset($this->viewData[$attr]))
        {
            return $this->viewData[$attr];
        }
        else
        {
            return $this->viewData;
        }
    }

    protected function cliOutput()
    {
        return view('cli.cli', $this->viewData);
    }

}
