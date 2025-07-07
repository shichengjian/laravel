<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        echo "this is index method!";
    }

    public function text1(Request $request){
        //获取单个值
        $data[0] = $request->input('id','this is user_id!');
        //获取所有值
        $data[1] = $request->all();
        $data[2] = $request->collect();
        //获取指定关键字的值
        $data[3] = $request->only(['id','pass']);
        //获取[除]指定关键字的值
        $data[4] = $request->except(['id','pass']);
        //判断关键字是否存在
        $data[5] = $request->has(['pass']);
        $data[6] = $request->collect(['pass','name'])->each(function($pass,$id){
            // var_dump($pass);
            var_dump($id);
        });
        //dump + die,框架内简单输出函数 dd
    
    }

    public function add() {
        //一维数组或二维数组
        $insertData =
            ['username'=>'chongqing',
            'password'=>md5('ppp'),
            'createtime'=>date('Y-m-d',time())];
        //返回1/0,对应true和false
        $data = DB::table('user')->input($insertData);
        dd($data);
    }
    public function del() {
        $dd = DB::table('user')->delete(22);
        dd($dd);
    }
    public function exit() {
        $exitData = ['password'=>'goba'];
        //返回影响的行数
        $data = DB::table('user')->where('status','=',6)->update($exitData);
        dd($data);
    }
    public function show() {
        $db = DB::table('user');
        //查询一条数据
        // $db->first();

        //查询一条数据指定字段值
        // $db->value('username');
        
        //返回一个结果集[对象类型]
        //设置查询条件，指定查询字段，设置降序
        $data = $db
        ->where('status','=','6')
        ->select(['username as name','password','createtime'])
        ->orderBy('createtime','desc')
        //从第0条开始，限制输出4条数据
        // ->offset(0)
        // ->limit(4)
        ->get();
        dd($data);
    }

    public function modelAdd(Request $request){
        $data = (object)$request->all();
        //使用AR模式修改id为4的数据
        // $sql_data = Admin::find(4);
        // $sql_data->username = $data['username'];
        // $sql_data->password = $data['password'];
        // $sql_data->save();
        // dd($data);
        dd($data);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'username' => 'required|min:2|max:25',
            'password' => 'required|min:2|max:25',
            'email' => 'required|email',
            'captcha' => 'required|captcha',
        ]);
        // return view('home.login');
        //是否上传文件、文件上传是否成功
        if($request->hasFile('photos')&&$request->photos->isValid()){
            $data = [
                $request->photos->hashName(),
                $request->photos->getSize(),
                $request->photos->extension(),
            ];

            // $request->file('photos')->store('tt');
        }
        dd($validated);
    }

    public function view(){
        // return view('home.user');
        Cache::add('num',0,100);
        Cache::put('name','china');
        Cache::put('id',12);
        Cache::pull('name');
        Cache::increment('num');
        Cache::remember('time',0,function(){
            return date('Y-m-d H:i:s',time());
        });
        dd(Cache::get('time'));
    }
    public function showajax(){
        // return view('home.ajax');
        
        //重定向跳转
        return redirect('/home/login/show');
    }
    public function ajax(){
        $data = [
            'name' => 'shi',
            'pass' => '123',
        ];
        return response()->json($data);
    }
}
