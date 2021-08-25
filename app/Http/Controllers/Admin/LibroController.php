<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{    
    public function index()
    {
        $libros = Libro::latest()->paginate(50);

        foreach ($libros as $libro){
            $cat = Category::find($libro['category_id']);
            $libro['category'] = $cat['name'];
        }

        $lastId = Libro::max('id');
        $last = Libro::find($lastId);


        return view('admin.pages.libros.index', compact('libros','last'));
    } 
    public function create()
    { 
        $cats = Category::all();

        $data = [
            'cats' => $cats
        ];

        return view('admin.pages.libros.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $categoria = $data['category_id'];
        if ($data['category_id'] < 10){
            $categoria = "0".$data['category_id'];
        }

        $count =  (Libro::count('id')) + 1;

        $code = $categoria."-".$data['nationality']."-".$data['column']."-".$data['line']."-".$data['position']."-".$count;

        $data['code'] = $code;
        
        Libro::create($data);

        return back()->with('message', 'Livro adicionado com sucesso.')->with('typealert', 'success');
    }
    
    public function show($id)
    {
        //
    }
    
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
        
        $categoria = $data['category_id'];

        if ($data['category_id'] < 10){
            $categoria = "0".$data['category_id'];
        }

        $data['code'] = $categoria."-".$data['nationality']."-".$data['column']."-".$data['line']."-".$data['position']."-".$id;
        
        $libro->update($data);

        return redirect()->route('libros.index');
    }
    
    public function update($id)
    {
        
    }
    
    public function destroy($id)
    {
        if (!$libro = Libro::find($id)) {
            return redirect()->back();
        }

        if($libro->delete()):
            return back()->with('message', 'Excluído com sucesso.')->with('typealert', 'danger');
        endif;
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $libros = Libro::where(function($query) use ($request) {
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
