<?php

namespace App\Controllers\API;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{
    protected $modelName = 'App\Models\UsuariosModel';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //listar
        $users = $this->model->select('nombreCompleto,username,role')->findAll();
        return $this->respond($users);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $usuario = $this->model->find($id);
        if (!$usuario) {
            return $this->failNotFound('Usuario no existe');
        }
        return $this->respond($usuario);
    }



    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        // crear usuario y validar datos

        $data = $this->request->getJSON(true);

        $rules = [
            'nombreCompleto' => 'required|min_length[10]|max_length[100]',
            'username' => 'required|is_unique[usuariosInfo.username]|min_length[8]|max_length[20]',
            'email' => 'required|is_unique[usuariosInfo.email]|',
            'password' => 'required|min_length[8]|max_length[12]',
            'password_confirm' => 'required|min_length[8]|max_length[12]|matches[password]',
            'terminos' => 'required',
        ];

        if (!$this->validateData($data, $rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }
        $dataInsert = [
            'nombreCompleto' => $data['nombreCompleto'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role' => 'user'
        ];


        $insertUser = $this->model->insert($dataInsert);

        if ($insertUser) {
            return $this->respondCreated('Usuario agregado exitosamente');
        }
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */


    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);


        $rulesFiltradas = [];
        $dataUpdate=[];
        $campos=['nombreCompleto','username','email'];


        if (isset($data['nombreCompleto'])) {
            $rulesFiltradas['nombreCompleto'] = 'min_length[10]|max_length[100]';
        }
        if (isset($data['username'])) {
            $rulesFiltradas['username'] = 'is_unique[usuariosInfo.username]|min_length[8]|max_length[20]';
        }
        if (isset($data['email'])) {
            $rulesFiltradas['email'] = 'is_unique[usuariosInfo.email]|';
        }

        if (!$this->validateData($data, $rulesFiltradas)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        foreach($data as $key => $value){
            if(in_array($key,$campos)){
                $dataUpdate[$key]=$value;
            }
        }

       
       

      $usuarioUpdate= $this->model->update($id,$dataUpdate);

      if($usuarioUpdate){
        return $this->respondUpdated('Se ha actualizado la información del usuario');
      }
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $usuario = $this->model->find($id);

        if (!$usuario) {
            return $this->failNotFound("Error al eliminar, no existe ");
        }

        if ($usuario->role === 'admin') {
            return $this->failForbidden("No puedes eliminar un usuario admin");
        }

        $usuBorrado = $this->model->delete($id);

        if ($usuBorrado) {
            return $this->respondDeleted("usuario eliminado correctamente");
        }
    }
}
