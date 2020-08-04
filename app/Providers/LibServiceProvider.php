<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Libs\MyPaginationLib;

class LibServiceProvider extends ServiceProvider
{
    /**
     * 指定提供者載入是否延緩
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * 註冊服務提供者。
     *
     * @return void
     */
    public function register()
    {
        //使用singleton绑定单例
        $this->app->singleton('lib.pagination', function(){
            return new MyPaginationLib();
        });
    }

    /**
     * 取得提供者所提供的服務
     *
     * @return array
     */
    public function provides()
    {
        return ['lib.pagination'];
    }
}