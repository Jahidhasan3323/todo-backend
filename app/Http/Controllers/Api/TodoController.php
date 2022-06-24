<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use App\Services\TodoService;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, TodoService $todoService)
    {
        try {
            $data = $todoService->getData($request);
            return TodoResource::collection($data);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TodoService $todoService)
    {
        try {
            $data = $todoService->storeData($request);
            return response()->json(
                ['status' => 'success', 'message' => "data stored successfully", 'data' => $data],
                200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }


    /**
     * @param Request $request
     * @param $id
     * @param TodoService $todoService
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id, TodoService $todoService)
    {
        try {
            $data = $todoService->updateData($request, $id);
            return response()->json(
                ['status' => 'success', 'message' => "data stored successfully", 'data' => $data],
                200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoService $todoService, $id)
    {
        try {
            $data = $todoService->deleteData($id);
            return response()->json(
                ['status' => 'success', 'message' => "data stored successfully", 'data' => $data],
                200);
        }catch (\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
