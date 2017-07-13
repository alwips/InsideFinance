<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
class UserC extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->merge(['password'=>bcrypt($request->password)]);
        $user = User::create($request->all());

        if($user)
            $data = array('status'=>'success','msg'=>'User Baru telah ditambahkan !');
        else
            $data = array('status'=>'gagal','msg'=>'User Baru gagal ditambahkan !');
        
        Session::flash('flash_message', 'User "'.$request->name.'" telah ditambahkan !');

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $user = User::findOrFail(decrypt($id));
        return response()->json($user, 200);
    }

    public function edit($id)
    {
        $user = User::findOrFail(decrypt($id))->toArray();
        $user['id'] = $id;

        return view('user.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        if($request->has('password'))
            $request->merge(['password'=>bcrypt($request->password)]);
        else
            Session::flash('flash_message', 'User "'.$request->name.'" telah diubah !');

        $user = User::findOrFail(decrypt($id));
        $user->update($request->all());

        if($user)
            $data = array('status'=>'success','msg'=>'User Baru telah diubah !');
        else
            $data = array('status'=>'gagal','msg'=>'User Baru gagal diubah !');
        
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $user = User::findOrFail(decrypt($id));
        User::destroy($user->id);
        return response()->json(array('status'=>'success','msg'=>'Satuan "'.$user->name.'" telah dihapus !','type'=>'success'), 200);
    }

    public function enable($id)
    {
        $user = User::find(decrypt($id));
        $user->status = 1;
        $user->save();
        return response()->json(array('status'=>'success','msg'=>'Satuan "'.$user->name.'" telah diaktifkan !','type'=>'info'), 200);
    }

    public function disable($id)
    {
        $user = User::find(decrypt($id));
        $user->status = 0;
        $user->save();       
        return response()->json(array('status'=>'success','msg'=>'Satuan "'.$user->name.'" telah dinonaktifkan !','type'=>'warning'), 200);
    }

    public function listdata()
    {
        $user = User::orderBy('id','desc')->get()->toArray();
        foreach ($user as $key => $val) {
            $user[$key]['id'] = encrypt($val['id']);
        }
        return response()->json(array('data'=>$user), 200);
    }

    public static function user($id, $res=NULL){
        $user = User::select('id','satuan')->where('status','=',1)->orderBy('satuan','ASC')->get();
        foreach ($user as $u) {
            if($id!=$u->id)
                $res .= '<option value="'.encrypt($u->id).'">'.$u->name.'</option>';
            else
                $res .= '<option value="'.encrypt($u->id).'" SELECTED>'.$u->name.'</option>';
        }
        return $res;
    }
}
