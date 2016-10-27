<?php

namespace App\Components;

use Collective\Html\HtmlBuilder as CollectiveHtmlBuilder;
//para la inyeccion de dependencias cargo las intefaces
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\View\Factory as View;
//*********************************
use Illuminate\Routing\UrlGenerator;

class HtmlBuilder extends CollectiveHtmlBuilder
{

    public function __construct(UrlGenerator $url, Config $config, View $view)
    {
        $this->url = $url;
        $this->config = $config;
        $this->view = $view;
    }

    //armo un menu
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