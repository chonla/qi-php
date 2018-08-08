<?php

namespace Qi\Models;

use \Illuminate\Database\Eloquent\Model as Model;

class User extends Model {
    protected $table = 'users';
    protected $hidden = ['pwd'];

    const USER = 0;
    const ADMIN = 99;
}