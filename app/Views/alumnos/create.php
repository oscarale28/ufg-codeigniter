<h2>Crear Nuevo Alumno</h2>

<div class="form-container">
    <form action="<?= base_url('alumnos/create') ?>" method="post">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
        </div>
        
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>
        </div>
        
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" required>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?= base_url('alumnos') ?>" class="btn" style="margin-left: 10px;">Cancelar</a>
        </div>
    </form>
</div>