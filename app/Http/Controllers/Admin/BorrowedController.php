<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowed;
use App\Models\Libro;
use App\Models\Studant;
use App\User;

class BorrowedController extends Controller
{
    public function index()
    {
        $hoje = (new \DateTime('now'))->format('Y-m-d');
        
        $borroweds = Borrowed::latest()->paginate(50);

        foreach($borroweds as $borrowed){
            $std = Studant::find($borrowed['studant_id']);
            $borrowed['studant_name'] = $std['name'];

            if($borrowed['token_returned'] <= $hoje){
                $borrowed['situation'] = 'ATRASADO';
            } else {
                $devolucao = new \DateTime($borrowed['token_returned']);
                $hoje   = new \DateTime($hoje);                
                $dateDiff = $devolucao->diff($hoje);
                
                $borrowed['situation'] = 'devolver em '.$dateDiff->d.' dias';
            }
        }

        return view('admin.pages.borroweds.index', compact('borroweds'));
    }

    public function create()
    {
        $libros = Libro::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $studants = Studant::pluck('name', 'id');
        $data = [ 'libros' => $libros,
                'users' => $users,
                'studants' => $studants,
    ];
        return view('admin.pages.borroweds.create', $data);
    }

    
    public function store(Request $request)
    {
        Borrowed::create($request->all());

        return back()->with('message', 'Livro emprestado com sucesso.')->with('typealert', 'success');
    }

    public function destroy($id)
    {
        if (!$borrowed = Borrowed::find($id)) {
            return redirect()->back();
        }

        if($borrowed->delete()):
            return back()->with('message', 'Excluído com sucesso.')->with('typealert', 'danger');
        endif;
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $borroweds = Borrowed::where(function($query) use ($request) {
            if ($request->filter) {
                $query->orWhere('name_std', 'LIKE', "%{$request->filter}%");
            }
        })
        ->latest()
        ->paginate();

        return view('admin.pages.borroweds.index', compact('borroweds', 'filters'));
    }

    public function searchLibros(Request $request)
    {

    }
}
