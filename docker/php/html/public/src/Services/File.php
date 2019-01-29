<?php

namespace Qi\Services;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\StreamInterface as Stream;
use \Qi\Models\Media as Media;

class File {
    private $c;
    private $rand;

    function __construct(\Slim\Container $c) {
        $this->c = $c;

        $this->rand = $c->get('randomizer');
    }

    public function directUpload(Request $request, $author): Media {
        $media_data = $request->getBody();
        $mimetype = $request->getHeaderLine('Content-Type');

        $filename = $this->saveFile($media_data);

        $media = new Media;
        $media->filename = $filename;
        $media->mimetype = $mimetype;
        $media->author = $author;
        $media->save();

        return $media;
    }

    private function saveFile(Stream $fileStream): string {
        $uploadPath = $this->c->get('settings')['uploadPath'];
        if (is_dir($uploadPath)) {
            @mkdir($uploadPath, 0755, true);
        }

        $filename = $this->rand->hexadecimal(32);
        $targetFilename = sprintf("%s/%s", $uploadPath, $filename);
        $content = stripcslashes($fileStream->getContents());

        @file_put_contents($targetFilename, $content);

        return $filename;
    }
}