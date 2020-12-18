<?php

namespace App\Http\Controllers;

// 命名空間的三元素：常量、方法、類
use Illuminate\Http\Request;

class TestController extends Controller
{
    // phpinfo信息
    public function test1(){
        return phpinfo();
    }
}
