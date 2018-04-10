<?php
namespace Home\Controller;
use Think\Controller;

class OcrdetectController extends Controller {

    // 初始化
    public function _initialize() {
        header('Content-Type:text/html;charset=utf-8');
    }
    // 首页
    public function index() {
        $this->display();
    }
    // 通用文字识别api
    public function generalDetectApi() {
        // 识别技术包引入
        visualPackage('ocrDetect');
        // 获取授权信息
        $info = authorVisualInfo();
        // 视觉技术用户参数实例化
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'ocrDetect');
        $image = file_get_contents($_FILES['general_pic']['tmp_name']);
        // 调用通用文字识别, 图片参数为本地图片
        // $client->basicGeneral($image);
        // 调用通用文字识别, 图片参数为远程url图片
        // $client->basicGeneralUrl($url);
        // 如果有可选参数
        $options = array();
        $options["language_type"] = "CHN_ENG";
        $options["detect_direction"] = "true";
        $options["detect_language"] = "true";
        $options["probability"] = "true";
        // 带参数调用图像分析图 片参数为本地图片
        $result =  $client->basicGeneral($image, $options);
        // 带参数调用通用文字识别, 图片参数为远程url图片
        // $result = $client->basicGeneralUrl($url, $options);
        echo json_encode($result);

    }
    // 网络图片识别api
    public function webDetectApi() {
        visualPackage('ocrDetect');
        $info = authorVisualInfo();
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'ocrDetect');
        $image = file_get_contents($_FILES['web_pic']['tmp_name']);
        // 调用网络图片文字识别, 图片参数为本地图片
        // $client->webImage($image);
        // 调用网络图片文字识别, 图片参数为远程url图片
        // $client->webImageUrl($url);
        // 如果有可选参数
        $options = array();
        $options["detect_direction"] = "true";
        $options["detect_language"] = "true";
        // 带参数调用网络图片文字识别, 图片参数为本地图片
        $result =  $client->webImage($image, $options);
        // 调用网络图片文字识别, 图片参数为远程url图片
        // $reslut = $client->webImageUrl($url);
        echo json_encode($result);
    }
    // 身份证识别api
    public function idcardDetectApi() {
        visualPackage('ocrDetect');
        $info = authorVisualInfo();
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'ocrDetect');
        $image = file_get_contents($_FILES['idcard_pic']['tmp_name']);
        $idCardSide = I('post.idcard_pn'); // front：身份证含照片的一面；back：身份证带国徽的一面
        // 调用身份证识别
        // $client->idcard($image, $idCardSide);
        // 如果有可选参数
        $options = array();
        $options["detect_direction"] = "true";
        $options["detect_risk"] = "false";
        // 带参数调用身份证识别
        $result = $client->idcard($image, $idCardSide, $options);
        echo json_encode($result);
    }
    // 银行卡识别api
    public function bankcardDetectApi() {
        visualPackage('ocrDetect');
        $info = authorVisualInfo();
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'ocrDetect');
        $image = file_get_contents($_FILES['bank_pic']['tmp_name']);
        // 调用银行卡识别
        $result = $client->bankcard($image);
        echo json_encode($result);
    }
    // 驾驶证识别api
    public function drivingLicenseDetectApi() {
        visualPackage('ocrDetect');
        $info = authorVisualInfo();
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'ocrDetect');
        $image = file_get_contents($_FILES['drivingLicense_pic']['tmp_name']);
        // 调用驾驶证识别
        // $client->drivingLicense($image);
        // 如果有可选参数
        $options = array();
        $options["detect_direction"] = "true";
        // 带参数调用驾驶证识别
        $result =  $client->drivingLicense($image, $options);
        echo json_encode($result);

    }
    // 行驶证识别api
    public function vehicleLicenseDetectApi() {
        visualPackage('ocrDetect');
        $info = authorVisualInfo();
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'ocrDetect');
        $image = file_get_contents($_FILES['vehicleLicense_pic']['tmp_name']);
        // 调用行驶证识别
        // $client->vehicleLicense($image);
        // 如果有可选参数
        $options = array();
        $options["detect_direction"] = "true";
        $options["accuracy"] = "normal";
        // 带参数调用行驶证识别
        $result =  $client->vehicleLicense($image, $options);
        echo json_encode($result);

    }
    // 车牌识别api
    public function licensePlateDetectApi() {
        visualPackage('ocrDetect');
        $info = authorVisualInfo();
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'ocrDetect');
        $image = file_get_contents($_FILES['licensePlate_pic']['tmp_name']);
        // 调用车牌识别
        // $client->licensePlate($image);
        // 如果有可选参数
        $options = array();
        $options["multi_detect"] = "true";
        // 带参数调用行驶证识别
        $result =  $client->licensePlate($image, $options);
        echo json_encode($result);

    }
    // 营业执照识别api
    public function businessLicenseDetectApi() {
        visualPackage('ocrDetect');
        $info = authorVisualInfo();
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'ocrDetect');
        $image = file_get_contents($_FILES['businessLicense_pic']['tmp_name']);
        // 调用营业执照识别
        $result =  $client->businessLicense($image);
        echo json_encode($result);

    }
    // 通用票据识别api
    public function receiptDetectApi() {
        visualPackage('ocrDetect');
        $info = authorVisualInfo();
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'ocrDetect');
        $image = file_get_contents($_FILES['receipt_pic']['tmp_name']);
        // 调用通用票据识别
        // $client->receipt($image);
        // 如果有可选参数
        $options = array();
        $options["recognize_granularity"] = "big";
        $options["probability"] = "true";
        $options["accuracy"] = "normal";
        $options["detect_direction"] = "true";
        // 带参数调用通用票据识别
        $result = $client->receipt($image, $options);
        echo json_encode($result);

    }


}