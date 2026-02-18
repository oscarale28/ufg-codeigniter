<?php $title = 'Alumnos por Carrera'; ?>
<?= $this->include('templates/header') ?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h2 class="h4 mb-0">Listado de Alumnos por carrera</h2>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h3 class="h6 text-muted mb-3">Filtrar alumnos por carrera</h3>
        <form method="get" action="<?= base_url('alumnos_carrera') ?>" class="form-inline flex-wrap gap-2">
            <label for="codigo_carrera" class="sr-only">Carrera</label>
            <select name="codigo_carrera" id="codigo_carrera" class="form-control mb-2 mb-md-0 mr-md-2">
                <option value="">Seleccione una carrera...</option>
                <?php foreach ($carreras as $carrera): ?>
                    <option value="<?= esc($carrera['codigo_carrera']) ?>" <?= (isset($codigo_carrera_seleccionado) && $codigo_carrera_seleccionado === $carrera['codigo_carrera']) ? 'selected' : '' ?>>
                        <?= esc($carrera['nombre_carrera']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-primary mb-2 mb-md-0 mr-2">Buscar</button>
            <a href="<?= base_url('alumnos') ?>" class="btn btn-outline-secondary mb-2 mb-md-0">Salir</a>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <?php if (empty($alumnos)): ?>
            <div class="text-center text-muted py-5">No se encontraron resultados.</div>
        <?php else: ?>
            <table id="registros" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Carnet</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfonos</th>
                        <th>Carrera</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alumnos as $alumno): ?>
                        <?php $carnetValue = empty($alumno['carnet']) ? 'Sin carnet' : $alumno['carnet']; ?>
                        <?php $carnetClass = empty($alumno['carnet']) ? 'text-muted' : ''; ?>
                        <tr>
                            <td class="<?= $carnetClass ?>"><?= $carnetValue ?></td>
                            <td><?= esc($alumno['nombre']) ?></td>
                            <td><?= esc($alumno['apellido']) ?></td>
                            <td><?= esc($alumno['telefono']) ?></td>
                            <td><?= esc($alumno['nombre_carrera'] ?? '—') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {
        <?php if (!empty($alumnos)): ?>
        $('#registros').DataTable({
            language: {
                search: 'Buscar:',
                info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
                infoEmpty: 'Mostrando 0 a 0 de 0 registros',
                infoFiltered: '(filtrado de _MAX_ total de registros)',
                lengthMenu: 'Mostrar _MENU_ registros',
                zeroRecords: 'No se encontraron registros',
                paginate: {
                    first: 'Primero',
                    last: 'Último',
                    next: 'Siguiente',
                    previous: 'Anterior'
                }
            }
        });
        <?php endif; ?>
    });
</script>
