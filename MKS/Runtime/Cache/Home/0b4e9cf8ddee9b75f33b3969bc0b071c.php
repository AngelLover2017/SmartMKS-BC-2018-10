<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description"content="Basic HTML5 App generated by MyEclipse Mobile Tools" />

    <!--引入jquery-->
    <script type="text/javascript" src="/mksys/Public/syspkg/jquery-3.2.1.min.js"></script>
      <!--导入jQueryForm插件-->
    <script type="text/javascript" src="/mksys/Public/syspkg/jquery-form.js"></script>
    <!--引入Bootstrap-->
    <link href="/mksys/Public/syspkg/bootstrap3.3.7/css/bootstrap.css" rel="stylesheet" >
    <script type="text/javascript" src="/mksys/Public/syspkg/bootstrap3.3.7/js/bootstrap.js"></script>
    <!-- 引入layui -->
    <script type="text/javascript" src="/mksys/Public/syspkg/layer/layer.js"></script>
    <link href="/mksys/Public/syspkg/css/fram.css" rel="stylesheet" >
    <script type="text/javascript" src="/mksys/Public/syspkg/js/fram.js"></script>
    <title>教师成果网-普通教师端</title>
    <style>
   
     input
  {
   outline:none;
  }
        select
        {
            width: 91px;
            height: 30px;
             border-radius: 10px;
             outline: none;
        }
         .home
        {
            
            width:120px;
            height: 35px;
            line-height: 35px;
            color: rgba(16, 16, 16, 1);
            font-size: 24px;
            text-align: center;
            font-family: Roboto;

        }

        .hr0
        {
           position: relative;
            top: -10px;
           
            height: 12px;

        }
         table
        {   
            float: left;
            width: 95%;
           
            margin-top: 20px;
            line-height: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 1);
            text-align: center;
            border-collapse: separate;
            border: 2px solid rgba(54, 53, 54, 1);
        }
        thead
        {
  
            line-height: 28px;
            color: rgba(54, 53, 54, 1);
            font-size: 25px;
            font-weight: bold;
            text-align: center;
            font-family: Roboto;
            table-layout:fixed;

        }
        table tr th,table tr td {
            border-right: 1px solid #555555 ;
            border-bottom: 1px solid #555555 ;
            padding-top: 25px;
            padding-bottom: 25px;
            padding-left: 10px;
            padding-right: 10px;
}
        tbody
        {


            
            color: rgba(54, 53, 54, 1);
            font-size: 14px;
            text-align: center;
            font-family: Roboto;
            overflow-y:scroll;
            
            height:55px;


        }
        

        td
        {

            height: 50px;
        }
        table tbody {
            display:block;
            height:auto;
            max-height: 350px;
            overflow-y:scroll;
        }

        table thead, tbody tr {
            display:table;
            width:100%;
            table-layout:fixed;
        }


        table thead {
            width: calc( 100% - 17px )
        }
        .pass
        {
            margin-right:2px;
            color: #009688;
        }
        .rj
        {
            margin-left: 2px;
             color: #CF3127;
        }
         body.my-skin.layui-layer-btn1{background-color: #BC2F2E;}
    </style>
    <script type="text/javascript">
   $(document).ready(function(){


    var pageId = '<?php echo ($page); ?>';
       //页面编码为： page1 
 //            page21 page22 page23
 //            page31 page32 page33 page34 page35
 //            ......
//switch case 实例：

if(pageId=='page35')
{
    $("#drp3").click();
    $("#m35").css("background-color","#363536");
    $("#d35").css("display","inline");
}



$("#dd").click(function(){
    var heit = $("div.nameOfTeacher").css("height");
    
    if(heit=="30px"){
    $("div.nameOfTeacher").animate(
    {
        height:'75px'
    },"fast")}else if(heit=="75px"){
    $("div.nameOfTeacher").animate(
    {
        height:'30px'
    },"fast")}
})

    })</script>

<script>
 layer.config({
        skin:'my-skin'
    });
 // 自检测
    $(document).ready(function(){
        // 自动检测搜索内容
        var search = '<?php echo ($search); ?>';
        $("input#search").val(search);  
        //  自动检测下拉选框
        var dep = '<?php echo ($dep); ?>';
        if(dep == '所有系'){
            $("option#depall").attr("selected","selected");
        }else if(dep == '思想政治教育系'){
            $("option#dep1").attr("selected","selected");
        }else if(dep == '马克思主义基本原理系'){
            $("option#dep2").attr("selected","selected");
        }else if(dep == '马克思主义中国化研究系'){
            $("option#dep3").attr("selected","selected");
        }else if(dep == '中国近现代史基本问题研究系'){
            $("option#dep4").attr("selected","selected");
        }else if(dep == '思修与形势政策系教学成果奖'){
            $("option#dep5").attr("selected","selected");
        }


    });

       $(document).ready(function(){
         $("button.pass").click(function(){
            var id = $(this).attr('id');
           layer.confirm('确认通过吗，通过后将无法更改', {
            btn: ['确定','取消'], //按钮
               time:10000
        }, function(){
            // ajax后台传值，使状态变为已通过
            $.post("<?php echo U('Admin/passCheck');?>",{
                data : id
            },function(data){
                if(data == 'success'){
                      // 隐藏该行
                      $("tr#"+id).hide();
                      //通过
                      layer.msg('已通过', {
                            offset: 't',
                            icon: 1
                      });
                }else if(data == 'cookiefail'){
                    window.location.href="<?php echo U('Index/index');?>";
                }else{
                    alert('意外失败！请重试');
                }
            });
                
           }, function(){
            //取消
               layer.closeAll();
            });
         });

        $("button.rj").click(function(){
            var id = $(this).attr('id');
         layer.open({
                   type: 2,
                   title: '拒绝理由',
                   shadeClose: true,
                   shade: 0.8,
                   area: ['470px', '250px'],
                   content: 'superAdminRefuse.html', //iframe的url
                   success: function(layero,index)
                    {
                      var button = layer.getChildFrame('#btn',index);
                      button.click(function(){
                         var textarea = layer.getChildFrame('#reason',index);
                         var str = textarea.val();
                         if(str == ''){
                            alert('理由不能为空！');
                         }else{
                            $.post("<?php echo U('Admin/refuseCheck');?>",{
                                data : id ,
                                reason : str
                            },function(data){
                                if(data == 'success'){
                                    $("tr#"+id).hide();
                                    layer.closeAll();
                                    //通过
                                      layer.msg('未通过', {
                                            offset: 't',
                                            icon: 0
                                      });
                                }else if(data == 'cookiefail'){
                                    window.location.href="<?php echo U('Index/index');?>";
                                }else{
                                    alert("意外失败！请重试");
                                }
                            });
                         }
                      
                      });
                    }
               });

         });


        });

       $(document).ready(function(){
           // download材料
         $("a.download").click(function(){
            var id = $(this).attr('id');

            $.post("<?php echo U('Admin/downloadSup');?>",{
                data : id
            },function(data,status){
                if(data != 'cookiefail'){
                    var d = data.split(" ");
                    // 改变a标签中属性值
                     $("#adownload").attr("href","/MKSYS"+d[0]);
                     $("#adownload").attr("download",d[1]);
                     // 模拟点击事件，触发下载事件
                     document.getElementById("adownload").click();
                }else{
                    window.location.href = "<?php echo U('Index/index');?>";
                }
             
            });           
                                
             });   
       });
      /*退出登录*/
        $(document).ready(function(){
             $("a#quit").click(function(){
          $.post("<?php echo U('Index/quit');?>",
            function(){
              $(location).prop('href',"<?php echo U('Index/index');?>");
            }
            );
        });
        });
 
     $(document).ready(function(){
        // 权限检测
        var auth = '<?php echo (cookie('login_auth')); ?>';
        if(auth == 'C1_B5' || auth == 'C2_B5'){
            $("li.userpd").hide();
            $("li.adminpd").hide();
            if(auth == 'C1_B5'){
                $("h#auth").text("教学秘书");
            }else{
                $("h#auth").text("科研秘书");
            }
        }else{
            $("h#auth").text("超级管理员");
        }
        });
</script>
</head>

<body class="body">
<!-- 头部 -->
    <header>

    <!-- 头顶状态栏 -->
        <div class="head">

            <div  class="nameOfTeacher" style="border: solid;border-radius: 10px;background-color: white;font-weight: bold; ">
                <h id="auth"></h>
                    <span  id="dd" class="iconBlack glyphicon glyphicon-triangle-bottom "style=" float: right;height:20px;width:20px;border: none;background-color: white;margin-right: 10px;margin-top: 3px;" ></span>

            </div>
        </div>
    </header>
    <div id="ddm" style="position: fixed;right: 5px;top: 72px;width: 100px;display:none; z-index: 1;">
        <ul  style="list-style-type: none;padding-left: 0px;padding-top: 0px;">
            <li  style=";padding-left: 10px;padding-top: 10px;"><a id="quit" style="color: black;">退出</a></li>
        </ul>
    </div>
     <!-- 导航栏 -->
   
   <nav class="nave" style="">
        <ul style="list-style-type: none;line-height: 60px;margin-left: -40px; ">
<div id="d11" style="position: absolute;height:25px;width: 8px;left: -2px;top: 68px;background-color:#BC2F2E;display: none;"></div>
<div id="d12" style="position:absolute;height:25px;width: 8px;left: -2px;top: 108px;background-color:#BC2F2E;display: none;"></div>
<div id="d13" style="position:absolute;height:25px;width: 8px;left: -2px;top: 148px;background-color:#BC2F2E;display: none;"></div>
<div id="d21" style="position:absolute;height:25px;width: 8px;left: -2px;top: 128px;background-color:#BC2F2E;display: none;"></div>
<div id="d22" style="position:absolute;height:25px;width: 8px;left: -2px;top: 168px;background-color:#BC2F2E;display: none;"></div>
<div id="d23" style="position:absolute;height:25px;width: 8px;left: -2px;top: 208px;background-color:#BC2F2E;display: none;"></div>
<div id="d31" style="position:absolute;height:25px;width: 8px;left: -2px;top: 188px;background-color:#BC2F2E;display: none;"></div>
<div id="d32" style="position:absolute;height:25px;width: 8px;left: -2px;top: 228px;background-color:#BC2F2E;display: none;"></div>
<div id="d33" style="position:absolute;height:25px;width: 8px;left: -2px;top: 268px;background-color:#BC2F2E;display: none;"></div>
<div id="d34" style="position:absolute;height:25px;width: 8px;left: -2px;top: 308px;background-color:#BC2F2E;display: none;"></div>
<div id="d35" style="position:absolute;height:25px;width: 8px;left: -2px;top: 348px;background-color:#BC2F2E;display: none;"></div>
<div id="d1" style="position:absolute;height:25px;width: 8px;left: -2px;top: 198px;background-color:#BC2F2E;display: none;"></div>
<div id="d2" style="position:absolute;height:25px;width: 8px;left: -2px;top: 258px;background-color:#BC2F2E;display: none;"></div>
<div id="d3" style="position:absolute;height:25px;width: 8px;left: -2px;top: 318px;background-color:#BC2F2E;display: none;"></div>
<div id="d4" style="position:absolute;height:25px;width: 8px;left: -2px;top: 378px;background-color:#BC2F2E;display: none;"></div>
<div id="d5" style="position:absolute;height:25px;width: 8px;left: -2px;top: 438px;background-color:#BC2F2E;display: none;"></div>

         <li style="" id="drp1"><a style="cursor:pointer">查看院内</a></li>
            <ul style=" list-style-type: none;line-height: 40px;margin-left: -40px;display:none;font-size: 16px;"id="drpmanu1" >     <li style=""id="dm11"><a href="<?php echo U('Admin/superAdmin');?>">院内统计信息</a></li>
            <li style=""id="dm12"><a>按分类查看</a></li>
            <li style=""id="dm13"><a>按教师查看</a></li>
            </ul>
        <li style="" id="drp2"><a style="cursor:pointer">教学审核</a></li>
            <ul style=" list-style-type: none;line-height: 40px;margin-left: -40px;display:none; font-size: 16px; "id="drpmanu2" >
            <li style=""id="dm21"><a href="<?php echo U('Admin/superAdminTeachAch');?>">教学成果奖</a></li>
            <li style=""id="dm22"><a href="<?php echo U('Admin/superAdminTeachPro');?>">教改立项/精品课程</a></li>
            <li style=""id="dm23"><a href="<?php echo U('Admin/superAdminTeachTbp');?>">教材出版</a></li>
            </ul>
        <li style="" id="drp3"><a style="cursor:pointer">科研审核</a></li>
            <ul style=" list-style-type: none;line-height: 40px;margin-left: -40px;display:none;font-size: 16px; "id="drpmanu3" >     <li style=""id="dm31"><a href="<?php echo U('Admin/superAdminResearchPap');?>">论文发表</a></li>
            <li style=""id="dm32"><a href="<?php echo U('Admin/superAdminResearchMpb');?>">学术专著/译著出版</a></li>
            <li style=""id="dm33"><a href="<?php echo U('Admin/superAdminResearchAch');?>">科研成果奖</a></li>
            <li style=""id="dm34"><a href="<?php echo U('Admin/superAdminResearchPro');?>">科研项目主持</a></li>
            <li style=""id="dm35"><a href="<?php echo U('Admin/superAdminResearchFund');?>">基金类</a></li>
            </ul>
        <li id="m1"><a href="<?php echo U('Admin/superAdminOtherExc');?>">国际交流</a></li>
        <li id="m2"><a href="<?php echo U('Admin/superAdminOtherWel');?>">公益活动</a></li>
        <li id="m3"><a href="<?php echo U('Admin/superAdminOtherNews');?>">新闻记录</a></li>
      <li id="m4" class="userpd"><a href="<?php echo U('Admin/superAdminUserPd');?>">账号管理</a></li>
        <li id="m5" class="adminpd"><a href="<?php echo U('Admin/superAdminAdminPd');?>">管理员账号</a></li>
        </ul>
    </nav>
    
<div class="main" style="">
<div class="home">
            <h style="font-weight: bold;">基金类</h>
        </div>
        <div style="position: absolute;left: 200px;top: 60px;color: #AAAAAA;">
            <h><?php echo ($teachPro_WAIT); ?>项待审核</h></div>
        <div class="hr0">
            <hr>
        </div>          
          
            <form method="POST" action="<?php echo U('Admin/superAdminTeachTbp');?>">
                <select  name="dep" style="width: 200px;height: 30px;line-height: 17px;color: rgba(16, 16, 16, 1);font-size: 12px;box-shadow: 0px 0px 2px 0px rgba(188, 47, 46, 1);font-family: Microsoft Yahei;border: 1px solid rgba(188, 47, 46, 1);border-radius: 7px;padding-left:5px;">
                        <option id="depall" value="所有系">所有系</option>
                        <option id="dep1"  value="思想政治教育系">思想政治教育系</option>
                        <option id="dep2" value="马克思主义基本原理系">马克思主义基本原理系</option>
                        <option id="dep3" value="马克思主义中国化研究系">马克思主义中国化研究系</option>
                        <option id="dep4" value="中国近现代史基本问题研究系">中国近现代史基本问题研究系</option>
                        <option id="dep5" value="思修与形势政策系教学成果奖">思修与形势政策系教学成果奖</option>
                </select> 
           
            <input type="text" name="search" id="search" placeholder="请输入教师名称或工号" style="width: 200px;height: 30px;border-radius: 7px;color: rgba(136, 136, 136, 1);font-size: 12px;text-align: left;box-shadow: 0px 0px 2px 0px rgba(188, 47, 46, 1);font-family: Microsoft Yahei;border: 1px solid rgba(188, 47, 46, 1);padding-left: 10px;">
            <input type="submit" name="submit" value="搜索" style="width: 80px;height: 30px;line-height: 20px;border-radius: 7px;text-align: center;color: white;border:none;box-shadow: 0px 0px 2px 0px #BC2F2E;background-color: #BC2F2E ;margin-left: 20px;"> 
            </form>
        <table>
            <thead>
                <tr>
                   <td>
                        基金名称
                    </td>
                    <td>
                        获批时间
                    </td>
                     <td>
                        总经费
                    </td>
                     <td>
                        已到款
                    </td>
                    <td>
                        剩余经费
                    </td>
                     <td>
                        材料下载
                    </td>
                     <td>
                        操作
                    </td>
                </tr>
            </thead>
            <tbody>
    <?php if(is_array($researchFund)): $i = 0; $__LIST__ = $researchFund;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ta): $mod = ($i % 2 );++$i;?><tr id="<?php echo ($ta['id']); ?>-<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-research_fund">
        <td id="<?php echo ($ta['id']); ?>-<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-name"><?php echo ($ta['name']); ?></td>
        <td id="<?php echo ($ta['id']); ?>-<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-stm"><?php echo ($ta['stm']); ?></td>
        <td id="<?php echo ($ta['id']); ?>-<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-fund"><?php echo ($ta['fund']); ?></td>
        <td id="<?php echo ($ta['id']); ?>-<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-paid"><?php echo ($ta['paid']); ?></td>
        <td id="<?php echo ($ta['id']); ?>-<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-remain"><?php echo ($ta['remain']); ?></td>
        <td id="<?php echo ($ta['id']); ?>-<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-download"><a id="adownload" href="" download="" style="display: none">点击下载</a><a class="download" id="
        <?php echo ($ta['id']); ?>-<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-research_fund-download" ><span class="glyphicon glyphicon-save" ></span></a></td>
        <td><button class="pass" id="<?php echo ($ta['id']); ?>-<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-research_fund">通过</button><button class="rj" id="<?php echo ($ta['id']); ?>-<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-research_fund">拒绝</button></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    
        
        
</div>
    
</body>
</html>