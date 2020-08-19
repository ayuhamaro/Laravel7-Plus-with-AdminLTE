<?php

namespace App\Http\Controllers;

class MyAdminController extends Controller
{
    /*傳送到view的資料陣列，為了讓MY_Controller能以權限機制操控，而宣告在這裡提供繼承*/
    private $viewData = array(
        'site_name' => null,
        'site_title' => null,
        'page_title' => null,
        'page_uri' => null,
        'query_string' => null,
        'return_uri' => null,
        'error_msg' => null,
        'layout_options' => 'sidebar-mini layout-fixed',
    );
    /*view的各版面區塊設定*/
    protected $viewBase = 'template.admin.pageBase';
    protected $viewMetadata = null;
    protected $viewCommonJs = 'template.admin.commonJs';
    protected $viewJs = null;
    protected $viewCommonCss = 'template.admin.commonCss';
    protected $viewCss = null;
    protected $viewHeader = 'template.admin.header';
    protected $viewContentHeader = 'template.admin.contentHeader';
    protected $viewContentFooter = 'template.admin.contentFooter';
    protected $viewLeftSide = 'template.admin.leftSide';
    protected $viewRightSide = 'template.admin.rightSide';
    protected $viewErrorMsg = 'template.admin.errorMsg';
    protected $viewContent = 'template.admin.content';
    protected $viewFooter = 'template.admin.footer';
    protected $viewExtra = 'template.admin.extra';
    protected $viewCommonNleJs = 'template.admin.commonNleJs';
    protected $viewNleJs = null;
    protected $viewCommonNleCss = 'template.admin.commonNleCss';
    protected $viewNleCss = null;

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

    protected function render($viewContent = null)
    {
        $siteName = (string)config('site.siteName');

        $this->viewData['site_name'] = $siteName;
        if( ! isset($this->viewData['page_title']) or is_null($this->viewData['page_title']))
        {
            $this->viewData['site_title'] = $siteName;
        }
        else
        {
            $this->viewData['site_title'] = $siteName.'-'.$this->viewData['page_title'];
        }

        $viewConfig = array(
            'metadata' => null,
            'common_js' => $this->viewCommonJs,
            'js' => null,
            'common_css' => $this->viewCommonCss,
            'css' => null,
            'header' => $this->viewHeader,
            'content_header' => $this->viewContentHeader,
            'content_footer' => $this->viewContentFooter,
            'left_side' => $this->viewLeftSide,
            'right_side' => $this->viewRightSide,
            'error_msg' => $this->viewErrorMsg,
            'content' => (is_null($viewContent))? $this->viewContent: $viewContent,
            'footer' => $this->viewFooter,
            'extra' => $this->viewExtra,
            'common_nle_js' => $this->viewCommonNleJs,
            'nle_js' => null,
            'common_nle_css' => $this->viewCommonNleCss,
            'nle_css' => null,
        );

        $this->viewData['___VIEW_CONFIG___'] = $viewConfig;
        return view($this->viewBase, $this->viewData);
    }

}
