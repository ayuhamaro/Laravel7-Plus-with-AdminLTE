<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\WelcomeModel;
use App\Http\Libs\MyPaginationLib;

class WelcomeController extends MyFrontController
{
    public function index(Request $request)
    {
        //$welcomeModel = new WelcomeModel();
        $PaginationLib = new MyPaginationLib();

        $this->setViewData('page_title', 'Hi! I\'m '.(string)config('site.siteName'));
        $this->setViewData('msg', '簡單輕鬆套上全功能版型');


        $pageNum = (is_null($request->query('page_num')))?'1': $request->query('page_num');


        $PaginationLib->setting($pageNum, 10, 128);
        $paginationLink = $PaginationLib->paginationLink();
        $this->setViewData('paginationLink', $paginationLink);
        $paginationSelect = $PaginationLib->paginationSelect();
        $this->setViewData('paginationSelect', $paginationSelect);


        return $this->render('front.welcome.welcome__index');
    }
}
