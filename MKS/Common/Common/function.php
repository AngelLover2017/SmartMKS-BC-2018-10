<?php

/*
 * 转换中文类型为字符串类型
 */
function parsePtype($ptype){
    switch ($ptype) {
        case '教学成果奖':
            $ptype = 'teach_ach';
            break;
        case '教改立项/精品课程类':
            $ptype = 'teach_pro';
            break;
        case '教材出版':
            $ptype = 'teach_tbp';
            break;
        case '论文发表':
            $ptype = 'research_pap';
            break;
        case '学术专著/译著出版':
            $ptype = 'research_mpb';
            break;
        case '科研成果奖':
            $ptype = 'research_ach';
            break;
        case '科研项目主持':
            $ptype = 'research_pro';
            break;
        case '基金类':
            $ptype = 'research_fund';
            break;
        case '国际交流':
            $ptype = 'other_exc';
            break;
        case '公益活动':
            $ptype = 'other_wel';
            break;
        case '新闻记录':
            $ptype = 'other_news';
            break;
        default:
            $ptype = 'teach_ach';
            break;
    }
    return $ptype;
}
function parseStatus($status){
    switch($status){
        case '已通过' : 
            $status = 'yes';
            break;
        case '待审核' :
            $status = 'wait';
            break;
        case '未通过' :
            $status = 'no';
            break;
        default :
            $status = 'wait';
            break;
    }
    return $status;
}
function parseChildPtype($ptype){
    $array = array();
    switch ($ptype) {
        case '教学成果奖':
             $array = array(
                "zh_cn" => array(
                    "名称",
                    "设奖部门",
                    "获奖时间",
                    "奖励等级",
                    ),
                "en" => array(
                    "name",
                    "dep",
                    "tm",
                    "lv",
                    )
                );
            break;
        case '教改立项/精品课程类':
            $array = array(
                "zh_cn" => array(
                    "名称",
                    "类别",
                    "立项时间",
                    "总经费",
                    "已到款",
                    "剩余经费",
                    ),
                "en" => array(
                    "name",
                    "tp",
                    "tm",
                    "fund",
                    "paid",
                    "remain",
                    )
                );
            break;
        case '教材出版':
            $array = array(
                "zh_cn" => array(
                    "名称",
                    "出版社",
                    "署名情况",
                    "出版时间",
                    ),
                "en" => array(
                    "name",
                    "pub",
                    "signature",
                    "tm",
                    )
                );
            break;
        case '论文发表':
            $array = array(
                 "zh_cn" => array(
                    "名称",
                    "刊物名称",
                    "卷期号",
                    "合著情况",
                    "期刊级别",
                    "发表时间",
                    ),
                 "en" => array(
                    "name",
                    "pub",
                    "vnum",
                    "partner",
                    "lv",
                    "tm",
                    )
                );
            break;
        case '学术专著/译著出版':
           $array = array(
                "zh_cn" => array(
                     "名称",
                    "出版社",
                    "合著情况",
                    "出版时间",
                    ),
                "en" => array(
                    "name",
                    "pub",
                    "partner",
                    "tm",
                    )
                );
            break;
        case '科研成果奖':
            $array = array(
                "zh_cn" => array(
                    "名称",
                    "设奖部门",
                    "获奖时间",
                    "奖励等级",
                    ),
                "en" => array(
                    "name",
                    "dep",
                    "tm",
                    "lv",
                    )
                );
            break;
        case '科研项目主持':
            $array = array(
                "zh_cn" => array(
                    "名称",
                    "经费资助来源",
                    "期限",
                    "总经费",
                    "已到款",
                    "剩余经费",
                    "获批时间",
                    ),
                "en" => array(
                    "name",
                    "source",
                    "deadline",
                    "fund",
                    "paid",
                    "remain",
                    "stm",
                    )
                );
            break;
        case '基金类':
            $array = array(
                "zh_cn" => array(
                     "名称",
                    "获批时间",
                    "总经费",
                    "已到款",
                    "剩余经费",
                    ),
                "en" => array(
                    "name",
                    "stm",
                    "fund",
                    "paid",
                    "remain",
                    )
                );
            break;
        case '国际交流':
            $array = array(
                "zh_cn" => array(
                    "国家（境外）",
                    "时间段",
                    "地点",
                    "学校",
                    "内容",
                    ),
                "en" => array(
                    "country",
                    "tmin",
                    "place",
                    "sch",
                    "content",
                    )
                );
            break;
        case '公益活动':
            $array = array(
                "zh_cn" => array(
                    "时间",
                    "地点",
                    "内容",
                    ),
                "en" => array(
                    "tm",
                    "place",
                    "content",
                    )
                );
            break;
        case '新闻记录':
            $array = array(
                "zh_cn" => array(
                    "发布要求",
                    "标题",
                    "内容",
                    ),
                "en" => array(
                    "rep",
                    "title",
                    "content",
                    )
                );
            break;
        default:
           $array = array(
                "zh_cn" => array(
                    "名称",
                    "设奖部门",
                    "获奖时间",
                    "奖励等级",
                    ),
                "en" => array(
                    "name",
                    "dep",
                    "tm",
                    "lv",
                    )
                );
            break;
    }
    return $array;
}
function parseIson($ison){
    switch ($ison) {
        case '在岗':
            $ison = 'YES';
            break;
        case '离岗':
            $ison = 'NO';
            break;
        default:
            $ison = 'YES';
            break;
    }
    return $ison;
}
/*
 *
 */
function getImage($url,$save_dir='',$filename='',$type=0){
            if(trim($url)==''){
                return array('file_name'=>'','save_path'=>'','error'=>1);
            }
            if(trim($save_dir)==''){
                $save_dir='./';
            }
            if(trim($filename)==''){//保存文件名
                $ext=strrchr($url,'.');
            if($ext!='.gif'&&$ext!='.jpg'&&$ext!='.png'&&$ext!='.jpeg'){
                return array('file_name'=>'','save_path'=>'','error'=>3);
            }
                $filename=time().rand(0,10000).$ext;
            }
            if(0!==strrpos($save_dir,'/')){
                $save_dir.='/';
            }
            //创建保存目录
            if(!file_exists($save_dir)&&!mkdir($save_dir,0777,true)){
                return array('file_name'=>'','save_path'=>'','error'=>5);
            }
            //获取远程文件所采用的方法
            if($type){
                $ch=curl_init();
                $timeout=5;
                curl_setopt($ch,CURLOPT_URL,$url);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
                $img=curl_exec($ch);
                curl_close($ch);
            }else{
                ob_start();
                readfile($url);
                $img=ob_get_contents();
                ob_end_clean();
            }
            //$size=strlen($img);
            //文件大小
            $fp2=@fopen($save_dir.$filename,'a');
            fwrite($fp2,$img);
            fclose($fp2);
            unset($img,$url);
            return array('file_name'=>$filename,'save_path'=>$save_dir.$filename,'error'=>0);
        }
        
     /*2*/
   /*  public function getServerFile($url = '', $file = '', $timeout = 60){
            $file = empty($file) ? $file.pathinfo($url, PATHINFO_BASENAME) : $file;
            //$file = $file.pathinfo($url, PATHINFO_BASENAME);
            $dir =     pathinfo($file, PATHINFO_DIRNAME);
            !is_dir($dir) && @mkdir($dir, 0755, true);
            $url = str_replace("","%20", $url);

            if(function_exists('curl_init')){
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $URL);
                curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                $temp = curl_exec($ch);
                if(@file_put_contents($file, $temp) && !curl_error($ch)){
                    return $file;
                }else{
                    return false;
                }
            }else{
                $opts = array(
                    'http' => array(
                        'method' => 'GET',
                        'header' => '',
                        'timeout' => $timeout)
                );
                $context = stream_context_create($opts);
                if(@copy($url, $file, $context)){
                    //$http_response_header
                    return $file;
                }else{
                    return false;
                }
            }
        }*/
?>