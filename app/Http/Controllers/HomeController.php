<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Editora;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::all() ;

        return view('home', ['books'=>$books,'layout'=>'index']);
    }

    public function category()
    {
        $categories = Category::all() ;

        return view('home', ['categories'=>$categories, 'layout'=>'categories']);
    }
    
    public function addCategory(Request $request)
    {
        $category = new Category() ;

        $category->categoria = $request->input('categoria') ;
        $category->save();

        return redirect('/category');
    }

    public function editora()
    {
        $editoras = Editora::all() ;

        return view('home', ['editoras'=>$editoras, 'layout'=>'editoras']);
    }

    public function addEditora(Request $request)
    {
        $editora = new Editora() ;

        $editora->nome_editora = $request->input('nome_editora') ;
        $editora->save();

        return redirect('/editora');
    }
}
