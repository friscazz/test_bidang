<?php

namespace App\Http\Controllers\API;
use App\Http\Resources\dashboardResource;
use App\Models\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $data = Dashboard::latest()->get();
        return response()->json([dashboardResource::collection($data), 'Dashboard fetched.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $dashboard = Dashboard::create([
            'pelatihan_id' => $request->pelatihan_id,
            'user_id' => $request->user_id,
            'status' => $request->status,
           
         ]);
        
        return response()->json(['Pelatihan created successfully.', new dashboardResource($dashboard)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dashboard = Dashboard::find($id)->sum('id');
        if (is_null($dashboard)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new dashboardResource($dashboard)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        
    }
}
