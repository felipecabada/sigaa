<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Home extends BaseController
{
  function __construct()
  {
      $session = session();
    $_SESSION ["menu"]=false;
    }
  public function proximo(){

    return view('Home/trabajando');
  }
  public function index()
  {
    return view('Home/login');
  }
  public function success()
  {
    return view('Home/success');
  }
  public function menu()
  {
    return view('Home/menu');
  }

  public function iniciarSesion()
  {
    $validation = service('validation');
    $validation->setRules([
      'matricula' => 'required|numeric|is_not_unique[usuario.matricula]',
      'password' => 'required|'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
      return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $matricula = $this->request->getPost("matricula");
    $password = $this->request->getPost("password");
    $UsuarioModel = new UsuarioModel();
    $datosUsuario = $UsuarioModel->findByMatricula($matricula);

    if (!null == ($datosUsuario)) {
      if ($matricula == $datosUsuario[0]['matricula'] && $password == $datosUsuario[0]['contrasena']) {
        if ($datosUsuario[0]['id'] > 0) {
          $data = [
            "id" => $datosUsuario[0]['id'],
            "nombre" => $datosUsuario[0]['nombre'],
            "correo" => $datosUsuario[0]['correo'],
            "correo_adicional" => $datosUsuario[0]['correo_adicional'],
            "telefono" => $datosUsuario[0]['telefono'],
            "contrasena" => $datosUsuario[0]['contrasena'],
            "id_campus" => $datosUsuario[0]['id_campus'],
            "rol" => $datosUsuario[0]['rol'],
            "matricula" => $datosUsuario[0]['matricula']
          ];

          $session = session();
          $session->set($data);

          if ($datosUsuario[0]['rol'] != "admin") {
            return redirect()->to('/capacitaciones');
          } else {
            return redirect()->to('/usuarios');
          }
        }
      } else {
        return redirect()->back()->withInput()->with('_errors', $validation->getErrors());
      }
    } else {
      return redirect()->back()->withInput()->with('errors', $validation->set_message());
    }

  }


  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('/');
  }
}