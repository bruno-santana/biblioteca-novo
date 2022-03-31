<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowed;
use App\Models\Libro;
use App\Models\Returned;
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
        if(Returned::where('borrowed_id', $borrowed['id'])->first()){
          $borrowed['situation'] = 'DEVOLVIDO';
        } else {
          $borrowed['situation'] = 'ATRASADO';
        }
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
    $libros = Libro::orderBy('name')->pluck('name', 'id');
    $users = User::orderBy('name')->pluck('name', 'id');
    $studants = Studant::orderBy('name')->pluck('name', 'id');
    $data = [ 
      'libros' => $libros,
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
    try {
      $filters = $request->only('filter');
      $borroweds = Borrowed::where(function($query) use ($request) {
        if ($request->filter) {
          $query->orWhere('name_std', 'LIKE', "%{$request->filter}%");
        }
      })
      ->latest()
      ->paginate();
      return view('admin.pages.borroweds.index', compact('borroweds', 'filters'));

    } catch (\Illuminate\Database\QueryException $ex) {
      return back()->with('message', 'Empréstimo não localizado para o irmão informado. Verifique o nome informado e tente novamente')->with('typealert', 'danger');
    }
  }
    
  public function giveBack($id)
  {
    $borrowed = Borrowed::find($id);
    
    if (!$borrowed) {
      return redirect()->back();
    }
    
    $data = [
      'borrowed_id' => $borrowed->id,
      'return_confirmation' => new \DateTime()
    ];
    
    Returned::create($data);

    return back()->with('message', 'Devolvido com sucesso.')->with('typealert', 'success');
  }
}
