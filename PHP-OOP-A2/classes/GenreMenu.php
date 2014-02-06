<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/4/14
 * Time: 1:10 AM
 */

//namespace classes;


class GenreMenu {

    private $menuType;
    private $genres;

    public function __construct($menutype, $genres)
    {
        $this->menuType = $menutype;
        $this->genres = $genres;
    }

    public function __toString()
    {
        $html = "<select name='$this->menuType'>";
        //var_dump($this->genres);
        for ($i = 0, $size = count($this->genres); $i < $size; ++$i)
        {
            $temp = $this->genres[$i]->genre;
            $html .= "<option value='$temp'>";
            $html .= $temp;
            $html .= "</option>";
        }

        $html .= "</select>";

        return $html;
    }

} 