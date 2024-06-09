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
        $sql = "INSERT into clientes (cli_nombre, cli_apellido, cli_nit, cli_telefono) values ('$this->emp_nombre','$this->emp_apellido','$this->emp_nit','$this->emp_telefono')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }
    
    
    
}