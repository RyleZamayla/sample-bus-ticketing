<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index()
    {
        $data = Dispatcher::with('terminal:id,name')->get();
        return view('admin.sample.index', compact('data'));
    }

}
