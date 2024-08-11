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

    public function details( Request $request, int $packageId ): \Inertia\Response
    {
        $package = Package::find( $packageId );
        return Inertia::render('PackageDetails', [
            'package' => $package
        ]);
    }

    public function  admin( Request $request ){
        return Inertia::render('Admin/Packages', [
            'packages' => Package::all()
        ]);
    }
}
