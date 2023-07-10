<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Usuario extends BaseController
{
  protected $helpers = ['form'];
  private $UsuarioModel;
  function __construct()
  {
    $session = session();
    $_SESSION ["menu"]=true;
    $this->UsuarioModel = new UsuarioModel();
  }
  public function index()
  {

    $usuarios = $this->UsuarioModel->findAll();

    $data = [
      "usuarios" => $usuarios
    ];

    return view('/Usuario/index', $data);
  }

  public function save()
  {

    //validacion de los campos
    $validation = service('validation');
    $validation->setRules(
      [
        'nombre' => 'required',
        'apellidos' => 'required',
        'correo' => 'required|is_unique[usuario.correo]|valid_email',
        'telefono' => 'permit_empty|is_unique[usuario.telefono]|numeric|min_length[10]',
        'contrasena' => 'required|min_length[8]',
        //'id_campus' => 'required',
        'rol' => 'required',
        'matricula' => 'required|numeric|exact_length[6]',

      ],
      [ //mensajes de error 
        'nombre' => [
          'required' => "El campo de nombre es requerido",
          'alpha_space' => "El campo de nombre solo lleva letras y espacios",
        ],
        'apellidos' => [
          'required' => "El campo de apellidos es requerido",
          'alpha_space' => "El campo de apellidos solo lleva letras y espacios",
        ],
        'correo' => [
          'required' => "El correo es requerido",
          'is_unique' => "El correo debe ser único",
          'valid_email' => "El campo de correo debe de ser llenado con un correo valido",
        ],
        'telefono' => [
          'is_unique' => "El número telefónico debe ser único",
          'numeric' => "El campo de teléfono sólo puede tener números",
          'min_length[8]' => "El número telefónico debe de tener un mínimo de 10 caracteres",
        ],
        'contrasena' => [
          'required' => "La contraseña es obligatoria",
          'min_length[8]' => "La contraseña tiene un mínimo de 8 caracteres",
        ],
        /*'id_campus' => [
                        'required' => "El campus es requerido",
                    ],*/
        'rol' => [
          'required' => "El campo de rol es requerido",
        ],
        'matricula' => [
          'required' => "El campo de matrícula es requerido",
          'numeric' => "El campo de matrícula sólo puede tener números",
        ],
      ]
    );

    if (!$validation->withRequest($this->request)->run()) {
      /*dd($validation->getErrors());*/
      return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }
    if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{2,50}$/",$_POST['nombre'])){
      return redirect()->back()->withInput()->with('nom','El campo de nombre solo lleva letras y espacios');
    } 
    if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{2,50}$/",$_POST['apellidos'])){
      return redirect()->back()->withInput()->with('nom','El campo de nombre solo lleva letras y espacios');
    } 
    try {
      $usuario = [
        'nombre' => $this->request->getPost("nombre") . " " . $this->request->getPost("apellidos"),
        'correo' => $this->request->getPost("correo"),
        'telefono' => $this->request->getPost("telefono"),
        'contrasena' => $this->request->getPost("contrasena"),
        'id_campus' => 1,
        'rol' => $this->request->getPost("rol"),
        'matricula' => "00000{$this->request->getPost("matricula")}",

      ];
      $this->UsuarioModel->insert($usuario);
    } catch (Exception $e) {
      echo 'Excepción al guardar usuario: ',  $e->getMessage(), "\n";
    }
    return redirect()->to("usuarios")->with('msg', 'Usuario agregado correctamente');
  }

  public function update($id) {

     //validacion de los campos
    $validation = service('validation');
    $validation->setRules(
      [
        'nombre' => 'required',
        'correo' => "required|is_unique[usuario.correo,id,{$id}]|valid_email",
        'correo_adicional' => "permit_empty|is_unique[usuario.correo_adicional,Id,{$id}]|valid_email",
        'telefono' => "permit_empty|is_unique[usuario.telefono,Id,{$id}]|numeric|min_length[10]",

      ],
      [ //mensajes de error 
        'nombre' => [
          'required' => "El campo de nombre es requerido",
          'alpha_space' => "El campo de nombre solo lleva letras y espacios",
        ],
        'correo' => [
          'required' => "El correo es requerido",
          'is_unique' => "El correo debe ser único",
          'valid_email' => "El campo de correo debe de ser llenado con un correo valido",
        ],
        'correo_adicional' => [
          'is_unique' => "El correo debe ser único",
          'valid_email' => "El campo de correo debe de ser llenado con un correo valido",
        ],
        'telefono' => [
          'is_unique' => "El número telefónico debe ser único",
          'numeric' => "El campo de teléfono sólo puede tener números",
          'min_length[8]' => "El número telefónico debe de tener un mínimo de 10 caracteres",
        ],
        'rol' => [
          'required' => "El campo de rol es requerido",
        ],
      ]
    );
    if (!$validation->withRequest($this->request)->run()) {
      /*dd($validation->getErrors());*/
      return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }
    if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{2,50}$/",$_POST['nombre'])){
      return redirect()->back()->withInput()->with('nom','El campo de nombre solo lleva letras y espacios');
    } 
    try {

      if(isset($_POST["nombre"])&& !empty($_POST["nombre"])){
        $datos["nombre"] = $this->request->getPost("nombre");
      }
    if(isset($_POST["correo"]) && !empty($_POST["correo"])){
        $datos["correo"] = $this->request->getPost("correo") ;
      }
      if(isset($_POST["correo_adicional"]) && !empty($_POST["correo_adicional"])){
        $datos["correo_adicional"] = $this->request->getPost("correo_adicional") ;
      }
      if(isset($_POST["telefono"] )&& !empty($_POST["telefono"])){
        $datos["telefono"] = $this->request->getPost("telefono") ;
      }
      if(isset($_POST["contrasena"]) && !empty($_POST["contrasena"])){
        $datos["contrasena"] = $this->request->getPost("contrasena") ;
      }
      if(isset($_POST["id_campus"]) && !empty($_POST["id_campus"])){
        $datos["id_campus"] = $this->request->getPost("id_campus") ;
      }
      if(isset($_POST["rol"]) && !empty($_POST["rol"])){
        $datos["rol"] = $this->request->getPost("rol") ;
      }
      if(isset($_POST["matricula"]) && !empty($_POST["matricula"])){
        $datos["matricula"] = $this->request->getPost("matricula") ;
      }

      $this->UsuarioModel->update($id, $datos);
    } catch (Exception $e) {
      echo 'Excepción al guardar usuario: ',  $e->getMessage(), "\n";
    }
$_POST["rol"] ="";
if($_POST["rol"] == "admin"){
    return redirect()->to("usuarios")->with('msg', 'Usuario editado correctamente');
}else{

  return redirect()->to("/usuario/perfil/$id")->with('msg', 'Datos editados correctamente');
}
  
  }
  public function edit($id)
  {
    $usuario = $this->UsuarioModel->find($id);
    $data = [
      "usuario" => $usuario
    ];

    return view("Usuario/editar", $data);
  }

  public function delete($id)
  {
    $this->UsuarioModel->delete($id);

    return redirect()->to("usuarios")->with('msg', 'Usuario eliminado correctamente');
  }

  public function form()
  {
    return view("Usuario/agregar");
  }

  public function perfil($id)
  {
    $usuario= $this->UsuarioModel->find($id);
    $data=[ "usuario"=>$usuario];

    return view("Usuario/perfil",$data);
  }
  public function viewUsuarios($rol)
  {
    $usuarios = $this->UsuarioModel->findUserdByRol($rol);

    $data = [
      "usuarios" => $usuarios
    ];

    return view('/Usuario/index', $data);
  }
public function search(){
    $query = $this->request->getGet('query');
    if($query != null){
      $rol = "Maestro";
      $data['query'] = $query; 
      $data['usuarios'] = $this->UsuarioModel
      ->like('nombre', $query)
      ->orLike('correo', $query)
      ->orLike('correo_adicional', $query)
      ->orLike('telefono', $query)
      ->orLike('matricula', $query)
      ->notLike('rol','admin')
      ->notLike('rol','Estudiante')
      ->findAll();
  
    }else{
      $data['query'] = $query; 
      $data['usuarios'] = $this->UsuarioModel->notLike('rol','admin')
      ->notLike('rol','Estudiante')  ->findAll();
  

    }
   
    
 return view('/Usuario/index', $data);

}


}