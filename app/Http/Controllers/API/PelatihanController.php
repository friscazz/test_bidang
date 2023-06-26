<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\pelatihanResource;
use App\Models\Pelatihan;
use Illuminate\Http\Request;


class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pelatihan::latest()->get();
        return response()->json([pelatihanResource::collection($data), 'Pelatihan fetched.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_pelatihan' => 'required|string|max:255',
            'jenis_pelatihan' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $pelatihan = Pelatihan::create([
            'nama_pelatihan' => $request->nama_pelatihan,
            'jenis_pelatihan' => $request->jenis_pelatihan
         ]);
        
        return response()->json(['Pelatihan created successfully.', new pelatihanResource($pelatihan)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelatihan = Pelatihan::find($id);
        if (is_null($pelatihan)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new pelatihanResource($pelatihan)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelatihan $pelatihan)
    {
        $validator = Validator::make($request->all(),[
            'nama_pelatihan' => 'required|string|max:255',
            'jenis_pelatihan' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $pelatihan->nama_pelatihan = $request->nama_pelatihan;
        $pelatihan->jenis_pelatihan = $request->jenis_pelatihan;
        $pelatihan->save();
        
        return response()->json(['Pelatihan updated successfully.', new pelatihanResource($pelatihan)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelatihan $pelatihan)
    {
        $pelatihan->delete();

        return response()->json('Pelatihan deleted successfully');
    }
}
