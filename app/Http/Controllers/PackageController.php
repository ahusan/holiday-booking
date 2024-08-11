<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Carbon\Carbon;
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

    public function  add( Request $request ){
        return Inertia::render('Admin/PackageCreate');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
//            'package_id' => 'required|exists:packages,id',
//            'description' => 'required|string',
            'destination' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
            'inclusions' => 'required|array',
            'exclusions' => 'required|array',
            'itinerary' => 'required|array',
            'max_participants' => 'required|integer',
        ]);

        $package = Package::create([
            'title' => $request->get('title'),
            'guests' => $request->get('guests'),
            'phone' => $request->get('phone'),
            'special_requests' => $request->get('special_requests') ?? '',
            'user_id' => auth()->id(),
//            'package_id' => $validated['package_id'],
//            'description' => $validated['description'],
            'destination' => $validated['destination'],
            'price' => $validated['price'],
            'duration' => $validated['duration'],
            'inclusions' => json_encode($validated['inclusions']),
            'exclusions' => json_encode($validated['exclusions']),
            'itinerary' => json_encode($validated['itinerary']),
            'max_participants' => $validated['max_participants'],
        ]);
        return redirect()->route('admin.packages')->with('success', 'Package created successfully!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'check_in' => 'required|date',
            'guests' => 'required|integer',
            'phone' => 'required|string',
            'special_requests' => 'nullable|string',
            'package_id' => 'required|exists:packages,id',
        ]);

        $package = Package::findOrFail($request->get('package_id'));
        if(!$package){
            return Inertia::render('packages')->with('error', 'Package not found');
        }
        $duration = $package->duration;

        $start_date = Carbon::parse($request->get('check_in'));
        $end_date = $start_date->copy()->addDays($duration);
        $booking = Booking::find($request->get('booking_id'))->update([
            'start_date' => $start_date,
            'end_date' => $end_date,
            'guests' => $validated['guests'],
            'phone' => $validated['phone'],
            'special_requests' => $validated['special_requests'] ?? '',
            'user_id' => auth()->id(),
            'package_id' => $validated['package_id'],
        ]);
        return redirect()->route('admin.bookings')->with('success', 'Booking updated successfully!');
    }


}
