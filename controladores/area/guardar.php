

<?php 
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    require '../../modelos/area.php';
    require '../../includes/funciones.php';
    
    $mensaje = '';
   //var_dump($_POST);
    // VALIDAR INFORMACION
    $_POST['are_nombre'] = htmlspecialchars( $_POST['are_nombre']);
    $_POST['are_observacion'] = htmlspecialchars( $_POST['are_observacion']);
   
    
    
    if($_POST['are_nombre'] == '' || $_POST['are_observacion'] == '' ){
        // ALERTA PARA VALIDAR DATOS
        $resultado = [
            'mensaje' => 'DEBE VALIDAR LOS DATOS',
            'codigo' => 2
        ];
    }else{

            try {
                // REALIZAR CONSULTA
                $cliente = new Area($_POST);
                $guardar = $cliente->guardar();
                $resultado = [
                    'mensaje' => 'AREA INSERTADA CORRECTAMENTE',
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
            <a href="../../vistas/area/index.php" class="btn btn-primary w-100">Volver al formulario</a>
        </div>
    </div>


<?php include_once '../../vistas/templates/footer.php'; ?>  