<?php

namespace App\Http\Controllers;

use App\Post;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('/home', compact('user'));
    }

//    public function generatePDF(){
//        $data = ['title' => 'Welcome to laravel'];
//        $pdf = PDF::loadView('generatePDF/myPDF', $data);
//        // If you want to store the generated pdf to the server then you can use the store function
//        $pdf->save(storage_path().'_filename.pdf');
//
//        // Finally, you can download the file using download function
//        return $pdf->download('myPDF.pdf');
//    }
}
