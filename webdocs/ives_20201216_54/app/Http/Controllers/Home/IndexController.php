<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // 測試Home分組的Index方法
    public function index(){
        echo '這是Home分組下的index方法';
    }
}
