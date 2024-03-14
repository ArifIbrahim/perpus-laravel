<?php

namespace App\Http\Controllers;

use App\Models\Tes;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TesController extends Controller
{
    public function tes()
    {
        $data = Tes::all();

        return view('tes', compact('data'));
    }

    public function tesProgress(Request $req)
    {
        $data = [
            'judul'=>$req->input('judul'),
            'author'=>$req->input('author'),
            'genre'=>$req->input('genre')
        ];

        Tes::create($data);

        return redirect()->back();
    }
    
    public function tesEdit(Request $req, $id){
        $tes = Tes::findOrFail($id);

        $data = [
            'judul'=>$req->input('judul'),
            'author'=>$req->input('author'),
            'genre'=>$req->input('genre')
        ];

        $tes->update($data);

        return redirect()->back();
    }
}
