<?php
require_once __DIR__ . '/../../../autoload.php';
class MessageTest extends PHPUnit_Framework_TestCase
{
    private $conf = array(
        'appkey'            => '512b2ee35270154655000067',
        'app_master_secret' => 'emedqixqou6ijwb6wzni8cwfrnkiuptd',
    );

    public function testSendLbsNotification()
    {
        echo __FUNCTION__ . "\n";
        $c = new \PEAR2\Services\Umeng\Message($this->conf);
        $data = array(
            'title' => '上海欢迎你',
            'text' => '友盟测试：sendLbsNotification 生煎馒头、粢饭糕，欢迎品尝',
            'province' => '上海',
        );
        $r = $c->sendLbsNotification($data);
        $this->assertEquals(true, $r);
 
        $data = array(
            'title' => '北京欢迎你',
            'text' => '友盟测试：sendLbsNotification',
            'province' => '北京',
        );
        $r = $c->sendLbsNotification($data);
        $this->assertEquals(true, $r);
    }

    public function testSendNotificationToDevices()
    {
        echo __FUNCTION__ . "\n";
        $c = new \PEAR2\Services\Umeng\Message($this->conf);
        $data = array(
            'title' => '发送给多个设备',
            'text' => '友盟测试：sendNotificationToDevices',
            'device_tokens' => array(
                'AsW2-KWYii5jnf8mEguOBYCSBX1NTpI2VujtubEuDdDK',
                'AhS_pRSGwOUQwk7ibK1iZsjF2YAwEynr5v9J_TUGP8kQ',
            ),
        );
        $r = $c->sendNotificationToDevices($data);
        $this->assertEquals(true, $r);
        
        $data = array(
            'title' => '发送给一个设备',
            'text' => '友盟测试：sendNotificationToDevices',
            'device_tokens' => 'AsW2-KWYii5jnf8mEguOBYCSBX1NTpI2VujtubEuDdDK',
        );
        $r = $c->sendNotificationToDevices($data);
        $this->assertEquals(true, $r);
    }

    public function testBroadcastNotification()
    {
        echo __FUNCTION__ . "\n";
        $c = new \PEAR2\Services\Umeng\Message($this->conf);
        $data = array(
            'title' => '广播',
            'text' => '友盟测试：broadcastNotification 这是一条广播',
        );
        $r = $c->broadcastNotification($data);
        $this->assertEquals(true, $r);
    }

    public function testSend()
    {
        echo __FUNCTION__ . "\n";
        $c = new \PEAR2\Services\Umeng\Message($this->conf);
        $data = array(
            'type' => 'broadcast',
            'payload' => array(
                'body' => array(
                    'title' => 'send 标题',
                    'text' => 'send 内容',
                )
            )
        );
        $r = $c->send($data);
        $this->assertEquals(true, $r);
    }
}
?>
