<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MinatBakatController extends Controller
{
    public function create()
    {
        return view('formulir.minatbakat');

    }

    public function store(Request $request)
    {
        // Sementara hanya redirect balik
        return back()->with('success', 'Formulir berhasil dikirim!');
    }
}

