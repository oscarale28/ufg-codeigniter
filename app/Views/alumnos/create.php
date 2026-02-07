<?php $title = 'Crear alumno'; ?>
<?= $this->include('templates/header') ?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h2 class="h4 mb-0">Crear nuevo alumno</h2>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="<?= base_url('alumnos/create') ?>" method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" required>
            </div>

            <div class="d-flex align-items-center">
                <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                <a href="<?= base_url('alumnos') ?>" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>