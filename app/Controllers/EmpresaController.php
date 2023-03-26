<?php

namespace App\Controllers;

use App\Models\Empresa;

class EmpresaController extends BaseController
{
    public function IndexAction($request)
    {
        $ObjEmpresa = Empresa::getInstancia();
        $data = $ObjEmpresa->getAll();
        
        if (isset($_POST["buscar"])) {
            $ObjEmpresa->setNombre($_POST["nombre"]);
            $data = $ObjEmpresa->get();
        }
        $this->renderHTML("../views/index_view.php", $data);
    }

    public function AddAction($request)
    {
        if ($_SESSION["perfil"] != "admin") {
            header("Location: /");
        }
        if (isset($_POST["enviar"])) {
            $ObjEmpresa = Empresa::getInstancia();
            $ObjEmpresa->setCif($_POST["cif"]);
            $ObjEmpresa->setNombre($_POST["nombre"]);
            $ObjEmpresa->setDescripcion($_POST["descripcion"]);
            $ObjEmpresa->setTelefono($_POST["telefono"]);
            $ObjEmpresa->setEmail($_POST["email"]);
            $ObjEmpresa->setLogo($_POST["logo"]);
            $ObjEmpresa->setObservaciones($_POST["observaciones"]);
            $ObjEmpresa->setValoracion($_POST["valoracion"]);
            $ObjEmpresa->set();
            header("Location: /");
        }
        if (isset($_POST["inicio"])) {
            header("Location: /");
        }
        $this->renderHTML("../views/addempresa_view.php");
    }

    public function EditAction($request)
    {
        if ($_SESSION["perfil"] != "admin") {
            header("Location: /");
        } else {
            $numero = explode("/", $request);
            $data = array("numero" => $numero[3]);
            $id = $data["numero"];
            $ObjEmpresa = Empresa::getInstancia();
            $data = $ObjEmpresa->get();
            if (isset($_POST["enviar"])) {
                // Limpiar datos enviados a la base de datos
                $ObjEmpresa->setNombre($_POST["nombre"]);
                $ObjEmpresa->edit();
                header("Location: /");
            }

            if (isset($_POST["inicio"])) {
                header("Location: /");
            }
        }
        $this->renderHTML("../views/editempresa_view.php", $data);
    }

    public function DelAction($request)
    {        
        $numero = explode("/", $request);
        $id = $numero[3];
        $objEmpresa = Empresa::getInstancia();
        $objEmpresa->delete($id);
        header("Location: /");
    }
    
}