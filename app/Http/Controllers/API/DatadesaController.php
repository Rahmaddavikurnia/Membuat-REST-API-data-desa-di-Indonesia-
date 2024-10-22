<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Models\Village;

class DatadesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Village::all();
        return response()->json([
            'status'=>'succes',
            'data'=>$data
        ], 200);
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
        $validate = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'code' => 'required|max:10|unique:indonesia_villages,code',
            'district_code' => 'required|max:7|exists:indonesia_districts,code',
        ]);

        if ($validate->fails()){
            return response()->json([
                'status' => 'Errors',
                'message' => $validate->errors()
            ], 400);
        }

        $data = Village::create($request->all());
        return response()->json([
            'status' => 'Successfully created',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Village::find($id);
        return response()->json([
            'status' => 'Successfully retrieved',
            'data' => $data
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Village::find($id);
        $data->update($request->all());
        return response()->json([
            'status' => 'Successfully updated',
            'data' => $data
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Village::find($id);
        $data -> delete();
        return response()->json([
            'status' => 'Successfully deleted',
            'data' => $data
        ], 200);
    }
}
