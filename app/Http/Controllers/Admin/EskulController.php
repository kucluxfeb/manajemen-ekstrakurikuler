<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EskulController extends Controller
{
    public function index()
    {
        $eskuls = Eskul::with('admin')->get();

        return view(view: 'pages.eskul.index', data: [
            "eskuls" => $eskuls
        ]);
    }
}