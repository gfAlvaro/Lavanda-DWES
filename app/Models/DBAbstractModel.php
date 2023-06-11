<?php
/**
 * definicion del DBAbstractModel
 * @autor Álvaro García Fuentes
 */
namespace App\Models;

abstract class DBAbstractModel {
    private static $db_host = "localhost";
    private static $db_user = "root";
    private static $db_pass = "";
    private static $db_name = "lavanda";
    private static $db_port = "3306";

    protected $conn;
    protected $query;
    protected $parametros = [];
    protected $rows = []; 

    abstract protected function get();
    abstract protected function set();
    abstract protected function edit();
    abstract protected function delete();


    protected function open_connection()
    {
        $dsn = 'mysql:host='.self::$db_host.';'
            .'dbname='.self::$db_name.';'
            .'port='.self::$db_port;
        try {
            $this->conn = new \PDO(
                $dsn,
                self::$db_user,
                self::$db_pass,
                array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
            return $this->conn;
        } catch (\PDOException $e) {
            printf("Conexión fallida: %s\n", $e->getMessage());
            exit();
        }
    }
    #Método que devuelve el último id introducido.
    public function lastInsert(){ return $this->conn->lastInsertId(); }

    # Desconectar la base de datos
    private function close_connection(){ $this->conn = null; }

    # Ejecutar un query simple del tipo INSERT, DELETE, UPDATE
    # Consulta que no devuelve tuplas de la tabla
    protected function execute_single_query(){
        $this->open_connection();
        $_stmt = $this->conn->prepare($this->query);
        $_stmt->execute( $this->parametros );
        $this->close_connection();
    }
    #Traer resultados de una consulta en un Array
    #Consulta que devuelve tuplas de la tabla.
    protected function get_results_from_query(){
        $this->open_connection();
        $this->rows = [];
        if( $_stmt = $this->conn->prepare( $this->query ) )
            if( $_stmt->execute( $this->parametros ) )
                while( $fila = $_stmt->fetch() )
                    $this->rows[] = $fila;

        $this->close_connection();
    }
}