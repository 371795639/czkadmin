<?php
namespace Home\Controller;
use Think\Controller;

class FacedetectController extends Controller {

    // 初始化
    public function _initialize() {
        header('Content-Type:text/html;charset=utf-8');
    }
    // 首页
    public function index() {
        $this->display();
    }
    // 人脸检测api
    public function faceDetectApi() {
        // 识别技术包引入
        visualPackage('faceDetect');
        // 获取授权信息
        $info = authorVisualInfo();
        // 视觉技术用户参数实例化
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'faceDetect');
        $image = file_get_contents($_FILES['face_pic']['tmp_name']);
        // 调用人脸检测
        // $client->detect($image);
        // 如果有可选参数
        $options = array();
        $options["max_face_num"] = 2;
        $options["face_fields"] = "age,beauty,glasses,gender,expression"; //年龄,美丑,是否戴眼镜,性别,表情

        // 带参数调用图像分析图 片参数为本地图片
        $result = $client->detect($image, $options);
        // 带参数调用通用文字识别, 图片参数为远程url图片
        // $result = $client->basicGeneralUrl($url, $options);
        echo json_encode($result);

    }
    // 人脸比对识别api
    public function matchDetectApi() {
        // 识别技术包引入
        visualPackage('faceDetect');
        // 获取授权信息
        $info = authorVisualInfo();
        // 视觉技术用户参数实例化
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'faceDetect');
        $images = array(
            file_get_contents($_FILES['match1_pic']['tmp_name']),
            file_get_contents($_FILES['match2_pic']['tmp_name']),
        );
        // 调用人脸比对
        // $client->match($images);
        // 如果有可选参数
        $options = array();
        $options["ext_fields"] = "qualities";
        $options["image_liveness"] = ",faceliveness";
        $options["types"] = "7,13";
        // 带参数调用人脸比对
        $result = $client->match($images, $options);
        // 带参数调用通用文字识别, 图片参数为远程url图片
        // $result = $client->basicGeneralUrl($url, $options);
        echo json_encode($result);

    }
    // 在线活体检测api
    public function faceverifyDetectApi() {
        // 识别技术包引入
        visualPackage('faceDetect');
        // 获取授权信息
        $info = authorVisualInfo();
        // 视觉技术用户参数实例化
        $client = apiVisualClient($info['id'],$info['key'],$info['secret'],'faceDetect');
        $image = file_get_contents($_FILES['faceverify_pic']['tmp_name']);
        // 调用在线活体检测
        // $client->faceverify($image);
        // 如果有可选参数
        $options = array();
        $options["max_face_num"] = 2;
        $options["face_fields"] = "qualities,faceliveness";
        // 带参数调用在线活体检测
        $result = $client->faceverify($image, $options);
        echo json_encode($result);

    }


}