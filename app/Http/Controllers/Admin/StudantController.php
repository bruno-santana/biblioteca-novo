<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Studant;
use Illuminate\Http\Request;

class StudantController extends Controller
{
    public function index()
    {
        $studants = Studant::latest()->paginate(50);

        return view('admin.pages.studants.index', compact('studants'));
    }
    
    public function create()
    {
        return view('admin.pages.studants.create');
    }
    
    public function store(Request $request)
    {
        Studant::create($request->all());

        return back()->with('message', 'Irmão criado com sucesso.')->with('typealert', 'success');
    }
    
    public function show($id)
    {
        if (!$studant = Studant::find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.studants.show', compact('studant'));
    }
    
    public function edit($id)
    {
        if (!$studant = Studant::find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.studants.edit', compact('studant'));
    }

    public function postUpdate(Request $request, $id)
    {
        if (!$studant = Studant::find($id)) {
            return redirect()->back();
        }

        $studant->update($request->all());

        return back()->with('message', 'Atualizado com sucesso.')->with('typealert', 'success');
    }
    
    public function update(Request $request, $id)
    {
    
    }
    
    public function destroy($id)
    {
        $s = Studant::find($id);
        if($s->delete()):
            return back()->with('message', 'Excluído com sucesso.')->with('typealert', 'danger');
        endif;
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $studants = Studant::where(function($query) use ($request) {
            if ($request->filter) {
                $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                $query->orWhere('document', $request->filter);
            }
        })
        ->latest()
        ->paginate();

        return view('admin.pages.studants.index', compact('studants', 'filters'));
    }
}
