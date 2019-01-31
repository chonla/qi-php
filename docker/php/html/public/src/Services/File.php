<?php

namespace Qi\Services;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\StreamInterface as Stream;
use \Slim\Http\UploadedFile;
use \Qi\Models\Media as Media;

class File {
    private $c;
    private $rand;

    function __construct(\Slim\Container $c) {
        $this->c = $c;

        $this->rand = $c->get('randomizer');
    }

    public function bulkUpload(Request $request, string $author, string $fieldName): ?array {
        $files = $request->getUploadedFiles();

        $media = [];

        foreach ($files[$fieldName] as $file) {
            $media[] = $this->storeFile($file, $author);
        }

        return $media;
    }

    public function directUpload(Request $request, string $author): Media {
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

    public function getUploadedFilePath($filename): string {
        $uploadPath = getenv("UPLOAD_PATH");
        $targetFilename = sprintf("%s/%s", $uploadPath, $filename);
        return $targetFilename;
    }

    private function prepareUploadPath(): string {
        $uploadPath = getenv("UPLOAD_PATH");
        if (!is_dir($uploadPath)) {
            @mkdir($uploadPath, 0755, true);
        }
        return $uploadPath;
    }

    private function saveFile(Stream $fileStream): string {
        $uploadPath = $this->prepareUploadPath();

        $filename = $this->rand->hexadecimal(32);
        $targetFilename = sprintf("%s/%s", $uploadPath, $filename);
        $content = stripcslashes($fileStream->getContents());

        @file_put_contents($targetFilename, $content);

        return $filename;
    }

    private function storeFile(UploadedFile $file, string $author): ?Media {
        if ($file->getError() === UPLOAD_ERR_OK) {
            $uploadPath = $this->prepareUploadPath();

            $filename = $this->rand->hexadecimal(32);
            $targetFilename = sprintf("%s/%s", $uploadPath, $filename);

            $file->moveTo($targetFilename);

            $media = new Media();
            $media->filename = $filename;
            $media->mimetype = $file->getClientMediaType();
            if ($media->mimetype === 'application/octet-stream') {
                $media->mimetype = $this->detectMimeTypeFromFilename($targetFilename);
            }
            $media->author = $author;
            $media->save();

            return $media;
        }
        return NULL;
    }

    private function detectMimeTypeFromFilename(string $filename): string {
        $type = mime_content_type($filename);
        if ($type === NULL) {
            return 'application/octet-stream';
        }
        return $type;
    }
}