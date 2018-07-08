<?php

namespace Qi\Models;

use \Illuminate\Database\Eloquent\Model as Model;

class Credential extends Model {
    protected $table = 'users';
    protected $visible = ['id', 'login', 'pwd'];
}