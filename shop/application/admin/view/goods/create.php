{extend name="base" /}
{block name="content"}
<!-- Main content -->
<div class="templatemo-content col-1 light-gray-bg">
    <div class="templatemo-top-nav-container">
        <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
                <ul class="text-uppercase">
                    <li><a href="/admin/goods">商品管理</a></li>
                    <li><a href="/admin/category" class="active">栏目管理</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="templatemo-content-container">
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li><a href="/admin/goods">栏目列表</a></li>
            <li class="active"><a href="/admin/goods/create">新增</a></li>
        </ul>
        <br>
        <form action="/admin/goods" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">商品名称:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="inputID" class="form-control" value="" title=""
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">所属栏目:</label>
                <div class="col-sm-10">
                    <select name="category_id" id="inputID" class="form-control">
                        <option value="0"> -- 请选择项目--</option>
                        <?php foreach ($data as $v): ?>
                            <option value="{$v['id']}">{$v['_name']}</option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">价格:</label>
                <div class="col-sm-10">
                    <input type="text" name="price" id="inputID" class="form-control" value="" title=""
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">描述:</label>
                <div class="col-sm-10">
                    <input type="text" name="describe" id="inputID" class="form-control" value="" title=""
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">列表页图片:</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control" name="list_image" readonly="" value="">
                        <div class="input-group-btn">
                            <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片</button>
                        </div>
                    </div>
                    <div class="input-group" style="margin-top:5px;">
                        <img src="/static/node_modules/hdjs/images/nopic.jpg" class="img-responsive img-thumbnail"
                             width="150">
                        <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片"
                            onclick="removeImg(this)">×</em>
                    </div>
                </div>
                <script>
                    //上传图片
                    function upImage(obj) {
                        require(['util'], function (util) {
                            options = {
                                multiple: false,//是否允许多图上传
                            };
                            util.image(function (images) {          //上传成功的图片，数组类型
                                $("[name='list_image']").val(images[0]);
                                $(".img-thumbnail").attr('src', images[0]);
                            }, options)
                        });
                    }

                    //移除图片
                    function removeImg(obj) {
                        $(obj).prev('img').attr('src', '/static/node_modules/hdjs/images/nopic.jpg');
                        $(obj).parent().prev().find('input').val('');
                    }
                </script>
            </div>
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">详情页图册:</label>
                <div class="col-sm-10">
                    <input type="file" name="content_images[]" id="" class="form-control content_images">
                    <a href="javascript:add();" class="btn btn-success btn-xs" style="margin-top: 5px;">增加一项</a>
                </div>
                <script>
                    function add() {
                        let input = '<input type="file" name="content_images[]" id="" class="form-control">' +
                            '<a href="javascript:;" onclick="del(this)" style="display: block;color: red">X</a>';
                        $('.content_images').after(input);
                    }

                    function del(obj) {
                        $(obj).prev().remove().end().remove();
                    }
                </script>
            </div>
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">详细信息:</label>
                <div class="col-sm-10">
                    <textarea id="container" name="content" style="height:300px;width:100%;"></textarea>
                    <script>
                        util.ueditor('container', {hash: 2, data: 'hd'}, function (editor) {
                            //这是回调函数 editor是百度编辑器实例
                        });
                    </script>
                </div>
            </div>
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">查看次数:</label>
                <div class="col-sm-10">
                    <input type="text" name="click" id="inputID" class="form-control" value="" title=""
                    >
                </div>
            </div>
            <div class="panel panel-default col-sm-10 col-sm-offset-2" id="box">
                <div class="panel-heading">
                    <h3 class="panel-title">货品列表</h3>
                </div>
                <div class="panel-body" v-for="(v,k) in shops">
                    <div class="form-group">
                        <label for="inputID" class="col-sm-2 control-label">组合属性:</label>
                        <div class="col-sm-10">
                            <input type="text" id="inputID" class="form-control" v-model="v.attr" required="required" placeholder="默认格式：型号|属性">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputID" class="col-sm-2 control-label">库存:</label>
                        <div class="col-sm-10">
                            <input type="number" id="inputID" class="form-control" v-model="v.inventory" required="required" placeholder="数字">
                        </div>
                    </div>
                    <a href="" class="btn btn-danger btn-xs" @click.prevent="dels(k)">删除</a>
                </div>
                <textarea name="goods" hidden cols="30" rows="10">{{shops}}</textarea>
                <a href="" class="btn btn-success btn-xs" @click.prevent="adds">增加</a>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-10">
                    <button type="submit" class="btn btn-primary">保存商品信息</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        new Vue({
            el: "#box",
            data: {
                shops: []
            },
            methods: {
                adds() {
                    var field = {attr: '', inventory: ''};
                    this.shops.push(field);
                },
                dels(k) {
                    this.shops.splice(k, 1)
                }
            }
        })
    </script>
    {/block}