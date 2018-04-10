<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2018/4/9
 * Time: 下午3:40
 */

// 百度视觉技术引入包
 function visualPackage($style) {
        $package['api']   =   Vendor("baiduApi");
        switch ($style) {
            case 'imageDetect':  // 引入图像识别类
                $package['class']  =  Vendor("baiduApi.AipImageClassify");
                break;
            case 'ocrDetect':    // 引入文字识别类
                $package['class']  = Vendor("baiduApi.AipOcr");
                break;
            case 'faceDetect':    // 引入人脸识别类
                $package['class']  = Vendor("baiduApi.AipFace");
                break;
        }
        return $package;
    }
// 授权信息获取
 function authorVisualInfo() {
    $config = new \AuthorConfig();
    $info['id'] = $config::VISUAL_APP_ID;
    $info['key'] = $config::VISUAL_API_KEY;
    $info['secret'] = $config::VISUAL_SECRET_KEY;
    return $info;
}
// 视觉技术用户参数实例化
 function apiVisualClient($id,$key,$secret,$style) {
     switch ($style) {
         case 'imageDetect':
             $client = new \AipImageClassify($id,$key,$secret);
             break;
         case 'ocrDetect':
             $client = new \AipOcr($id,$key,$secret);
             break;
         case 'faceDetect':
             $client = new \AipFace($id,$key,$secret);
             break;

         default:$client='';
     }

    return $client;
}