<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $books = Book::all();

        return view("admin.dashboard", compact("books"));
    }

    public function bookProgress(Request $req)
    {

        $req->validate([
            'judul' => 'required|unique:books,judul',
            'author' => 'required',
            'genre' => 'required',
            'halaman' => 'required|numeric',
            'foto' => ''
        ]);

        $data = [
            'judul' => $req->judul,
            'author' => $req->author,
            'genre' => $req->genre,
            'halaman' => $req->halaman,
            'foto' => $req->foto
        ];

        if($req->hasFile('foto')){
            $file = $req->file('foto');
            $fileName = Str::slug($req->judul) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('books', $fileName);
            $data['foto'] = $path;
        }

        Book::create($data);

        return redirect()->back();
    }

    public function bookEdit(Request $req, $id)
    {
        
        $req->validate([
            'judul' => 'required|unique:books,judul',
            'author' => 'required',
            'genre' => 'required',
            'halaman' => 'required|numeric',
            'foto' => ''
        ]);

        $books = Book::findOrFail($id);

        $data = [
            'judul' => $req->judul,
            'author' => $req->author,
            'genre' => $req->genre,
            'halaman' => $req->halaman,
            'foto' => $books->foto,
        ];

        if($req->hasFile('foto')){
            if($data['foto']){
                Storage::delete($data['foto']);
            }

            $fileName = Str::slug($req->judul) . '.' . $req->file('foto')->getClientOriginalExtension();
            $path = $req->file('foto')->storeAs('books', $fileName);
            $data['foto'] = $path;
        }

        $books->update($data);

        return redirect()->back();
    }

    public function delete($id)
    {   
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect()->back();
    }

}           