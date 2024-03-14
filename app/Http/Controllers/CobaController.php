<?php

namespace App\Http\Controllers;

use App\Models\Coba;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CobaController extends Controller
{
    public function coba()
    {
        $cobas = Coba::all();

        return view('coba', compact('cobas'));
    }

    public function cobaProgress(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required | max:12 | unique:cobas',
            'kelas' => 'required'
        ]);

        Coba::create($validate);

        return redirect('coba');
    }
}
