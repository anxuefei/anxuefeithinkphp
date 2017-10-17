<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改地址</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/jquery-1.7.2.min.js"></script>
    <script src="/static/js/jquery.cxselect.min.js"></script>
    <link rel="stylesheet" href="/static/css/demo.css">
    <link rel="stylesheet" href="/static/css/layout.css">
</head>
<body>
<div class="container" style="margin-top: 50px">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">添加收货地址</h3>
        </div>
        <div class="panel-body">
            <form action="/index/location/create" method="post" role="form">
                <div class="form-group">
                    <label for="inputID" class="col-sm-2 control-label">收货人名字:</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="inputID" class="form-control" value="" title="" required>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label for="inputID" class="col-sm-2 control-label">电话:</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" id="inputID" class="form-control" value="" title="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputID" class="col-sm-2 control-label">所在地区:</label>
                    <div class="col-sm-10">
                            <fieldset id="city_china_val">
                                    <select name="province" class="province cxselect"  data-first-title="选择省" disabled="disabled"></select>
                                    <select name="city" class="city cxselect"  data-first-title="选择市" disabled="disabled"></select>
                                    <select name="county" class="area cxselect"  data-first-title="选择地区" disabled="disabled"></select>
                            </fieldset>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputID" class="col-sm-2 control-label">详细地址:</label>
                    <div class="col-sm-10">
                        <input type="text" name="house" id="inputID" class="form-control" value="" title="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputID" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary ">保存</button>
                        <a href="/index/login/user" class="btn btn-primary">返回个人中心</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $.cxSelect.defaults.url = '/static/js/cityData.min.json';

    $('#city_china').cxSelect({
        selects: ['province', 'city', 'area']
    });

    $('#city_china_val').cxSelect({
        selects: ['province', 'city', 'area'],
        nodata: 'none'
    });
</script>
</body>
</html>