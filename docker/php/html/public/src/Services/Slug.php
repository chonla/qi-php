<?php

namespace Qi\Services;

use \Chonla\Randomizr\Randomizr;

class Slug {
    private $c;
    private $rand;

    function __construct(\Slim\Container $c) {
        $this->c = $c;

        $this->rand = $c->get('randomizer');
    }

    public function new() {
        $candidate = $this->rand->hexadecimal(12);
        while (\Qi\Models\Post::where('slug', $candidate)->exists()) {
            $candidate = $this->rand->hexadecimal(12);
        }
        return $candidate;
    }
}