<?php

    namespace App\Models;
    class Empresa extends DBAbstractModel{

        private $id;
        private $cif;
        private $nombre;
        private $descripcion;
        private $email;
        private $telefono;
        private $logo;
        private $observaciones;
        private $valoracion;
        private $created_at;
        private $updated_at;

        private static $instancia;

        private function __construct(){}

        public static function getInstancia(){
            if (!isset(self::$instancia)) {
                $miclase = __CLASS__;
                self::$instancia = new $miclase;
            }
            return self::$instancia;
        }
    
        public function __clone(){ trigger_error("La clonación no está permitida!", E_USER_ERROR); }

        public function setCif($cif){ $this->cif = $cif; }
        public function getCif(){ return $this->cif; }

        public function setNombre($nombre){ $this->nombre = $nombre; }
        public function getNombre(){ return $this->nombre; }

        public function setDescripcion($descripcion){ $this->descripcion = $descripcion; }
        public function getDescripcion(){ return $this->descripcion; }

        public function setEmail($email){ $this->email = $email; }
        public function getEmail(){ return $this->email; }

        public function setTelefono($telefono){ $this->telefono = $telefono; }
        public function getTelefono(){ return $this->telefono; }

        public function setLogo($logo){ $this->logo = $logo; }
        public function getLogo(){ return $this->logo; }

        public function setObservaciones($observaciones){ $this->observaciones = $observaciones; }
        public function getObservaciones(){ return $this->observaciones; }
  
        public function setValoracion($valoracion){ $this->valoracion = $valoracion; }
        public function getValoracion(){ return $this->valoracion; }
            
        public function getCreated_at(){ return $this->created_at; }

        public function getUpdated_at(){ return $this->updated_at; }

        public function getMensaje(){ return $this->mensaje; }

        # Crear un nueva empresa
        public function set($data=array()){
            //Control de inserción.
            if( array_key_exists( 'id', $data )  ){
                $this->get($data['id']);
                if( $data['id'] != $this->id ){
                    foreach( $data as $campo=>$valor )
                        $$campo = $valor;
                    
                    $this->query = "INSERT INTO empresas(cif, nombre, descripcion, email, telefono, logo, observaciones, valoracion)
                    VALUES(:cif, :nombre, :descripcion, :email, :telefono, :logo, :observaciones, :valoracion)";
                    //$this->parametros['id']= $id;
                    $this->parametros['cif']= $this->cif;
                    $this->parametros['nombre']= $this->nombre;
                    $this->parametros['descripcion']= $this->descripcion;
                    $this->parametros['email']= $this->email;
                    $this->parametros['telefono']= $this->telefono;
                    $this->parametros['logo']= $this->logo;
                    $this->parametros['observaciones']= $this->observaciones;
                    $this->parametros['valoracion']= $this->valoracion;
                    $this->get_results_from_query();
                    //$this->execute_single_query();
                    $this->mensaje = 'Empresa añadida';
                } else
                    $this->mensaje = 'La empresa ya existe';
            } else
                $this->mensaje = 'No se ha agregado empresa';
        }

        /** 
        * @param int id. Identificador de la empresa.
        * @return
        */
        public function get($id=''){
            if($id != '') {
                $this->query = "SELECT * FROM empresas WHERE id = :id";
                //Cargamos los parámetros.
                $this->parametros['id']= $id;
                //Ejecutamos consulta que devuelve registros.
                $this->get_results_from_query();
            }
            if(count($this->rows) == 1) {
               foreach ($this->rows[0] as $propiedad=>$valor)
                    $this->$propiedad = $valor;
            
                $this->mensaje = 'empresa encontrada';
            } else 
                $this->mensaje = 'empresa no encontrada';

            return $this->rows;
        }

        public function getAll(){
            $this->query = "SELECT * FROM empresas";
            $this->get_results_from_query();
            if (count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad => $valor)
                    $this->$propiedad = $valor;
                
                $this->mensaje = 'empresa encontrada';
            } else
                $this->mensaje = 'empresa no encontrada';

            return $this->rows;
        }

        # Modificar Empresa
        public function edit($user_data=array()){
            foreach ($user_data as $campo=>$valor)
                $$campo = $valor;

            $this->query = "UPDATE empresas SET cif=:cif, nombre=:nombre, descripcion=:descripcion, email=:email, telefono=:telefono, logo=:logo, observaciones=:observaciones, valoracion=:valoracion WHERE id = :id";
            // $this->parametros['id']=$id;
            $this->parametros['cif']= $this->cif;
            $this->parametros['nombre']= $this->nombre;
            $this->parametros['descripcion']= $this->descripcion;
            $this->parametros['email']= $this->email;
            $this->parametros['telefono']= $this->telefono;
            $this->parametros['logo']= $this->logo;
            $this->parametros['observaciones']= $this->observaciones;
            $this->parametros['valoracion']= $this->valoracion;
            $this->get_results_from_query();
            $this->mensaje = 'Empresa modificada';
        }

        # Eliminar una empresa
        public function delete($id=''){
            $this->query = "DELETE FROM empresas WHERE id = :id";
            $this->parametros['id']=$id;
            $this->get_results_from_query();
            $this->mensaje = 'Empresa eliminada';
        }

    }