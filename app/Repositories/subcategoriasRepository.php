<?php

namespace App\Repositories;

use App\Models\subcategorias;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class subcategoriasRepository
 * @package App\Repositories
 * @version November 21, 2019, 9:36 am CST
 *
 * @method subcategorias findWithoutFail($id, $columns = ['*'])
 * @method subcategorias find($id, $columns = ['*'])
 * @method subcategorias first($columns = ['*'])
*/
class subcategoriasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'imagen',
        'categoria_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return subcategorias::class;
    }
}
