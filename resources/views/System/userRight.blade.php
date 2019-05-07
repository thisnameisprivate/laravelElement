<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>广元协和医院网络部</title>
    <link rel="stylesheet" href="{{ URL::asset('statics/layui/css/layui.css') }}">
    <style>
        .layui-body{height:100%; width:100%; overflow:hidden;}
        #iframe{height:105%; width:91.2%;}
        .layui-layout-admin .layui-header{background: #2F4056;}
        #loading{margin-left:200px;}
        .title-icon-size{font-size:1.2rem;}
        /* 通讯图标样式 */
        .container{height:50px; width:50px; position:fixed; bottom:50px; right:10px; background-color:#5FB878; text-align:center; border-radius:5px; cursor:pointer; z-index: 999;}
        .container span{font-size:40px; color:#ffffff; line-height:50px;}
        .container:hover{background-color:#9F9F9F;}
        /* 新消息提示 */
        .top-tips{position:fixed; bottom:100px; left:0px; width:180px; height:100px; right:10px; text-aling:center; border-radius:5px; cursor:pointer; z-index:999; overflow:hidden;}
        .top-tips li{border-radius:5px; line-height:30px; margin-top:5px; color:white; font-size:0.8rem; background-color:#FF5722;}
        .top-img{width:35px;}
    </style>
</head>
<script type="text/javascript">
    // get cookie.
    function getCookie (cookieName) {
        var arrCookie = document.cookie.split('; ');
        for (var i = 0; i < arrCookie.length; i ++) {
            var arr = arrCookie[i].split('=');
            if (cookieName == arr[0]) {
                return arr[1];
            }
        }
        return '';
    }
    // delete cookie
    function delCookie (cookieName) {
        var time = new Date();
        time.setTime(time.getTime() + 1);
        var expires = "expires=" + time.toGMTString() + ";path=/";
        document.cookie = cookieName + "=;" + expires;
    }

    // one loading time set default cookie.
    document.cookie = 'tableName=gyxhyynk';
    localStorage.setItem('userAcc', JSON.stringify({$userAcc}));
    // fread current cookie username
    var username = {$userAcc}.pid;
</script>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">广元协和医院咨询1.0</div>
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item kit-side-fold"><a href="javascript:;"><sapn class="layui-icon layui-icon-shrink-right title-icon-size" tips="侧边栏伸缩"></sapn></a></li>
            <li class="layui-nav-item"><a href="javascript:;"><span class="layui-icon layui-icon-home title-icon-size" tips="首页"></span></a></li>
            <li class="layui-nav-item">
                <a href="javascript:;"><span class="layui-icon layui-icon-username title-icon-size" tips="在线用户"></span></a>
                <dl class="layui-nav-child" id="userList">
                    <!--<dd><span class="layui-badge-dot layui-bg-green"></span><a href="">admin</a></dd>-->
                </dl>
            </li>
            <!--<li class="layui-nav-item">-->
            <!--<a href="javascript:;"><a href="javascript:;"><span class="layui-icon layui-icon-component title-icon-size" tips="其他系统"></span></a></a>-->
            <!--<dl class="layui-nav-child">-->
            <!--<dd><a href="">邮件管理</a></dd>-->
            <!--<dd><a href="">消息管理</a></dd>-->
            <!--<dd><a href="">授权管理</a></dd>-->
            <!--</dl>-->
            <!--</li>-->
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;" class="layui-anim layui-anim-up layui-this" id="classification">广元协和医院男科</a>
                <dl class="layui-nav-child">
                    <foreach name="hospitals" item="vo" key="index">
                        <dd class="layui-anim layui-anim-scaleSpring"><a href="javascript:;" tablename="{$vo['tableName']}">{$vo['hospital']}</a></dd>
                    </foreach>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="" class="layui-nav-img">
                    {{ $username }}
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;">基本资料</a></dd>
                    <dd><a href="javascript:;">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item""><a href="javascript:;">注销</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black" id="layui-side">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;"><span class="layui-icon layui-icon-component">&nbsp;&nbsp;</span><span class="slide-font">病人预约管理</span></a>
                    <dl class="layui-nav-child">
                        <dd><a  href="javascript:;"><span class="layui-icon layui-icon-edit">&nbsp;&nbsp;</span><span class="slide-font">预约登记列表</span></a></dd>
                        <dd><a  href="javascript:;"><span class="layui-icon layui-icon-survey">&nbsp;&nbsp;</span><span class="slide-font">客服明细报表</span></a></dd>
                        <dd><a  href="javascript:;"><span class="layui-icon layui-icon-console">&nbsp;&nbsp;</span><span class="slide-font">月趋势报表</span></a></dd>
                        <!--
                         <dd><a  href="javascript:;">数据横向对比</a></dd>
                         -->
                    </dl>
                </li>
                <!--
                访客数据统计功能
                 <li class="layui-nav-item">
                  <a href="javascript:;"><span class="layui-icon layui-icon-chart">&nbsp;&nbsp;</span>访客数据统计</a>
                  <dl class="layui-nav-child">
                    <dd><a href="javascript:;" onclick="monthData(this);">数据明细（网络）</a></dd>
                    <dd><a href="javascript:;" onclick="monthData(this);">医院项目设置（网络）</a></dd>
                    <dd><a href="javascript:;" onclick="monthData(this);">数据明细（电话）</a></dd>
                    <dd><a href="javascript:;" onclick="monthData(this);">医院项目设置（电话）</a></dd>
                  </dl>
                </li>
                 -->
                <!--
                <li class="layui-nav-item">
                    <a href="javascript:;"><span class="layui-icon layui-icon-chart-screen">&nbsp;&nbsp;</span>网站挂号管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">网站挂号列表</a></dd>
                        <dd><a href="javascript:;">网站挂号设置</a></dd>
                    </dl>
                </li>
                -->
                <!--
                 <li class="layui-nav-item">
                    <a href="javascript:;"><span class="layui-icon layui-icon-form">&nbsp;&nbsp;</span>数据列表</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">总体报表</a></dd>
                        <dd><a href="javascript:;">性别</a></dd>
                        <dd><a href="javascript:;">病患类型</a></dd>
                        <dd><a href="javascript:;">媒体来源</a></dd>
                        <dd><a href="javascript:;">来院状态</a></dd>
                        <dd><a href="javascript:;">接待医生</a></dd>
                        <dd><a href="javascript:;">客服</a></dd>
                    </dl>
                </li>
                 -->
                <li class="layui-nav-item">
                    <a href="javascript:;"><span class="layui-icon layui-icon-set-sm">&nbsp;&nbsp;</span><span class="slide-font">设置</span></a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;"><span class="layui-icon layui-icon-dialogue">&nbsp;&nbsp;</span><span class="slide-font">客服人员设置</span></a></dd>
                        <dd><a href="javascript:;"><span class="layui-icon layui-icon-survey">&nbsp;&nbsp;</span><span class="slide-font">病患类型设置</span></a></dd>
                        <dd><a href="javascript:;"><span class="layui-icon layui-icon-survey">&nbsp;&nbsp;</span><span class="slide-font">媒体来源设置</span></a></dd>
                        <dd><a href="javascript:;"><span class="layui-icon layui-icon-survey">&nbsp;&nbsp;</span><span class="slide-font">医院科室设置</span></a></dd>
                        <dd><a href="javascript:;"><span class="layui-icon layui-icon-survey">&nbsp;&nbsp;</span><span class="slide-font">来院状态设置</span></a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><span class="layui-icon layui-icon-user">&nbsp;&nbsp;</span><span class="slide-font">我的资料</span></a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;"><span class="layui-icon layui-icon-edit">&nbsp;&nbsp;</span><span class="slide-font">修改我的资料</span></a></dd>
                        <!--
                         <dd><a href="javascript:;">修改密码</a></dd>
                        <dd><a href="javascript:;">选项设置</a></dd>
                         -->
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><span class="layui-icon layui-icon-auz">&nbsp;&nbsp;</span><span class="slide-font">系统管理</span></a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;"><span class="layui-icon layui-icon-user">&nbsp;&nbsp;</span><span class="slide-font">用户管理</span></a></dd>
                        <dd><a href="javascript:;"><span class="layui-icon layui-icon-user">&nbsp;&nbsp;</span><span class="slide-font">数据导出</span></a></dd>
                        <!--
                         <dd><a href="javascript:;">医院列表</a></dd>
                         <dd><a href="javascript:;">通知列表</a></dd>
                         -->
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><span class="layui-icon layui-icon-log">&nbsp;&nbsp;</span><span class="slide-font">日志记录</span></a>
                    <dl class="layui-nav-child">
                        <!--<dd><a href="javascript:;"><span class="layui-icon layui-icon-survey">&nbsp;&nbsp;</span><span class="slide-font">操作日志</span></a></dd>-->
                        <dd><a href="javascript:;"><span class="layui-icon layui-icon-survey">&nbsp;&nbsp;</span><span class="slide-font">登录错误日志</span></a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
    <div class="layui-progress" id="loading" style="dipslay:none">
        <div class="layui-progress-bar layui-bg-green" lay-percent="0%"></div>
    </div>
    <div class="layui-body" id="layuibody">
        <iframe id="iframe" src="{{ url('System/page') }}" frameborder="0"></iframe>
    </div>
</div>
<div class="container">
    <span id="communication" class="layui-icon layui-icon-chat"></span>
</div>
<div class="top-tips">
    <ul id="top-tips-list">
    </ul>
</div>
<div id="bottom-title" style="position:fixed; bottom:0px; left:200px; z-index:999; font-size:12px; font-weight:600;">
    <!-- 底部固定区域 -->
    <a href="javascript:;" title="发布日期: 2018/10/1日:)"><span class="layui-icon layui-icon-website layui-anim layui-anim-fadein layui-anim-loop"></span>&nbsp;&nbsp;&nbsp;广元协和医院预约回访管理系统 ©</a>
</div>
</body>
<script src="{{ URL::asset('statics/layui/layui.js') }}"></script>
<script type="text/javascript">
</script>
</html>