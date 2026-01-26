<style>
    body {
        font-family: Arial, sans-serif;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 20px;
    }

    table {
        width: 100%;
        max-width: 800px;
        border-collapse: collapse;
        margin-bottom: 20px;
        border-radius: 10px;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    button {
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
        background-color: #007bff;
        color: white;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        transition: background-color 0.2s;
    }

    button:hover {
        background-color: #0056b3;
    }

    .edit-button {
        color: #007bff;
        padding: 4px 8px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.2s;
        cursor: pointer;
    }

    .edit-button:hover {
        background-color: rgb(172, 212, 255);
        color: #007bff;
    }

    .delete-button {
        padding: 4px 8px;
        background-color: #dc3545;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.2s;
    }

    .delete-button:hover {
        background-color: #b32432;
        color: white;
        cursor: pointer;
    }
</style>

<h2>Listado de Alumnos</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Teléfono</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($alumnos as $alumno): ?>
        <tr>
            <td><?= $alumno['id'] ?></td>
            <td><?= $alumno['nombre'] ?></td>
            <td><?= $alumno['apellido'] ?></td>
            <td><?= $alumno['telefono'] ?></td>
            <td>
                <div style="display: flex; justify-content: center; gap: 16px;">
                    <a href="<?= base_url('alumnos/edit/' . $alumno['id']) ?>" class="edit-button">Editar</a>
                    <a href="<?= base_url('alumnos/delete/' . $alumno['id']) ?>" class="delete-button">Eliminar</a>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="<?= base_url('alumnos/create') ?>">
    <button>Crear alumno</button>
</a>