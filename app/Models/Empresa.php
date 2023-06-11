<?php
/**
 * definición de la clase Empresa
 * @author Álvaro García Fuentes
 */
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
            if ( !self::$instancia instanceof self )
                self::$instancia = new self;
            return self::$instancia;
        }
    
        public function __clone(){ trigger_error("La clonación no está permitida!", E_USER_ERROR); }

        public function getId(){ return $this->id; }
        public function setId($id){ $this->id = $id; }
        
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

        /**
         * insertar una nueva empresa
         * @return boolean
         */
        public function set(){       
            $this->query = "INSERT INTO empresas 
            VALUES(NULL, :cif, :nombre, :descripcion, :email, :telefono, :logo, :observaciones, :valoracion, NULL, NULL)";
            $this->parametros[':cif']= $this->cif;
            $this->parametros[':nombre']= $this->nombre;
            $this->parametros[':descripcion']= $this->descripcion;
            $this->parametros[':email']= $this->email;
            $this->parametros[':telefono']= $this->telefono;
            $this->parametros[':logo']= $this->logo;
            $this->parametros[':observaciones']= $this->observaciones;
            $this->parametros[':valoracion']= $this->valoracion;
            try{
                $this->execute_single_query();
                return true;
            }catch(\PDOException $e){
                return false;
            }
        }

        /** 
        * buscar empresa por nombre
        * @return boolean
        */
        public function getPorNombre(){
            $this->query = "SELECT * FROM empresas WHERE nombre = :nombre";
            $this->parametros[':nombre']= $this->nombre;
            try{
                $this->get_results_from_query();
                if( count($this->rows) == 1 ){
                    foreach ( $this->rows[0] as $propiedad=>$valor )
                        $this->$propiedad = $valor;
                    return true;       
                }
            }catch(\PDOException $e){}
            return false;
        }

        /** 
        * buscar empresa por id
        * @return boolean
        */
        function get(){
            $this->query = "SELECT * FROM empresas WHERE id = :id";
            $this->parametros[':id']= $this->id;
            try{
                $this->get_results_from_query();
                if( count($this->rows) == 1 ){
                    foreach ($this->rows[0] as $propiedad=>$valor)
                        $this->$propiedad = $valor;
                    return true;
                }
            }catch(\PDOException $e){}
            return false;
        }

        /**
         * obtener todas las empresas
         */
        public function getAll(){
            $this->query = "SELECT * FROM empresas";
            try{
                $this->get_results_from_query();
                return $this->rows;
            }catch(\PDOException $e){
                return false;
            }
        }

        /**
         * actualizar una empresa
         * @return boolean
         */
        public function edit(){
            $this->query = "UPDATE empresas SET cif=:cif, nombre=:nombre, descripcion=:descripcion, email=:email, telefono=:telefono, logo=:logo, observaciones=:observaciones, valoracion=:valoracion WHERE id = :id";
            $this->parametros['cif']= $this->cif;
            $this->parametros['nombre']= $this->nombre;
            $this->parametros['descripcion']= $this->descripcion;
            $this->parametros['email']= $this->email;
            $this->parametros['telefono']= $this->telefono;
            $this->parametros['logo']= $this->logo;
            $this->parametros['observaciones']= $this->observaciones;
            $this->parametros['valoracion']= $this->valoracion;
            try{
                $this->execute_single_query();
                return true;
            }catch(\PDOException $e){
                return false;
            }
        }

        /**
         * eliminar una empresa
         * @return boolean
         */
        public function delete(){
            $this->query = "DELETE FROM empresas WHERE id = :id";
            $this->parametros['id']=$this->id;
            try{
                $this->execute_single_query();
                return true;
            }catch(\PDOException $e){
                return false;
            }
        }

    }