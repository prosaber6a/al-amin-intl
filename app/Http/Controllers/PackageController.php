<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Models\Package;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $packages = Package::all();
            return DataTables::of($packages)
                ->addColumn('hotel', function ($data) {
                    return $data->hotel->name;
                })
                ->addColumn('flight', function ($data) {
                    return $data->flight->flight_no . '-' . $data->flight->airline;
                })
                ->editColumn('created_at', function ($data) {
                    return $data->created_at->format('j M Y, g:i a');
                })
                ->editColumn('updated_at', function ($data) {
                    return $data->created_at->format('j M Y, g:i a');
                })
                ->removeColumn('hotel_id')
                ->removeColumn('flight_id')
                ->toJson();
        }
        return view('package.index');
    }


    /**
     * Return hotel and flight list
     */
    public function hotelFlightList()
    {
        $hotels = \App\Models\Hotel::all(['id', 'name', 'room_type', 'room_capacity', 'price_per_night']);
        $flights = \App\Models\Flight::all(['id', 'flight_no', 'airline', 'departure', 'arrival']);

        return response()->json([
            'hotels' => $hotels,
            'flights' => $flights,
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PackageRequest $request)
    {
        // Validation
        $validated = $request->validated();
        // get id
        $id = intval($validated['id']);

        // set update or insert
        if ($validated['action'] === 'update' && $id > 0) {
            $flight = Package::find($id);
        } else {
            $flight = new Package();
        }

        // set value
        $flight->name = $validated['name'];
        $flight->type = $validated['type'];
        $flight->price = $validated['price'];
        $flight->duration = $validated['duration'];
        $flight->hotel_id = $validated['hotel_id'];
        $flight->flight_id = $validated['flight_id'];


        try {
            $flight->save();
        } catch (\Exception $exception) {
            // log file save error
            Log::error('Package save error: ' . $exception->getMessage());
            // return response
            return response()->json(['error' => 'An unexpected error occured while inserting data'], 500);
        }

        return response()->json(['success' => 'success'], 200);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        if ($package->id) {
            $data = [
                'id' => $package->id,
                'name' => $package->name,
                'type' => $package->type,
                'price' => $package->price,
                'duration' => $package->duration,
                'hotel_id' => $package->hotel_id,
                'flight_id' => $package->flight_id,
            ];
            return response()->json($data, 200);
        }
        return response()->json(['error' => 'Package not found'], 404);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        if ($package->id) {

            try {
                $package->delete();
            } catch (\Exception $exception) {
                // log file save error
                Log::error('Package delete error: ' . $exception->getMessage());
                // return response
                return response()->json(['error' => 'An unexpected error occured while deleting data'], 500);
            }

            return response()->json(['success' => 'success'], 200);
        }
        return response()->json(['error' => 'Package not found'], 404);
    }
}
