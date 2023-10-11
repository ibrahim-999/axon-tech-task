<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(): \Illuminate\View\View|\Laravel\Lumen\Application
    {
        return view('index');
    }

    //
}
