<?php
// +----------------------------------------------------------------------
// | Title   : 多多客sdk
// +----------------------------------------------------------------------
// | Created : Henrick (me@hejinmin.cn)
// +----------------------------------------------------------------------
// | From    : Shenzhen wepartner network Ltd
// +----------------------------------------------------------------------
// | Date    : 2020/10/14 10:47
// +----------------------------------------------------------------------


namespace Henrick\Duoduoke;


class DuoduokeSDK extends Core
{
    /**
     * 多多客初始化参数
     * @param string $clientId 应用的Client_id
     * @param string $clientSecret 应用的client_sercret
     * @param string $doMain 多多客的环境域名，默认正式域名
     */
    public function __construct($clientId = "", $clientSecret = "", $doMain = "") {
        parent::__construct($clientId, $clientSecret, $doMain);
    }

    /**
     * 生成商城-频道推广链接
     */
    public function cmsPromUrlGenerate($data=[], $type="pdd.ddk.cms.prom.url.generate"){
        $data = array_merge([
            "channel_type"           => "",
            "custom_parameters"      => "",
            "generate_mobile"        => "",
            "generate_schema_url"    => "",
            "generate_short_url"     => "",
            "generate_weapp_webview" => "",
            "multi_group"            => "",
            "p_id_list"              => "",
            "generate_we_app"        => "",
            "keyword"                => "",
        ], $data);
        //处理数据
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        $data['p_id_list']         = $this->_getArrayToString($data['p_id_list']);
        return $this->_query($type, $data);
    }

    /**
     * 查询优惠券信息
     * @param array $data
     */
    public function couponInfoQuery($data=[]){
        $data = array_merge([
            "coupon_ids" => "",
            "mall_ids"   => ""
        ],$data);
        $data['coupon_ids'] = $this->_getArrayToString($data['coupon_ids']);
        return $this->_query("pdd.ddk.coupon.info.query",$data);
    }

    /**
     * 创建多多进宝推广位
     * @param array $data
     */
    public function goodsPidGenerate($data=[], $type="pdd.ddk.goods.pid.generate"){
        $data = array_merge([
            "number"         => "",
            "p_id_name_list" => ""
        ],$data);
        $data['p_id_name_list'] = $this->_getArrayToString($data['p_id_name_list']);
        return $this->_query($type, $data);
    }

    /**
     * 查询已经生成的推广位信息
     * @param array $data
     * @return array
     */
    public function goodsPidQuery($data=[], $type="pdd.ddk.goods.pid.query"){
        $data = array_merge([
            "page"      => "",
            "page_size" => "",
            "pid_list"  => "",
            "status"    => "",
        ],$data);
        $data['pid_list'] = $this->_getArrayToString($data['pid_list']);
        return $this->_query($type, $data);
    }

    /**
     * 多多进宝推广链接生成
     * @param array $data
     * @return array
     */
    public function goodsPromotionUrlGenerate($data=[], $type="pdd.ddk.goods.promotion.url.generate"){
        $data = array_merge([
            "custom_parameters"             => "",
            "generate_mall_collect_coupon"  => "",
            "generate_qq_app"               => "",
            "generate_schema_url"           => "",
            "generate_short_url"            => "",
            "generate_weapp_webview"        => "",
            "generate_weiboapp_webview"     => "",
            "generate_we_app"               => "",
            "goods_id_list"                 => "",
            "multi_group"                   => "",
            "p_id"                          => "",
            "search_id"                     => "",
            "zs_duo_id"                     => "",
            "room_id_list"                  => "",
            "target_id_list"                => "",
            "generate_authority_url"        => "",
        ],$data);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        $data['room_id_list']      = $this->_getArrayToString($data['room_id_list']);
        $data['target_id_list']    = $this->_getArrayToString($data['target_id_list']);
        return $this->_query($type, $data);
    }

    /**
     * 多多进宝商品推荐API
     * @param array $data
     * @return array
     */
    public function goodsRecommendGet($data=[]){
        $data = array_merge([
            "channel_type"      => "",
            "custom_parameters" => "",
            "limit"             => "",
            "list_id"           => "",
            "offset"            => "",
            "pid"               => "",
            "cat_id"            => "",
            "goods_ids"         => ""
        ],$data);
        $data['goods_ids'] = $this->_getArrayToString($data['goods_ids']);
        return $this->_query("pdd.ddk.goods.recommend.get",$data);
    }

    /**
     * 多多进宝商品查询
     * @param array $data
     * @return array
     */
    public function goodsSearch($data=[]){
        $data = array_merge([
            "activity_tags"    => "",
            "cat_id"           => "",
            "custom_parameters"=> "",
            "is_brand_goods"   => "",
            "keyword"          => "",
            "list_id"          => "",
            "merchant_type"    => "",
            "merchant_type_list"=> "",
            "opt_id"           => "",
            "page"             => "",
            "page_size"        => "",
            "range_list"       => "",
        ],$data);
        $data['activity_tags'] = $this->_getArrayToString($data['activity_tags']);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        $data['merchant_type_list'] = $this->_getArrayToString($data['merchant_type_list']);
        $data['range_list'] = $this->_getArrayToString($data['range_list']);
        return $this->_query("pdd.ddk.goods.search",$data);
    }

    /**
     * 查询商品的推广计划
     * @param array $data
     * @return array
     */
    public function goodsUnitQuery($data=[]){
        $data = array_merge([
            "goods_id"    => "",
            "zs_duo_id"   => "",
        ],$data);
        return $this->_query("pdd.ddk.goods.unit.query",$data);
    }

    /**
     * 多多进宝转链接口
     * @param array $data
     * @return array
     */
    public function goodsZsUnitUrlGen($data=[], $type="pdd.ddk.goods.zs.unit.url.gen"){
        $data = array_merge([
            "pid"        => "",
            "source_url" => "",
            "custom_parameters" => "",
        ],$data);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        return $this->_query($type, $data);
    }

    /**
     * 查询直播间详情
     * @param array $data
     * @return array
     */
    public function liveDetail($data=[]){
        $data = array_merge([
            "goods_page"      => "",
            "goods_page_size" => "",
            "need_goods_info" => "",
            "room_id" => "",
        ],$data);
        return $this->_query("pdd.ddk.live.detail",$data);
    }

    /**
     * 查询直播间列表
     * @param array $data
     * @return array
     */
    public function liveList($data=[]){
        $data = array_merge([
            "goods_page_size" => "",
            "need_goods_info" => "",
            "page"            => "",
            "page_size"       => "",
        ],$data);
        return $this->_query("pdd.ddk.live.list",$data);
    }

    /**
     * 生成直播间推广链接
     * @param array $data
     * @return array
     */
    public function liveUrlGen($data=[]){
        $data = array_merge([
            "custom_parameters"   => "",
            "generate_mobile"     => "",
            "generate_schema_url" => "",
            "generate_short_url"  => "",
            "generate_we_app"     => "",
            "live_type"           => "",
            "p_id"                => "",
            "room_id"             => "",
        ],$data);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        return $this->_query("pdd.ddk.live.url.gen",$data);
    }

    /**
     * 多多客生成转盘抽免单url
     * @param array $data
     * @return array
     */
    public function lotteryUrlGen($data=[], $type="pdd.ddk.lottery.url.gen"){
        $data = array_merge([
            "custom_parameters"   => "",
            "generate_qq_app"     => "",
            "generate_schema_url" => "",
            "generate_short_url"  => "",
            "generate_weapp_webview"  => "",
            "generate_we_app"     => "",
            "multi_group"         => "",
            "pid_list"            > "",
        ],$data);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        $data['pid_list'] = $this->_getArrayToString($data['pid_list']);
        return $this->_query($type, $data);
    }

    /**
     * 查询店铺商品
     * @param array $data
     * @return array
     */
    public function mallGoodsListGet($data=[]){
        $data = array_merge([
            "mall_id"   => "",
            "page_number"     => "",
            "page_size" => "",
            "pid"  => "",
            "custom_parameters"  => "",
        ],$data);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        return $this->_query("pdd.ddk.mall.goods.list.get",$data);
    }

    /**
     * 多多客生成店铺推广链接API
     * @param array $data
     * @return array
     */
    public function mallUrlGen($data=[], $type="pdd.ddk.mall.url.gen"){
        $data = array_merge([
            "generate_mall_collect_coupon" => "",
            "generate_qq_app"              => "",
            "generate_schema_url"          => "",
            "generate_weapp_webview"       => "",
            "generate_short_url"           => "",
            "generate_schema_url"          => "",
            "mall_id"                      => "",
            "multi_group"                  => "",
            "pid"                          => "",
            "custom_parameters"            => "",
        ],$data);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        return $this->_query($type, $data);
    }

    /**
     * 查询是否绑定备案
     * @param array $data
     * @return array
     */
    public function memberAuthorityQuery($data=[], $type="pdd.ddk.member.authority.query"){
        $data = array_merge([
            "pid"                          => "",
            "custom_parameters"            => "",
        ],$data);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        return $this->_query($type, $data);
    }

    /**
     * 多多客查店铺列表接口
     * @param array $data
     * @return array
     */
    public function merchantListGet($data=[]){
        $data = array_merge([
            "cat_id" => "",
            "has_clt_cpn" => "",
            "has_coupon" => "",
            "mall_id_list" => "",
            "merchant_type_list" => "",
            "page_number" => "",
            "page_size" => "",
            "query_range_str" => "",
            "range_vo_list" => "",
            "pid" => "",
            "custom_parameters" => "",
        ],$data);
        $data['mall_id_list'] = $this->_getArrayToString($data['mall_id_list']);
        $data['merchant_type_list'] = $this->_getArrayToString($data['merchant_type_list']);
        $data['range_vo_list'] = $this->_getArrayToString($data['range_vo_list']);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        return $this->_query("pdd.ddk.merchant.list.get",$data);
    }

    /**
     * 运营频道商品查询API
     * @param array $data
     * @return array
     */
    public function oauthGoodsRecommendGet($data=[]){
        $data = array_merge([
            "channel_type" => "",
            "limit" => "",
            "list_id" => "",
            "offset" => "",
            "pid" => "",
            "custom_parameters" => "",
        ],$data);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        return $this->_query("pdd.ddk.oauth.goods.recommend.get",$data);
    }

    /**
     * 获取订单详情
     * @param array $data
     * @return array
     */
    public function oauthOrderDetailGet($data=[]){
        $data = array_merge([
            "order_sn" => "",
            "query_order_type" => "",
        ],$data);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        return $this->_query("pdd.ddk.oauth.order.detail.get",$data);
    }

    /**
     * 多多客工具获取爆款排行商品接口
     * @param array $data
     * @return array
     */
    public function oauthTopGoodsListQuery($data=[]){
        $data = array_merge([
            "limit" => "",
            "list_id" => "",
            "offset" => "",
            "p_id" => "",
            "sort_type" => "",
            "custom_parameters" => "",
        ],$data);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        return $this->_query("pdd.ddk.oauth.top.goods.list.query",$data);
    }

    /**
     * 查询订单详情
     * @param array $data
     * @return array
     */
    public function orderDetailGet($data=[]){
        $data = array_merge([
            "order_sn" => "",
            "query_order_type" => ""
        ],$data);
        return $this->_query("pdd.ddk.order.detail.get",$data);
    }

    /**
     * 最后更新时间段增量同步推广订单信息
     * @param array $data
     * @return array
     */
    public function orderListIncrementGet($data=[]){
        $data = array_merge([
            "end_update_time" => "",
            "page" => "",
            "page_size" => "",
            "return_count" => "",
            "start_update_time" => "",
            "query_order_type" => "",
        ],$data);
        return $this->_query("pdd.ddk.order.list.increment.get",$data);
    }

    /**
     * 用时间段查询推广订单接口
     * @param array $data
     * @return array
     */
    public function orderListRangeGet($data=[]){
        $data = array_merge([
            "end_time" => "",
            "last_order_id" => "",
            "page_size" => "",
            "start_time" => "",
            "query_order_type" => "",
        ],$data);
        return $this->_query("pdd.ddk.order.list.range.get",$data);
    }

    /**
     * 生成多多进宝频道推广
     * @param array $data
     * @return array
     */
    public function resourceUrlGen($data=[], $type="pdd.ddk.resource.url.gen"){
        $data = array_merge([
            "custom_parameters"   => "",
            "generate_qq_app"     => "",
            "generate_schema_url" => "",
            "generate_we_app"     => "",
            "pid"                 => "",
            "resource_type"       => "",
            "url"                 => "",
        ],$data);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        return $this->_query($type, $data);
    }

    /**
     * 生成营销工具推广链接
     * @param array $data
     * @return array
     */
    public function rpPromUrlGenerate($data=[], $type="pdd.ddk.rp.prom.url.generate"){
        $data = array_merge([
            "channel_type"      => "",
            "custom_parameters" => "",
            "diy_lottery_param" => "",
            "diy_red_packet_param" => "",
            "generate_qq_app"      => "",
            "generate_schema_url"  => "",
            "generate_we_app"      => "",
            "generate_short_url"   => "",
            "p_id_list"            => "",
            "amount"               => "",
        ],$data);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        return $this->_query($type, $data);
    }

    /**
     * 多多进宝主题商品查询
     * @param array $data
     * @return array
     */
    public function themeGoodsSearch($data=[]){
        $data = array_merge([
            "theme_id"      => "",
        ],$data);
        return $this->_query("pdd.ddk.theme.goods.search",$data);
    }

    /**
     * 多多进宝主题列表查询
     * @param array $data
     * @return array
     */
    public function themeListGet($data=[]){
        $data = array_merge([
            "page"      => "",
            "page_size" => "",
        ],$data);
        return $this->_query("pdd.ddk.theme.list.get",$data);
    }

    /**
     * 多多进宝主题推广链接生成
     * @param array $data
     * @return array
     */
    public function themePromUrlGenerate($data=[], $type="pdd.ddk.theme.prom.url.generate"){
        $data = array_merge([
            "custom_parameters" => "",
            "generate_mobile" => "",
            "generate_qq_app" => "",
            "generate_schema_url" => "",
            "generate_short_url" => "",
            "generate_weapp_webview" => "",
            "generate_we_app" => "",
            "pid" => "",
            "theme_id_list" => "",
        ],$data);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        $data['theme_id_list'] = $this->_getArrayToString($data['theme_id_list']);
        return $this->_query($type ,$data);
    }

    /**
     * 多多客获取爆款排行商品接口
     * @param array $data
     * @return array
     */
    public function topGoodsListQuery($data=[]){
        $data = array_merge([
            "custom_parameters" => "",
            "limit" => "",
            "list_id" => "",
            "offset" => "",
            "p_id" => "",
            "sort_type" => "",
        ],$data);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        return $this->_query("pdd.ddk.top.goods.list.query",$data);
    }

    /**
     * 多多客生成单品推广小程序二维码url
     * @param array $data
     * @return array
     */
    public function webappQrcodeUrlGen($data=[]){
        $data = array_merge([
            "custom_parameters" => "",
            "generate_mall_collect_coupon" => "",
            "goods_id_list" => "",
            "zs_duo_id" => "",
            "p_id" => "",
            "room_id_list" => "",
            "target_id_list" => "",
        ],$data);
        $data['custom_parameters'] = $this->_getArrayToString($data['custom_parameters']);
        $data['goods_id_list'] = $this->_getArrayToString($data['goods_id_list']);
        $data['room_id_list'] = $this->_getArrayToString($data['room_id_list']);
        $data['target_id_list'] = $this->_getArrayToString($data['target_id_list']);
        return $this->_query("pdd.ddk.weapp.qrcode.url.gen",$data);
    }

    /**
     * 商品标准类目接口
     * @param array $data
     * @return array
     */
    public function goodsCatsGet($data=[]){
        $data = array_merge([
            "parent_cat_id" => "",
        ],$data);
        return $this->_query("pdd.goods.cats.get",$data);
    }

    /**
     * 删除单品计划接口
     * @param array $data
     * @return array
     */
    public function goodsCpsUnitDelete($data=[]){
        $data = array_merge([
            "goods_id" => "",
        ],$data);
        return $this->_query("pdd.goods.cps.unit.delete",$data);
    }

    /**
     * 查询商品标签列表
     * @param array $data
     * @return array
     */
    public function goodsOptGet($data=[]){
        $data = array_merge([
            "parent_opt_id" => "",
        ],$data);
        return $this->_query("pdd.goods.opt.get",$data);
    }

    /**
     * 查询所有授权的多多客订单
     * @param array $data
     * @return array
     */
    public function allOrderListIncrementGet($data=[]){
        $data = array_merge([
            "end_update_time" => "",
            "page" => "",
            "page_size" => "",
            "start_update_time" => "",
            "query_order_type" => "",
        ],$data);
        return $this->_query("pdd.ddk.all.order.list.increment.get",$data);
    }

    /**
     * 生成商城推广链接接口
     * @param array $data
     * @return array
     */
    public function oauthCmsPromUrlGenerate($data=[]){
        return $this->cmsPromUrlGenerate($data, "pdd.ddk.oauth.cms.prom.url.generate");
    }

    /**
     * 多多进宝推广位创建接口
     * @param array $data
     * @return array
     */
    public function oauthGoodsPidGenerate($data=[]){
        return $this->goodsPidGenerate($data, "pdd.ddk.oauth.goods.pid.generate");
    }

    /**
     * 多多进宝推广位创建接口
     * @param array $data
     * @return array
     */
    public function oauthGoodsPidQuery($data=[]){
        return $this->goodsPidQuery($data, "pdd.ddk.oauth.goods.pid.generate");
    }

    /**
     * 多多进宝推广位创建接口
     * @param array $data
     * @return array
     */
    public function oauthGoodsPromotionUrlGenerate($data=[]){
        return $this->goodsPromotionUrlGenerate($data, "pdd.ddk.oauth.goods.pid.generate");
    }

    /**
     * 生成招商推广链接
     * @param array $data
     * @return array
     */
    public function oauthgoodsZsUnitUrlGen($data=[]){
        return $this->goodsZsUnitUrlGen($data, "pdd.ddk.oauth.goods.zs.unit.url.gen");
    }

    /**
     * 多多客工具生成转盘抽免单url
     * @param array $data
     * @return array
     */
    public function oauthLotteryUrlGen($data=[]){
        return $this->lotteryUrlGen($data, "pdd.ddk.oauth.goods.zs.unit.url.gen");
    }

    /**
     * 多多客工具生成店铺推广链接API
     * @param array $data
     * @return array
     */
    public function oauthMallUrlGen($data=[]){
        return $this->mallUrlGen($data, "pdd.ddk.oauth.mall.url.gen");
    }

    /**
     * 查询是否绑定备案
     * @param array $data
     * @return array
     */
    public function oauthMemberAuthorityQuery($data=[]){
        return $this->memberAuthorityQuery($data, "pdd.ddk.oauth.member.authority.query");
    }

    /**
     * 拼多多主站频道推广接口
     * @param array $data
     * @return array
     */
    public function oauthResourceUrlGen($data=[]){
        return $this->resourceUrlGen($data, "pdd.ddk.oauth.member.authority.query");
    }

    /**
     * 生成营销工具推广链接
     * @param array $data
     * @return array
     */
    public function oauthRpPromUrlGenerate($data=[]){
        return $this->rpPromUrlGenerate($data, "pdd.ddk.oauth.rp.prom.url.generate");
    }

    /**
     * 多多进宝主题推广链接生成接口
     * @param array $data
     * @return array
     */
    public function oauthThemePromUrlGenerate($data=[]){
        return $this->themePromUrlGenerate($data, "pdd.ddk.oauth.theme.prom.url.generate");
    }

    /**
     * 自定义查询数据
     * @param string $method API接口名称
     * @param array $data API接口参数
     * @return array 返回值
     */
    public function query($method="pdd.ddk.cms.prom.url.generate", $data=[]){
        return $this->_query($method, $data);
    }
}