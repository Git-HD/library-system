<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Editora;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {

        $books = Book::all() ;

        return view('home', ['books'=>$books,'layout'=>'index']);
    }

    public function create()
    {
        $books = Book::all();
        $categories = Category::all() ;
        $editoras = Editora::all() ;
        
        return view('home',['books'=>$books, 'categories'=>$categories, 'editoras'=>$editoras, 'layout'=>'create']);
    }

    public function store(Request $request)
    {
        $book = new Book() ;
        $book->autor = auth()->user()->name;
        $book->genero = $request->input('genero') ;
        $book->editora = $request->input('nome_editora') ;
        $book->titulo = $request->input('titulo') ;
        $book->ano_lancamento = $request->input('ano_lancamento') ;
        $book->save() ;
        return redirect('/home') ;
    }

    public function edit($id)
    {
      $book = Book::find($id);
      $books = Book::all() ;
      $categories = Category::all() ;
      $editoras = Editora::all() ;
      return view('home',['books'=>$books,'book'=>$book, 'categories'=>$categories, 'editoras'=>$editoras,'layout'=>'edit']);

    }

    public function update(Request $request, $id)
    {
      $book = Book::find($id);
      $book->autor = $request->input('autor') ;
      $book->genero = $request->input('genero') ;
      $book->editora = $request->input('nome_editora') ;
      $book->titulo = $request->input('titulo') ;
      $book->ano_lancamento = $request->input('ano_lancamento') ;
      $book->save() ;
      return redirect('/home') ;
    }

    public function delete($id) 
    {

      $book = Book::find($id);

      $book->delete();

      return redirect('/home');

    }
}
