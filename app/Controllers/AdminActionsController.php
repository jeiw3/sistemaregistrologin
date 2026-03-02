<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsuariosModel;

class AdminActionsController extends BaseController
{
    public function editUsuarioView($id)
    {
        $usuarioModelo = new UsuariosModel;
        $infoUsuarioEdit = $usuarioModelo->select('id,nombreCompleto,username,email,role')->where('id', $id)->first();
        $data = [
            'infoUsuarioEdit' => $infoUsuarioEdit
        ];
        return view('/adminActions/editUsuarios', $data);
    }

    public function editUsuario($idUsuario)
    {
        $usuariosModelo = new UsuariosModel;


        $nombreCompleto = $this->request->getPost('nombreCompleto');
        $username = $this->request->getPost('username');
        $role = $this->request->getPost('role');

        // reglas de validacion de los datos
        $rules = [
            'nombreCompleto' => 'required|min_length[10]|max_length[100]',
            'username' => 'required|is_unique[usuariosInfo.username]|min_length[8]|max_length[20]',

        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', $this->validator->getErrors());
        }

        $data = [
            'nombreCompleto' => $nombreCompleto,
            'username' => $username,
            'role' => $role

        ];
        $actualizarUsuario = $usuariosModelo->replace($data);

        if ($actualizarUsuario) {
            return redirect()->to('admin/dashboard')->with('success', 'Informacion de usuario actualizada');
        }
    }

    public function delUsuario($idUsuario){
        $usuarioModelo= new UsuariosModel();

        $borradoUsuario = $usuarioModelo->delete($idUsuario);
        if($borradoUsuario){
            return redirect()->back()->with('success','usuario eliminado');
        }
    }
}
