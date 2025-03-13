<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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

    public function createForm()
    {
        $coaches = Admin::all();
        return view('pages.eskul.create', [
            'coaches' => $coaches
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'admin_id' => 'required',
            'day' => 'required',
            'startTime' => 'required',
            'endTime' => 'required',
            'place' => 'required',
            'description' => 'nullable'
        ]);

        Eskul::create([
            'nama_eskul' => $request->input('name'),
            'admin_id' => $request->input('admin_id'),
            'hari' => $request->input('day'),
            'jam_mulai' => $request->input('startTime'),
            'jam_selesai' => $request->input('endTime'),
            'tempat' => $request->input('place'),
            'deskripsi' => $request->input('description')
        ]);

        return redirect('/eskul');
    }

    public function delete($id)
    {
        $eskul = Eskul::where('id', $id);
        $eskul->delete();

        return redirect('/eskul');
    }
}