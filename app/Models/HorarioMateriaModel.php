<?php

namespace App\Models;

use CodeIgniter\Model;

class HorarioMateriaModel extends Model
{
    protected $table = 'horario_materia';
    protected $primaryKey = 'id_horario_materia';
    protected $allowedFields = ['id_materia', 'id_docente', 'dia', 'hora_inicio', 'hora_fin'];
}