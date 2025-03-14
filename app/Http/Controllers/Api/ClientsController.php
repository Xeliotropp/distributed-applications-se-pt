<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class ClientsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/clients",
     *     summary="Get a list of all clients",
     *     tags={"Clients"},
     *     @OA\Response(
     *         response=200,
     *         description="List of clients",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Client")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     ),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function index()
    {
        return response()->json(Clients::all());
    }

    /**
     * @OA\Get(
     *     path="/api/clients/{id}",
     *     summary="Get a specific client by ID",
     *     tags={"Clients"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the client",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Client found",
     *         @OA\JsonContent(ref="#/components/schemas/Client")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Client not found"
     *     ),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function show($id)
    {
        $client = Clients::find($id);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }
        return response()->json($client);
    }

    /**
     * @OA\Post(
     *     path="/api/clients",
     *     summary="Create a new client",
     *     tags={"Clients"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "phone"},
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="phone", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Client created",
     *         @OA\JsonContent(ref="#/components/schemas/Client")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function store(Request $request)
    {
        $client = Clients::create($request->all());
        return response()->json($client, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/clients/{id}",
     *     summary="Update an existing client",
     *     tags={"Clients"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the client",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "phone"},
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="phone", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Client updated",
     *         @OA\JsonContent(ref="#/components/schemas/Client")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function update(Request $request, $id)
    {
        $client = Clients::find($id);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $client->update($request->all());
        return response()->json($client);
    }

    /**
     * @OA\Delete(
     *     path="/api/clients/{id}",
     *     summary="Delete a client",
     *     tags={"Clients"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the client",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Client deleted"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Client not found"
     *     ),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function destroy($id)
    {
        $client = Clients::find($id);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }
        $client->delete();
        return response()->json(['message' => 'Client deleted']);
    }
}
