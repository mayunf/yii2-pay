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

class Pay extends Component
{

    public function getAlipay()
    {
        return BasePay::alipay(Yii::$app->params['alipay']);
    }

    public function getWechat()
    {
        return BasePay::wechat(Yii::$app->params['wechat']);
    }

    public function __call($method,$params)
    {
        return BasePay::$method(Yii::$app->params[$method]);
    }
}