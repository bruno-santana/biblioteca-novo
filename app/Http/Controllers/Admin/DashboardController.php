<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrowed;
use App\Models\Libro;
use App\Models\Studant;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalLibros = Libro::count();
        $totalStudants = Studant::count();
        $totalBorroweds = Borrowed::count();

        $hoje = (new \DateTime('now'))->format('Y-m-d');        
        $borroweds = Borrowed::orderBy('token_borrowed')->get();
        $atrasados = [];

        foreach($borroweds as $borrowed){
            $std = Studant::find($borrowed['studant_id']);
            $borrowed['studant_name'] = $std['name'];

            if($borrowed['token_returned'] <= $hoje){
                array_push($atrasados, $borrowed);
            } 
        }

        return view('admin.pages.dashboard.index', compact('totalUsers','totalStudants', 'totalLibros', 'totalBorroweds', 'atrasados'));
    }

}
