<?php
// +----------------------------------------------------------------------
// | Title   : 多多客SDK核心文件
// +----------------------------------------------------------------------
// | Created : Henrick (me@hejinmin.cn)
// +----------------------------------------------------------------------
// | From    : Shenzhen wepartner network Ltd
// +----------------------------------------------------------------------
// | Date    : 2020/10/14 10:55
// +----------------------------------------------------------------------


namespace Henrick\Duoduoke;


use linslin\yii2\curl\Curl;

class Core
{
    /**
     * 配置信息数组
     * @var array|string[]
     */
    protected $_config = [
        "doMain" => "https://gw-api.pinduoduo.com/api/router", //主域名
        "dataType" => "JSON"
    ];

    protected $_errRet = [];

    /**
     * SDK初始化参数
     * @param $clientId 应用的Client_id
     * @param $clientSecret 应用的client_sercret
     * @param string $doMain 多多客的环境域名，默认正式域名
     */
    public function __construct($clientId="", $clientSecret="", $doMain=null) {
        if(empty($clientId)){
            $this->_errRet =  $this->_error(1,'clientId不能为空哦~');
        }
        if(empty($clientSecret)){
            $this->_errRet = $this->_error(1,'clientSecret不能为空哦~');
        }
        //合并配置信息
        $this->_config = array_merge($this->_config, [
            "clientId"     => $clientId,
            "clientSecret" => $clientSecret,
            "doMain" => !empty($doMain) ? $doMain:$this->_config['doMain']
        ]);
    }

    protected function _query($type, $data){
        if(!empty($this->_errRet)){
            return $this->_errRet;
        }
        $publicData = [
            "type" => $type,
            "client_id"    => $this->_config['clientId'],
            "access_token" => $this->_getToken(),
            "timestamp" => time(),
            "data_type" => $this->_config['dataType'],
            "version"   => "v1"
        ];
        $publicData += $data;
        ksort($publicData);
        $sign = $this->_config['clientSecret'];
        foreach ($publicData as $key=>$val){
            $sign .= $key.$val;
        }
        $sign.= $this->_config['clientSecret'];
        $sign = strtoupper(md5($sign));
        $publicData['sign'] = $sign;
        $curl = new Curl();
        $response = $curl->setPostParams($publicData)->post($this->_config['doMain']);
        if($curl->errorCode){
            return $this->_error($curl->errorCode, "curl请求失败，".$curl->errorText);
        }
        $response = json_decode($response, true);
        if(isset($response['error_response'])){
            return $this->_error($response['error_response']['error_code'], $response['error_response']['error_msg'], $response);
        }
        return $this->_error(0, "成功", $response);
    }

    /**
     * 统一返回数据格式
     * @param int $code 错误码，0：成功，其他则失败
     * @param string $msg 提示信息
     * @param array $data 返回数据
     * @return array
     */
    private function _error($code=0, $msg="成功", $data=[]){
        return ["errcode" => $code, "errmsg" => $msg, "data" => $data];
    }

    /**
     * 授权token，多多客暂未用到
     * @return string
     */
    protected function _getToken(){
        return "";
    }

    /**
     * 数组转json字符串
     * @param $data
     * @return false|string
     */
    protected function _getArrayToString($data=""){
        return $data ? json_encode($data, 256):"";
    }
}