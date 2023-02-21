<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class jumlahPengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::all()->count();

        // dd($pengaduan);

        return view('User.landing', ['pengaduan' => $pengaduan]);
    }
}
