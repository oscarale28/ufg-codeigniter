<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumnoModel extends Model
{
    protected $table = 'alumnos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['carnet', 'nombre', 'apellido', 'telefono', 'codigo_carrera'];

    /**
     * Obtiene alumnos con el nombre de la carrera, opcionalmente filtrados por codigo_carrera.
     *
     * @param string|null $codigoCarrera Si se pasa, filtra por esta carrera.
     * @return array
     */
    public function getAlumnosConCarrera(?string $codigoCarrera = null): array
    {
        $builder = $this->db->table($this->table . ' a');
        $builder->select('a.id, a.carnet, a.nombre, a.apellido, a.telefono, a.codigo_carrera, c.nombre_carrera');
        $builder->join('carrera c', 'c.codigo_carrera = a.codigo_carrera', 'left');

        if ($codigoCarrera !== null && $codigoCarrera !== '') {
            $builder->where('a.codigo_carrera', $codigoCarrera);
        }

        return $builder->get()->getResultArray();
    }
}