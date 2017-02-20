<?php

namespace App\Components;

use Collective\Html\HtmlBuilder as CollectiveHtmlBuilder;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\View\Factory as View;

use Illuminate\Routing\UrlGenerator;

class HtmlBuilder extends CollectiveHtmlBuilder
{

    /**
     * HtmlBuilder constructor.
     * @param UrlGenerator $url
     * @param Config $config
     * @param View $view
     */
    public function __construct(UrlGenerator $url, Config $config, View $view)
    {
        $this->url = $url;
        $this->config = $config;
        $this->view = $view;
    }

    
    /**
     * Header
     * 
     * @param bool $use_header
     * @return \Illuminate\Contracts\View\View
     */
    public function header($use_header = true){

        return $this->view->make('partials/header',array('use_header'=>$use_header));

    }

    /**
     * Builds as HTML class attribute dynamically
     * Usage:
     * {!! Html::classes(['home' => true, 'main', 'dont-use-this' => false]) !!}
     * Returns_
     *  class="home main".
     *
     * @param array $classes
     *
     * @return string
     */
    public static function classes(array $classes){
        $html='';

        foreach($classes as $name=>$bool){
            if(is_int($name)){
                $name = $bool;
                $bool=true;
            }
            if($bool){
                $html .= $name.' ';
            }
        }

        if(! empty($html)){
            return ' class="'.trim($html).'"';
        }

        return '';
    }

}