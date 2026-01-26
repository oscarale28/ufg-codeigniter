<h2>Editar Alumno</h2>

<div class="form-container">
    <form action="<?= base_url('alumnos/edit/' . $alumno['id']) ?>" method="post">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?= esc($alumno['nombre']) ?>" required>
        </div>
        
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido" value="<?= esc($alumno['apellido']) ?>" required>
        </div>
        
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" value="<?= esc($alumno['telefono']) ?>" required>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="<?= base_url('alumnos') ?>" class="btn" style="margin-left: 10px;">Cancelar</a>
        </div>
    </form>
</div>