<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $hotels = Hotel::all();
            return DataTables::of($hotels)
                ->editColumn('created_at', function ($agent) {
                    return $agent->created_at->format('j M Y, g:i a');
                })
                ->editColumn('updated_at', function ($agent) {
                    return $agent->created_at->format('j M Y, g:i a');
                })
                ->toJson();
        }
        return view('hotel.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelRequest $request)
    {
        // Validation
        $validated = $request->validated();
        // get id
        $id = intval($validated['id']);

        // set update or insert
        if ($validated['action'] === 'update' && $id > 0) {
            $hotel = Hotel::find($id);
        } else {
            $hotel = new Hotel();
        }

        // set value
        $hotel->name = $validated['name'];
        $hotel->location = $validated['location'];
        $hotel->room_type = $validated['room_type'];
        $hotel->room_capacity = $validated['room_capacity'];
        $hotel->price_per_night = $validated['price_per_night'];

        try {
            $hotel->save();
        } catch (\Exception $exception) {
            // log file save error
            Log::error('Hotel save error: ' . $exception->getMessage());
            // return response
            return response()->json(['error' => 'An unexpected error occured while inserting data'], 500);
        }

        return response()->json(['success' => 'success'], 200);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        if ($hotel->id) {
            $data = [
                'id' => $hotel->id,
                'name' => $hotel->name,
                'location' => $hotel->location,
                'room_type' => $hotel->room_type,
                'room_capacity' => $hotel->room_capacity,
                'price_per_night' => $hotel->price_per_night,
            ];
            return response()->json($data, 200);
        }
        return response()->json(['error' => 'Hotel not found'], 404);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        if ($hotel->id) {

            try {
                $hotel->delete();
            } catch (\Exception $exception) {
                // log file save error
                Log::error('Hotel delete error: ' . $exception->getMessage());
                // return response
                return response()->json(['error' => 'An unexpected error occured while deleting data'], 500);
            }

            return response()->json(['success' => 'success'], 200);
        }
        return response()->json(['error' => 'hotel not found'], 404);
    }
}
