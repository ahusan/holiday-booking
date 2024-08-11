<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PackageController extends Controller
{
    public function index( Request $request ) {
        return Inertia::render('Packages', [
            'packages' => Package::all()
        ]);
    }

    public function  admin( Request $request ){
        return Inertia::render('Admin/Packages', [
            'packages' => Package::all()
        ]);
    }
}
