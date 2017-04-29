<?php

namespace App\Model;

use App\Database;

class Users extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'usuarios';
    public $timestamps = false;
}
