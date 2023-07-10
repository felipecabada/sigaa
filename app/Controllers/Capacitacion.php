<?php

namespace App\Controllers;

use App\Models\CapacitacionModel;

class Capacitacion extends BaseController
{

  private $CapacitacionModel;
  function __construct()
  {
      $session = session();
      $_SESSION ["menu"]=true;
      $this->CapacitacionModel = new CapacitacionModel();
 
  
  }
  public function index()
  { //tabla con las Capacitaciones(CRUD)
    //view
    if(isset($_SESSION["id"])){
      $capacitaciones = $this->CapacitacionModel->where('id_usuario', $_SESSION["id"])
      ->findAll();

      $horas =  $this->CapacitacionModel->findHoursById(1);

    if (isset($horas[0]["duracion_horas"])) {

      $hora["docente"] = $horas[0]["duracion_horas"];
    } else {
      $hora["docente"] = 0;
    }

    if (isset($horas[1]["duracion_horas"])) {

      $hora["disciplinar"] = $horas[1]["duracion_horas"];
    } else {
      $hora["disciplinar"] = 0;
    }



    $data = [
      "capacitaciones" => $capacitaciones,
      "horas" => $hora,

    ];

    return view('/Capacitacion/index', $data);
    }else{

     

    }
   
  }

  public function show($id)
  {
    if(isset($_SESSION["id"])){
      $capacitacion = $this->CapacitacionModel->find($id);
      $data = [
        "capacitacion" => $capacitacion,
      ];
  
      return view('/Capacitacion/mostrar', $data);
    }else{
      
    }
   
  }

  public function capacitaciones($id)
  { //tabla con los Capacitacion(CRUD)
    //view
    if(isset($_SESSION["id"])){
      $capacitaciones = $this->CapacitacionModel->findCapacitacionesById($id);

      $horas =  $this->CapacitacionModel->findHoursById($id);
  
      if (isset($horas[0]["duracion_horas"])) {
  
        $hora["docente"] = $horas[0]["duracion_horas"];
      } else {
        $hora["docente"] = 0;
      }
  
      if (isset($horas[1]["duracion_horas"])) {
  
        $hora["disciplinar"] = $horas[1]["duracion_horas"];
      } else {
        $hora["disciplinar"] = 0;
      }
  
  
  
      $data = [
        "capacitaciones" => $capacitaciones,
        "horas" => $hora,
  
      ];
  
      return view('/Capacitacion/index', $data);
    }else{
      return view("Home/login");
    }
    
  }

  public function form()
  {
    return view('/Capacitacion/agregar');
  }

  public function save()
  {  

    $capacitacion = new Capacitacion();
    
    //algoritmo para almacenar el capacitacion  en la base de datos
    //redirect al index o al show con mensaje de creado exitosamente

    //validacion de los campos
    $validation = service('validation');
    $validation->setRules(
      [
        'titulo' => 'required',
        'tipo' => 'required',
        'lugar' => 'required',
        'fecha_inicial' => 'required',
        'fecha_final' => 'required',
        'institucion' => 'required',
        'modalidad' => 'required',
        'duracion_horas' => 'required|greater_than[0]',
        'nombre_instructor' => 'required'
      ],
      [ //mensajes de error 
        'titulo' => [
          'required' => "El campo de nombre es requerido",
          'alpha_numeric_space' => "El campo de nombre solo lleva letras, espacios y números",
        ],
        'tipo' => [
          'required' => "El campo tipo es requerido"
        ],
        'lugar' => [
          'required' => "El campo de lugar es requerido",
          'alpha_space' => "El campo de lugar sólo puede tener letras y espacios"
        ],
        'fecha_inicial' => [
          'required' => "El campo de fecha de inicio es requerido"
        ],
        'fecha_final' => [
          'required' => "El campo de fecha final es requerido"
        ],
        'institucion' => [
          'required' => "El campo de institución es requerido"
        ],
        'modalidad' => [
          'required' => "El campo de modalidad es requerido"
        ],
        'duracion_horas' => [
          'required' => "El campo de duración es requerido",
          'greater_than' => "El campo de duración sólo puede tener números"
        ],
        'evidencia' => [
          'required' => "El campo de evidencia es requerido"
        ],
        'nombre_instructor' => [
          'required' => "El campo de instructor es requerido"
        ],
      ]
    );
    if (!$validation->withRequest($this->request)->run()) {
      /*dd($validation->getErrors());*/
      return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }
    if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{2,50}$/",$_POST['titulo'])){
      return redirect()->back()->withInput()->with('tit','El campo de nombre solo lleva letras, espacios y números');
    } 
    if ($_POST['fecha_inicial'] > $_POST['fecha_final']){
      return redirect()->back()->withInput()->with('fec','La fecha inicial no puede ser después de la fecha final');
    }
    if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{2,50}$/",$_POST['nombre_instructor'])){
      return redirect()->back()->withInput()->with('nom','El nombre del instructor solo lleva letras, espacios y números');
    } 
    $file = $this->request->getFile('evidencia');
    if($file->isValid() && ! $file->hasMoved()){

      $fileName = $file->getRandomName();
      $file->move('evidencias/', $fileName);
    }
    $capacitacion = [
      'titulo' => $this->request->getPost("titulo"),
      'tipo' => $this->request->getPost("tipo"),
      'lugar' => $this->request->getPost("lugar"),
      'fecha_inicial' => $this->request->getPost("fecha_inicial"),
      'fecha_final' => $this->request->getPost("fecha_final"),
      'institucion' => $this->request->getPost("institucion"),
      'modalidad' => $this->request->getPost("modalidad"),
      'duracion_horas' => $this->request->getPost("duracion_horas"),
      'evidencia' => $fileName,
      'nombre_instructor' => $this->request->getPost("nombre_instructor"),
      'id_usuario' => $_SESSION["id"],
      'estado' => "Enviado",
    ];
    $this->CapacitacionModel->insert($capacitacion);

    return redirect()->to("capacitaciones")->with('msg', 'Capacitacion añadida correctamente');
  }


  public function edit($id)
  { //formulario para editar un producto
    //view
    $capacitacion = $this->CapacitacionModel->find($id);
    $data = [
      "capacitacion" => $capacitacion
    ];
    return view("/Capacitacion/editar", $data);
  }

  public function update($id)
  {  
    $capacitacion = new Capacitacion();
    //algoritmo para actualizar la capacitacion  en la base de datos
    //redirect al index o al show con mensaje de creado exitosamente

        //validacion de los campos
        $validation = service('validation');
        $validation->setRules(
          [
            'titulo' => 'required',
            'tipo' => 'required',
            'lugar' => 'required',
            'fecha_inicial' => 'required',
            'fecha_final' => 'required',
            'institucion' => 'required',
            'modalidad' => 'required',
            'duracion_horas' => 'required|greater_than[0]',
            'nombre_instructor' => 'required'
          ],
          [ //mensajes de error 
            'titulo' => [
              'required' => "El campo de nombre es requerido",
              'alpha_numeric_space' => "El campo de nombre solo lleva letras, espacios y números",
            ],
            'tipo' => [
              'required' => "El campo tipo es requerido"
            ],
            'lugar' => [
              'required' => "El campo de lugar es requerido",
              'alpha_space' => "El campo de lugar sólo puede tener letras y espacios"
            ],
            'fecha_inicial' => [
              'required' => "El campo de fecha de inicio es requerido"
            ],
            'fecha_final' => [
              'required' => "El campo de fecha final es requerido"
            ],
            'modalidad' => [
              'required' => "El campo de modalidad es requerido"
            ],
            'duracion_horas' => [
              'required' => "El campo de duración es requerido",
              'greater_than' => "Las horas registradas deben ser mayores a 0"
            ],
            'evidencia' => [
              'required' => "El campo de evidencia es requerido"
            ],
            'nombre_instructor' => [
              'required' => "El campo de instructor es requerido"
            ],
          ]
        );
        if (!$validation->withRequest($this->request)->run()) {
          /*dd($validation->getErrors());*/
          return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{2,50}$/",$_POST['titulo'])){
          return redirect()->back()->withInput()->with('tit','El campo de nombre solo lleva letras y espacios');
        } 
        if ($_POST['fecha_inicial'] > $_POST['fecha_final']){
          return redirect()->back()->withInput()->with('fec','La fecha inicial no puede ser después de la fecha final');
        }
        if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{2,50}$/",$_POST['nombre_instructor'])){
          return redirect()->back()->withInput()->with('nom','El nombre del instructor solo lleva letras y espacios');
        }   

    $file = $this->request->getFile('evidencia');
    if($file->isValid() && ! $file->hasMoved()){

      $fileName = $file->getRandomName();
      $file->move('evidencias/', $fileName);
    }
    $capacitacion = [
      'titulo' => $this->request->getPost("titulo"),
      'tipo' => $this->request->getPost("tipo"),
      'lugar' => $this->request->getPost("lugar"),
      'fecha_inicial' => $this->request->getPost("fecha_inicial"),
      'fecha_final' => $this->request->getPost("fecha_final"),
      'institucion' => $this->request->getPost("institucion"),
      'modalidad' => $this->request->getPost("modalidad"),
      'duracion_horas' => $this->request->getPost("duracion_horas"),
      //'evidencia' => $fileName,
      'nombre_instructor' => $this->request->getPost("nombre_instructor"),
      'estado' => "Enviado"
    ];
    $this->CapacitacionModel->update($id, $capacitacion);

    return redirect()->to("/capacitaciones/mostrar/$id")->with('msg', 'Capacitacion editada correctamente');
  }

  public function updateEstado($id, $estado)
  {
    $capacitacion = [
      'estado' => $estado
    ];
    $this->CapacitacionModel->update($id, $capacitacion);

    return redirect()->to("/capacitaciones/mostrar/$id")->with('msg', 'Estado de capacitacion correctamente actualizado');
  }

  public function delete($id)
  { //elimina un producto
    //redirect al index con mensaje de producto eliminado 
    $this->CapacitacionModel->delete($id);

    return redirect()->to("capacitaciones")->with('msgDelete', 'Capacitacion elimada correctamente');
  }


}