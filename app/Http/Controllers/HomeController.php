<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('wechat.auth');
    }

    public function index(Request $request)
    {
        return view('index');
    }
    public function lottery()
    {
        return;
    }
    public function upload(Request $request)
    {
        $result = array('ret'=>0,'msg'=>'');
        if( null == $request->input('img') ){
            $result = array('ret'=>1001 ,'msg'=>'图片不存在~');
        }
        else{
            $img = $request->input('img');
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file_name = uniqid() . '.png';
            $file = public_path('uploads') . '/' . $file_name;
            if( !file_put_contents($file, $data)){
                $result = array('ret'=>1002,'msg'=>'写入失败~');
            }
            else{
                $photo = new \App\Photo();
                $photo->sid = $request->session()->getId();
                $photo->img_name = $file_name;
                $photo->title = $request->input('title');
                $photo->desc = $request->input('desc');
                $photo->name = $request->input('name');
                $photo->created_ip = $request->getClientIp();
                $photo->save();
            }
        }
        return json_encode($result);
    }
}
