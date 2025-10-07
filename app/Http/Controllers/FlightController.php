<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightRequest;
use App\Models\Flight;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $flights = Flight::all();
            return DataTables::of($flights)
                ->editColumn('created_at', function ($data) {
                    return $data->created_at->format('j M Y, g:i a');
                })
                ->editColumn('updated_at', function ($data) {
                    return $data->created_at->format('j M Y, g:i a');
                })
                ->toJson();
        }
        return view('flight.index');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(FlightRequest $request)
    {
        // Validation
        $validated = $request->validated();
        // get id
        $id = intval($validated['id']);

        // set update or insert
        if ($validated['action'] === 'update' && $id > 0) {
            $flight = Flight::find($id);
        } else {
            $flight = new Flight();
        }

        // set value
        $flight->flight_no = $validated['flight_no'];
        $flight->airline = $validated['airline'];
        $flight->from = $validated['from'];
        $flight->to = $validated['to'];
        $flight->departure = date('Y-m-d H:i:s', strtotime($validated['departure']));
        $flight->arrival = date('Y-m-d H:i:s', strtotime($validated['arrival']));
        $flight->price = $validated['price'];


        try {
            $flight->save();
        } catch (\Exception $exception) {
            // log file save error
            Log::error('Flight save error: ' . $exception->getMessage());
            // return response
            return response()->json(['error' => 'An unexpected error occured while inserting data'], 500);
        }

        return response()->json(['success' => 'success'], 200);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flight $flight)
    {
        if ($flight->id) {
            $data = [
                'id' => $flight->id,
                'flight_no' => $flight->flight_no,
                'airline' => $flight->airline,
                'from' => $flight->from,
                'to' => $flight->to,
                'departure' => date('Y-m-d H:i', strtotime($flight->departure)),
                'arrival' => date('Y-m-d H:i', strtotime($flight->arrival)),
                'price' => $flight->price,
            ];
            return response()->json($data, 200);
        }
        return response()->json(['error' => 'Flight not found'], 404);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        if ($flight->id) {

            try {
                $flight->delete();
            } catch (\Exception $exception) {
                // log file save error
                Log::error('Flight delete error: ' . $exception->getMessage());
                // return response
                return response()->json(['error' => 'An unexpected error occured while deleting data'], 500);
            }

            return response()->json(['success' => 'success'], 200);
        }
        return response()->json(['error' => 'hotel not found'], 404);
    }
}
