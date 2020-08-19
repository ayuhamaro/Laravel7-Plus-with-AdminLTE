<?php

namespace App\Http\Controllers;

class MyAjaxController extends Controller
{
    private $viewData = array(
        'success' => false,
        'statusCode' => '1000',
        'errorMsg' => 'Not logged in',
    );

    public function __construct()
    {
        if( ! session_id())
        {
            session_start();
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

    protected function ajaxOutput()
    {
        return view('api.ajax', array('json' => json_encode($this->viewData, JSON_UNESCAPED_UNICODE)));
    }

}
