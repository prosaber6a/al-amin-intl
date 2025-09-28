<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Requests\AgentRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $agents = Agent::orderBy('created_at', 'desc')->get();
            return DataTables::of($agents)
                ->editColumn('photo', function ($agent) {
                    return Storage::temporaryUrl('uploads/agents/' . $agent->photo, now()->addMinutes(5));
                })
                ->editColumn('created_at', function ($agent) {
                    return $agent->created_at->format('j M Y, g:i a');
                })
                ->editColumn('updated_at', function ($agent) {
                    return $agent->created_at->format('j M Y, g:i a');
                })
                ->toJson();
        }
        return view('agent.index');
    }

    /**
     * Update the specified resource in storage.
     */
    private static function store_image($image): array
    {
        $image_name = time() . '.' . $image->extension();
        try {
            $path = Storage::putFileAs('uploads/agents', $image, $image_name);
        } catch (\Exception $exception) {
            // log file save error
            Log::error('Agent image upload error: ' . $exception->getMessage());
            return ['status' => false, 'error' => $exception->getMessage()];
        }

        return ['status' => true, 'name' => $image_name];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentRequest $request)
    {

        // Validation
        $validated = $request->validated();
        // get id
        $id = intval($validated['id']);
        //init image name
        $image_name = '';
        // set update or insert
        if ($validated['action'] === 'update' && $id > 0) {
            $agent = Agent::find($id);
            // set old image name
            $image_name = $agent->photo;

            if ($request->hasFile('photo')) {
                // delete old image
                if (Storage::exists('uploads/agents/' . $image_name)) {
                    try {
                        Storage::delete('uploads/users/' . $image_name);
                    } catch (\Exception $exception) {
                        // Log file delete error
                        Log::error('Agent image delete error: ' . $exception->getMessage());
                        return response()->json(['error' => 'An unexpected error occured while deleteing old image'], 500);
                    }
                }


                // store new image
                $store = $this::store_image($request->file('photo'));
                if (!$store['status']) {
                    return response()->json(['error' => 'An unexpected error occured while uploading new image'], 500);
                }

                //set image name
                $image_name = $store['name'];
            }
        } else {
            $agent = new Agent();
            if ($request->hasFile('photo')) {
                $store = $this::store_image($request->file('photo'));
                if (!$store['status']) {
                    return response()->json(['error' => 'An unexpected error occured while uploading new image'], 400);
                }

                //set image name
                $image_name = $store['name'];
            }
        }


        // set value
        $agent->name = $validated['name'];
        $agent->email = $validated['email'];
        $agent->address = $validated['address'];
        $agent->phone = $validated['phone'];
        $agent->status = $validated['status'];
        $agent->photo = $image_name;


        try {
            $agent->save();
        } catch (\Exception $exception) {
            // log file save error
            Log::error('Agent save error: ' . $exception->getMessage());
            // return response
            return response()->json(['error' => 'An unexpected error occured while inserting data'], 500);
        }

        return response()->json(['success' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agent $agent)
    {
        if ($agent->id) {
            $data = [
                'id' => $agent->id,
                'name' => $agent->name,
                'email' => $agent->email,
                'address' => $agent->address,
                'phone' => $agent->phone,
                'status' => $agent->status,
                'photo' => Storage::temporaryUrl('uploads/agents/' . $agent->photo, now()->addMinutes(5)),
            ];
            return response()->json($data, 200);
        }
        return response()->json(['error' => 'Agent not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
