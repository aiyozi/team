<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cate;
use App\Friendship;
class FriendshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frie_name=request()->frie_name;
        $where=[];
        if($frie_name){
            $where[]=["frie_name","like","%$frie_name%"];
        }
        $res=Friendship::where($where)->
        leftjoin("cate","friendship.cate_id","=","cate.cate_id")
        ->paginate(3);
        
        return view("admin.friendship.index",['res'=>$res,"frie_name"=>$frie_name]);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res=Cate::all();
        return view("admin.friendship.create",['res'=>$res]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->except(['_token']);
        $request->validate([
            "frie_name"=>"required|unique:friendship|regex:/^[\x{4e00}-\x{9fa5}\w]{3,10}$/u",
            "frie_names"=>"required",
            "frie_email"=>"required",
            "frie_guan"=>"required",
            "frie_desc"=>"required",
        ],[
            "frie_name.required"=>"该名称不为空",
            "frie_name.unipue"=>"该名称已有",
            "frie_name.regex"=>"该名称格式不对",
            "frie_names.required"=>"该文章人不为空",
            "frie_email.required"=>"邮箱不为空",
            "frie_guan.required"=>"关键字不为空",
            "frie_desc.required"=>"该介绍人不为空",
        ]);
        if($request->hasFile("frie_logo")){
            $data['frie_logo']=$this->upload("frie_logo");
        }
        $res=Friendship::insert($data);
        if($res){
            return redirect("/friendship");
        }
    }
    public function upload($file){
    $file=request()->file($file);
    if($file->isValid()){
        $path=$file->store("uploads");
        return $path;
    }
    exit("文件上传错误");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res=Friendship::find($id);
        $cate=Cate::all();
        return view("admin.friendship.show",['res'=>$res,"cate"=>$cate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res=Friendship::destroy($id);
        if($res){
            return redirect("/friendship");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=request()->except(['_token']);
        if($request->hasFile("frie_logo")){
            $data['frie_logo']=$this->upload("frie_logo");
        }
        $res=Friendship::where("frie_id",$id)->update($data);
        if($res!==false){
            return redirect("/friendship");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
