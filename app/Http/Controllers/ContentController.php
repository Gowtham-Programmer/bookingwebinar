<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    
    public function index()
    {
    $webinar = Webinar::latest()->first(); // or any logic
    return view('content', compact('webinar'));
    }
}
