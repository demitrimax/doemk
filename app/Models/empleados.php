<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class empleados
 * @package App\Models
 * @version August 3, 2019, 7:16 pm CDT
 *
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property string nombre
 * @property string apellidos
 * @property string curp
 */
class empleados extends Model
{
    use SoftDeletes;

    public $table = 'cat_empleados';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'apellidos',
        'rfc',
        'curp',
        'bajatemp',
        'fingreso',
        'fbaja',
        'fnacimiento',
        'nss',
        'foto',
        'comentario'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'        => 'integer',
        'nombre'    => 'string',
        'apellidos' => 'string',
        'curp'      => 'string',
        'rfc'       => 'string',
        'bajatemp'  => 'integer',
        'fingreso'  => 'date',
        'fbaja'     => 'date',
        'fnacimiento' => 'date',
        'nss'       => 'string',
        'foto'      => 'string',
        'comentario'=> 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function getUfotoAttribute()
    {
      $avatar = 'avatar/avatar.png';
      if ($this->foto){
        $avatar = $this->foto;
      }
      return $avatar;
    }

    public function documentos()
    {
      return $this->belongsToMany('App\Models\documentos', 'documentos_catempleados', 'empleado_id', 'documento_id');
    }


}
