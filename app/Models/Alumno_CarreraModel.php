<?php

namespace App\Models;

use CodeIgniter\Model;

class Alumno_CarreraModel extends Model
{
    protected $table = 'alumnos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['carnet', 'nombre', 'apellido', 'telefono', 'codigo_carrera'];

    /**
     * Vista para filtrar alumnos por carrera (solo lectura).
     */
    public function obtenerAlumnosPorCarrera($codigo_carrera = null)
    {
        $builder = $this->db->table('alumnos a')
            ->select('a.*, c.nombre_carrera')
            ->join('carrera c', 'c.codigo_carrera = a.codigo_carrera', 'left');

        if (!is_null($codigo_carrera)) {
            $builder->where('a.codigo_carrera', $codigo_carrera);
        }

        return $builder->get()->getResultArray();
    }
    
}