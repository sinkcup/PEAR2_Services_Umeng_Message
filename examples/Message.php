<?php
require_once 'PEAR2/Autoload.php';
$conf = array(
    'appkey'            => '512b2ee35270154655000067',
    'app_master_secret' => 'emedqixqou6ijwb6wzni8cwfrnkiuptd',
);

$c = new \PEAR2\Services\Umeng\Message($conf);
$data = array(
    'title' => '广播标题',
    'text' => '友盟测试：broadcastNotification 这是一条广播',
);
$r = $c->broadcastNotification($data);

//其他功能的使用方法：请参考 tests/
?>
