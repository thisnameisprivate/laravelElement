<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('statics/layui/css/layui.css') }}">
    <style>
        .container{position:relative; width:900px; height: 500px; top:0; left:0; bottom:0; right:0; margin:auto; padding-top: 50px;}
        body{overflow-y: scroll; margin-top:20px;}
    </style>
    <title>visit</title>
</head>
<body>
<div class="layui-inline">
    <form class="layui-form">
        <input class="layui-input layui-input-sm" name="search" id="search" required lay-verify="required" placeholder="姓名/客户电话" autocomplete="off">
    </form>
</div>
<button id="searchbtn" class="layui-btn layui-btn-sm layui-icon layui-icon-search" data-type="reload">搜索</button>
<table id="container" lay-filter="edittable"></table>
<div class="layui-container" id="layerpopEdit" style="display:none;">
    <div class="container">
        <p style="display:none" id="idValue"></p>
        <form class="layui-form" lay-filter="formedit">
            <div class="layui-form-item">
                <label class="layui-form-label">姓名</label>
                <div class="layui-input-inline">
                    <input type="text" name="name" lay-verify="required" placeholder="请输入病人名字或昵称~" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label">电话</label>
                <div class="layui-input-inline">
                    <input type="text" name="phone"  placeholder="请输入病人联系方式~" autocomplete="off" class="layui-input phone">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">QQ/微信</label>
                <div class="layui-input-inline">
                    <input type="text" name="qq" placeholder="请输入QQ / 微信~" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label">年龄</label>
                <div class="layui-input-inline">
                    <input type="number" name="old" placeholder="请输入病人年龄~" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">预约时间</label>
                <div class="layui-input-inline">
                    <input type="text" name="oldDate" class="layui-input time-item" placeholder="年-月-日">
                </div>
                <label class="layui-form-label">回访时间</label>
                <div class="layui-input-inline">
                    <input type="text" name="newDate" class="layui-input time-item" placeholder="年-月-日">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">来院状态</label>
                <div class="layui-input-inline">
                    <div class="layui-input-inline">
                        <select name="status" lay-verify="required">
                            <foreach name="arrivalStatus" item="vo" key="index">
                                <option value="{$vo['arrivalStatus']}">{$vo['arrivalStatus']}</option>
                            </foreach>
                        </select>
                    </div>
                </div>
                <label class="layui-form-label">媒体来源</label>
                <div class="layui-input-inline">
                    <select name="fromAddress" lay-verify="required">
                        <foreach name="fromaddress" item="vo" key="index">
                            <option value="{$vo['fromaddress']}">{$vo['fromaddress']}</option>
                        </foreach>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">病患类型</label>
                <div class="layui-input-inline">
                    <div class="layui-input-inline">
                        <select name="diseases" lay-verify="required">
                            <foreach name="diseases" item="vo" key="index">
                                <option value="{$vo['diseases']}">{$vo['diseases']}</option>
                            </foreach>
                        </select>
                    </div>
                </div>
                <label class="layui-form-label">客服姓名</label>
                <div class="layui-input-inline">
                    <select name="custService" lay-verify="required">
                        <foreach name="custservice" item="vo" key="index">
                            <option value="{$vo['custservice']}">{$vo['custservice']}</option>
                        </foreach>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">专家号</label>
                <div class="layui-input-inline">
                    <input type="text" name="expert" lay-verify="required" placeholder="请输入专家号~" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">性别</label>
                <div class="layui-input-inline">
                    <input type="checkbox" name="sex" lay-skin="switch" value="女" lay-text="女|男">
                </div>
                <label class="layui-form-label">是否本市</label>
                <div class="layui-input-inline">
                    <input type="checkbox" name="switch" lay-skin="switch" value="本地" lay-text="是|否">
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">咨询内容</label>
                <div class="layui-input-block">
                    <textarea name="desc1" placeholder="请输入咨询内容~" class="layui-textarea"></textarea>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">备注</label>
                <div class="layui-input-block">
                    <textarea name="desc2" placeholder="请输入备注信息~" class="layui-textarea"></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="fromedit">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="layui-container" id="layerAddData" style="display:none;">
    <div class="container">
        <form class="layui-form" lay-filter="formAdd">
            <div class="layui-form-item">
                <label class="layui-form-label">姓名</label>
                <div class="layui-input-inline">
                    <input type="text" name="name" placeholder="请输入病人名字或昵称~" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label">电话</label>
                <div class="layui-input-inline">
                    <input type="text" name="phone" value=" " placeholder="请输入病人联系方式~" autocomplete="off" class="layui-input phone">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">QQ/微信</label>
                <div class="layui-input-inline">
                    <input type="text" name="qq" value=" " placeholder="请输入QQ / 微信~" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label">年龄</label>
                <div class="layui-input-inline">
                    <input type="number" name="old" value=" " placeholder="请输入病人年龄~" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">预约时间</label>
                <div class="layui-input-inline">
                    <input type="text" name="oldDate" class="layui-input time-item" placeholder="年-月-日">
                </div>
                <label class="layui-form-label">回访时间</label>
                <div class="layui-input-inline">
                    <input type="text" name="newDate" class="layui-input time-item" placeholder="年-月-日">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">来院状态</label>
                <div class="layui-input-inline">
                    <div class="layui-input-inline">
                        <select name="status" lay-verify="required">
                            <foreach name="arrivalStatus" item="vo" key="index">
                                <option value="{$vo['arrivalStatus']}">{$vo['arrivalStatus']}</option>
                            </foreach>
                        </select>
                    </div>
                </div>
                <label class="layui-form-label">媒体来源</label>
                <div class="layui-input-inline">
                    <select name="fromAddress" lay-verify="required">
                        <foreach name="fromaddress" item="vo" key="index">
                            <option value="{$vo['fromaddress']}">{$vo['fromaddress']}</option>
                        </foreach>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">病患类型</label>
                <div class="layui-input-inline">
                    <div class="layui-input-inline">
                        <select name="diseases" lay-verify="required">
                            <foreach name="diseases" item="vo" key="index">
                                <option value="{$vo['diseases']}">{$vo['diseases']}</option>
                            </foreach>
                        </select>
                    </div>
                </div>
                <label class="layui-form-label">客服姓名</label>
                <div class="layui-input-inline">
                    <select name="custService" lay-verify="required">
                        <foreach name="custservice" item="vo" key="index">
                            <option value="{$vo['custservice']}">{$vo['custservice']}</option>
                        </foreach>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">专家号</label>
                <div class="layui-input-inline">
                    <input type="text" name="expert" lay-verify="required" placeholder="请输入专家号~" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">性别</label>
                <div class="layui-input-inline">
                    <input type="checkbox" name="sex" lay-skin="switch" value="女" lay-text="女|男">
                </div>
                <label class="layui-form-label">是否本市</label>
                <div class="layui-input-inline">
                    <input type="checkbox" name="switch" lay-skin="switch" value="本地" lay-text="是|否">
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">咨询内容</label>
                <div class="layui-input-block">
                    <textarea name="desc1" placeholder="请输入咨询内容~" class="layui-textarea"></textarea>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">备注</label>
                <div class="layui-input-block">
                    <textarea name="desc2" placeholder="请输入备注信息~" class="layui-textarea"></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="fromadd">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="thesame">
    <p class="thesame-txt"></p>
</div>
</body>
<script src="{{ URL::asset('statics/layui/layui.js')  }}"></script>
<script type="text/html" id="toolbaradd">
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-sm layui-icon layui-icon-add-1" lay-event="add">&nbsp;添加</button>
        <button class="layui-btn layui-btn-sm layui-icon layui-icon-refresh" lay-event="reload">&nbsp;刷新</button>
    </div>
</script>
<script type="text/html" id="bar">
    <button class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon"></i></button>
    <button class="layui-btn layui-btn-xs" lay-event="del"><i class="layui-icon"></i></button>
</script>
<script>
    layui.use(['laydate', 'table', 'layer', 'laypage', 'form'], () => {
        var table = layui.table;
        var laydate = layui.laydate;
        var layer = layui.layer;
        var form = layui.form;
        var laypage = layui.laypage;
        var $ = layui.jquery;
        var tableIns = table.render({
            text: {
                none: 'Not found Message.',
            },
            initSort: {
                filed: 'id',
                type: 'desc',
            },
            elem:"#container",
            toolbar: "#toolbaradd",
            url: "{{ url('System/visitSelect') }}",
            height: 'full-200',
            page: true,
            even: true,
            cellMinWidth: 50,
            limit: 25,
            limits: [25, 50, 75, 150],
            loading: true,
            size: 'sm',
            cols: [[
                {field: 'id', title: 'No .', sort: true, hide:true},
                {field: 'name', title: '姓名', width:'6%', templet: (data) => { return data.status == '已到' ? "<span style='color:orangered;'>"+ data.name +"</span>" : "<span style='color:#5FB878;'>"+ data.name +"</span>" }},
                {field: 'sex', title: '性别', width:'4%', align:'center'},
                {field: 'old', title: '年龄', width:'5%', align:'center', sort: true},
                {field: 'phone', title: '电话', width:'8%'},
                {field: 'qq', title: "QQ", width:'4%'},
                {field: 'expert', title: '专家号'},
                {field: 'desc1', title: '咨询内容'},
                {field: 'oldDate', title: '预约时间'},
                {field: 'diseases', title: '病患类型'},
                {field: 'fromAddress', title: '媒体来源'},
                {field: 'switch', title: '地区', hide:true},
                {field: 'desc2', title: '备注'},
                {field: 'custService', title: '客服', width:'5%'},
                {field: 'newDate', title: '回访时间'},
                {field: 'status', title: '赴约状态', templet: (data) => { return data.status == '已到' ? "<span style='color:orangered;'>"+ data.status +"</span>" : "<span style='color:#5FB878;'>"+ data.status +"</span>" }},
                {field: 'currentTime', title: '添加时间', hide:true},
                {fixed: 'right', title: '操作', align:'left', toolbar: '#bar', width:'10%'},
            ]],
            id: 'edittable',
            done: function (res, curr, count) {
            }
        });
    })
</script>
</html>