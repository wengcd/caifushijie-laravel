<!doctype html>
<html>
<head>
    <title>
        @if($issue->issue->type == '报刊')
            國際商會聯合報
        @elseif($issue->issue->type == '杂志')
            财富世界杂志
        @endif
            {{$issue->issue->title}} {{ $issue->title }}
    </title>
    <meta name="Keywords" content="國際商會聯合報, 2015年1月7日, 第02版"/>
    <meta name="Description" content="國際商會聯合報, 2015年1月7日, 第02版"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    {{ HTML::style('css/viewpage3.css') }}
    <script language="javascript" type="text/javascript">
        var pageOrder = 2, pageNum = {{count($issue->issue->contents)}}, issueId = '{{$issue->issue->id}}', next_page_id = '{{$next}}', last_page_id = '{{$previous}}', show_jpg = 0, userId = null;
    </script>
    <script language="javascript" type="text/javascript" src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>

    {{ HTML::script('js/jquery.cookie.js') }}
    {{ HTML::script('js/viewpage.min.js') }}
    <script language="javascript" type="text/javascript">
        //跳转到移动页面
//        var mUrl = '/pages/8106487535344';
//        mobile_detect(true, true, mUrl, mUrl, false);
    </script>
</head>
<body>
<div id="page_txt_content" class="pop_content"
     style="display:none;overflow: hidden; width:610px! important;width:580px; height:420px;bottom:50px; ">
    <div class="title">
        <div class="txt">版面文字内容</div>
        <div class="btn"><input title="点击关闭文字内容" onclick="pop_page_txt_content();" type="button" value="关闭"/></div>
        <div class="clear"></div>
    </div>
    <div id="page_txt_content_data" class="buttom"
         style="overflow:auto;  width:600px! important;width:600px;  height: 400px! important;height:400px;"></div>
</div>


<div id="container" class="clearfix">
    <div id="left_container">
        <div id="pic_container">
            <div class="dragme">
                {{ HTML::image($issue->original_media_url, null, array('id' => 'page_image', 'class' => 'page_image')) }}

                <div class="hpic"
                     style=" height:280px; overflow:hidden; width:1040px; margin:10px auto 0px auto;clear:both; ">
                    <div style=" height:280px; overflow:hidden; width:336px; margin-right:10px; float:left;">
                    </div>

                    <div style=" height: 280px; overflow: hidden; width: 336px; margin-right: 10px; float: left;">
                    </div>

                    <div style=" height:280px; overflow:hidden; width:336px;  float:left;">

                    </div>
                    <div style="clear:both;"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="toolbar_container">
        <div class="toolbar">
            @if($issue->issue->type == '报刊')
                國際商會聯合報
            @elseif($issue->issue->type == '杂志')
                财富世界杂志
            @endif
            <br/>{{$issue->issue->title}} | <a href="javascript:pop_help();" title="点击此处查看当前页面的快捷键">帮助</a>
        </div>
        <div class="toolbar">
            <select id="pageShowSel" class="kbkk33" onchange="javascript:adjustPageSize(this);">
                <option value="0" selected="selected">适合宽度</option>
                <option value="2">适合高度</option>
                <option value="1">最大文字</option>
            </select>
            <input type="hidden" id="rememberSize" onload="javascript:this.checked=false;"
                   title="点击此处记住当前页面的文字大小，翻页后默认显示这个大小"/>
        </div>
        <div class="toolbar">
            {{ Form::select('pageOrder', $contents, $issue->id, array('id' => 'pageOrder','class' => 'kbkk33', 'onchange' => 'javascript:goToPage();')) }}
        </div>
        <div class="toolbar">
            @if(!empty($next))
                <p><a href="/pages/{{$next}}">下一版</a></p>
            @endif
            @if(!empty($previous))
                <p> <a href="/pages/{{$previous}}">上一版</a></p>
            @endif
            <p>{{ link_to_route('issues.show', '版面浏览', array('id' => $issue->issue->id)) }}</p>
        </div>
    </div>
</div>

<div id="pop_help" class="pop_content" style=" display:none;">
    <div class="title">
        <div class="txt">看报页面帮助</div>
        <div class="btn"><input title="点击关闭帮助" onclick="pop_help();" type="button" value="关闭"/></div>
        <div class="clear"></div>
    </div>
    <div class="buttom" style=" margin-top:10px;">
        <p>
            <span style="font-size:14px; font-weight:bold;color:red;">按键盘↑↓←→键,或者在报纸上按住鼠标左键可拖动报纸</span>
        </p>

        <p>
            <span>改变文字大小&nbsp;&nbsp;快捷键：<span class="key"> shift + Z </span></span>
        </p>

        <p>
            <span>版面浏览&nbsp;&nbsp;快捷键：<span class="key"> shift + D  </span></span>
        </p>

        <p>
            <span>回首页&nbsp;&nbsp;快捷键：<span class="key"> shift + X </span></span>
        </p>

        <p>
            <span>自定义放大/缩小报纸&nbsp;&nbsp;快捷键：<span class="key"> alt + 鼠标滚轮 </span></span>
        </p>

        <p>
            <span>点击 上一版 切换到上一版&nbsp;&nbsp;快捷键：<span class="key"> shift + A </span></span>
        </p>

        <p>
            <span>点击 下一版 切换到下一版&nbsp;&nbsp;快捷键：<span class="key"> shift + S </span></span>
        </p>
    </div>
</div>
<div id="fade" class="pop_overlay"></div>

<div style="display:none;">
    <img id="nextPageImage" src="http://image1.abbao.cn/images/2015/1/14/CN33-0108/8106488126352_normal.gif" alt=""/>
    <img id="lastPageImage" src="http://image1.abbao.cn/images/2015/1/14/CN33-0108/8106487420428_normal.gif" alt=""/>
</div>

</body>
</html>