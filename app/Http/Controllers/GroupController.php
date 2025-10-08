<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Group::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->editColumn('created_at', function ($_data) {
                    return $_data->created_at->format('j M Y, g:i a');
                })
                ->editColumn('updated_at', function ($_data) {
                    return $_data->created_at->format('j M Y, g:i a');
                })
                ->addIndexColumn()
                ->toJson();
        }
        return view('group.index');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupRequest $request)
    {
        // Validation
        $validated = $request->validated();
        // get id
        $id = intval($validated['id']);

        // set update or insert
        if ($validated['action'] === 'update' && $id > 0) {
            $group = Group::find($id);
        } else {
            $group = new Group();
        }

        // set value
        $group->name = $validated['name'];
        $group->leader = $validated['leader'];
        $group->mobile = $validated['mobile'];

        try {
            $group->save();
        } catch (\Exception $exception) {
            // log file save error
            Log::error('Group save error: ' . $exception->getMessage());
            // return response
            return response()->json(['error' => 'An unexpected error occured while inserting data'], 500);
        }

        return response()->json(['success' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        if ($group->id) {
            $data = [
                'id' => $group->id,
                'name' => $group->name,
                'leader' => $group->leader,
                'mobile' => $group->mobile
            ];
            return response()->json($data, 200);
        }
        return response()->json(['error' => 'Group not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        if ($group->id) {

            try {
                $group->delete();
            } catch (\Exception $exception) {
                // log file save error
                Log::error('Group delete error: ' . $exception->getMessage());
                // return response
                return response()->json(['error' => 'An unexpected error occured while deleting data'], 500);
            }

            return response()->json(['success' => 'success'], 200);
        }
        return response()->json(['error' => 'Group not found'], 404);
    }
}
