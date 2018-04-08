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
        <a class="uk-navbar-brand uk-hidden-small" href="#">sample1</a>
        <a class="uk-navbar-brand uk-hidden-small" href="#">sample2</a>
        <a class="uk-navbar-brand uk-hidden-small" href="#">sample3</a>
        <a class="uk-navbar-brand uk-hidden-small" href="#">sample4</a>
        <a class="uk-navbar-brand uk-hidden-small" href="#">sample5</a>
        <a class="uk-navbar-brand uk-hidden-small" href="#">sample6</a>
    </nav>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-3">
            <div class="uk-grid">
                <div class="uk-width-1-6">
                    <i class="uk-icon-cog uk-icon-large uk-text-primary"></i>
                </div>
                <div class="uk-width-5-6">
                    <h2 class="uk-h3">通用图像分析</h2>
                    <p>请上传任意图像</p>
                    <input type="file" name="general_pic" id="general_pic" accept="image/gif/jpg" onchange="generalPreview()"/>
                    <img id="general_pic_show" name="general_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="button" name="uploadPicButton" value="上传" onclick="generalPic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                            <pre id="generalPre"><p>返回结果</p></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-width-medium-1-3">
            <div class="uk-grid">
                <div class="uk-width-1-6">
                    <i class="uk-icon-thumbs-o-up uk-icon-large uk-text-primary"></i>
                </div>
                <div class="uk-width-5-6">
                    <h2 class="uk-h3">植物识别</h2>
                    <p>请上传植物图片</p>
                    <input type="file" name="plant_pic" id="plant_pic" accept="image/gif/jpg" onchange="plantPreview()" />
                    <img id="plant_pic_show" name="plant_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="button" name="uploadPicButton" value="上传" onclick="plantPic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                            <pre id="plantPre"><p>返回结果</p></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-width-medium-1-3">
            <div class="uk-grid">
                <div class="uk-width-1-6">
                    <i class="uk-icon-cloud-download uk-icon-large uk-text-primary"></i>
                </div>
                <div class="uk-width-5-6">
                    <h2 class="uk-h3">动物识别</h2>
                    <p>请上传动物图片</p>
                    <input type="file" name="animal_pic" id="animal_pic" accept="image/gif/jpg" onchange="animalPreview()"/>
                    <img id="animal_pic_show" name="animal_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="button" name="uploadPicButton" value="上传" onclick="animalPic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                            <pre id="animalPre"><p>返回结果</p></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-3">
            <div class="uk-grid">
                <div class="uk-width-1-6">
                    <i class="uk-icon-dashboard uk-icon-large uk-text-primary"></i>
                </div>
                <div class="uk-width-5-6">
                    <h2 class="uk-h3">菜品识别</h2>
                    <p>请上传菜品图片</p>
                    <input type="file" name="dish_pic" id="dish_pic" accept="image/gif/jpg" onchange="dishPreview()" />
                    <img id="dish_pic_show" name="dish_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="button" name="uploadPicButton" value="上传" onclick="dishPic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                                <pre id="disPre"><p>返回结果</p></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-width-medium-1-3">
            <div class="uk-grid">
                <div class="uk-width-1-6">
                    <i class="uk-icon-comments uk-icon-large uk-text-primary"></i>
                </div>
                <div class="uk-width-5-6">
                    <h2 class="uk-h3">车型识别</h2>
                    <p>请上传车型图片</p>
                    <input type="file" name="car_pic" id="car_pic" accept="image/gif/jpg"  onchange="carPreview()"/>
                    <img id="car_pic_show" name="car_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="button" name="uploadPicButton" value="上传"  onclick="carPic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                            <pre id="carPre"><p>返回结果</p></pre>
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

    // 通用图像分析
    function  generalPic() {
        var pic = $('#general_pic')[0].files[0];
        var fd = new FormData();
        $('#loading').show();
        fd.append('general_pic', pic);
        $.ajax({
            url:"<?php echo U('Imageprocess/generalDetectApi');?>",
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
                $('#generalPre').jsonViewer(input, options);
            }
        });

    }
    // 植物识别
    function  plantPic() {
    var pic = $('#plant_pic')[0].files[0];
    var fd = new FormData();
    $('#loading').show();
    fd.append('plant_pic', pic);
    $.ajax({
        url:"<?php echo U('Imageprocess/plantDetectApi');?>",
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
            $('#plantPre').jsonViewer(input, options);
        }
    });

}
    // 动物识别
    function  animalPic() {
        var pic = $('#animal_pic')[0].files[0];
        var fd = new FormData();
        $('#loading').show();
        fd.append('animal_pic', pic);
        $.ajax({
            url:"<?php echo U('Imageprocess/animalDetectApi');?>",
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
                $('#animalPre').jsonViewer(input, options);
            }
        });

    }
    // 菜品识别
    function  dishPic() {
    var pic = $('#dish_pic')[0].files[0];
    var fd = new FormData();
    $('#loading').show();
    fd.append('dish_pic', pic);
    $.ajax({
        url:"<?php echo U('Imageprocess/dishDetectApi');?>",
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
            $('#disPre').jsonViewer(input, options);
        }
    });

}
    // 车辆识别
    function  carPic() {
        var pic = $('#car_pic')[0].files[0];
        var fd = new FormData();
        $('#loading').show();
        fd.append('car_pic', pic);
        $.ajax({
            url:"<?php echo U('Imageprocess/carDetectApi');?>",
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
                $('#carPre').jsonViewer(input, options);
            }
        });

    }
    // 显示通用图片
    function generalPreview() {
        var r= new FileReader();
        f=document.getElementById('general_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('general_pic_show').src=this.result;
        };
    }
    // 显示植物图片
    function plantPreview() {
        var r= new FileReader();
        f=document.getElementById('plant_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('plant_pic_show').src=this.result;
        };
    }
    // 显示动物图片
    function animalPreview() {
        var r= new FileReader();
        f=document.getElementById('animal_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('animal_pic_show').src=this.result;
        };
    }
    // 显示菜品图片
    function dishPreview() {
        var r= new FileReader();
        f=document.getElementById('dish_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('dish_pic_show').src=this.result;
        };
    }
    // 显示车型图片
    function carPreview() {
        var r= new FileReader();
        f=document.getElementById('car_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('car_pic_show').src=this.result;
        };
    }

</script>


</script>