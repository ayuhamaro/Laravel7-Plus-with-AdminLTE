<div class="row">
    <div class="col-12">
        <h1>{{ $msg }}</h1>
        <br>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-6 col-xl-5">
        {!! $paginationLink !!}
    </div>
    <div class="col-12 col-lg-4 col-xl-3">
        {!! $paginationSelect !!}
    </div>
</div>

<div class="row">
    <div class="col-12">
        <br>
        <span>控制器：app\Controllers\WelcomeController.php</span>
        <pre>
            <code>
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Libs\MyPaginationLib;

class WelcomeController extends MyFrontController
{
    public function index(Request $request)
    {
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
            </code>
        </pre>
        <span>視圖：resources\views\front\welcome\welcome__index.blade.php</span>
        <pre>
            <code>
<?php
    $str = <<<EOD
<div class="row">
    <div class="col-12">
        <h1>{{ \$msg }}</h1>
        <br>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-6 col-xl-5">
        {!! \$paginationLink !!}
    </div>
    <div class="col-12 col-lg-4 col-xl-3">
        {!! \$paginationSelect !!}
    </div>
</div>
EOD;
    echo htmlspecialchars($str);
    ?>
            </code>
        </pre>
        <span>這樣就完成囉！</span>
    </div>
</div>





