<?php

namespace App\Http\Controllers;

use App\Http\Requests\SampleRequest;
use App\Models\Sample;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SampleController extends Controller
{
    public function apilist()
    {
        try {
            $data = Sample::all();
            return response()->json($data, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    public function apicreate(SampleRequest $req)
    {
        $validated = $req->validated();
        try {
            $sample = Sample::create($validated);
            return response()->json($sample, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    public function list() {
        try {
            $samples = Sample::all();
            return view("sample.list", compact("samples"));
        } catch (Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    public function goAdd() {
        return view("sample.add");
    }

    public function add(SampleRequest $req){
        DB::beginTransaction();
        $validated = $req->validated();
        try {
            Sample::create($validated);
            DB::commit();
            return redirect(route("sample.list"));
        } catch (Exception $ex) {
            DB::rollBack();
            Log::info($ex);
            exit;
        }
    }
}
