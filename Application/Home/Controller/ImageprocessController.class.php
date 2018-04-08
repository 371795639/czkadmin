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
    // 通用图像分析api
    public function generalDetectApi() {
        $this->imagePackage();
        $info = $this->authorImageInfo();
        $client= $this->apiImageClient($info['id'],$info['key'],$info['secret']);
        $image = file_get_contents($_FILES['general_pic']['tmp_name']);
        // 调用图像分析
        $client->objectDetect($image);
        // 如果有可选参数
        $options = array();
        $options["with_face"] = 0;//如果检测主体是人，主体区域是否带上人脸部分，0-不带人脸区域，其他-带人脸区域，裁剪类需求推荐带人脸，检索/识别类需求推荐不带人脸。默认取1，带人脸。
        // 带参数调用图像分析
        $result =  $client->objectDetect($image, $options);
        echo json_encode($result);

    }
    // 植物识别api
    public function plantDetectApi() {
        $this->imagePackage();
        $info = $this->authorImageInfo();
        $client= $this->apiImageClient($info['id'],$info['key'],$info['secret']);
        $image = file_get_contents($_FILES['plant_pic']['tmp_name']);
        // 调用植物识别
        $client->plantDetect($image);
        // 如果有可选参数
        $options = array();
        $options["top_num"] = 3;
        // 带参数调用植物识别
        $result =  $client->plantDetect($image, $options);
        echo json_encode($result);
    }
    // 动物识别api
    public function animalDetectApi() {
        $this->imagePackage();
        $info = $this->authorImageInfo();
        $client= $this->apiImageClient($info['id'],$info['key'],$info['secret']);
        $image = file_get_contents($_FILES['animal_pic']['tmp_name']);
        // 调用动物识别
        $client->animalDetect($image);
        // 如果有可选参数
        $options = array();
        $options["top_num"] = 3;
        // 带参数调用动物识别
        $result =  $client->animalDetect($image, $options);
        echo json_encode($result);
    }
    // 菜品识别api
    public function dishDetectApi() {
        $this->imagePackage();
        $info = $this->authorImageInfo();
        $client= $this->apiImageClient($info['id'],$info['key'],$info['secret']);
        $image = file_get_contents($_FILES['dish_pic']['tmp_name']);
        // 调用菜品识别
        $client->dishDetect($image);
        // 如果有可选参数
        $options = array();
        $options["top_num"] = 3;
        // 带参数调用菜品识别
        $result =  $client->dishDetect($image, $options);
        echo json_encode($result);
    }
    // 车辆识别api
    public function carDetectApi() {
        $this->imagePackage();
        $info = $this->authorImageInfo();
        $client= $this->apiImageClient($info['id'],$info['key'],$info['secret']);
        $image = file_get_contents($_FILES['car_pic']['tmp_name']);
        // 调用车辆识别
        $client->carDetect($image);
        // 如果有可选参数
        $options = array();
        $options["top_num"] = 3;
        // 带参数调用车辆识别
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
    // 用户参数实例化
    public function apiImageClient($id,$key,$secret) {
        $client= new \AipImageClassify($id,$key,$secret);
        return $client;
    }
}