<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Session;
use App\DocumentM;
class Uploader extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function kegiatan(Request $request)
    {
        foreach ($request->file('files') as $key => $step) {
            $path = $step->store('kegiatan');
            if($path){
                $proyek = new DocumentM;
                $proyek->kategori = 'kegiatan';
                $proyek->type = 'gambar';
                $proyek->path = $path;
                $proyek->status = 0;
                $img = $proyek->save();
                
                $data = array('status'=>'true','path'=>$proyek->iddocument);
            }
        }
        return response()->json($data, 200);
    }
    public function delkegiatan(Request $request)
    {
        $img = DocumentM::findOrFail($request->path);
        if(DocumentM::destroy($img->iddocument))
            Storage::delete($img->path);
    }
}
