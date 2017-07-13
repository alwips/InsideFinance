<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Helper;
use App\CoaM;

use App\Http\Controllers\SatuanC;
class CoaC extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('coa.index');
    }

    public function create()
    {

        $parent = $this->coa('<option value="%s">%s</option>',' AND status=1');

        return view('coa.create',compact('parent'));
    }

    public function store(Request $request)
    {
        $request->merge(['parent'=>decrypt($request->parent)]);
        $coa = CoaM::create($request->all());

        if($coa)
            $data = array('status'=>'success','msg'=>'coa Baru telah ditambahkan !');
        else
            $data = array('status'=>'gagal','msg'=>'coa Baru gagal ditambahkan !');
        
        Session::flash('flash_message', 'coa "'.$request->nama.'" telah ditambahkan !');

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $coa = collect(DB::select('SELECT a.idcoa, a.nama, a.kode, a.tipe, a.status, b.nama as parent FROM tbl_coa a 
            LEFT JOIN tbl_coa b ON a.parent=b.idcoa
            WHERE a.idcoa='.decrypt($id)))->first();
        return response()->json($coa, 200);
    }

    public function edit($id)
    {
        $coa = CoaM::findOrFail(decrypt($id))->toArray();
        $coa['idcoa'] = $id;

        $option = '';
        $parent = $this->coa('~%1$s,%2$s,%5$s');
        $parent = substr($parent, 1);
        $parent = explode('~', $parent);
        foreach ($parent as $key => $val) {
            $parent[$key] = explode(',', $val);
            if($parent[$key][2]!=$coa['parent'])
                $option .= '<option value="'.$parent[$key][0].'">'.$parent[$key][1].'</option>';
            else
                $option .= '<option value="'.$parent[$key][0].'" SELECTED>'.$parent[$key][1].'</option>';
        }
        $parent = $option;

        return view('coa.edit', compact('coa','parent'));
    }

    public function update($id, Request $request)
    {
        $request->merge(['parent'=>decrypt($request->parent)]);
        
        $coa = CoaM::findOrFail(decrypt($id));
        $coa->update($request->all());

        if($coa)
            $data = array('status'=>'success','msg'=>'coa Baru telah diubah !');
        else
            $data = array('status'=>'gagal','msg'=>'coa Baru gagal diubah !');
        
        Session::flash('flash_message', 'coa "'.$request->nama.'" telah diubah !');

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $coa = CoaM::findOrFail(decrypt($id));
        CoaM::destroy($coa->idcoa);
        return response()->json(array('status'=>'success','msg'=>'coa "'.$coa->nama.'" telah dihapus !','type'=>'success'), 200);
    }

    public function enable($id)
    {
        $coa = CoaM::find(decrypt($id));
        $coa->status = 1;
        $coa->save();
        return response()->json(array('status'=>'success','msg'=>'coa "'.$coa->nama.'" telah diaktifkan !','type'=>'info'), 200);
    }

    public function disable($id)
    {
        $coa = CoaM::find(decrypt($id));
        $coa->status = 0;
        $coa->save();       
        return response()->json(array('status'=>'success','msg'=>'coa "'.$coa->nama.'" telah dinonaktifkan !','type'=>'warning'), 200);
    }

    public function listdata()
    {
        $coa = $this->coa('~%1$s`%2$s`%3$s`%4$s');
        $coa = substr($coa, 1);
        $coa = explode('~', $coa);
        $newkey = array('no','idcoa','account','tipe','status');
        foreach ($coa as $key => $val) {
            $coa[$key] = explode('`', ($key+1).'`'.$val);
            foreach ($coa[$key] as $ckey => $cval) {
                $coa[$key][$newkey[$ckey]] = $cval;
                unset($coa[$key][$ckey]);
            }
            // print_r($coa[$key]);echo "<br><br><br>";
        }
        // var_dump($coa); 
        return response()->json(array('data'=>$coa), 200);
    }

    public function coa($tag,$param=NULL){
        $coa = DB::select('SELECT idcoa, kode, nama, tipe, status, CoaChild(idcoa) AS hasChild FROM tbl_coa WHERE parent=0 AND idcoa>0'.$param.' ORDER BY kode ASC');
        $coa = $this->buildTree($coa, $tag, $param);
        return $coa;
    }

    public function buildTree($coa,$tag,$param,$space=NULL){
        $depth=$space;
        $res = '';
        foreach ($coa as $key => $i) {
            if($i->hasChild){
                $res .= sprintf($tag, encrypt($i->idcoa), $space.'&#9660;'.$i->kode.' - '.$i->nama, $i->tipe, $i->status ,$i->idcoa);
                $child = DB::select('SELECT idcoa, kode, nama, tipe, status, CoaChild(idcoa) AS hasChild FROM tbl_coa WHERE parent='.$i->idcoa.$param.' ORDER BY kode ASC');
                $res .= $this->buildTree($child, $tag, $param, $depth.='&#9867;');
                $depth = substr($depth, 0, -7);
            }else{
                $res .= sprintf($tag, encrypt($i->idcoa), $space.'&#9658;'.$i->kode.' - '.$i->nama, $i->tipe, $i->status ,$i->idcoa);
            }
        }
        return $res;    
    }
}
