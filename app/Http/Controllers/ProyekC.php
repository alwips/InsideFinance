<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Helper;
use App\ProyekM;
class ProyekC extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('proyek.index');
    }

    public function create()
    {
        return view('proyek.create');
    }

    public function store(Request $request)
    {
       
        $proyek = new ProyekM;
        $proyek->noproyek = $request->noproyek;
        $proyek->proyek = $request->proyek;
        $proyek->singkatnama = $request->singkatnama;
        $daterange = explode(' - ', $request->daterange);
        $sdate = explode('/', $daterange[0]);
        $edate = explode('/', $daterange[1]);
        $proyek->startdate = $sdate[2].'-'.$sdate[1].'-'.$sdate[0];
        $proyek->duedate = $edate[2].'-'.$edate[1].'-'.$edate[0];
        $proyek->anggaran = Helper::rupiahToNum($request->anggaran);
        $proyek->color = $request->warna;
        $proyek->photo = implode(',',$request->photo);
        $proyek->keterangan = $request->keterangan;
        $proyek->status = $request->status;
        $proyek = $proyek->save();

        if($proyek)
            $data = array('status'=>'success','msg'=>'Proyek Baru telah ditambahkan !');
        else
            $data = array('status'=>'gagal','msg'=>'Proyek Baru gagal ditambahkan !');
        
        Session::flash('flash_message', 'Proyek "'.$request->proyek.'" telah ditambahkan !');

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $proyek = ProyekM::findOrFail(decrypt($id));
        return response()->json($proyek, 200);
    }

    public function edit($id)
    {
        $proyek = ProyekM::findOrFail(decrypt($id))->toArray();
        $proyek['idproyek'] = $id;

        return view('proyek.edit', compact('proyek'));
    }

    public function update($id, Request $request)
    {
        
        $proyek = ProyekM::findOrFail(decrypt($id));
        $proyek->update($request->all());

        if($proyek)
            $data = array('status'=>'success','msg'=>'Proyek Baru telah diubah !');
        else
            $data = array('status'=>'gagal','msg'=>'Proyek Baru gagal diubah !');
        
        Session::flash('flash_message', 'Proyek "'.$request->proyek.'" telah diubah !');

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $proyek = ProyekM::findOrFail(decrypt($id));
        ProyekM::destroy($proyek->idproyek);
        return response()->json(array('status'=>'success','msg'=>'Proyek "'.$proyek->proyek.'" telah dihapus !','type'=>'success'), 200);
    }

    public function enable($id)
    {
        $proyek = ProyekM::find(decrypt($id));
        $proyek->status = 1;
        $proyek->save();
        return response()->json(array('status'=>'success','msg'=>'Proyek "'.$proyek->proyek.'" telah diaktifkan !','type'=>'info'), 200);
    }

    public function disable($id)
    {
        $proyek = ProyekM::find(decrypt($id));
        $proyek->status = 0;
        $proyek->save();       
        return response()->json(array('status'=>'success','msg'=>'Proyek "'.$proyek->proyek.'" telah dinonaktifkan !','type'=>'warning'), 200);
    }

    public function listdata()
    {
        $proyek = ProyekM::orderBy('idproyek','desc')->get()->toArray();
        foreach ($proyek as $key => $val) {
            $proyek[$key]['idproyek'] = encrypt($val['idproyek']);
        }
        return response()->json(array('data'=>$proyek), 200);
    }

    public static function satuan($id, $res=NULL){
        $proyek = ProyekM::select('idproyek','proyek')->where('status','=',1)->orderBy('proyek','ASC')->get();
        foreach ($proyek as $s) {
            if($id!=$s->idproyek)
                $res .= '<option value="'.encrypt($s->idproyek).'">'.$s->proyek.'</option>';
            else
                $res .= '<option value="'.encrypt($s->idproyek).'" SELECTED>'.$s->proyek.'</option>';
        }
        return $res;
    }
}
