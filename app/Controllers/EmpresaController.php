<?php

namespace App\Controllers;

use App\Models\Empresa;

class EmpresaController extends BaseController
{
    public function IndexAction(){
        $ObjEmpresa = Empresa::getInstancia();
        $data = $ObjEmpresa->getAll();
        
        if (isset($_POST["buscar"])) {
            $ObjEmpresa->setNombre($_POST["nombre"]);
            $data = $ObjEmpresa->get();
        }
        $this->renderHTML("../views/index_view.php", $data);
    }

    public function AddAction()
    {
        $data['existe'] = false;
        if(  isset( $_POST["nombre"] )  ){
            $ObjEmpresa = Empresa::getInstancia();
            $ObjEmpresa->setCif($_POST["cif"]);
            $ObjEmpresa->setNombre($_POST["nombre"]);
            $ObjEmpresa->setDescripcion($_POST["descripcion"]);
            $ObjEmpresa->setTelefono($_POST["telefono"]);
            $ObjEmpresa->setEmail($_POST["email"]);
            $ObjEmpresa->setLogo($_POST["logo"]);
            $ObjEmpresa->setObservaciones($_POST["observaciones"]);
            $ObjEmpresa->setValoracion($_POST["valoracion"]);

            if( $ObjEmpresa->getPorNombre() )
                    $data["existe"] = true;
            else {
                $ObjEmpresa->set();
                $data["existe"] = false;
            }
        }
        
        $this->renderHTML("../views/addempresa_view.php", $data);
    }

    public function EditAction(){
        
        if(  !isset( $_GET["id"] )  )
            header("Location: /");
       
        
        $empresa = Empresa::getInstancia();
        $empresa->setId( $_GET["id"] );
        $empresa->get();
        
        $data["cif"] = $empresa->getCif();
        $data["nombre"] = $empresa->getNombre();
        $data["descripcion"] = $empresa->getDescripcion();
        $data["telefono"] = $empresa->getTelefono();
        $data["email"] = $empresa->getEmail();
        $data["logo"] = $empresa->getLogo();
        $data["observaciones"] = $empresa->getObservaciones();
        $data["valoracion"] = $empresa->getValoracion();

        $data["editado"] = false;

        if( isset( $_POST["cif"] )
        && isset( $_POST["nombre"] )
        && isset( $_POST["descripcion"] )
        && isset( $_POST["telefono"] )
        && isset( $_POST["email"] )
        && isset( $_POST["logo"] )
        && isset( $_POST["observaciones"] )
        && isset( $_POST["valoracion"] )  ){
            $empresa->setCif($_POST["cif"]);
            $empresa->setNombre($_POST["nombre"]);
            $empresa->setDescripcion($_POST["descripcion"]);
            $empresa->setTelefono($_POST["telefono"]);
            $empresa->setEmail($_POST["email"]);
            $empresa->setLogo($_POST["logo"]);
            $empresa->setObservaciones($_POST["observaciones"]);
            $empresa->setValoracion($_POST["valoracion"]);
            try{
                $empresa->edit();
                $data["editado"] = true;
            } catch (\PDOException $e) {
                $data["editado"] = false;
            }
        }

        $this->renderHTML("../views/editempresa_view.php", $data);
    }

    public function DeleteAction(){        
        if(  !isset( $_GET["id"] )  )
            header("Location: /");

        $empresa = Empresa::getInstancia();
        $empresa->setId( $_GET["id"] );
        try{
            $empresa->delete();
            $data["borrado"] = true;
        } catch (\PDOException $e) {
            $data["borrado"] = false;
        }
        $this->renderHTML( "../views/delempresa_view.php", $data );
    }
}