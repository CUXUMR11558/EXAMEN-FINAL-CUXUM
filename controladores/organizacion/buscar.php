
<?php
    require '../../modelos/empleado.php';
    include_once '../../vistas/templates/header.php';
    
    try {
        $objOrganizacion = new Empleado();
        $organizaciones = $objOrganizacion->MostrarPorAreas();
        
        // Agrupar los empleados por área
        $empleadosPorArea = [];
        foreach ($organizaciones as $organizacion) {
            $empleadosPorArea[$organizacion['are_nombre']][] = $organizacion;
        }
        
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $empleadosPorArea,
            'codigo' => 1
        ];
        
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }

  ?>

<h1 class="text-center">ORGANIZACION EMPRESA INGESOF S.A</h1>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>AREA</th>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>NIT</th>
                    <th>Puesto</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Sueldo</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado['codigo'] == 1 && count($empleadosPorArea) > 0) : ?>
                    <?php foreach ($empleadosPorArea as $area => $empleados) : ?>
                        <tr>
                            <td colspan="8" class="table-primary text-center"><strong><?= $area ?></strong></td>
                        </tr>
                        <?php foreach ($empleados as $index => $empleado) : ?>
                            <tr>
                                <td><?= $area ?></td>
                                <td><?= $index + 1 ?></td>
                                <td><?= $empleado['nombre_completo'] ?></td>
                                <td><?= $empleado['emp_nit'] ?></td>
                                <td><?= $empleado['pue_nombre'] ?></td>
                                <td><?= $empleado['emp_edad'] ?></td>
                                <td><?= $empleado['emp_sexo'] ?></td>
                                <td><?= $empleado['pue_sueldo'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8">No hay empleados registrados</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once '../templates/footer.php'; ?>
