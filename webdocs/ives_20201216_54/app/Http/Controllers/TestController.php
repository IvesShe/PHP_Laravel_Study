<?php

namespace App\Http\Controllers;

// 命名空間的三元素：常量、方法、類
use Illuminate\Http\Request;
use Input;
// 引入DB門面
use DB;

class TestController extends Controller
{
    // 測試控制器路由的使用
    // phpinfo信息
    public function test1(){
        // 輸出任意信息
        return phpinfo();
    }

    // test2測試Input獲取數據
    public function test2(){
        echo Input::get('id','10086') . '<br/>';

        // 獲取全部的值(數組型式的返回)
        $all = Input::all();
        //var_dump($all);

        // dd = dump+die
        //dd($all);   

        // 獲取指定的信息(字符串型式)
        //dd(Input::get('name'));

        // 獲取指定的幾個值(數組型式)
        //dd(Input::only(['id','name']));

        // 獲取除了指定值之外的值
        //dd(Input::except(['name']));

        // 判斷某個值存在與否
        dd(Input::has(['gender']));
    }

    // DB 添加方法
    public function add(){
        // 定義關聯操作的表
        $db = DB::table('member');
        
        // 使用insert增加記錄，返回布爾類型
        $result = $db -> insert([
            [
                'name' => 'ives777',
                'age' => '18',
                'email' => 'ivesshe@gmail.com',
            ],
            [
                'name' => 'jack888',
                'age' => '25',
                'email' => 'jack@gmail.com',
            ],
        ]);

        // 插入一條記錄方法insertGetId, 返回一組數據
        // $result = $db -> insertGetId(
        //         [
        //             'name' => 'ives168',
        //             'age' => '20',
        //             'email' => 'ivesshe168@gmail.com',
        //         ]
        // );

        dd($result);
    }

    // DB 修改方法
    public function update(){
        // 定義關聯操作的表
        $db = DB::table('member');

        // 修改id為1的用戶的名稱為Tom
        $result = $db -> where('id','=','1') -> update([
            // 需要修改字段的鍵值對
            'name' => 'Tom',
        ]);

        dd($result);
    }

     // DB 查詢方法
     public function select(){
        // 定義關聯操作的表
        $db = DB::table('member');

        // 查詢全部的數據
        //$data = $db -> get();

        // 嘗試循環下數據
        // foreach($data as $key => $value){
        //     echo "id是: {$value -> id}，名字是: {$value -> name}，郵箱是： {$value -> email} <br/> ";
        // }

        // 查詢id>3的數據
        //$data = $db -> where('id','>','3') -> get();

        // 查詢id>3並且age小於30的數據
        //$data = $db -> where('id','>','3') -> where('age','<',"30") -> get();

        // 查詢id>3或age小於30的數據
        //$data = $db -> where('id','>','3') -> orWhere('age','<',"30") -> get();

        // 取出單行記錄
        //$data = $db -> first();

        // 取出指定字段的值
        //$data = DB::table('member')->where('id','1')->value('name');
        
        // 查詢指定的一些字段的值
        //$data = DB::table('member')->select('name','email')->get();

        // 按照指定的字段進行特定規則的排序 按age降序
        //$data = DB::table('member')->orderBy('age','desc')->get();

        // 分頁操作 從第一筆開始秀、秀2筆
        // limit: 表示限制輸出的條數
        // offset: 從什麼地方開始
        $data = DB::table('member')->limit(2)->offset(1)->get();
        
        dd($data);
    }

    // DB 刪除操作
    public function del(){
        // 定義關聯操作的表
        $db = DB::table('member');

        // 刪除id為1的記錄
        $result = $db -> where('id','=','1') -> delete();

        dd($result);
    }

    // view 測試
    public function viewtest(){
        // 現在時間
        $date = date('Y-m-d H:i:s',time());
        // 獲取今天的星期
        $day = '日';

        // 傳遞時間戳
        $time = strtotime('+1 year');
        // $time = strtotime('+1 month');
        // $time = strtotime('+1 week');
        // $time = strtotime('+1 day');

        // 展示視圖
        //return view('home/viewtest');
        //return view('home.viewtest',['date' => $date,'day' => $day]);
        return view('home.viewtest',compact('date','day','time'));
    }

    // foreach 循環標籤
    public function foreachtest(){
        // 查詢數據
        $data = DB::table('member') -> get();
        // 獲取今天的星期數字，傳遞的參數可以參考PHP手冊關於date的部分
        $day = date('N');
        // 展示視圖，傳遞數據
        return view('home.foreachtest',compact('data','day'));
    }

    // 繼承
    public function extends(){
        // 展示視圖
        return view('home.child');
    }
}
