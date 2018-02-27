<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/2/27
 * Time: 9:34
 */

namespace Mayunfeng\Pay;

use Yii;
use yii\base\Component;
use Yansongda\Pay\Pay as BasePay;

/**
 * Class Pay
 * @method static \Yansongda\Pay\Gateways\Alipay alipay(array $config) 支付宝
 * @method static \Yansongda\Pay\Gateways\Wechat wechat(array $config) 微信
 * @package Mayunfeng\Pay
 */
class Pay extends Component
{

    public $alipay_config;

    public $wechat_config;

    public function getAlipay(array $config = [])
    {
        return BasePay::alipay(array_merge($this->alipay_config,$config));
    }

    public function getWechat(array $config = [])
    {
        return BasePay::wechat(array_merge($this->wechat_config,$config));
    }

    public function __call($method,$params)
    {
        return BasePay::$method(array_merge($this->$method.'_config',$params));
    }
}