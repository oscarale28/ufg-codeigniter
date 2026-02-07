<?php

namespace App\Controllers;

use App\Models\AlumnoModel;

class Alumnos extends BaseController
{
    public function index()
    {
        $alumnoModel = new AlumnoModel();
        $data['alumnos'] = $alumnoModel->findAll();
        return view('alumnos/index', $data);
    }

    public function renderCreate()
    {
        return view('alumnos/create');
    }

    public function create()
    {
        $alumnoModel = new AlumnoModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'telefono' => $this->request->getPost('telefono'),
        ];
        $alumnoModel->insert($data);
        return redirect()->to('alumnos');
    }

    public function renderEdit($id)
    {
        $alumnoModel = new AlumnoModel();
        $data['alumno'] = $alumnoModel->find($id);
        return view('alumnos/edit', $data);
    }

    public function edit($id)
    {
        $alumnoModel = new AlumnoModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'telefono' => $this->request->getPost('telefono'),
        ];
        $alumnoModel->update($id, $data);
        return redirect()->to('alumnos');
    }

    public function delete($id)
    {
        $alumnoModel = new AlumnoModel();
        $alumnoModel->delete($id);
        return redirect()->to('alumnos');
    }
}
