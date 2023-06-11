<?php
namespace App\Controllers;

class BaseController {
    public static function renderHTML( $fileName, $data=[] ){ include($fileName); }
}