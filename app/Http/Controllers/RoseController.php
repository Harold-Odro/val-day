<?php

namespace App\Http\Controllers;

use App\Models\Rose;
use Illuminate\Http\Request;

class RoseController extends Controller
{
    /**
     * Display a listing of the roses.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $roses = Rose::latest()->get();

        return response()->json([
            'status' => 'success',
            'data' => $roses
        ]);
    }

    /**
     * Store a newly created rose in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'color' => 'required|string',
            'size' => 'required|integer|min:1|max:150',
            'position_x' => 'required|integer|min:0',
            'position_y' => 'required|integer|min:0',
        ]);

        $rose = Rose::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Rose created successfully',
            'data' => $rose
        ], 201);
    }
}
