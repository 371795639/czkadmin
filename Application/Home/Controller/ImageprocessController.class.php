<?php
namespace Home\Controller;
use Think\Controller;

class ImageprocessController extends Controller {

    // 初始化
    public function _initialize() {
        header('Content-Type:text/html;charset=utf-8');
    }

    // 首页
    public function index() {
        $this->display();
    }

    // 菜品识别page
    public function dishDetect() {
        $this->display();
    }

    // 菜品识别api
    public function dishDetectApi() {
        $this->imagePackage();
        $info = $this->authorImageInfo();
        $client= $this->apiImageClient($info['id'],$info['key'],$info['secret']);
        $image = file_get_contents($_FILES);
        // 调用菜品识别
        $client->dishDetect($image);
        // 如果有可选参数
        $options = array();
        $options["top_num"] = 3;
        // 带参数调用菜品识别
        $result =  $client->dishDetect($image, $options);
        echo json_encode($result);
    }

    // 车辆识别page
    public function carDetect() {
        $this->display();
    }

    // 车辆识别api
    public function carDetectApi() {
        $this->imagePackage();
        $info = $this->authorImageInfo();
        $client= $this->apiImageClient($info['id'],$info['key'],$info['secret']);
        $image = file_get_contents($_FILES);
        // 调用菜品识别
        $client->carDetect($image);
        // 如果有可选参数
        $options = array();
        $options["top_num"] = 3;
        // 带参数调用菜品识别
        $result =  $client->carDetect($image, $options);
        echo json_encode($result);

    }

    // 百度图像识别引入包
    public function imagePackage() {
        $package['api']    =   Vendor("baiduApi");
        $package['class']  =  Vendor("baiduApi.AipImageClassify");
        return $package;
    }

    // 授权信息获取
    public function authorImageInfo() {
        $config = new \AuthorConfig();
        $info['id'] = $config::IMG_APP_ID;
        $info['key'] = $config::IMG_API_KEY;
        $info['secret'] = $config::IMG_SECRET_KEY;
        return $info;
    }

    // client实例化
    public function apiImageClient($id,$key,$secret) {
        $client= new \AipImageClassify($id,$key,$secret);
        return $client;
    }
}