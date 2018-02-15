<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SemJidian;


class SemJidianController extends Controller
{
    public function index(SemJidian $sem)
    {
        $sems = $sem->get();
        return view('sem.index', compact('sems'));
    }

    public function show(SemJidian $sem){
        return view('sem.show', compact('sem'));
    }

}
