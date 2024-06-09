<?php 
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    require '../../modelos/empleado.php';
    require '../../includes/funciones.php';
    
    $mensaje = '';
    // VALIDAR INFORMACION
    $_POST['emp_nombre'] = htmlspecialchars( $_POST['emp_nombre']);
    $_POST['emp_apellido'] = htmlspecialchars( $_POST['emp_apellido']);
    $_POST['emp_nit'] = htmlspecialchars( $_POST['emp_nit']);
    $_POST['emp_telefono'] = filter_var( $_POST['emp_telefono'] , FILTER_SANITIZE_NUMBER_INT);
    
    
    if($_POST['emp_nombre'] == '' || $_POST['emp_apellido'] == '' || $_POST['emp_nit'] == '' || $_POST['emp_telefono'] == '' || strlen($_POST['emp_telefono']) < 8){
        // ALERTA PARA VALIDAR DATOS
        $resultado = [
            'mensaje' => 'DEBE VALIDAR LOS DATOS',
            'codigo' => 2
        ];
    }else{

        if(validarNIT($_POST['emp_nit'])){

            try {
                // REALIZAR CONSULTA
                $cliente = new Empleado($_POST);
                $guardar = $cliente->guardar();
                $resultado = [
                    'mensaje' => 'CLIENTE INSERTADO CORRECTAMENTE',
                    'codigo' => 1
                ];
                
            } catch (PDOException $pe){
                $resultado = [
                    'mensaje' => 'OCURRIO UN ERROR INSERTANDO A LA BD',
                    'detalle' => $pe->getMessage(),
                    'codigo' => 0
                ];
            } catch (Exception $e) {
                $resultado = [
                    'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
                    'detalle' => $e->getMessage(),
                    'codigo' => 0
                ];
            }
        }else{
            $resultado = [
                'mensaje' => 'NIT INVALIDO',
                'codigo' => 2
            ];
        }
        
    }


    $alertas = ['danger', 'success', 'warning'];

    
    include_once '../../vistas/templates/header.php'; ?>

    <div class="row justify-content-center">
        <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
            <?= $resultado['mensaje'] ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <a href="../../vistas/cliente/index.php" class="btn btn-primary w-100">Volver al formulario</a>
        </div>
    </div>


<?php include_once '../../vistas/templates/footer.php'; ?>  