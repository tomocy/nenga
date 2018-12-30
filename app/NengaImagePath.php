<?php

namespace App;

class NengaImagePath {
    public $normal;

    public $ogp;

    public function __construct($normal, $ogp) {
        $this->normal = $normal;
        $this->ogp = $ogp;
    }
}
