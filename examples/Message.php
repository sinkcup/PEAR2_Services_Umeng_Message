<?php
require_once 'PEAR2/Autoload.php';
$conf = array(
    'appkey'            => '', //按照友盟后台填写
    'app_master_secret' => '', //按照友盟后台填写
);

$c = new \PEAR2\Services\Umeng\Message($conf);
//广播
$data = array(
    'title' => '广播标题',
    'text' => '友盟测试：broadcastNotification 这是一条广播',
);
$r = $c->broadcastNotification($data);

//按省发通知
$data = array(
    'title' => '河北欢迎你',
    'text' => '燕郊的别野、驴肉的火烧，这是另一种生活方式',
    'province' => '河北',
);
$r = $c->sendLbsNotification($data);
 
//其他功能的使用方法：请参考 tests/
?>
