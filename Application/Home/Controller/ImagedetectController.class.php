<?php
namespace Home\Controller;
use Think\Controller;

class ImagedetectController extends Controller {

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
        // 识别技术包引入
        visualPackage('imageDetect');
        // 获取授权信息
        $info = authorVisualInfo();
        // 视觉技术用户参数实例化
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'imageDetect');
        $image = file_get_contents($_FILES['general_pic']['tmp_name']);
        // 调用图像分析
        // $client->objectDetect($image);
        // 如果有可选参数
        $options = array();
        $options["with_face"] = 0;//如果检测主体是人，主体区域是否带上人脸部分，0-不带人脸区域，其他-带人脸区域，裁剪类需求推荐带人脸，检索/识别类需求推荐不带人脸。默认取1，带人脸。
        // 带参数调用图像分析
        $result =  $client->objectDetect($image, $options);
        echo json_encode($result);

    }
    // 植物识别api
    public function plantDetectApi() {
        visualPackage('imageDetect');
        $info = authorVisualInfo();
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'imageDetect');
        $image = file_get_contents($_FILES['plant_pic']['tmp_name']);
        // 调用植物识别
        // $client->plantDetect($image);
        // 如果有可选参数
        $options = array();
        $options["top_num"] = 3;
        // 带参数调用植物识别
        $result =  $client->plantDetect($image, $options);
        echo json_encode($result);
    }
    // 动物识别api
    public function animalDetectApi() {
        visualPackage('imageDetect');
        $info = authorVisualInfo();
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'imageDetect');
        $image = file_get_contents($_FILES['animal_pic']['tmp_name']);
        // 调用动物识别
        // $client->animalDetect($image);
        // 如果有可选参数
        $options = array();
        $options["top_num"] = 3;
        // 带参数调用动物识别
        $result =  $client->animalDetect($image, $options);
        echo json_encode($result);
    }
    // 菜品识别api
    public function dishDetectApi() {
        visualPackage('imageDetect');
        $info = authorVisualInfo();
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'imageDetect');
        $image = file_get_contents($_FILES['dish_pic']['tmp_name']);
        // 调用菜品识别
        // $client->dishDetect($image);
        // 如果有可选参数
        $options = array();
        $options["top_num"] = 3;
        // 带参数调用菜品识别
        $result =  $client->dishDetect($image, $options);
        echo json_encode($result);
    }
    // 车辆识别api
    public function carDetectApi() {
        visualPackage('imageDetect');
        $info = authorVisualInfo();
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'imageDetect');
        $image = file_get_contents($_FILES['car_pic']['tmp_name']);
        // 调用车辆识别
        // $client->carDetect($image);
        // 如果有可选参数
        $options = array();
        $options["top_num"] = 3;
        // 带参数调用车辆识别
        $result =  $client->carDetect($image, $options);
        echo json_encode($result);

    }
    // logo识别api
    /*
    public function logoDetectApi() {
        visualPackage('imageDetect');
        $info = authorVisualInfo();
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'imageDetect');
        $image = file_get_contents($_FILES['car_pic']['tmp_name']);
        // 调用logo识别
        // $client->logoSearch($image);
        // 如果有可选参数
        $options = array();
        $options["custom_lib"] = "false";//是否只使用自定义logo库的结果，默认false：返回自定义库+默认库的识别结果
        // 带参数调用车辆识别
        $result =  $client->logoSearch($image, $options);
        echo json_encode($result);

    }*/
    // logo添加api
    /*
    public function logoAddApi() {
        visualPackage('imageDetect');
        $info = authorVisualInfo();
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'imageDetect');
        $image = file_get_contents($_FILES['car_pic']['tmp_name']);
        $brief = "{\"name\": \"宝马\",\"code\":\"666\"}";
        // 调用logo商标识别—添加
        try {
            $result = $client->logoAdd($image, $brief);
            echo json_encode($result);
        } catch(Exception $e) {
            return false;
        }
    }
    */
    // logo删除api
    /*
    public function logoDeleteApi() {
        visualPackage('imageDetect');
        $info = authorVisualInfo();
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'imageDetect');
        $image = file_get_contents($_FILES['car_pic']['tmp_name']);
        // 调用删除logo商标，传入参数为图片
        $client->logoDeleteByImage($image);
        $contSign = "8cnn32frvrr2cd901";
        // 调用删除logo商标，传入参数为图片签名
        try {
            $result = $client->logoDeleteBySign($contSign);
            echo json_encode($result);
        } catch(Exception $e) {
            return false;
        }
    }
    */
}