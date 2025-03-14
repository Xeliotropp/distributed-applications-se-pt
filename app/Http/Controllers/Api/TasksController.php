<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\Clients;
use App\Models\Contractors;
use App\Http\Requests\TasksRequest;
use OpenApi\Annotations as OA;


class TasksController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/tasks",
     *     summary="Retrieve all tasks",
     *     @OA\Response(
     *         response=200,
     *         description="List of tasks"
     *     )
     * )
     */
    /**
     * GET /api/tasks
     */
    // In TasksController.php
    public function index()
    {
        $tasks = Tasks::all();
        return response()->json(['data' => $tasks], 200);
    }

    /**
     * GET /api/tasks/{id}
     */
    public function show($id)
    {
        $task = Tasks::with(['clients', 'contractors'])->findOrFail($id);
        return response()->json(['data' => $task], 200);
    }

    /**
     * POST /api/tasks
     */
    public function store(TasksRequest $request)
    {
        $task = new Tasks($request->validated());

        // Process boolean fields and convert them to string '1' or '0'
        $booleanFields = [
            'mk',
            'mkcold',
            'osv',
            'osvEvak',
            'sh',
            'shobSgr',
            'shokolSr',
            'vent',
            'klim',
            'f0',
            'z',
            'm',
            'izol',
            'dtz',
            'mk_next',
            'mkcold_next',
            'osv_next',
            'osvEvak_next',
            'sh_next',
            'shobSgr_next',
            'shokolSr_next',
            'vent_next',
            'klim_next',
            'f0_next',
            'z_next',
            'm_next',
            'izol_next',
            'dtz_next',
            'paid'
        ];

        foreach ($booleanFields as $field) {
            $task->$field = $request->has($field) && $request->$field ? '1' : '0';
        }

        $task->save();

        return response()->json([
            'message' => 'Task created successfully!',
            'data' => $task
        ], 201);
    }

    /**
     * PUT /api/tasks/{id}
     */
    public function update(TasksRequest $request, Tasks $task)
    {
        $task->fill($request->validated());

        $booleanFields = [
            'mk',
            'mkcold',
            'osv',
            'osvEvak',
            'sh',
            'shobSgr',
            'shokolSr',
            'vent',
            'klim',
            'f0',
            'z',
            'm',
            'izol',
            'dtz',
            'mk_next',
            'mkcold_next',
            'osv_next',
            'osvEvak_next',
            'sh_next',
            'shobSgr_next',
            'shokolSr_next',
            'vent_next',
            'klim_next',
            'f0_next',
            'z_next',
            'm_next',
            'izol_next',
            'dtz_next',
            'paid'
        ];

        foreach ($booleanFields as $field) {
            $task->$field = $request->has($field) && $request->$field ? '1' : '0';
        }

        $task->save();

        return response()->json([
            'message' => 'Task updated successfully!',
            'data' => $task
        ], 200);
    }

    /**
     * DELETE /api/tasks/{id}
     */
    public function destroy($id)
    {
        $task = Tasks::findOrFail($id);
        $task->delete();

        return response()->json([
            'message' => 'Task deleted successfully!'
        ], 200);
    }

    /**
     * GET /api/tasks/action?query=...
     * Used for filtering client names based on a query.
     */
    public function action(Request $request)
    {
        $query = $request->input('query');

        $filter_data = Clients::where('client_name', 'LIKE', '%' . $query . '%')
            ->pluck('client_name')
            ->toArray();

        return response()->json(['data' => $filter_data], 200);
    }

    /**
     * GET /api/tasks/client-data?client_name=...
     * Retrieves a client's details along with associated contractors and objects.
     */
    public function getClientData(Request $request)
    {
        $client_name = $request->query('client_name');

        if (!$client_name) {
            return response()->json(['error' => 'No client name provided'], 400);
        }

        $client = Clients::with(['contractors', 'objects'])
            ->where('client_name', $client_name)
            ->first();

        if (!$client) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        return response()->json([
            'client_id'       => $client->id,
            'client_name'     => $client->client_name,
            'objects'         => $client->objects,
            'contractor_name' => $client->contractors ? $client->contractors->contractor_name : null,
        ], 200);
    }

    /**
     * GET /api/tasks/contractor-data?name=...
     * Retrieves a contractor's data based on the contractor name.
     */
    public function getContractorData(Request $request)
    {
        $name = $request->query('name');
        $contractor = Contractors::where('contractor_name', $name)->first();

        if (!$contractor) {
            return response()->json(['error' => 'Contractor not found'], 404);
        }

        return response()->json([
            'commission_percentage' => $contractor->commission_percentage,
            'contractor_name'         => $contractor->contractor_name,
        ], 200);
    }

    public function searchTasks(Request $request)
    {
        $query = Tasks::query();

        if ($request->has('title')) {
            $query->where('title', 'LIKE', '%' . $request->input('title') . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('client_id')) {
            $query->where('client_id', $request->input('client_id'));
        }

        return response()->json($query->paginate(10)); // Returns paginated results
    }
}
