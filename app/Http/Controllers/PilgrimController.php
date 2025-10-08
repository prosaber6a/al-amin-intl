<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Group;
use App\Models\Package;
use App\Models\Pilgrim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PilgrimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $date = Pilgrim::select(['id', 'given_name', 'sure_name', 'passport_no', 'agent_id', 'type', 'created_at', 'updated_at'])->orderBy('created_at', 'desc')->get();
            return DataTables::of($date)
                ->addColumn('agent', function ($_data) {
                    return $_data->agent ? $_data->agent->name : 'N/A';
                })
                ->editColumn('created_at', function ($_data) {
                    return $_data->created_at->format('j M Y, g:i a');
                })
                ->editColumn('updated_at', function ($_data) {
                    return $_data->created_at->format('j M Y, g:i a');
                })
                ->removeColumn('agent_id')
                ->addIndexColumn()
                ->toJson();
        }
        return view('pilgrim.index');
    }

    /**
     * Return agent, group and package list
     */
    public function agentGroupPackageList()
    {
        try {
            $agents = Agent::select(['id', 'name'])->orderBy('name', 'asc')->get();
            $groups = Group::select(['id', 'name'])->orderBy('name', 'asc')->get();
            $packages = Package::select(['id', 'name'])->orderBy('name', 'asc')->get();

            return response()->json([
                'status' => 'success',
                'agents' => $agents,
                'groups' => $groups,
                'packages' => $packages,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching agent, group, and package list for pilgirm create: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch data. Please try again later.',
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pilgrim $pilgrim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pilgrim $pilgrim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pilgrim $pilgrim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pilgrim $pilgrim)
    {
        //
    }
}
