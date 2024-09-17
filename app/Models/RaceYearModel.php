<?php

namespace App\Models;

use CodeIgniter\Model;

class RaceYearModel extends Model
{
    protected $table = 'race_year';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
}