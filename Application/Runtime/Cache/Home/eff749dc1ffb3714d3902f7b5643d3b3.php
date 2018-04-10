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
        <a class="uk-navbar-brand uk-hidden-small" href="http://ai.baidu.com/docs/#/OCR-API/top" target="_blank">开发文档</a>
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
                    <h2 class="uk-h3">通用文字识别</h2>
                    <p>请上传任意带有文字的图像</p>
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
                    <i class="uk-icon-tree uk-icon-large uk-text-primary"></i>
                </div>
                <div class="uk-width-5-6">
                    <h2 class="uk-h3">网络图片文字识别</h2>
                    <p>请上传任意带有文字的网络图片</p>
                    <input type="file" name="web_pic" id="web_pic" accept="image/gif/jpg" onchange="webPreview()" />
                    <img id="web_pic_show" name="web_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="button" name="uploadPicButton" value="上传" onclick="webPic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                            <pre id="webPre"><p>返回结果</p></pre>
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
                    <h2 class="uk-h3">身份证识别</h2>
                    <p>请上传身份证图片</p>
                    <input type="file" name="idcard_pic" id="idcard_pic" accept="image/gif/jpg" onchange="idcardPreview()"/>

                    <img id="idcard_pic_show" name="idcard_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="radio" name="idcard_pn" value="front" checked="checked" />正面
                    <input type="radio" name="idcard_pn" value="back"/>反面
                    <input type="button" name="uploadPicButton" value="上传" onclick="idcardPic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                            <pre id="idcardPre"><p>返回结果</p></pre>
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
                    <i class="uk-icon-shopping-basket uk-icon-large uk-text-primary"></i>
                </div>
                <div class="uk-width-5-6">
                    <h2 class="uk-h3">银行卡识别</h2>
                    <p>请上传银行卡图片</p>
                    <input type="file" name="bank_pic" id="bank_pic" accept="image/gif/jpg" onchange="bankPreview()" />
                    <img id="bank_pic_show" name="bank_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="button" name="uploadPicButton" value="上传" onclick="bankPic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                                <pre id="bankPre"><p>返回结果</p></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-width-medium-1-3">
            <div class="uk-grid">
                <div class="uk-width-1-6">
                    <i class="uk-icon-car uk-icon-large uk-text-primary"></i>
                </div>
                <div class="uk-width-5-6">
                    <h2 class="uk-h3">驾驶证识别</h2>
                    <p>请上传驾驶证图片</p>
                    <input type="file" name="drivingLicense_pic" id="drivingLicense_pic" accept="image/gif/jpg"  onchange="drivingLicensePreview()"/>
                    <img id="drivingLicense_pic_show" name="drivingLicense_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="button" name="uploadPicButton" value="上传"  onclick="drivingLicensePic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                            <pre id="drivingLicensePre"><p>返回结果</p></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="uk-width-medium-1-3">
            <div class="uk-grid">
                <div class="uk-width-1-6">
                    <i class="uk-icon-car uk-icon-large uk-text-primary"></i>
                </div>
                <div class="uk-width-5-6">
                    <h2 class="uk-h3">行驶证识别</h2>
                    <p>请上传行驶证图片</p>
                    <input type="file" name="vehicleLicense_pic" id="vehicleLicense_pic" accept="image/gif/jpg"  onchange="vehicleLicensePreview()"/>
                    <img id="vehicleLicense_pic_show" name="vehicleLicense_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="button" name="uploadPicButton" value="上传"  onclick="vehicleLicensePic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                            <pre id="vehicleLicensePre"><p>返回结果</p></pre>
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
                    <i class="uk-icon-shopping-basket uk-icon-large uk-text-primary"></i>
                </div>
                <div class="uk-width-5-6">
                    <h2 class="uk-h3">车牌识别</h2>
                    <p>请上传车牌图片</p>
                    <input type="file" name="licensePlate_pic" id="licensePlate_pic" accept="image/gif/jpg" onchange="licensePlatePreview()" />
                    <img id="licensePlate_pic_show" name="licensePlate_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="button" name="uploadPicButton" value="上传" onclick="licensePlatePic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                            <pre id="licensePlatePre"><p>返回结果</p></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-width-medium-1-3">
            <div class="uk-grid">
                <div class="uk-width-1-6">
                    <i class="uk-icon-car uk-icon-large uk-text-primary"></i>
                </div>
                <div class="uk-width-5-6">
                    <h2 class="uk-h3">营业执照识别</h2>
                    <p>请上传营业执照图片</p>
                    <input type="file" name="businessLicense_pic" id="businessLicense_pic" accept="image/gif/jpg"  onchange="businessLicensePreview()"/>
                    <img id="businessLicense_pic_show" name="businessLicense_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="button" name="uploadPicButton" value="上传"  onclick="businessLicensePic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                            <pre id="businessLicensePre"><p>返回结果</p></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="uk-width-medium-1-3">
            <div class="uk-grid">
                <div class="uk-width-1-6">
                    <i class="uk-icon-car uk-icon-large uk-text-primary"></i>
                </div>
                <div class="uk-width-5-6">
                    <h2 class="uk-h3">通用票据识别</h2>
                    <p>请上传票据图片</p>
                    <input type="file" name="receipt_pic" id="receipt_pic" accept="image/gif/jpg"  onchange="receiptPreview()"/>
                    <img id="receipt_pic_show" name="receipt_pic_show" src="" style="width: 100px; height: 100px" />
                    <input type="button" name="uploadPicButton" value="上传"  onclick="receiptPic()" />
                    <div class="uk-grid" data-uk-grid-margin >
                        <div class="uk-width-medium-1-1">
                            <pre id="receiptPre"><p>返回结果</p></pre>
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

    // 通用文字识别
    function generalPic() {
        var pic = $('#general_pic')[0].files[0];
        var fd = new FormData();
        $('#loading').show();
        fd.append('general_pic', pic);
        $.ajax({
            url:"<?php echo U('Ocrdetect/generalDetectApi');?>",
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
    // 网络图片文字识别
    function webPic() {
    var pic = $('#web_pic')[0].files[0];
    var fd = new FormData();
    $('#loading').show();
    fd.append('web_pic', pic);
    $.ajax({
        url:"<?php echo U('Ocrdetect/webDetectApi');?>",
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
            $('#webPre').jsonViewer(input, options);
        }
    });

}
    // 身份证识别
    function idcardPic() {
        var pn = $('input[name="idcard_pn"]:checked').val();
        var pic = $('#idcard_pic')[0].files[0];
        var fd = new FormData();
        $('#loading').show();
        fd.append('idcard_pic', pic);
        fd.append('idcard_pn', pn);
        $.ajax({
            url:"<?php echo U('ocrdetect/idcardDetectApi');?>",
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
                $('#idcardPre').jsonViewer(input, options);
            }
        });

    }
    // 银行卡识别
    function bankPic() {
    var pic = $('#bank_pic')[0].files[0];
    var fd = new FormData();
    $('#loading').show();
    fd.append('bank_pic', pic);
    $.ajax({
        url:"<?php echo U('ocrdetect/bankcardDetectApi');?>",
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
            $('#bankPre').jsonViewer(input, options);
        }
    });

}
    // 驾驶证识别
    function drivingLicensePic() {
        var pic = $('#drivingLicense_pic')[0].files[0];
        var fd = new FormData();
        $('#loading').show();
        fd.append('drivingLicense_pic', pic);
        $.ajax({
            url:"<?php echo U('ocrdetect/drivingLicenseDetectApi');?>",
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
                $('#drivingLicensePre').jsonViewer(input, options);
            }
        });

    }
    // 行驶证识别
    function vehicleLicensePic() {
        var pic = $('#vehicleLicense_pic')[0].files[0];
        var fd = new FormData();
        $('#loading').show();
        fd.append('vehicleLicense_pic', pic);
        $.ajax({
            url:"<?php echo U('ocrdetect/vehicleLicenseDetectApi');?>",
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
                $('#vehicleLicensePre').jsonViewer(input, options);
            }
        });

    }
    // 车牌识别
    function licensePlatePic() {
        var pic = $('#licensePlate_pic')[0].files[0];
        var fd = new FormData();
        $('#loading').show();
        fd.append('licensePlate_pic', pic);
        $.ajax({
            url:"<?php echo U('ocrdetect/licensePlateDetectApi');?>",
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
                $('#licensePlatePre').jsonViewer(input, options);
            }
        });

    }
    // 营业执照识别
    function businessLicensePic() {
        var pic = $('#businessLicense_pic')[0].files[0];
        var fd = new FormData();
        $('#loading').show();
        fd.append('businessLicense_pic', pic);
        $.ajax({
            url:"<?php echo U('ocrdetect/businessLicenseDetectApi');?>",
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
                $('#businessLicensePre').jsonViewer(input, options);
            }
        });

    }
    // 通用票据识别
    function receiptPic() {
        var pic = $('#receipt_pic')[0].files[0];
        var fd = new FormData();
        $('#loading').show();
        fd.append('receipt_pic', pic);
        $.ajax({
            url:"<?php echo U('ocrdetect/receiptDetectApi');?>",
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
                $('#receiptPre').jsonViewer(input, options);
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
    // 显示网络图片
    function webPreview() {
        var r= new FileReader();
        f=document.getElementById('web_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('web_pic_show').src=this.result;
        };
    }
    // 显示身份证图片
    function idcardPreview() {
        var r= new FileReader();
        f=document.getElementById('idcard_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('idcard_pic_show').src=this.result;
        };
    }
    // 显示银行卡图片
    function bankPreview() {
        var r= new FileReader();
        f=document.getElementById('bank_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('bank_pic_show').src=this.result;
        };
    }
    // 显示驾驶证图片
    function drivingLicensePreview() {
        var r= new FileReader();
        f=document.getElementById('drivingLicense_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('drivingLicense_pic_show').src=this.result;
        };
    }
    // 显示行驶证图片
    function vehicleLicensePreview() {
        var r= new FileReader();
        f=document.getElementById('vehicleLicense_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('vehicleLicense_pic_show').src=this.result;
        };
    }
    // 显示车牌图片
    function licensePlatePreview() {
        var r= new FileReader();
        f=document.getElementById('licensePlate_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('licensePlate_pic_show').src=this.result;
        };
    }
    // 显示营业执照图片
    function businessLicensePreview() {
        var r= new FileReader();
        f=document.getElementById('businessLicense_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('businessLicense_pic_show').src=this.result;
        };
    }
    // 显示通用票据图片
    function receiptPreview() {
        var r= new FileReader();
        f=document.getElementById('receipt_pic').files[0];

        r.readAsDataURL(f);
        r.onload=function (e) {
            document.getElementById('receipt_pic_show').src=this.result;
        };
    }


</script>


</script>