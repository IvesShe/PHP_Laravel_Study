<?php

?>

當前訪問的是viewtest.blade.php <br/>
現在是: {{$date}}, 今天是星期{{$day}} <br/>
一年之後的時間是： {{$time}} <br/>
一年之後的時間是： {{date('Y-m-d H:i:s',$time)}}