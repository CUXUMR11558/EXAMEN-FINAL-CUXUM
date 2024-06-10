<?php

require_once 'Conexion.php';

class Puesto extends Conexion{
    public $pue_codigo;
    public $pue_nombre;
    public $pue_sueldo;
    public $pue_situacion;
 


    public function __construct($args = [])
    {
        $this->pue_codigo = $args['pue_codigo'] ?? null;
        $this->pue_nombre = $args['pue_nombre'] ?? '';
        $this->pue_sueldo = $args['pue_sueldo'] ?? 0.00;
        $this->pue_situacion = $args['pues_situacion'] ?? 1;
    }

    // METODO PARA INSERTAR

    public static function buscarTodos(...$columnas){
        // $cols = '';
        // if(count($columnas) > 0){
        //     $cols = implode(',', $columnas) ;
        // }else{
        //     $cols = '*';
        // }
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM puesto where pue_situacion = 1 ";
        $resultado = self::servir($sql);
        return $resultado;
    }
    public function guardar(){
        $sql = "INSERT into puesto (pue_nombre, pue_sueldo) values ('$this->pue_nombre','$this->pue_sueldo')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

      // METODO PARA CONSULTAR

    public function buscar(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM puesto where pue_situacion = 1 ";

        if($this->pue_nombre != ''){
            $sql .= " AND pue_nombre like '%$this->pue_nombre%' ";
        }
        if($this->pue_sueldo != ''){
            $sql .= " AND pue_sueldo = $this->pue_sueldo ";
        }
       
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarPorId($id){
     
        $sql = "SELECT * FROM puesto where pue_situacion = 1 and pue_codigo = $id ";
        $resultado = array_shift( self::servir($sql));
        // $resultado = self::servir($sql)[0];
        return $resultado;
    }

        // METODO PARA MODIFICAR
        public function modificar(){
            $sql = "UPDATE puesto SET pue_nombre = '$this->pue_nombre', pue_sueldo ='$this->pue_sueldo' WHERE pue_codigo ='$this->pue_codigo'";
            $resultado = $this->ejecutar($sql);
            return $resultado; 
        }
   


    public function eliminar(){
        // $sql = "DELETE FROM productos WHERE prod_id = $this->prod_id ";

        // echo $sql;
        $sql = "UPDATE puesto SET pue_situacion = 0 WHERE pue_codigo = $this->pue_codigo ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }
   
}