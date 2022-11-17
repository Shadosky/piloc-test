<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function listAll()
    {
        $esates = Estate::all();
        return response()->json([
            'status' => 'success',
            'esates' => $esates
        ]);
    }
}
