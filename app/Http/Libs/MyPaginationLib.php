<?php

namespace App\Http\Libs;

class MyPaginationLib
{
    private $pageNum;
    private $perPage;
    private $totalRows;
    private $pageCount;
    private $pathInfo = '/';
    private $queryString = '';
    private $uriPattern = '';

    public function __construct($pageNum = 1, $perPage = 10, $totalRows = 1, $queryStringSegment = 'page_num')
    {
        $this->setting($pageNum, $perPage, $totalRows, $queryStringSegment);
    }

    public function setting($pageNum = 1, $perPage = 10, $totalRows = 1, $queryStringSegment = 'page_num')
    {
        $this->pageNum = (int)$pageNum;
        $this->perPage = (int)$perPage;
        $this->totalRows = (int)$totalRows;
        $this->pageCount = (int)ceil($this->totalRows / $this->perPage);

        $this->pathInfo = ( ! isset($_SERVER['PATH_INFO']))? '/': $_SERVER['PATH_INFO'];
        $this->queryString = ( ! isset($_SERVER['QUERY_STRING']))? '': $_SERVER['QUERY_STRING'];
        $output = array();
        if($this->queryString !== '')
        {
            parse_str($this->queryString, $output);
            if(isset($output[$queryStringSegment]))
            {
                unset($output[$queryStringSegment]);
            }
        }
        if(count($output) == 0)
        {
            $this->uriPattern = $this->pathInfo.'?'.$queryStringSegment.'=%s';
        }
        else
        {
            $this->uriPattern = $this->pathInfo.'?'.$queryStringSegment.'=%s&'.http_build_query($output);
        }
    }

    public function paginationLink($showPageCount = 7)
    {
        $paginationArray = array();

        if($this->pageCount == 1)
        {
            //$paginationArray[] = array(
            //    'href' => NULL,
            //    'class' => 'page-link page-link-disabled',
            //    'text' => '1',
            //);
        }
        elseif($this->pageCount <= $showPageCount)
        {
            //if($this->pageNum !== 1)
            //{
            //    $paginationArray[] = array(
            //        'href' => (string)1,
            //        'class' => 'page-link',
            //        'text' => '第一頁',
            //    );
            //    $paginationArray[] = array(
            //        'href' => sprintf($this->uriPattern, ($this->pageNum - 1)),
            //        'class' => 'page-link',
            //        'text' => '上一頁',
            //    );
            //}

            for($i = 1; $i <= $this->pageCount; $i++)
            {
                if($i == $this->pageNum)
                {
                    $paginationArray[] = array(
                        'href' => NULL,
                        'class' => 'page-link page-link-disabled',
                        'text' => (string)$i,
                    );
                }
                else
                {
                    $paginationArray[] = array(
                        'href' => sprintf($this->uriPattern, $i),
                        'class' => 'page-link',
                        'text' => (string)$i,
                    );
                }
            }

            //if($this->pageNum !== $this->pageCount)
            //{
            //    $paginationArray[] = array(
            //        'href' => sprintf($this->uriPattern, $i),
            //        'class' => 'page-link',
            //        'text' => '下一頁',
            //    );
            //    $paginationArray[] = array(
            //        'href' => sprintf($this->uriPattern, $this->pageCount),
            //        'class' => 'page-link',
            //        'text' => '最末頁',
            //    );
            //}
        }
        else
        {
            //if($this->pageNum !== 1)
            //{
            //    $paginationArray[] = array(
            //        'href' => sprintf($this->uriPattern, 1),
            //        'class' => 'page-link',
            //        'text' => '第一頁',
            //    );
            //    $paginationArray[] = array(
            //        'href' => sprintf($this->uriPattern, $this->pageNum - 1),
            //        'class' => 'page-link',
            //        'text' => '上一頁',
            //    );
            //}

            if($this->pageNum > ceil($showPageCount / 2))
            {
                $paginationArray[] = array(
                    'href' => sprintf($this->uriPattern, 1),
                    'class' => 'page-link',
                    'text' => '<<',
                );
            }

            if($this->pageNum <= ceil($showPageCount / 2))
            {
                // 頭
                for($i = 1; $i <= $showPageCount; $i++)
                {
                    if($i == $this->pageNum)
                    {
                        $paginationArray[] = array(
                            'href' => NULL,
                            'class' => 'page-link page-link-disabled',
                            'text' => (string)$i,
                        );
                    }
                    else
                    {
                        $paginationArray[] = array(
                            'href' => sprintf($this->uriPattern, $i),
                            'class' => 'page-link',
                            'text' => (string)$i,
                        );
                    }
                }
            }
            elseif($this->pageNum >= $this->pageCount - floor($showPageCount / 2))
            {
                // 尾
                for($i = ($this->pageCount - $showPageCount) + 1; $i <= $this->pageCount; $i++)
                {
                    if($i == $this->pageNum)
                    {
                        $paginationArray[] = array(
                            'href' => NULL,
                            'class' => 'page-link page-link-disabled',
                            'text' => (string)$i,
                        );
                    }
                    else
                    {
                        $paginationArray[] = array(
                            'href' => sprintf($this->uriPattern, $i),
                            'class' => 'page-link',
                            'text' => (string)$i,
                        );
                    }
                }
            }
            else
            {
                // 中
                $begin = $this->pageNum - floor($showPageCount / 2);
                for($i = $begin; $i <= $this->pageNum + floor($showPageCount / 2); $i++)
                {
                    if($i == $this->pageNum)
                    {
                        $paginationArray[] = array(
                            'href' => NULL,
                            'class' => 'page-link page-link-disabled',
                            'text' => (string)$i,
                        );
                    }
                    else
                    {
                        $paginationArray[] = array(
                            'href' => sprintf($this->uriPattern, $i),
                            'class' => 'page-link',
                            'text' => (string)$i,
                        );
                    }
                }
            }

            if($this->pageNum <= $this->pageCount - ceil($showPageCount / 2))
            {
                $paginationArray[] = array(
                    'href' => sprintf($this->uriPattern, $this->pageCount),
                    'class' => 'page-link',
                    'text' => '>>',
                );
            }

            //if($this->pageNum !== $this->pageCount)
            //{
            //    $paginationArray[] = array(
            //        'href' => sprintf($this->uriPattern, $this->pageNum + 1),
            //        'class' => 'page-link',
            //        'text' => '下一頁',
            //    );
            //    $paginationArray[] = array(
            //        'href' => sprintf($this->uriPattern, $this->pageCount),
            //        'class' => 'page-link',
            //        'text' => '最末頁',
            //    );
            //}
        }
        $paginationArray[] = array(
            'href' => NULL,
            'class' => 'page-link page-link-disabled',
            'text' => sprintf('%s&nbsp;筆，&nbsp;%s&nbsp;頁', $this->totalRows, $this->pageCount),
        );

        return view('template.pagination.link', array('pagination' => $paginationArray))->render();
    }

    public function paginationSelect($showPageCount = 7)
    {
        $paginationArray = array();
        $buttonArray = array(
            'prev' => array(
                'disabled' => TRUE,
                'value' => NULL,
                'text' => '上一頁',
            ),
            'next' => array(
                'disabled' => TRUE,
                'value' => NULL,
                'text' => '下一頁',
            ),
        );

        if($this->pageCount == 1)
        {
            $paginationArray[] = array(
                'disabled' => FALSE,
                'selected' => TRUE,
                'value' => sprintf($this->uriPattern, 1),
                'text' => '第 1 頁',
            );
        }
        elseif($this->pageCount <= $showPageCount)
        {
            if($this->pageNum > 1)
            {
                $buttonArray['prev']['disabled'] = FALSE;
                $buttonArray['prev']['value'] = sprintf($this->uriPattern, $this->pageNum - 1);
            }

            if($this->pageNum < $this->pageCount)
            {
                $buttonArray['next']['disabled'] = FALSE;
                $buttonArray['next']['value'] = sprintf($this->uriPattern, $this->pageNum + 1);
            }

            for($i = 1; $i <= $this->pageCount; $i++)
            {
                if($i == $this->pageNum)
                {
                    $paginationArray[] = array(
                        'disabled' => FALSE,
                        'selected' => TRUE,
                        'value' => sprintf($this->uriPattern, $i),
                        'text' => sprintf('第 %s 頁', $i),
                    );
                }
                else
                {
                    $paginationArray[] = array(
                        'disabled' => FALSE,
                        'selected' => FALSE,
                        'value' => sprintf($this->uriPattern, $i),
                        'text' => sprintf('第 %s 頁', $i),
                    );
                }
            }
        }
        else
        {
            if($this->pageNum > 1)
            {
                $buttonArray['prev']['disabled'] = FALSE;
                $buttonArray['prev']['value'] = sprintf($this->uriPattern, $this->pageNum - 1);
            }

            if($this->pageNum < $this->pageCount)
            {
                $buttonArray['next']['disabled'] = FALSE;
                $buttonArray['next']['value'] = sprintf($this->uriPattern, $this->pageNum + 1);
            }

            if($this->pageNum > ceil($showPageCount / 2) + 1)
            {
                $paginationArray[] = array(
                    'disabled' => FALSE,
                    'selected' => FALSE,
                    'value' => sprintf($this->uriPattern, 1),
                    'text' => '第 1 頁',
                );
                $paginationArray[] = array(
                    'disabled' => TRUE,
                    'selected' => FALSE,
                    'value' => sprintf($this->uriPattern, 1),
                    'text' => '...',
                );
            }

            if($this->pageNum == ceil($showPageCount / 2) + 1)
            {
                $paginationArray[] = array(
                    'disabled' => FALSE,
                    'selected' => FALSE,
                    'value' => sprintf($this->uriPattern, 1),
                    'text' => '第 1 頁',
                );
            }

            if($this->pageNum <= ceil($showPageCount / 2))
            {
                // 頭
                for($i = 1; $i <= $showPageCount; $i++)
                {
                    if($i == $this->pageNum)
                    {
                        $paginationArray[] = array(
                            'disabled' => FALSE,
                            'selected' => TRUE,
                            'value' => sprintf($this->uriPattern, $i),
                            'text' => sprintf('第 %s 頁', $i),
                        );
                    }
                    else
                    {
                        $paginationArray[] = array(
                            'disabled' => FALSE,
                            'selected' => FALSE,
                            'value' => sprintf($this->uriPattern, $i),
                            'text' => sprintf('第 %s 頁', $i),
                        );
                    }
                }
            }
            elseif($this->pageNum >= $this->pageCount - floor($showPageCount / 2))
            {
                // 尾
                for($i = ($this->pageCount - $showPageCount) + 1; $i <= $this->pageCount; $i++)
                {
                    if($i == $this->pageNum)
                    {
                        $paginationArray[] = array(
                            'disabled' => FALSE,
                            'selected' => TRUE,
                            'value' => sprintf($this->uriPattern, $i),
                            'text' => sprintf('第 %s 頁', $i),
                        );
                    }
                    else
                    {
                        $paginationArray[] = array(
                            'disabled' => FALSE,
                            'selected' => FALSE,
                            'value' => sprintf($this->uriPattern, $i),
                            'text' => sprintf('第 %s 頁', $i),
                        );
                    }
                }
            }
            else
            {
                // 中
                $begin = $this->pageNum - floor($showPageCount / 2);
                for($i = $begin; $i <= $this->pageNum + floor($showPageCount / 2); $i++)
                {
                    if($i == $this->pageNum)
                    {
                        $paginationArray[] = array(
                            'disabled' => FALSE,
                            'selected' => TRUE,
                            'value' => sprintf($this->uriPattern, $i),
                            'text' => sprintf('第 %s 頁', $i),
                        );
                    }
                    else
                    {
                        $paginationArray[] = array(
                            'disabled' => FALSE,
                            'selected' => FALSE,
                            'value' => sprintf($this->uriPattern, $i),
                            'text' => sprintf('第 %s 頁', $i),
                        );
                    }
                }
            }

            if($this->pageNum == $this->pageCount - ceil($showPageCount / 2))
            {
                $paginationArray[] = array(
                    'disabled' => FALSE,
                    'selected' => FALSE,
                    'value' => sprintf($this->uriPattern, $this->pageCount),
                    'text' => sprintf('第 %s 頁', $this->pageCount),
                );
            }

            if($this->pageNum < $this->pageCount - ceil($showPageCount / 2))
            {
                $paginationArray[] = array(
                    'disabled' => TRUE,
                    'selected' => FALSE,
                    'value' => sprintf($this->uriPattern, $this->pageCount),
                    'text' => '...',
                );
                $paginationArray[] = array(
                    'disabled' => FALSE,
                    'selected' => FALSE,
                    'value' => sprintf($this->uriPattern, $this->pageCount),
                    'text' => sprintf('第 %s 頁', $this->pageCount),
                );
            }
        }

        return view('template.pagination.select', array('pagination' => $paginationArray, 'button' => $buttonArray))->render();
    }

}
