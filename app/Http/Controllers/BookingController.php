<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookingController extends Controller
{

    public function index(Request $request){
        return Inertia::render('Bookings', [
            'bookings' => Booking::where('user_id', $request->user()->id)->with('package')->get()
        ]);
    }

    public function admin(Request $request){
        return Inertia::render('Admin/Bookings', [
            'bookings' => Booking::with('package')->get()->all()
        ]);
    }

    public function edit(Request $request, $booking_id){
        return Inertia::render('Admin/BookingsEdit', [
            'booking' => Booking::where('id', $booking_id)->with('package')->get()->first()
        ]);
    }

    public function  booknow(Request $request)
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
        Booking::create([
            'start_date' => $start_date,
            'end_date' => $end_date,
            'guests' => $validated['guests'],
            'phone' => $validated['phone'],
            'special_requests' => $validated['special_requests'] ?? '',
            'user_id' => auth()->id(),
            'package_id' => $validated['package_id'],
        ]);
        return redirect()->route('bookings.confirm')->with('success', 'Booking created successfully!');

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

    public function confirm(){
        return Inertia::render('BookingConfirm');
    }
}
