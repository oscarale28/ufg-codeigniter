<?php

namespace App\Models;

use CodeIgniter\Model;

class CarreraModel extends Model
{
    protected $table = 'carrera';
    protected $primaryKey = 'codigo_carrera';
    protected $allowedFields = ['codigo_carrera', 'nombre_carrera'];
}
