<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesubcategoriasRequest;
use App\Http\Requests\UpdatesubcategoriasRequest;
use App\Repositories\subcategoriasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class subcategoriasController extends AppBaseController
{
    /** @var  subcategoriasRepository */
    private $subcategoriasRepository;

    public function __construct(subcategoriasRepository $subcategoriasRepo)
    {
        $this->subcategoriasRepository = $subcategoriasRepo;
        $this->middleware('permission:subcategorias-list');
        $this->middleware('permission:subcategorias-create', ['only' => ['create','store']]);
        $this->middleware('permission:subcategorias-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:subcategorias-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the subcategorias.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subcategoriasRepository->pushCriteria(new RequestCriteria($request));
        $subcategorias = $this->subcategoriasRepository->all();

        return view('subcategorias.index')
            ->with('subcategorias', $subcategorias);
    }

    /**
     * Show the form for creating a new subcategorias.
     *
     * @return Response
     */
    public function create()
    {
        $categorias = \App\Models\categorias::pluck('nombre', 'id');
        return view('subcategorias.create')->with(compact('categorias'));
    }

    /**
     * Store a newly created subcategorias in storage.
     *
     * @param CreatesubcategoriasRequest $request
     *
     * @return Response
     */
    public function store(CreatesubcategoriasRequest $request)
    {
        $input = $request->all();

        $subcategorias = $this->subcategoriasRepository->create($input);

        Flash::success('Subcategorias guardado correctamente.');
        Alert::success('Subcategorias guardado correctamente.');

        return redirect(route('subcategorias.index'));
    }

    /**
     * Display the specified subcategorias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subcategorias = $this->subcategoriasRepository->findWithoutFail($id);

        if (empty($subcategorias)) {
            Flash::error('Subcategorias no encontrado');
            Alert::error('Subcategorias no encontrado.');

            return redirect(route('subcategorias.index'));
        }

        return view('subcategorias.show')->with('subcategorias', $subcategorias);
    }

    /**
     * Show the form for editing the specified subcategorias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subcategorias = $this->subcategoriasRepository->findWithoutFail($id);

        if (empty($subcategorias)) {
            Flash::error('Subcategorias no encontrado');
            Alert::error('Subcategorias no encontrado');

            return redirect(route('subcategorias.index'));
        }
        $categorias = \App\Models\categorias::pluck('nombre', 'id');
        return view('subcategorias.edit')->with(compact('subcategorias', 'categorias'));
    }

    /**
     * Update the specified subcategorias in storage.
     *
     * @param  int              $id
     * @param UpdatesubcategoriasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesubcategoriasRequest $request)
    {
        $subcategorias = $this->subcategoriasRepository->findWithoutFail($id);

        if (empty($subcategorias)) {
            Flash::error('Subcategorias no encontrado');
            Alert::error('Subcategorias no encontrado');

            return redirect(route('subcategorias.index'));
        }

        $subcategorias = $this->subcategoriasRepository->update($request->all(), $id);

        Flash::success('Subcategorias actualizado correctamente.');
        Alert::success('Subcategorias actualizado correctamente.');

        return redirect(route('subcategorias.index'));
    }

    /**
     * Remove the specified subcategorias from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subcategorias = $this->subcategoriasRepository->findWithoutFail($id);

        if (empty($subcategorias)) {
            Flash::error('Subcategorias no encontrado');
            Alert::error('Subcategorias no encontrado');

            return redirect(route('subcategorias.index'));
        }

        $this->subcategoriasRepository->delete($id);

        Flash::success('Subcategorias borrado correctamente.');
        Alert::success('Subcategorias borrado correctamente.');

        return redirect(route('subcategorias.index'));
    }

    public function subcategoriasByCategoria($id)
    {
      $subcategorias = \App\Models\subcategorias::where('categoria_id',$id)->get();

      return $subcategorias;
    }
}
