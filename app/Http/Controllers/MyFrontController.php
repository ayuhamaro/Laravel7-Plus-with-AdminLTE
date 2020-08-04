<?php

namespace App\Http\Controllers;

class MyFrontController extends Controller
{
    /*傳送到view的資料陣列，為了讓MY_Controller能以權限機制操控，而宣告在這裡提供繼承*/
    private $viewData = array(
        'site_name' => NULL,
        'site_title' => NULL,
        'page_title' => NULL,
        'page_uri' => NULL,
        'query_string' => NULL,
        'return_uri' => NULL,
        'error_msg' => NULL,
        'layout_options' => 'sidebar-mini layout-fixed',
    );
    /*view的各版面區塊設定*/
    private $viewConfig = array(
        'base' => 'template.front.pageBase',
        'metadata' => NULL,
        'common_js' => 'template.front.commonJs',
        'js' => NULL,
        'common_css' => 'template.front.commonCss',
        'css' => NULL,
        'header' => 'template.front.header',
        'content_header' => 'template.front.contentHeader',
        'content_footer' => 'template.front.contentFooter',
        'left_side' => 'template.front.leftSide',
        'right_side' => 'template.front.rightSide',
        'error_msg' => 'template.front.errorMsg',
        'content' => 'template.front.content',
        'footer' => 'template.front.footer',
        'extra' => 'template.front.extra',
        'common_nle_js' => 'template.front.commonNleJs',   //Not Loading and Execution
        'nle_js' => NULL,
        'common_nle_css' => 'template.front.commonNleCss',
        'nle_css' => NULL,
    );

    public function __construct()
    {
        $this->viewData['page_uri'] = ( ! isset($_SERVER['PATH_INFO']))? '/': $_SERVER['PATH_INFO'];
        $this->viewData['query_string'] = ( ! isset($_SERVER['QUERY_STRING']))? '': $_SERVER['QUERY_STRING'];

        if( ! session_id())
        {
            session_start();
        }
    }

    protected function setViewData($attr, $value)
    {
        $this->viewData[$attr] = $value;
    }

    protected function getViewData($attr = NULL)
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

    protected function setViewConfig($attr, $value)
    {
        $this->viewConfig[$attr] = $value;
    }

    protected function getViewConfig($attr = NULL)
    {
        if( ! is_null($attr) && isset($this->viewConfig[$attr]))
        {
            return $this->viewConfig[$attr];
        }
        else
        {
            return $this->viewConfig;
        }
    }

    protected function render($content_page)
    {
        $siteName = (string)config('site.siteName');

        $this->viewData['site_name'] = $siteName;
        if( ! isset($this->viewData['page_title']) OR is_null($this->viewData['page_title']))
        {
            $this->viewData['site_title'] = $siteName;
        }
        else
        {
            $this->viewData['site_title'] = $siteName.'-'.$this->viewData['page_title'];
        }

        $this->viewConfig['content'] = $content_page;
        $this->viewData['___VIEW_CONFIG___'] = $this->viewConfig;

        return view($this->viewConfig['base'], $this->viewData);
    }

}
