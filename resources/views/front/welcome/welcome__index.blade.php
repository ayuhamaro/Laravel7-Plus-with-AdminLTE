<div class="row">
    <div class="col-12">
        <h1><?php echo $msg; ?></h1>
        <br>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-8 col-xl-6">
        {!! $paginationLink !!}
    </div>
    <div class="col-12 col-lg-4 col-xl-2">
        {!! $paginationSelect !!}
    </div>
</div>

<div class="row">
    <div class="col-12">
        <br>
        <span>控制器：app\Controllers\Home.php</span>
        <pre>
            <code>
namespace App\Controllers;

class Home extends MyFrontController
{
    public function index()
    {
        $config = config('Config\\Site');
        $paginationLib = new \App\Libraries\MyPaginationLib();

        $this->set_view_data('page_title', 'Hi! I\'m '.$config->siteName);
        $this->set_view_data('msg', '簡單輕鬆套上全功能版型');


        $page_num = (is_null($this->request->getGet('page_num')))?'1': $this->request->getGet('page_num');


        $paginationLib->setting($page_num, 10, 128);
        $pagination_link = $paginationLib->pagination_link();
        $this->set_view_data('pagination_link', $pagination_link);
        $pagination_select = $paginationLib->pagination_select();
        $this->set_view_data('pagination_select', $pagination_select);


        return $this->render('front/home/home__index');
    }
}
            </code>
        </pre>
        <span>視圖：app\Views\front\home\home__index.php</span>
        <pre>
            <code>
<?php
    $str = <<<EOD
<div class="row">
    <div class="col-12">
        <h1><?php echo \$msg; ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <?php echo \$pagination_link; ?>
    </div>
    <div class="col-4">
        <?php echo \$pagination_select; ?>
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





