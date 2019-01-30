<?php

namespace Qi\Models;

use \Illuminate\Database\Eloquent\Model as Model;

class Media extends Model {
    protected $table = 'media';

    public function binaryContent() {
        echo $this->filename;
    }
}