<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // 測試Admin分組的Index方法
    public function index(){
        echo '這是Admin分組下的index方法';
    }
}
