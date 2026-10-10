<?php

namespace App\Models;

use CodeIgniter\Model;

class WishModel extends Model
{
    protected $table            = 'wishes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'message', 'created_at'];

    protected $useTimestamps = false;
}