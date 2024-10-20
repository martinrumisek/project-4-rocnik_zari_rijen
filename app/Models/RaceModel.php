<?php

namespace App\Models;

use CodeIgniter\Model;

class RaceModel extends Model
{
    protected $table = 'race';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['default_name', 'link', 'country', 'type'];
}