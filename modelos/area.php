



<?php

require_once 'Conexion.php';

class Area extends Conexion{
    public $are_codigo;
    public $are_nombre;
    public $are_observacion;
    public $are_situacion;
 


    public function __construct($args = [])
    {
        $this->are_codigo = $args['are_codigo'] ?? null;
        $this->are_nombre = $args['are_nombre'] ?? '';
        $this->are_observacion = $args['are_observacion'] ?? '';
        $this->are_situacion = $args['are_situacion'] ?? 1;
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
        $sql = "SELECT $cols FROM area where are_situacion = 1 ";
        $resultado = self::servir($sql);
        return $resultado;
    }
    public function guardar(){
        $sql = "INSERT into area (are_nombre, are_observacion) values ('$this->are_nombre','$this->are_observacion')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

      // METODO PARA CONSULTAR

    public function buscar(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM area where are_situacion = 1 ";

        if($this->are_nombre != ''){
            $sql .= " AND are_nombre like '%$this->are_nombre%' ";
        }
        if($this->are_observacion != ''){
            $sql .= " AND are_observacion like '%$this->are_observacion%' ";
        }
       
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarPorId($id){
     
        $sql = "SELECT * FROM Area where are_situacion = 1 and are_codigo = $id ";
        $resultado = array_shift( self::servir($sql));
        // $resultado = self::servir($sql)[0];
        return $resultado;
    }

        // METODO PARA MODIFICAR
        public function modificar(){
            $sql = "UPDATE area SET are_nombre = '$this->are_nombre', are_observacion ='$this->are_observacion' WHERE are_codigo ='$this->are_codigo'";
            $resultado = $this->ejecutar($sql);
            return $resultado; 
        }
   


    public function eliminar(){
        // $sql = "DELETE FROM productos WHERE prod_id = $this->prod_id ";

        // echo $sql;
        $sql = "UPDATE area SET are_situacion = 0 WHERE are_codigo = $this->are_codigo ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }
   
}