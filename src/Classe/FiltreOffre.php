<?php

namespace App\Classe;

class FiltreOffre
{

    /**
     * @var string
     */

    public $string = '';

    /**
     * @var typeOffre[]
     */

    public $typeOffre = [];



    public function __toString()
    {
        return $this->string;
    }
}
