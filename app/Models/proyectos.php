<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class proyectos
 * @package App\Models
 * @version April 15, 2019, 1:17 pm UTC
 *
 * @property \App\Models\CatContratista catCotratistas
 * @property \App\Models\CatPaisDivision catPaisDivision
 * @property \App\Models\CatAreaciudad catAreaciudad
 * @property \App\Models\CatProducto catProductos
 * @property \App\Models\CatEstatus estatus
 * @property \Illuminate\Database\Eloquent\Collection
 * @property string nombre
 * @property string supervidor
 * @property string|\Carbon\Carbon finicio
 * @property string|\Carbon\Carbon ftermino
 * @property string identificacion
 * @property integer cat_cotratistas_id
 * @property integer cat_pais-division_id
 * @property integer cat_areaciudad_id
 * @property integer cat_productos_id
 * @property string estatus_id
 */
class proyectos extends Model
{
    use SoftDeletes;
    public $table = 'proyectos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nombre',
        'supervisor',
        'finicio',
        'ftermino',
        'identificacion',
        'identifi_text',
        'cat_cotratistas_id',
        'cat_paisdivision_id',
        'cat_areaciudad_id',
        'cat_productos_id',
        'estatus_id',
        'observaciones',
        'generico',
        'terminado',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'supervisor' => 'string',
        'finicio' => 'datetime',
        'ftermino' => 'datetime',
        'identificacion' => 'string',
        'identifi_text'   => 'string',
        'cat_cotratistas_id' => 'integer',
        'cat_paisdivision_id' => 'integer',
        'cat_areaciudad_id' => 'integer',
        'cat_productos_id' => 'integer',
        'estatus_id' => 'string',
        'observaciones' => 'string',
        'generico' => 'string',
        'terminado' => 'date',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'supervisor' => 'required',
        'cat_cotratistas_id' => 'required',
        'cat_paisdivision_id' => 'required',
        'cat_areaciudad_id' => 'required',
        'cat_productos_id' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function catContratista()
    {
        return $this->belongsTo(\App\Models\contratistas::class, 'cat_cotratistas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function catPaisDivision()
    {
        return $this->belongsTo(\App\Models\catpaisdivision::class, 'cat_paisdivision_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function catAreaciudad()
    {
        return $this->belongsTo(\App\Models\catareaciudad::class, 'cat_areaciudad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function catProducto()
    {
        return $this->belongsTo(\App\Models\catproductos::class, 'cat_productos_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function catestatus()
    {
        return $this->belongsTo('App\catestatus', 'estatus_id');
    }
    public function documentos()
    {
      return $this->belongsToMany('App\Models\documentos');
    }

    public function getFolioAttribute()
    {
      $formatFolio = '#'.$this->created_at->format('y').$this->created_at->format('m').str_pad($this->id,4,"0",STR_PAD_LEFT);
      //cambio de formato de folio dependiendo si el proyecto es generico
      if ($this->generico == 1)
      {
        $formatFolio = 'G'.$this->ftermino->format('y').$this->ftermino->format('m').str_pad($this->id,4,"0",STR_PAD_LEFT);
      }
      return $formatFolio;
    }

    public function getEstatusdateAttribute()
    {
      $fechaTermino = Carbon::parse($this->ftermino);
      $fechaActual = Carbon::parse(date('Y-m-d'));

      $diasDiferencia = $fechaActual->diffInDays($fechaTermino, false);
      $valor = "";
      $desc = "";
      if ($diasDiferencia < 0 ) {
        $valor = "danger";
        $desc = "Vencido tiene ".$diasDiferencia." días.";
      }
      if ($diasDiferencia >= 0 && $diasDiferencia < 5 ) {
        $valor = "warning";
        $desc = "Por terminar plazo, le quedan ".$diasDiferencia." días.";
      }
      if ($diasDiferencia >= 5 ) {
          $valor = "success";
          $desc = "En tiempo, le quedan ".$diasDiferencia." días.";
        }
      if ($this->estatus_id == 'T'){
        $valor = "info";
        $desc = "Proyecto Terminado.";
      }

        $estatus = ['valor' => $valor, 'descripcion' => $desc ,'diferencia' => $diasDiferencia];

      return $estatus;
    }
    public function getDuracionproyAttribute()
    {
      $fechaTermino = Carbon::parse($this->ftermino);
      $fechaInicio = Carbon::parse($this->finicio);
      $diasDiferencia = $fechaInicio->diffInDays($fechaTermino, false);

      return $diasDiferencia;
    }

}
