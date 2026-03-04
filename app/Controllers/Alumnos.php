<?php

namespace App\Controllers;

use App\Models\AlumnoModel;
use App\Models\CarreraModel;

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
        $carreraModel = new CarreraModel();
        $data['carreras'] = $carreraModel->getCarreras();
        return view('alumnos/create', $data);
    }

    public function create()
    {
        $alumnoModel = new AlumnoModel();
        $rules = [
            'carnet' => 'required|is_unique[alumnos.carnet]',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'codigo_carrera' => 'required',
        ];

        if (! $this->validate($rules)) {
            return view('alumnos/create', [
                'validation' => $this->validator,
            ]);
        }

        $data = [
            'carnet' => $this->request->getPost('carnet'),
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'telefono' => $this->request->getPost('telefono'),
            'codigo_carrera' => $this->request->getPost('codigo_carrera'),
        ];

        $alumnoModel->insert($data);
        return redirect()->to('alumnos');
    }

    public function renderEdit($id)
    {
        $alumnoModel = new AlumnoModel();
        $carreraModel = new CarreraModel();
        $data['carreras'] = $carreraModel->getCarreras();
        $data['alumno'] = $alumnoModel->find($id);

        return view('alumnos/edit', $data);
    }

    public function edit($id)
    {
        $alumnoModel = new AlumnoModel();
        $rules = [
            'carnet' => "required|is_unique[alumnos.carnet,id,{$id}]",
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'codigo_carrera' => 'required',
        ];

        if (! $this->validate($rules)) {
            return view('alumnos/edit', [
                'alumno' => $alumnoModel->find($id),
                'validation' => $this->validator,
            ]);
        }

        $data = [
            'carnet' => $this->request->getPost('carnet'),
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'telefono' => $this->request->getPost('telefono'),
            'codigo_carrera' => $this->request->getPost('codigo_carrera'),
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
