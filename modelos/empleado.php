<?php

require_once 'Conexion.php';

class Empleado extends Conexion
{
    public $emp_codigo;
    public $emp_nombre;
    public $emp_apellido;
    public $emp_edad;
    public $emp_sexo;
    public $emp_nit;
    public $emp_telefono;
    public $emp_puesto;
    public $emp_situacion;


    public function __construct($args = [])
    {
        $this->emp_codigo = $args['emp_codigo'] ?? null;
        $this->emp_nombre = $args['emp_nombre'] ?? '';
        $this->emp_apellido = $args['emp_apellido'] ?? '';
        $this->emp_edad = $args['emp_edad'] ?? '';
        $this->emp_sexo = $args['emp_sexo'] ?? '';
        $this->emp_nit = $args['emp_nit'] ?? '';
        $this->emp_telefono = $args['emp_telefono'] ?? '';
        $this->emp_puesto = $args['emp_puesto'] ?? '';
        $this->emp_situacion = $args['emp_situacion'] ?? 1;
    }

    // METODO PARA INSERTAR

    public static function buscarTodos(...$columnas)
    {
        // $cols = '';
        // if(count($columnas) > 0){
        //     $cols = implode(',', $columnas) ;
        // }else{
        //     $cols = '*';
        // }
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM empleado where emp_situacion = 1 ";
        $resultado = self::servir($sql);
        return $resultado;
    }
    public function guardar()
    {
        $sql = "INSERT into empleado (emp_nombre, emp_apellido, emp_edad, emp_sexo, emp_nit, emp_telefono, emp_puesto) values ('$this->emp_nombre','$this->emp_apellido','$this->emp_edad','$this->emp_sexo','$this->emp_nit','$this->emp_telefono','$this->emp_puesto')";

        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    // METODO PARA CONSULTAR

    public function buscar(...$columnas)
    {
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM empleado
        inner join puesto on emp_puesto = pue_codigo where emp_situacion = 1 ";

        if ($this->emp_nombre != '') {
            $sql .= " AND emp_nombre like '%$this->emp_nombre%' ";
        }
     
        if ($this->emp_apellido != '') {
            $sql .= " AND emp_apellido like '%$this->emp_apellido%' ";
        }

        if ($this->emp_edad != '') {
            $sql .= " AND emp_edad = $this->emp_edad ";
        }

        if ($this->emp_sexo != '') {
            $sql .= " AND emp_sexo like '%$this->emp_sexo%' ";
        }
        if ($this->emp_nit != '') {
            $sql .= " AND emp_nit like '%$this->emp_nit%' ";
        }
        if ($this->emp_telefono != '') {
            $sql .= " AND emp_telefono = $this->emp_telefono ";
        }

      
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarPorId($id)
    {

        $sql = "SELECT * FROM empleado where emp_situacion = 1 and emp_codigo = $id ";
        $resultado = array_shift(self::servir($sql));
        // $resultado = self::servir($sql)[0];
        return $resultado;
    }

    // METODO PARA MODIFICAR
    public function modificar()
    {
        $sql = "UPDATE empleado SET emp_nombre = '$this->emp_nombre', emp_apellido ='$this->emp_apellido', emp_edad = '$this->emp_edad', emp_sexo ='$this->emp_sexo', emp_nit = '$this->emp_nit', emp_telefono = '$this->emp_telefono' , emp_puesto ='$this->emp_puesto' WHERE emp_codigo ='$this->emp_codigo'";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }



    public function eliminar()
    {
        // $sql = "DELETE FROM productos WHERE prod_id = $this->prod_id ";

        // echo $sql;
        $sql = "UPDATE empleado SET emp_situacion = 0 WHERE emp_codigo = $this->emp_codigo ";
        $resultado = $this->ejecutar($sql);
        return $resultado;

    }

    public function MostrarPorAreas(){
        $sql = "  SELECT 
    emp.emp_nombre || ' ' || emp.emp_apellido AS nombre_completo, 
    pue.pue_nombre, 
    emp.emp_edad, 
    emp.emp_sexo, 
    emp.emp_nit,
    pue.pue_sueldo, 
    area.are_nombre 
FROM 
    asignacion_area asig
INNER JOIN 
    empleado emp ON emp.emp_codigo = asig.asig_empleado 
  INNER JOIN 
    area area ON asig.asig_area = area.are_codigo 
INNER JOIN 
    puesto pue ON emp.emp_puesto = pue.pue_codigo 
WHERE 
asig_situacion = 1";

        $resultado =  self::servir($sql) ;
        return $resultado;
    }



}
