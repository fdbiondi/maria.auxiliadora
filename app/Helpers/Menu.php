<?php

namespace App\Helpers;

use App\Components\HtmlBuilder;
use Illuminate\Support\Facades\Route;

class Menu
{
    /**
     * @param $item $sections
     * @return string return class="active" or ""
     */
    public static function isSelectRoute($item, $sections = array())
    {
        foreach ($sections as $section) {
            $selected = HtmlBuilder::classes(['active' => Route::is($item.$section)]);

            if($selected != "")
                return $selected;
        }
        return "";
    }

    public static function isActive($items, $sections)
    {
        foreach ($items as $item => $content) {
            $active = Menu::isSelectRoute($item, $sections);

            if($active != "")
                return $active;
            
            if(isset($content['subitems'])) {
                $active = Menu::isActive($content['subitems'], $sections);
            }

            if($active != "")
                return $active;
        }
        return "";
    }
}