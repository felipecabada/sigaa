<?php

namespace App\Models;

use CodeIgniter\Model;

class CapacitacionModel extends Model
{

  protected $table = 'capacitacion';
  protected $primarykey = 'id';
  protected $allowedFields = [
    "titulo",
    "tipo",
    "lugar",
    "fecha_inicial",
    "fecha_final",
    "institucion",
    "modalidad",
    "duracion_horas",
    "nombre_instructor",
    "id_usuario",
    "evidencia",
    "estado"
  ];

  public function findCapacitacionesById($id)
  {

    return $this->asArray()->where(['id_usuario' => $id])->findAll();
  }

  public function findHoursById($id)
  {

    $db = db_connect();
    $query = $db->query('SELECT sum(duracion_horas) as "duracion_horas" , tipo FROM usuario INNER JOIN capacitacion on capacitacion.id_usuario= usuario.id WHERE usuario.id = ' . $id . ' AND capacitacion.estado = "Aceptado" group by capacitacion.tipo ');

    return $query->getResultArray();
  }
}
