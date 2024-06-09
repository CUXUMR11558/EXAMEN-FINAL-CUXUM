<?php

require_once 'Conexion.php';

class Empleado extends Conexion{
    public $emp_codigo;
    public $emp_nombre;
    public $emp_apellido;
    public $emp_nit;
    public $emp_telefono;
    public $emp_situacion;


    public function __construct($args = [])
    {
        $this->emp_codigo = $args['emp_codigo'] ?? null;
        $this->emp_nombre = $args['emp_nombre'] ?? '';
        $this->emp_apellido = $args['emp_apellido'] ?? '';
        $this->emp_nit = $args['emp_nit'] ?? '';
        $this->emp_telefono = $args['emp_telefono'] ?? '';
        $this->emp_situacion = $args['emp_situacion'] ?? 1;
    }

    // METODO PARA INSERTAR
    public function guardar(){
        $sql = "INSERT into empleado (emp_nombre, emp_apellido, emp_nit, emp_telefono) values ('$this->emp_nombre','$this->emp_apellido','$this->emp_nit','$this->emp_telefono')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

      // METODO PARA CONSULTAR

    public function buscar(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM empleado where emp_situacion = 1 ";

        if($this->emp_nombre != ''){
            $sql .= " AND emp_nombre like '%$this->emp_nombre%' ";
        }
        if($this->emp_apellido != ''){
            $sql .= " AND emp_apellido like '%$this->emp_apellido%' ";
        }
        if($this->emp_nit != ''){
            $sql .= " AND emp_nit like '%$this->emp_nit%' ";
        }
        if($this->emp_telefono != ''){
            $sql .= " AND emp_telefono like '%$this->emp_telefono%' ";
        }
        $resultado = self::servir($sql);
        return $resultado;
    }
    
    
    
}