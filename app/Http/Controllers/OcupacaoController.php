<?php

namespace App\Http\Controllers;

use App\Models\Ocupacao;
use Illuminate\Http\Request;

class OcupacaoController extends Controller
{
    // ...existing code...

    public function search(Request $request)
    {
        $search = $request->query('search', '');
        return Ocupacao::where('title', 'like', "%{$search}%")->get(['id', 'title']);
    }

    // ...existing code...
}