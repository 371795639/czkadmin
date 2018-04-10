<?php
namespace Home\Controller;
use Think\Controller;

class imagecensorController extends Controller {

    // 初始化
    public function _initialize() {
        header('Content-Type:text/html;charset=utf-8');
    }
    // 首页
    public function index() {
        $this->display();
    }
    // 图像审核api
    public function imageCensorApi() {
        // 识别技术包引入
        visualPackage('imageCensor');
        // 获取授权信息
        $info = authorVisualInfo();
        // 视觉技术用户参数实例化
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'imageCensor');
        $image = file_get_contents($_FILES['imageCensor_pic']['tmp_name']);
        // 本地图片
        $result = $client->imageCensorUserDefined($image);
        // 如果图片是url调用如下
        // $result = $client->imageCensorUserDefined('http://www.example.com/image.jpg');
        echo json_encode($result);

    }
    // gif图像审核api
    public function antiPornGifApi() {
        // 识别技术包引入
        visualPackage('imageCensor');
        // 获取授权信息
        $info = authorVisualInfo();
        // 视觉技术用户参数实例化
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'imageCensor');
        $image = file_get_contents($_FILES['antiPornGif_pic']['tmp_name']);
        // 本地图片
        $result = $client->antiPornGif($image);
        // 如果图片是url调用如下
        // $result = $client->imageCensorUserDefined('http://www.example.com/image.jpg');
        echo json_encode($result);

    }
    // 头像审核api
    public function faceAuditApi() {
        // 识别技术包引入
        visualPackage('imageCensor');
        // 获取授权信息
        $info = authorVisualInfo();
        // 视觉技术用户参数实例化
        $client= apiVisualClient($info['id'],$info['key'],$info['secret'],'imageCensor');
        $image = file_get_contents($_FILES['faceAudit_pic']['tmp_name']);
        // 调用接口
        $result = $client->faceAudit($image);

/*      // 多张
        $result = $client->faceAudit(
            array(
                file_get_contents('img1.jpg'),
                file_get_contents('img2.jpg'),
            ),
            1 // 审核配置ID 默认不填写
        );

        // URL
        $result = $client->faceAudit(
            'http://ai.bdstatic.com/dist/1497098356/ai_images/technology/antiporn/demo-card-1.jpg'
        );

        // 多个URL
        $result = $client->faceAudit(
            array(
                'http://ai.bdstatic.com/dist/1497098356/ai_images/technology/antiporn/demo-card-1.jpg',
                'http://ai.bdstatic.com/dist/1497098356/ai_images/technology/antiporn/demo-card-2.jpg',
            )
        );
*/
        echo json_encode($result);

    }

}