<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FileController extends Controller
{
    public function list()
    {
        try {
            $files = File::all();
            $fileTypes = [
                'video' => ['mp4'],
                'audio' => ['mp3'],
                'image' => ['svg', 'png', 'jpg', 'jpeg', 'gif'],
            ];
            return view("file.list", compact("files", "fileTypes"));
        } catch (Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    public function goAdd()
    {
        return view("file.add");
    }

    public function add(FileRequest $req)
    {
        DB::beginTransaction();

        try {
            // ファイル情報の取得
            $file = $req->file('file');
            $filename = $req->input('filename');
            $filetype = $file->getClientOriginalExtension();
    
            File::create([
                'filename' => $filename,
                'filetype' => $filetype
            ]);

            $file->move(public_path('files/'), $filename . "." . $filetype);

            DB::commit();
            
            return redirect(route("file.list"));
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);
            exit;
        }

    }
}
