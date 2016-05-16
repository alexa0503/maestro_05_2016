<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
//use Carbon;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
        //$this->middleware('wechat.auth');
    }

    public function index()
    {
        return view('index');
    }
    public function image()
    {
        return view('image');
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
            $img_data = base64_decode($img);
            $file_name = uniqid() . '.png';
            $img_file = public_path('uploads') . '/' . $file_name;


            $thumb_img = $request->input('thumb_img');
            $thumb_img = str_replace('data:image/png;base64,', '', $thumb_img);
            $thumb_img = str_replace(' ', '+', $thumb_img);
            $thumb_data = base64_decode($thumb_img);
            //$file_name = uniqid() . '.png';
            $thumb_file = public_path('uploads') . '/share/' . $file_name;

            if( !file_put_contents($img_file, $img_data) || !file_put_contents($thumb_file, $thumb_data)){
                $result = array('ret'=>1002,'msg'=>'写入失败~');
            }
            else{
                $photo = new \App\Photo();
                $photo->sid = $request->session()->getId();
                $photo->image = $file_name;
                $photo->attitude = $request->input('attitude');
                $photo->friend_name = $request->input('friend_name');
                $photo->self_name = $request->input('self_name');
                //$photo->created_time = date('Y-m-d H:i:s');
                $photo->created_time = Carbon::now();
                $photo->created_ip = $request->getClientIp();
                $photo->save();
                $result['data'] = array(
                    'title'=>'快来膜拜我的心造型，一起有型造起来。',
                    'desc'=>'音乐节嗨翻天，有型造起来。',
                    'link'=>url('share',array('id'=>$photo->id)),
                    'imgUrl'=>asset('uploads/share/'.$photo->image),
                );
            }
        }
        return json_encode($result);
    }
    public function photo($id = null)
    {
        $photo = \App\Photo::find($id);
        return view('photo', array('photo'=>$photo));
    }
}
