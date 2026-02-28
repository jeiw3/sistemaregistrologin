<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsuariosModel;

class DashboardController extends BaseController
{
    public function dashboards()
    {
        if(session()->get('logged')){
             $usuario = session()->get('usuario');

                $data=[
                'usuario'=>$usuario
                ];

            if(session()->get('role')=== 'user'){
                return view('dashboard/dashboardUser',$data);
            }else if(session()->get('role'==='admin')){
                $usuariosAppModel=  new UsuariosModel;
                $usuariosApp= $usuariosAppModel->select('nombreCompleto,username,email,role')->findAll();
                $data+=[
                    'usuariosApp'=>$usuariosApp,
                ];
               

                return view('dashboard/dashboardAdmin',$data);

            }
        }   

      

    }
}
