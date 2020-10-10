<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;

class RolesController extends Controller
{
    //
    public function index(){

        $roles=Roles::orderBy('id','asc')->paginate(5);
        return view('page.permisos.grupos.panel',compact('roles'));

    }
}
