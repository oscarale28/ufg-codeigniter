<?php $title = 'Alumnos'; ?>
<?= $this->include('templates/header') ?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h2 class="h4 mb-0">Listado de alumnos</h2>
    <div class="" role="group" aria-label="Acciones de alumno">
        <a href="<?= base_url('alumnos/create') ?>" class="btn btn-primary">Agregar alumno</a>
        <a href="<?= base_url('alumnos_carrera') ?>" class="btn btn-outline-secondary">Ver alumnos por carrera</a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <?php if (empty($alumnos)): ?>
            <div class="text-center text-muted py-5">Aún no hay alumnos registrados.</div>
        <?php else: ?>
            <table id="registros" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Carnet</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alumnos as $alumno): ?>
                        <?php $carnetValue = empty($alumno['carnet']) ? 'Sin carnet' : $alumno['carnet']; ?>
                        <?php $carnetClass = empty($alumno['carnet']) ? 'text-muted' : ''; ?>
                        <tr>
                            <td class="<?= $carnetClass ?>"><?= $carnetValue ?></td>
                            <td><?= $alumno['nombre'] ?></td>
                            <td><?= $alumno['apellido'] ?></td>
                            <td><?= $alumno['telefono'] ?></td>
                            <td>
                                <div role="group" aria-label="Acciones de alumno">
                                    <a class="btn btn-sm btn-outline-primary" href="<?= base_url('alumnos/edit/' . $alumno['id']) ?>">Editar</a>
                                    <a class="btn btn-sm btn-outline-danger js-delete" href="<?= base_url('alumnos/delete/' . $alumno['id']) ?>">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<!--Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<!-- Datatables-->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<!-- Datatables responsive -->
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#registros').DataTable({
            responsive: true,
            columnDefs: [{
                    orderable: true,
                    className: 'desktop',
                        targets: [0, 1, 2, 3, 4]
                },
                {
                    orderable: true,
                    className: 'not-desktop',
                        targets: [0, 1]
                }
            ],
            language: {
                search: 'Buscar:',
                info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
                infoEmpty: 'Mostrando 0 a 0 de 0 registros',
                infoFiltered: '(filtrado de _MAX_ total de registros)',
                infoPostFix: '',
                lengthMenu: 'Mostrar _MENU_ registros',
                loadingRecords: 'Cargando...',
                processing: 'Procesando...',
                search: 'Buscar:',
                zeroRecords: 'No se encontraron registros',
                paginate: {
                    first: 'Primero',
                    last: 'Último',
                    next: 'Siguiente',
                    previous: 'Anterior'
                }
            }
        });

        $('.js-delete').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: '¿Eliminar alumno?',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#b4534b'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
</script>