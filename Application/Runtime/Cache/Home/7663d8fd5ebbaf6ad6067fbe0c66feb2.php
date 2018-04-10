<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>czkadmin</title>
    <!--<link rel="stylesheet" href="//cdn.bootcss.com/uikit/2.25.0/css/uikit.css" />-->
    <!--<script src="//cdn.bootcss.com/uikit/2.25.0/js/uikit.js"></script>-->
    <link rel="stylesheet" href="/czkadmin/Public/uikit-2.25.0/css/uikit.min.css" />
    <link rel="stylesheet" href="/czkadmin/Public/css/jquery.json-viewer.css" />
    <link rel="stylesheet" href="/czkadmin/Public/css/loading.css" />
    <script src="/czkadmin/Public/uikit-2.25.0/js/uikit.js"></script>
    <script src="/czkadmin/Public/jquery/jquery-3.1.1.min.js"></script>
    <script src="/czkadmin/Public/jquery/jquery.json-viewer.js"></script>

</head>


<body>
<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">

    <nav class="uk-navbar uk-margin-large-bottom">
        <a class="uk-navbar-brand uk-hidden-small" href="<?php echo U('Home/Index/index');?>">首页</a>
        <a class="uk-navbar-brand uk-hidden-small" href="http://ai.baidu.com/docs/#/ImageClassify-API/top" target="_blank">开发文档</a>
        <!--<a class="uk-navbar-brand uk-hidden-small" href="#">返回首页</a>-->
        <!--<a class="uk-navbar-brand uk-hidden-small" href="#">sample4</a>-->
        <!--<a class="uk-navbar-brand uk-hidden-small" href="#">sample5</a>-->
        <!--<a class="uk-navbar-brand uk-hidden-small" href="#">sample6</a>-->
    </nav>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-3">
            <div class="uk-grid">
                <div class="uk-width-1-6">
                    <i class="uk-icon-file-photo-o uk-icon-large uk-text-primary"></i>
                </div>
                <div class="uk-width-5-6">
                    <h2 class="uk-h3">图像审核(色情,暴恐,政治)</h2>
                    <p>请上传待审核图像</p>
                    <input type="file" name="imageCensor_pic" id="imageCensor_pic" accept="image/gif/jpg" onchange="imageCensorPreview()"/>
                    <img id="imageCensor_pic_show" name="imageCensor_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="button" name="uploadPicButton" value="上传" onclick="imageCensorPic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                            <pre id="imageCensorPre"><p>返回结果</p></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-width-medium-1-3">
            <div class="uk-grid">
                <div class="uk-width-1-6">
                    <i class="uk-icon-github-alt uk-icon-large uk-text-primary"></i>
                </div>
                <div class="uk-width-5-6">
                    <h2 class="uk-h3">gif色情图像识别</h2>
                    <p>请上传待审核的gif图像</p>
                    <input type="file" name="antiPornGif_pic" id="antiPornGif_pic" accept="image/gif/jpg" onchange="antiPornGifPreview()"/>
                    <img id="antiPornGif_pic_show" name="antiPornGif_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="button" name="uploadPicButton" value="上传" onclick="antiPornGifPic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                            <pre id="antiPornGifPre"><p>返回结果</p></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-width-medium-1-3">
            <div class="uk-grid">
                <div class="uk-width-1-6">
                    <i class="uk-icon-github-alt uk-icon-large uk-text-primary"></i>
                </div>
                <div class="uk-width-5-6">
                    <h2 class="uk-h3">头像审核</h2>
                    <p>请上传待审核的头像</p>
                    <input type="file" name="faceAudit_pic" id="faceAudit_pic" accept="image/gif/jpg" onchange="faceAuditPreview()"/>
                    <img id="faceAudit_pic_show" name="faceAudit_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="button" name="uploadPicButton" value="上传" onclick="faceAuditPic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                            <pre id="faceAuditPre"><p>返回结果</p></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<!--loading动画!-->
<div id="loading" class="loading" style="display:none">Loading pages...</div>

</body>
</html>

<script>

    // 通用图像审核
    function imageCensorPic() {
        var pic = $('#imageCensor_pic')[0].files[0];
        var fd = new FormData();
        $('#loading').show();
        fd.append('imageCensor_pic', pic);
        $.ajax({
            url:"<?php echo U('Imagecensor/imageCensorApi');?>",
            type:"post",
            // Form数据
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#loading').hide();

                try {
                    var input = eval('(' + data + ')');
                }
                catch (error) {
                    return alert("Cannot eval JSON: " + error);
                }
                var options = {
                    collapsed: false,
                    withQuotes: false
                };
                $('#imageCensorPre').jsonViewer(input, options);
            }
        });

    }
    // gif图像分析
    function antiPornGifPic() {
        var pic = $('#antiPornGif_pic')[0].files[0];
        var fd = new FormData();
        $('#loading').show();
        fd.append('antiPornGif_pic', pic);
        $.ajax({
            url:"<?php echo U('Imagecensor/antiPornGifApi');?>",
            type:"post",
            // Form数据
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#loading').hide();

                try {
                    var input = eval('(' + data + ')');
                }
                catch (error) {
                    return alert("Cannot eval JSON: " + error);
                }
                var options = {
                    collapsed: false,
                    withQuotes: false
                };
                $('#antiPornGifPre').jsonViewer(input, options);
            }
        });

    }
    // 头像审核
    function faceAuditPic() {
        var pic = $('#faceAudit_pic')[0].files[0];
        var fd = new FormData();
        $('#loading').show();
        fd.append('faceAudit_pic', pic);
        $.ajax({
            url:"<?php echo U('Imagecensor/faceAuditApi');?>",
            type:"post",
            // Form数据
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#loading').hide();

                try {
                    var input = eval('(' + data + ')');
                }
                catch (error) {
                    return alert("Cannot eval JSON: " + error);
                }
                var options = {
                    collapsed: false,
                    withQuotes: false
                };
                $('#faceAuditPre').jsonViewer(input, options);
            }
        });

    }

    // 显示待审核通用图片
    function imageCensorPreview() {
        var r= new FileReader();
        f=document.getElementById('imageCensor_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('imageCensor_pic_show').src=this.result;
        };
    }
    // 显示待审核gif图像
    function antiPornGifPreview() {
        var r= new FileReader();
        f=document.getElementById('antiPornGif_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('antiPornGif_pic_show').src=this.result;
        };
    }
    // 显示待审核头像
    function faceAuditPreview() {
        var r= new FileReader();
        f=document.getElementById('faceAudit_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('faceAudit_pic_show').src=this.result;
        };
    }


</script>


</script>