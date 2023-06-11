<?php
namespace App\Controllers;
require_once("../vendor/autoload.php");
use App\Models\Empresa;

class IndexController extends BaseController{
    public static function IndexAction(){
        $empresa = Empresa::getInstancia();
        $data['empresas'] = $empresa->getAll();
        self::renderHTML("../views/index_view.php", $data);
    }
}