<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/4/14
 * Time: 1:10 AM
 */

//namespace classes;


class ArtistMenu {

    private $menuType;
    private $artists;

    public function __construct($menutype, $artists)
    {
        $this->menuType = $menutype;
        $this->artists = $artists;
    }

    public function __toString()
    {
        $html = "<select name='$this->menuType'>";
        //var_dump($this->artists);
        for ($i = 0, $size = count($this->artists); $i < $size; ++$i)
        {
            $temp = $this->artists[$i]->artist_name;
            $html .= "<option value='$temp'>";
            $html .= $temp;
            $html .= "</option>";
        }

        $html .= "</select>";

        return $html;
    }

} 