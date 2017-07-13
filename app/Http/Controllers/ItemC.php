<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Helper;
use App\ItemM;

use App\Http\Controllers\SatuanC;
class ItemC extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('item.index');
    }

    public function create()
    {

        $parent = $this->item('<option value="%s">%s</option>',' AND a.status=1');
        $satuan = SatuanC::satuan();

        return view('item.create',compact('parent','satuan'));
    }

    public function store(Request $request)
    {
        $request->merge(['idsatuan'=>decrypt($request->satuan),'parent'=>decrypt($request->item),'harga'=>Helper::rupiahToNum($request->harga)]);
        $item = ItemM::create($request->all());

        if($item)
            $data = array('status'=>'success','msg'=>'Item Baru telah ditambahkan !');
        else
            $data = array('status'=>'gagal','msg'=>'Item Baru gagal ditambahkan !');
        
        Session::flash('flash_message', 'item "'.$request->nama.'" telah ditambahkan !');

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $item = collect(DB::select('SELECT a.iditem, a.nama, a.harga, a.status, a.idsatuan, b.nama as parent, c.satuan FROM tbl_item a 
            LEFT JOIN tbl_item b ON a.parent=b.iditem
            LEFT JOIN tbl_satuan c ON a.idsatuan=c.idsatuan
            WHERE a.iditem='.decrypt($id)))->first();
        return response()->json($item, 200);
    }

    public function edit($id)
    {
        $item = ItemM::findOrFail(decrypt($id))->toArray();
        $item['iditem'] = $id;

        $option = '';
        $parent = $this->item('~%1$s,%2$s,%7$s');
        $parent = substr($parent, 1);
        $parent = explode('~', $parent);
        foreach ($parent as $key => $val) {
            $parent[$key] = explode(',', $val);
            if($parent[$key][2]!=$item['parent'])
                $option .= '<option value="'.$parent[$key][0].'">'.$parent[$key][1].'</option>';
            else
                $option .= '<option value="'.$parent[$key][0].'" SELECTED>'.$parent[$key][1].'</option>';
        }
        $parent = $option;
        $satuan = SatuanC::satuan($item['idsatuan']);

        return view('item.edit', compact('item','parent','satuan'));
    }

    public function update($id, Request $request)
    {
        $request->merge(['idsatuan'=>decrypt($request->satuan),'parent'=>decrypt($request->item),'harga'=>Helper::rupiahToNum($request->harga)]);
        
        $item = ItemM::findOrFail(decrypt($id));
        $item->update($request->all());

        if($item)
            $data = array('status'=>'success','msg'=>'Item Baru telah diubah !');
        else
            $data = array('status'=>'gagal','msg'=>'Item Baru gagal diubah !');
        
        Session::flash('flash_message', 'item "'.$request->nama.'" telah diubah !');

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $item = ItemM::findOrFail(decrypt($id));
        ItemM::destroy($item->iditem);
        return response()->json(array('status'=>'success','msg'=>'Item "'.$item->nama.'" telah dihapus !','type'=>'success'), 200);
    }

    public function enable($id)
    {
        $item = ItemM::find(decrypt($id));
        $item->status = 1;
        $item->save();
        return response()->json(array('status'=>'success','msg'=>'Item "'.$item->nama.'" telah diaktifkan !','type'=>'info'), 200);
    }

    public function disable($id)
    {
        $item = ItemM::find(decrypt($id));
        $item->status = 0;
        $item->save();       
        return response()->json(array('status'=>'success','msg'=>'Item "'.$item->nama.'" telah dinonaktifkan !','type'=>'warning'), 200);
    }

    public function listdata()
    {
        $item = $this->item('~%1$s,%2$s,%3$s,%4$s,%6$s');
        $item = substr($item, 1);
        $item = explode('~', $item);
        $newkey = array('no','iditem','nama','harga','status','satuan');
        foreach ($item as $key => $val) {
            $item[$key] = explode(',', ($key+1).','.$val);
            foreach ($item[$key] as $ckey => $cval) {
                $item[$key][$newkey[$ckey]] = $cval;
                unset($item[$key][$ckey]);
            }
        }
        return response()->json(array('data'=>$item), 200);
    }

    public function item($tag,$param=NULL){
        $item = DB::select('SELECT a.iditem, a.nama, a.harga, a.status, a.idsatuan, b.satuan, GetChild(a.iditem) AS hasChild FROM tbl_item a LEFT JOIN tbl_satuan b ON a.idsatuan=b.idsatuan WHERE parent=0 AND iditem>0'.$param.' ORDER BY a.nama ASC');
        $item = $this->buildTree($item, $tag, $param);
        return $item;
    }

    public function buildTree($item,$tag,$param,$space=NULL){
        $depth=$space;
        $res = '';
        foreach ($item as $key => $i) {
            if($i->hasChild){
                $res .= sprintf($tag, encrypt($i->iditem), $space.'&#9660;'.$i->nama, $i->harga, $i->status, $i->idsatuan, $i->satuan,$i->iditem);
                $child = DB::select('SELECT a.iditem, a.nama, a.harga, a.status, a.idsatuan, b.satuan, GetChild(a.iditem) AS hasChild FROM tbl_item a LEFT JOIN tbl_satuan b ON a.idsatuan=b.idsatuan WHERE parent='.$i->iditem.$param.' ORDER BY a.nama ASC');
                $res .= $this->buildTree($child, $tag, $param, $depth.='&#9867;');
                $depth = substr($depth, 0, -7);
            }else{
                $res .= sprintf($tag, encrypt($i->iditem), $space.'&#9658;'.$i->nama, $i->harga, $i->status, $i->idsatuan, $i->satuan,$i->iditem);
            }
        }
        return $res;    
    }
}
