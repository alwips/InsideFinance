<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\SatuanM;
class SatuanC extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('satuan.index');
    }

    public function create()
    {
        return view('satuan.create');
    }

    public function store(Request $request)
    {
        
        $satuan = SatuanM::create($request->all());

        if($satuan)
            $data = array('status'=>'success','msg'=>'Satuan Baru telah ditambahkan !');
        else
            $data = array('status'=>'gagal','msg'=>'Satuan Baru gagal ditambahkan !');
        
        Session::flash('flash_message', 'Satuan "'.$request->satuan.'" telah ditambahkan !');

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $satuan = SatuanM::findOrFail(decrypt($id));
        return response()->json($satuan, 200);
    }

    public function edit($id)
    {
        $satuan = SatuanM::findOrFail(decrypt($id))->toArray();
        $satuan['idsatuan'] = $id;

        return view('satuan.edit', compact('satuan'));
    }

    public function update($id, Request $request)
    {
        
        $satuan = SatuanM::findOrFail(decrypt($id));
        $satuan->update($request->all());

        if($satuan)
            $data = array('status'=>'success','msg'=>'Satuan Baru telah diubah !');
        else
            $data = array('status'=>'gagal','msg'=>'Satuan Baru gagal diubah !');
        
        Session::flash('flash_message', 'Satuan "'.$request->satuan.'" telah diubah !');

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $satuan = SatuanM::findOrFail(decrypt($id));
        SatuanM::destroy($satuan->idsatuan);
        return response()->json(array('status'=>'success','msg'=>'Satuan "'.$satuan->satuan.'" telah dihapus !','type'=>'success'), 200);
    }

    public function enable($id)
    {
        $satuan = SatuanM::find(decrypt($id));
        $satuan->status = 1;
        $satuan->save();
        return response()->json(array('status'=>'success','msg'=>'Satuan "'.$satuan->satuan.'" telah diaktifkan !','type'=>'info'), 200);
    }

    public function disable($id)
    {
        $satuan = SatuanM::find(decrypt($id));
        $satuan->status = 0;
        $satuan->save();       
        return response()->json(array('status'=>'success','msg'=>'Satuan "'.$satuan->satuan.'" telah dinonaktifkan !','type'=>'warning'), 200);
    }

    public function listdata()
    {
        $satuan = SatuanM::orderBy('idsatuan','desc')->get()->toArray();
        foreach ($satuan as $key => $val) {
            $satuan[$key]['idsatuan'] = encrypt($val['idsatuan']);
        }
        return response()->json(array('data'=>$satuan), 200);
    }

    public static function satuan($id=NULL, $res=NULL){
        $satuan = SatuanM::select('idsatuan','satuan')->where('status','=',1)->orderBy('satuan','ASC')->get();
        foreach ($satuan as $s) {
            if($id!=$s->idsatuan)
                $res .= '<option value="'.encrypt($s->idsatuan).'">'.$s->satuan.'</option>';
            else
                $res .= '<option value="'.encrypt($s->idsatuan).'" SELECTED>'.$s->satuan.'</option>';
        }
        return $res;
    }
}
