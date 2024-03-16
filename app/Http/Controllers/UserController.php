<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commude\Services\UserService;
use App\Http\Requests\CreateUserValidator;

class UserController extends Controller
{
    public function __construct(public UserService $service) {}
   /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->service->find($request->all());

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserValidator $request)
    {
        try {
            $data = $this->service->create(data:$request->all());
            return response()->json($data, 200);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 422);
        }   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->service->findById(id:$id);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $this->service->update(id: $id, data:$request->all());
            return response()->json(['message' => 'Update success'], 200);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 422);
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = $this->service->delete(id: $id);
            return response()->json($data, 200);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 422);
        } 
    }
}
