<?php

namespace Qi\Services;

class File {
    private $c;
    private $rand;

    function __construct(\Slim\Container $c) {
        $this->c = $c;

        $this->rand = $c->get('randomizer');
    }

    public function upload(\Psr\Http\Message\StreamInterface $stream): string {
        $uploadPath = $this->c->get('settings')['uploadPath'];
        if (is_dir($uploadPath)) {
            @mkdir($uploadPath, 0755, true);
        }

        $filename = $this->rand->hexadecimal(32);
        $targetFilename = sprintf("%s/%s", $uploadPath, $filename);
        $content = stripcslashes($stream->getContents());

        @file_put_contents($targetFilename, $content);

        return $targetFilename;
    }
}