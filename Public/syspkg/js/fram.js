
window.onload = function(){   //设置页面加载完成后运行JS
    var hl = $(".nav").outerHeight(); //获取左侧left层的高度
    var hr = $(".main").outerHeight(); //获取右侧right层的高度
    var mh = Math.max(hl,hr); //比较hl与hr的高度，并将最大值赋给变量mh
    $(".nav").height(mh+50); //将left层高度设为最大高度mh
    $(".main").height(mh); //将right层高度设为最大高度
    };
    $(document).ready(function(){

        $("#dd").click(function(){
            $("#ddm").fadeToggle();
            $("#dd").toggleClass("glyphicon-triangle-top");
           
        });


















        $("#drp1").click(function(){
            $("#drpmanu1").toggle();
            $("#drpmanu2").hide();
            $("#drpmanu3").hide();
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
            $("#m1").css("background-color","rgba(82, 82, 82, 1)");
            $("#m2").css("background-color","rgba(82, 82, 82, 1)");
            $("#m3").css("background-color","rgba(82, 82, 82, 1)");
            $("#m4").css("background-color","rgba(82, 82, 82, 1)");
            $("#m5").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp1").css("background-color","#363536");
            $("#drpmanu1").css("background-color","#363536");
            $("#drp2").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu2").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp3").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu3").css("background-color","rgba(82, 82, 82, 1)");
            $("#sp1").toggleClass("glyphicon-triangle-top");
            $("#sp2").removeClass("glyphicon-triangle-top");
            $("#sp2").addClass("glyphicon-triangle-bottom");
            $("#sp3").removeClass("glyphicon-triangle-top");
            $("#sp3").addClass("glyphicon-triangle-bottom");
        });
        $("#drp2").click(function(){
            $("#drpmanu2").toggle();
            $("#drpmanu1").hide();
            $("#drpmanu3").hide();
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
            $("#m1").css("background-color","rgba(82, 82, 82, 1)");
            $("#m2").css("background-color","rgba(82, 82, 82, 1)");
            $("#m3").css("background-color","rgba(82, 82, 82, 1)");
            $("#m4").css("background-color","rgba(82, 82, 82, 1)");
            $("#m5").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp2").css("background-color","#363536");
            $("#drpmanu2").css("background-color","#363536");
            $("#drp1").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu1").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp3").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu3").css("background-color","rgba(82, 82, 82, 1)");
            $("#sp2").toggleClass("glyphicon-triangle-top");
            $("#sp1").removeClass("glyphicon-triangle-top");
            $("#sp1").addClass("glyphicon-triangle-bottom");
            $("#sp3").removeClass("glyphicon-triangle-top");
            $("#sp3").addClass("glyphicon-triangle-bottom");
        });
        $("#drp3").click(function(){
            $("#drpmanu3").toggle();
            $("#drpmanu1").hide();
            $("#drpmanu2").hide();
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
            $("#m1").css("background-color","rgba(82, 82, 82, 1)");
            $("#m2").css("background-color","rgba(82, 82, 82, 1)");
            $("#m3").css("background-color","rgba(82, 82, 82, 1)");
            $("#m4").css("background-color","rgba(82, 82, 82, 1)");
            $("#m5").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp3").css("background-color","#363536");
            $("#drpmanu3").css("background-color","#363536");
            $("#drp2").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu2").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp1").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu1").css("background-color","rgba(82, 82, 82, 1)");
            $("#sp3").toggleClass("glyphicon-triangle-top");
            $("#sp2").removeClass("glyphicon-triangle-top");
            $("#sp2").addClass("glyphicon-triangle-bottom");
            $("#sp1").removeClass("glyphicon-triangle-top");
            $("#sp1").addClass("glyphicon-triangle-bottom");
        });
         $("#dm11").click(function(){
            $("#d11").css("display","inline");
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
        });
          $("#dm12").click(function(){
            $("#d12").css("display","inline");
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
        });
           $("#dm13").click(function(){
            $("#d13").css("display","inline");
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
        });
           $("#dm14").click(function(){
            $("#d14").css("display","inline");
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
        });
            $("#dm21").click(function(){
            $("#d21").css("display","inline");
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
        });
             $("#dm22").click(function(){
            $("#d22").css("display","inline");
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
        });
            $("#dm23").click(function(){
            $("#d23").css("display","inline");
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
        });
            $("#dm31").click(function(){
            $("#d31").css("display","inline");
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
        });
            $("#dm32").click(function(){
            $("#d32").css("display","inline");
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
        });
            $("#dm33").click(function(){
            $("#d33").css("display","inline");
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
        });
            $("#dm34").click(function(){
            $("#d34").css("display","inline");
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d35").css("display","none");
        });
            $("#dm35").click(function(){
            $("#d35").css("display","inline");
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
 
        });
        $("#m1").click(function(){
            $("#drpmanu1").hide();
            $("#drpmanu2").hide();
            $("#drpmanu3").hide();
            $("#d1").css("display","inline");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
            $("#m1").css("background-color","#363536");
            $("#m2").css("background-color","rgba(82, 82, 82, 1)");
            $("#m3").css("background-color","rgba(82, 82, 82, 1)");
            $("#m4").css("background-color","rgba(82, 82, 82, 1)");
            $("#m5").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp1").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu1").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp2").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu2").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp3").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu3").css("background-color","rgba(82, 82, 82, 1)");
            $("#sp2").removeClass("glyphicon-triangle-top");
            $("#sp2").addClass("glyphicon-triangle-bottom");
            $("#sp1").removeClass("glyphicon-triangle-top");
            $("#sp1").addClass("glyphicon-triangle-bottom");
            $("#sp3").removeClass("glyphicon-triangle-top");
            $("#sp3").addClass("glyphicon-triangle-bottom");

        });
        
        $("#m2").click(function(){
           $("#drpmanu1").hide();
            $("#drpmanu2").hide();
            $("#drpmanu3").hide();
            $("#d2").css("display","inline");
            $("#d1").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
            $("#m2").css("background-color","#363536");
            $("#m1").css("background-color","rgba(82, 82, 82, 1)");
            $("#m3").css("background-color","rgba(82, 82, 82, 1)");
            $("#m4").css("background-color","rgba(82, 82, 82, 1)");
            $("#m5").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp1").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu1").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp2").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu2").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp3").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu3").css("background-color","rgba(82, 82, 82, 1)");
            $("#sp2").removeClass("glyphicon-triangle-top");
            $("#sp2").addClass("glyphicon-triangle-bottom");
            $("#sp1").removeClass("glyphicon-triangle-top");
            $("#sp1").addClass("glyphicon-triangle-bottom");
            $("#sp3").removeClass("glyphicon-triangle-top");
            $("#sp3").addClass("glyphicon-triangle-bottom");

        });
        $("#m3").click(function(){
            $("#drpmanu1").hide();
            $("#drpmanu2").hide();
            $("#drpmanu3").hide();
            $("#d3").css("display","inline");
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d4").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
            $("#m3").css("background-color","#363536");
            $("#m2").css("background-color","rgba(82, 82, 82, 1)");
            $("#m1").css("background-color","rgba(82, 82, 82, 1)");
            $("#m4").css("background-color","rgba(82, 82, 82, 1)");
            $("#m5").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp1").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu1").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp2").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu2").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp3").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu3").css("background-color","rgba(82, 82, 82, 1)");
            $("#sp2").removeClass("glyphicon-triangle-top");
            $("#sp2").addClass("glyphicon-triangle-bottom");
            $("#sp1").removeClass("glyphicon-triangle-top");
            $("#sp1").addClass("glyphicon-triangle-bottom");
            $("#sp3").removeClass("glyphicon-triangle-top");
            $("#sp3").addClass("glyphicon-triangle-bottom");

        });
        $("#m4").click(function(){
            $("#drpmanu1").hide();
            $("#drpmanu2").hide();
            $("#drpmanu3").hide();
            $("#d4").css("display","inline");
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d5").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
            $("#m4").css("background-color","#363536");
            $("#m2").css("background-color","rgba(82, 82, 82, 1)");
            $("#m3").css("background-color","rgba(82, 82, 82, 1)");
            $("#m1").css("background-color","rgba(82, 82, 82, 1)");
            $("#m5").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp1").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu1").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp2").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu2").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp3").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu3").css("background-color","rgba(82, 82, 82, 1)");
            $("#sp2").removeClass("glyphicon-triangle-top");
            $("#sp2").addClass("glyphicon-triangle-bottom");
            $("#sp1").removeClass("glyphicon-triangle-top");
            $("#sp1").addClass("glyphicon-triangle-bottom");
            $("#sp3").removeClass("glyphicon-triangle-top");
            $("#sp3").addClass("glyphicon-triangle-bottom");

        });
        $("#m5").click(function(){
            $("#drpmanu1").hide();
            $("#drpmanu2").hide();
            $("#drpmanu3").hide();
            $("#d5").css("display","inline");
            $("#d1").css("display","none");
            $("#d2").css("display","none");
            $("#d3").css("display","none");
            $("#d4").css("display","none");
            $("#d11").css("display","none");
            $("#d12").css("display","none");
            $("#d13").css("display","none");
            $("#d14").css("display","none");
            $("#d21").css("display","none");
            $("#d22").css("display","none");
            $("#d23").css("display","none");
            $("#d31").css("display","none");
            $("#d32").css("display","none");
            $("#d33").css("display","none");
            $("#d34").css("display","none");
            $("#d35").css("display","none");
            $("#m5").css("background-color","#363536");
            $("#m2").css("background-color","rgba(82, 82, 82, 1)");
            $("#m3").css("background-color","rgba(82, 82, 82, 1)");
            $("#m4").css("background-color","rgba(82, 82, 82, 1)");
            $("#m1").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp1").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu1").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp2").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu2").css("background-color","rgba(82, 82, 82, 1)");
            $("#drp3").css("background-color","rgba(82, 82, 82, 1)");
            $("#drpmanu3").css("background-color","rgba(82, 82, 82, 1)");
            $("#sp2").removeClass("glyphicon-triangle-top");
            $("#sp2").addClass("glyphicon-triangle-bottom");
            $("#sp1").removeClass("glyphicon-triangle-top");
            $("#sp1").addClass("glyphicon-triangle-bottom");
            $("#sp3").removeClass("glyphicon-triangle-top");
            $("#sp3").addClass("glyphicon-triangle-bottom");

        });
    });


 switch(pageId){
      case 'page1' : 
      //DOM操作
                  $("#m1").css("background-color","#363536");
                  $("#d1").css("display","inline");
                  break;
      case 'page21' :

                   break;
      case 'page22' : 
                  break;
      case 'page23' : 
                  break;
      case 'page31' : 
                  break;
      case 'page32' :
                  break;
      case 'page33' : 
                  break;
      case 'page34' : 
                  break;
      case 'page35' : 
                  break;
      case 'page4' : 
                  break;
      case 'page5' : 
                  break;
      case 'page6' : 
                  break;
      case 'page7' : 
                  break;
      case 'page8' : 
                  break;
 //     ......
            }
