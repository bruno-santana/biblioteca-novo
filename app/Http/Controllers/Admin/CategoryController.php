<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getHome($module)
    {
        $cats = Category::where('module', $module)->orderBy('name', 'Asc')->get();
        $data = ['cats' => $cats];
        return view('admin.pages.categories.index', $data);
    }

    public function index()
    {

    }

    public function create()
    {
    
    }

    public function store(StoreUpdateCategory $request)
    {
        Category::create($request->all());

        return back()->with('message', 'Categoria criada com sucesso.')->with('typealert', 'success');
    }

    public function show($id)
    {
        if (!$category = Category::find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.categories.show', compact('category'));
    }

    public function edit($id)
    {
        $cat = Category::find($id);
        $data = ['cat' => $cat];
        return view('admin.pages.categories.edit', $data);
    }
    
    public function update(StoreUpdateCategory $request, $id)
    {
        if (!$category = Category::find($id)) {
            return redirect()->back();
        }

        $category->update($request->all());

        return back()->with('message', 'Atualizado com sucesso.')->with('typealert', 'success');
    }
    public function destroy($id)
    {
        
    }

    public function getDelete($id)
    {
        $c = Category::find($id);
        if($c->delete()):
            return back()->with('message', 'Excluído com sucesso.')->with('typealert', 'danger');
        endif;
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $cats = Category::where(function($query) use ($request) {
            if ($request->filter) {
                $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                $query->orWhere('name', $request->filter);
            }
        })
        ->latest()
        ->paginate();

        return view('admin.pages.categories.index', compact('cats', 'filters'));
    }
}
