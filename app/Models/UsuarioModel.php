<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{

  protected $table = 'usuario';
  protected $primarykey = 'id';
  protected $allowedFields = [
    "nombre",
    "correo",
    "correo_adicional",
    "telefono",
    "contrasena",
    "id_campus",
    "rol",
    "matricula"
  ];
  public function findByMatricula($matricula)
  {

    return $this->asArray()->where(['matricula' => $matricula])->findAll();
  }

  public function findHoursById($id)
  {

    $db = db_connect();
    $query = $db->query('SELECT sum(capacitacion.duracion_horas) FROM capacitacion INNER JOIN usuario on id_usuario = usuario.id WHERE usuario.id = ' . $id);
    $result = $query->getResult();
    return $result;
  }

  public function findUserdByRol($rol)
  {

    return $this->asArray()->where(['rol' => $rol])->findAll();
  }

  public function search($query)
  {
    
  
    return $this->like('nombre', $query)->findAll();
  }

}
