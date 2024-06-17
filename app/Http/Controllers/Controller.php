<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Menugrup;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

     public function getmenu()
    {

        $menu=Menugrup::where("active",1)->orderby('order','asc')->get();

        return $menu;
    }
}
