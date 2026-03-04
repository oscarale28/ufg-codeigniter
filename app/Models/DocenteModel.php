<?php

namespace App\Models;

use CodeIgniter\Model;

class DocenteModel extends Model
{
    protected $table = 'docente';
    protected $primaryKey = 'id_docente';
    protected $allowedFields = ['nombre_docente'];
}