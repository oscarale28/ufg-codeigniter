<?php $title = 'Editar alumno'; ?>
<?= $this->include('templates/header') ?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h2 class="h4 mb-0">Editar alumno</h2>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('alumnos/edit/' . $alumno['id']) ?>" method="post">
            <div class="form-group">
                <label for="carnet">Carnet</label>
                <input type="text" id="carnet" name="carnet" class="form-control" placeholder="Carnet" value="<?= esc(old('carnet') ?? $alumno['carnet']) ?>" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" value="<?= esc(old('nombre') ?? $alumno['nombre']) ?>" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" value="<?= esc(old('apellido') ?? $alumno['apellido']) ?>" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" value="<?= esc(old('telefono') ?? $alumno['telefono']) ?>" required>
            </div>

            <div class="d-flex align-items-center">
                <button type="submit" class="btn btn-primary mr-2">Guardar cambios</button>
                <a href="<?= base_url('alumnos') ?>" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>