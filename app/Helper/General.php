<?php


namespace App\Helper;


trait General
{

    public $data = [];

    public function date($key, $value = null)
    {

        return $this->data[$key] = $value;
    }

}
