<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

     public function registro(){
        helper('form');
        return view ( 'auth/registro');
    }
    
    public function dashboard(){
        return view('dashboard');
    }

    public function procesarLogin()
    {   
        $usuariosModel=new UsuariosModel;
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        // funcion que validad los datos de login
        $existeUsuario = $usuariosModel->where('username',$username)->first();
        
      
        
        
        if($existeUsuario){
           
            $validarContrasena = password_verify($password,$existeUsuario->password);
            if($validarContrasena){
                session()->regenerate();
                session()->set([
                    'usuario'=>$username,
                    'logged'=>true,
                    'role'=>$existeUsuario->role,
                    'ultimaActividad'=>time()
                ]);

                if($existeUsuario->role === 'admin'){
                    return redirect()->to('/admin/dashboard');
                }elseif($existeUsuario->role === 'user'){
                    return redirect()->to('/dashboard/user');

                }

            }else{
                return redirect()->back()->with('error','La contraseña es invalida');
            }
        }else{
                return redirect()->back()->with('error','El username no existe');

        }
        
        

    }

    public function procesarRegistro()
    {
        $usuarioModel= new UsuariosModel;

        $rules=[
            'nombreCompleto'=>'required|min_length[10]|max_length[100]',
            'username'=>'required|is_unique[usuariosInfo.username]|min_length[8]|max_length[20]',
            'email'=> 'required|is_unique[usuariosInfo.email]|',
            'password'=> 'required|min_length[8]|max_length[12]',
            'password_confirm'=>'required|min_length[8]|max_length[12]|matches[password]',
            'terminos' => 'required',
        ];  

        if(!$this->validate($rules) ){
            return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
        }
        $data=[
            'nombreCompleto'=> $this->request->getPost('nombreCompleto'),
            'username'=> $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost("password"),PASSWORD_DEFAULT),
            'role'=> 'user'
        ];

      
        $guardarUsuario= $usuarioModel->insert($data);
        if($guardarUsuario){
            return redirect()->to('/login')->with('success','usuario creado exitosamente, inicia sesión');
        }else{
            redirect()->to('/login')->with('error','no se ha podido guardar el usuario, intenta de nuevo');
        }
    }   

    public function logout(){
        session()->remove(['usuario','logged']);
       return redirect()->to('/login')->with('success','Has cerrado sesión ');
    }    

     

    

}
