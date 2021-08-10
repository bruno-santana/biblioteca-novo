<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Libro;
use PhpParser\Node\Expr\AssignOp\Concat;

class LibroController extends Controller
{

    public function __construct(Libro $libro)
    {
        $this->repository = $libro;

        //$this->middleware(['can:libros']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$libros = $this->repository->latest()->paginate();

        return view('admin.pages.libros.index', compact('libros'));*/

        $libros = Libro::all();

        foreach ($libros as $libro){
            $cat = Category::find($libro['category_id']);
            $libro['category'] = $cat['name'];
        }

        $lastId = Libro::max('id');
        $last = Libro::find($lastId);


        return view('admin.pages.libros.index', compact('libros','last'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        
        //$cats = Category::where('module', '0')->pluck('name', 'id');
        $cats = Category::all();

        $data = [
            'cats' => $cats
        ];

        return view('admin.pages.libros.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($data['category_id'] < 10){
            $categoria = "0".$data['category_id'];
        }

        $count =  (Libro::count('id')) + 1;

        $code = $categoria."-".$data['nationality']."-".$data['column']."-".$data['line']."-".$data['position']."-".$count;

        $data['code'] = $code;
        
        Libro::create($data);

        return back()->with('message', 'Livro adicionado com sucesso.')->with('typealert', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $l = Libro::findOrFail($id);
        $cats = Category::all();
        $data = ['cats' => $cats, 'l' => $l ];

        return view('admin.pages.libros.edit', $data);
    }

    public function postUpdate(Request $request, $id)
    {
        if (!$libro = Libro::find($id)) {
            return redirect()->back();
        }

        $data = $request->all();
        
        $libro->update($data);

        return redirect()->route('libros.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$libro = $this->repository->find($id)) {
            return redirect()->back();
        }

        if($libro->delete()):
            return back()->with('message', 'Excluído com sucesso.')->with('typealert', 'danger');
        endif;
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $libros = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('code', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        $lastId = Libro::max('id');
        $last = Libro::find($lastId);

        return view('admin.pages.libros.index', compact('libros', 'filters', 'last'));
    }
}
