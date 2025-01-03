<?php

namespace App\Http\Controllers;

use App\Http\Requests\SampleRequest;
use App\Models\Sample;
use Exception;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function list()
    {
        try {
            $data = Sample::all();
            return response()->json($data, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    public function create(SampleRequest $req)
    {
        $validated = $req->validated();
        try {
            $sample = Sample::create($validated);
            return response()->json($sample, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    
}
