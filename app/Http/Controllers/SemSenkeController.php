<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SemSenke;


class SemSenkeController extends Controller
{
    public function index(SemSenke $sem)
    {
        $sems = $sem->get();
        return view('sem.index', compact('sems'));
    }

    public function show(SemSenke $sem){
        return view('sem.show', compact('sem'));
    }
}
