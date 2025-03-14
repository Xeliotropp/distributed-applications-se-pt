<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contractors;
use App\Http\Requests\ContractorsRequest;
use OpenApi\Annotations as OA;


class ContractorsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/contractors",
     *     summary="Retrieve all contractors",
     *     @OA\Response(
     *         response=200,
     *         description="List of contractors"
     *     )
     * )
     */
    // GET /api/contractors
    public function index()
    {
        $contractors = Contractors::all();
        return response()->json(['data' => $contractors], 200);
    }

    // GET /api/contractors/{id}
    public function show($id)
    {
        $contractor = Contractors::findOrFail($id);
        return response()->json(['data' => $contractor], 200);
    }

    // POST /api/contractors
    public function store(ContractorsRequest $request)
    {
        $validatedData = $request->validated();
        $contractor = Contractors::create($validatedData);

        return response()->json([
            'message' => 'Contractor created successfully!',
            'data' => $contractor
        ], 201);
    }

    // PUT /api/contractors/{id}
    public function update(ContractorsRequest $request, $id)
    {
        $validatedData = $request->validated();
        $contractor = Contractors::findOrFail($id);
        $contractor->update($validatedData);

        return response()->json([
            'message' => 'Contractor updated successfully!',
            'data' => $contractor
        ], 200);
    }

    // DELETE /api/contractors/{id}
    public function destroy($id)
    {
        $contractor = Contractors::findOrFail($id);
        $contractor->delete();

        return response()->json([
            'message' => 'Contractor deleted successfully!'
        ], 200);
    }

    public function searchContractors(Request $request)
    {
        $query = Contractors::query();

        if ($request->has('name')) {
            $query->where('contractor_name', 'LIKE', '%' . $request->input('name') . '%');
        }

        return response()->json($query->paginate(10)); // Returns paginated results
    }
}
