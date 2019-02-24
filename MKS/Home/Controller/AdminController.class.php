<?php

namespace Home\Controller;
use Think\Controller;

class AdminController extends Controller{
	/*
	 * downloadExcel
	 */
	  //PHPExcelTest
    public function excelTotal(){
    	$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$years = $_GET['years'];
	        $dep = $_GET['dep'];
	        //解决edge中文乱码
	        $filename = recode("马克思学院".$years."年度".$dep."成果汇总表");

	        /*
	         * sql查询
	         *
	         */
	        $yearsOpt = $years == '时间不限' ?  "":"and c.years='{$years}' ";
	        $depOpt = $dep == '所有系' ? "":"and b.dep='{$dep}' ";
	         
	         $orderByAll = D('MapStatus');
	         $sql = "select a.name,b.dep,
	         count(c.ptype='teach_ach' or null) as teachach,
	         count(c.ptype='teach_pro' or null) as teachpro,
	         count(c.ptype='teach_tbp' or null) as teachtbp,
	         count(c.ptype='research_pap' or null) as researchpap,
	         count(c.ptype='research_mpb' or null) as researchmpb,
	         count(c.ptype='research_ach' or null) as researchach,
	         count(c.ptype='research_pro' or null) as researchpro,
	         count(c.ptype='research_fund' or null)as researchfund,
	         count(c.ptype='other_news' or null) as othernews,
	         count(c.ptype='other_wel' or null) as otherwel,
	         count(c.ptype='other_exc' or null) as otherexc,
	         count(*) 
	         from think_user_info a,think_user_job b,think_map_status c where a.id=b.id and a.id=c.id {$yearsOpt} {$depOpt} group by c.id ";
	         $return = $orderByAll->query($sql);
	       	/*
	       	 * 导入PHPExcel
	       	 */
	        importPkg();
	    
	        $excel = new \PHPExcel();
	       	//设置excel 的属性
	        setProp($excel);
	        
	        // 设置第一个sheet
	        $excel->setActiveSheetIndex(0);//设置当前sheet
	        $excel->getActiveSheet()->setTitle("马克思学院".$years."年度".$dep."成果汇总表");//设置sheet的名字
	        $excel->getActiveSheet()->setCellValue('A1','教师信息');
	        $excel->getActiveSheet()->setCellValue('C1','教学情况');
	        $excel->getActiveSheet()->setCellValue('F1','科研情况');
	        $excel->getActiveSheet()->setCellValue('K1','其他情况');
	        $excel->getActiveSheet()->mergeCells('A1:B1'); //合并
	        $excel->getActiveSheet()->mergeCells('C1:E1'); //合并
	        $excel->getActiveSheet()->mergeCells('F1:J1'); //合并
	        $excel->getActiveSheet()->mergeCells('K1:M1'); //合并
	        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//水平居中
	        $excel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//水平居中
	        $excel->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//水平居中
	        $excel->getActiveSheet()->getStyle('K1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//水平居中
	         $excel->getActiveSheet()->setCellValue('A2','教师姓名')
	         						 ->setCellValue('B2','所属系')
	         						 ->setCellValue('C2','教学成果奖')
	         						 ->setCellValue('D2','教改立项/精品课程类')
	         						 ->setCellValue('E2','教材出版')
	         						 ->setCellValue('F2','论文发表')
	         						 ->setCellValue('G2','学术专著/译著出版')
	         						 ->setCellValue('H2','科研成果奖')
	         						 ->setCellValue('I2','科研项目主持')
	         						 ->setCellValue('J2','基金类')
	         						 ->setCellValue('K2','国际交流')
	         						 ->setCellValue('L2','公益活动')
	         						 ->setCellValue('M2','新闻记录')
	         						 ->setCellValue('N2','总计');
	         //动态表
	         $i = 0;
	         for($i=3;$i<count($return,0)+3;$i++){
	         	$excel->getActiveSheet()->setCellValue('A'.$i,$return[$i-3]['name'])
	         							->setCellValue('B'.$i,$return[$i-3]['dep'])
	         							->setCellValue('C'.$i,$return[$i-3]['teachach'])
	         							->setCellValue('D'.$i,$return[$i-3]['teachpro'])
	         							->setCellValue('E'.$i,$return[$i-3]['teachtbp'])
	         							->setCellValue('F'.$i,$return[$i-3]['researchpap'])
	         							->setCellValue('G'.$i,$return[$i-3]['researchmpb'])
	         							->setCellValue('H'.$i,$return[$i-3]['researchach'])
	         							->setCellValue('I'.$i,$return[$i-3]['researchpro'])
	         							->setCellValue('J'.$i,$return[$i-3]['researchfund'])
	         							->setCellValue('K'.$i,$return[$i-3]['othernews'])
	         							->setCellValue('L'.$i,$return[$i-3]['otherwel'])
	         							->setCellValue('M'.$i,$return[$i-3]['otherexc'])
	         							->setCellValue('N'.$i,$return[$i-3]['count(*)']);		
	         }
	        //底部表格
	        
	        $excel->getActiveSheet()->setCellValue('A'.$i,"总计");
	        $excel->getActiveSheet()->mergeCells('A'.$i.':'.'B'.$i);
	        $excel->getActiveSheet()->getStyle('A'.$i)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//水平居中

	        $excel->getActiveSheet()->setCellValue('C'.$i,'=SUM(C3:C'.($i-1).')')
	        						->setCellValue('D'.$i,'=SUM(D3:D'.($i-1).')')
	        						->setCellValue('E'.$i,'=SUM(E3:E'.($i-1).')')
	        						->setCellValue('F'.$i,'=SUM(F3:F'.($i-1).')')
	        						->setCellValue('G'.$i,'=SUM(G3:G'.($i-1).')')
	        						->setCellValue('H'.$i,'=SUM(H3:H'.($i-1).')')
	        						->setCellValue('I'.$i,'=SUM(I3:I'.($i-1).')')
	        						->setCellValue('J'.$i,'=SUM(J3:J'.($i-1).')')
	        						->setCellValue('K'.$i,'=SUM(K3:K'.($i-1).')')
	        						->setCellValue('L'.$i,'=SUM(L3:L'.($i-1).')')
	        						->setCellValue('M'.$i,'=SUM(M3:M'.($i-1).')')
	        						->setCellValue('N'.$i,'=SUM(N3:N'.($i-1).')');	

	        //导出表
	        exportExcel($filename,$excel);
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
    }
    public function excelClassify(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$years = $_GET['years'];
	        $dep = $_GET['dep'];
	        $status = $_GET['status'];
	        $ptype = $_GET['ptype'];
	        $filename = recode("马克思学院".$years."年度".$dep.$status."的".$ptype."成果汇总表");

	        //sql
	    	$yearsOpt = $years == '时间不限' ?  "":"and c.years='{$years}' ";
	        $depOpt = $dep == '所有系' ? "":"and b.dep='{$dep}' ";
	    	$parseptype = parsePtype($ptype);
	    	$ptypeOpt = "and c.ptype='{$ptype}'";
	    	$parsestatus = parseStatus($status);
	    	$statusOpt = "and c.status='{$parsestatus}' ";
	    	$orderByDep = D('MapStatus');
	    	// $return = $orderByDep->query("select a.name,b.dep,c.reason,d.*
	    	// 		  from think_user_info a,think_user_job b,think_map_status c,think_{$parseptype} d where
	    	// 		   a.id=b.id and a.id=c.id and c.num=d.num and c.years=d.years and c.ptype=d.ptype 
	    	// 		   {$yearsOpt} {$depOpt} {$statusOpt} {$ptypeOpt} order by a.name,b.dep");
	    	$return = $orderByDep->query("select a.name as sname,b.dep as sdep,c.reason,d.* 
	    		 from think_user_info a,think_user_job b,think_map_status c,think_teach_ach d where  a.id=b.id and a.id=c.id and c.num=d.num and c.years=d.years and c.ptype=d.ptype 
	    		  and c.status='yes' and c.ptype='teach_ach' order by a.name,b.dep");

	  		 $return1 = json_encode($return);

	    	importPkg();

	    	$excel = new \PHPExcel();
	    	setProp($excel);


	    	//设置第一个sheet
	    	$excel->setActiveSheetIndex(0);//设置当前sheet
	        $excel->getActiveSheet()->setTitle("马克思学院".$years."年度".$dep.$status."的".$ptype."成果汇总表");
	        //设置表头
	        $childPtype = parseChildPtype($ptype);
	        $childLength = count($childPtype['zh_cn']);
	        $border1 = chr(ord(C)+$childLength-1);
	        $excel->getActiveSheet()->setCellValue('A1',"教师信息")
	        						->mergeCells('A1:B1')
	        						->setCellValue('C1',$ptype)
	        						->mergeCells('C1:'.$border1.'1')
	        						->setCellValue('A2',"教师姓名")
	        						->setCellValue('B2',"所属系");
	        for($i=0;$i<$childLength;$i++){
	        	$border2 = chr(ord(C)+$i);
	        	$excel->getActiveSheet()->setCellValue($border2.'2',$childPtype['zh_cn'][$i]);
	        }
	        //设置内容
	        for($i = 0;$i<count($return);$i++){
	        	$excel->getActiveSheet()->setCellValue('A'.($i+3),$return[$i]['sname'])
	        		  					->setCellValue('B'.($i+3),$return[$i]['sdep']);
	        	for($j = 0;$j<$childLength;$j++){
	        		$border3 = chr(ord(C)+$j);
	        		$excel->getActiveSheet()->setCellValue($border3.($i+3),$return[$i][$childPtype['en'][$j]]);
	        	}
	        }	
	        //设置表统计行
	        $endline = count($return)+3;
	        $excel->getActiveSheet()->setCellValue('A'.$endline,'总计')
	        						->setCellValue('B'.$endline,($endline-3).'项')
	        						->mergeCells('B'.$endline.':'.chr(ord(B)+$childLength).$endline);
	        //导出表
	        exportExcel($filename,$excel);
	  
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
    }
    public function excelUserPd(){
    	$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$ison = $_GET['ison'];
	        $dep = $_GET['dep'];
	        $filename = recode("马克思学院".$ison.$dep."教师信息汇总表");

	        //sql
	        $parseIson = parseIson($ison);
	        $isonOpt = "and b.ison='{$parseIson}' ";
	        $depOpt = $dep=="所有系"? "" : "and b.dep='{$dep}' ";
	        $sql = "select a.*,b.*,c.* from think_user_info a,think_user_job b,think_user_edu c where a.id=b.id and b.id=c.id and a.id=c.id {$isonOpt} {$depOpt} ";
	        $userinfo = D('UserJob');
	        $return = $userinfo->query($sql);
	    	importPkg();

	    	$excel = new \PHPExcel();
	    	setProp($excel);


	    	//设置第一个sheet
	    	$excel->setActiveSheetIndex(0);//设置当前sheet
	        $excel->getActiveSheet()->setTitle("马克思学院".$ison.$dep."教师信息汇总表");
	        //设置表头
	       	     $excel->getActiveSheet()
	        	->setCellValue('A1',"姓名")
	        	->setCellValue('B1',"性别")
	        	->setCellValue('C1',"年龄")
	        	->setCellValue('D1',"出生年月")
	        	->setCellValue('E1',"民族")
	        	->setCellValue('F1',"政治面貌")
	        	->setCellValue('G1',"籍贯")
	        	->setCellValue('H1',"所属系")
	        	->setCellValue('I1',"职位")
	        	->setCellValue('J1',"职称")
	        	->setCellValue('K1',"职称定职日期")
	        	->setCellValue('L1',"岗位级别")
	        	->setCellValue('M1',"入职日期")
	        	->setCellValue('N1',"毕业学校")
	        	->setCellValue('O1',"毕业专业")
	        	->setCellValue('P1',"毕业时间")
	        	->setCellValue('Q1',"手机号")
	        	->setCellValue('R1',"邮箱");
	        //设置内容
	        for($i=0;$i<count($return);$i++){
	        	$excel->getActiveSheet()->setCellValue('A'.($i+2),$return[$i]['name'])
	        	->setCellValue('B'.($i+2),$return[$i]['sex'])
	        	->setCellValue('C'.($i+2),$return[$i]['age'])
	        	->setCellValue('D'.($i+2),$return[$i]['birthday'])
	        	->setCellValue('E'.($i+2),$return[$i]['nation'])
	        	->setCellValue('F'.($i+2),$return[$i]['polistatus'])
	        	->setCellValue('G'.($i+2),$return[$i]['origin'])
	        	->setCellValue('H'.($i+2),$return[$i]['dep'])
	        	->setCellValue('I'.($i+2),$return[$i]['pos'])
	        	->setCellValue('J'.($i+2),$return[$i]['title'])
	        	->setCellValue('K'.($i+2),$return[$i]['detm'])
	        	->setCellValue('L'.($i+2),$return[$i]['lv'])
	        	->setCellValue('M'.($i+2),$return[$i]['startm'])
	        	->setCellValue('N'.($i+2),$return[$i]['university'])
	        	->setCellValue('O'.($i+2),$return[$i]['profession'])
	        	->setCellValue('P'.($i+2),$return[$i]['gratm'])
	        	->setCellValue('Q'.($i+2),$return[$i]['tel'])
	        	->setCellValue('R'.($i+2),$return[$i]['email']);
	        }
	        //导出表
	        exportExcel($filename,$excel);
	  
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
    }
    /*
     * core 
     */
	public function superAdmin(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$years="时间不限";
			$dep = "所有系";
			if(isset($_POST['submit'])){
				$years = $_POST['years'];
				$dep = $_POST['dep'];
			}
			//导航栏固定
			$this->assign('page','page11');

			$this->assign('years',$years);
			$this->assign('dep',$dep);
			$array = $this->getAll($years , $dep);
			$this->assign('all',$array);
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminClassifySearch(){
		$id = cookie('login_id');
		if($id != ''){
			$status = '已通过';
			$years = '时间不限';
			$ptype = '教学成果奖';
			$dep = '所有系';
			if(isset($_POST['submit'])){
				$status = $_POST['status'];
				$years = $_POST['years'];
				$ptype = $_POST['ptype'];
				$dep = $_POST['dep'];
			}
			//导航栏固定
			$this->assign('page','page12');

			$this->assign('status',$status);
			$this->assign('years',$years);
			$this->assign('ptype',$ptype);
			$this->assign('dep',$dep);
			$array = $this->get($status,$years,$dep,$ptype);
			$this->assign('array',$array);
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminUserFind(){
		$id = cookie('login_id');
		if($id != ''){
			$years = "时间不限";
			$dep = "所有系";
			$search = '';
			if(isset($_POST['submit'])){
				$years = $_POST['years'];
				$dep = $_POST['dep'];
				$search = $_POST['search'];
			}
			//导航栏固定
			$this->assign('page','page13');

			$this->assign('years',$years);
			$this->assign('dep',$dep);
			$this->assign('search',$search);
			$array = $this->getUserFind($years , $dep , $search);
			$this->assign('UserFind',$array);
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminUserFindNext(){
		$id = cookie('login_id');
		if($id != ''){
			$status = '已通过';
			$years = '时间不限';
			$ptype = '教学成果奖';
			$userid = cookie('specific_id');
			// 数据库操作
			$ms = D('MapStatus');
			$ui = D('UserInfo');
				$name = $ui->query("select name from think_user_info where id='{$userid}' ");
				$yes = $ms->query("select count(*) from think_map_status where id='{$userid}' and status='YES' ");
				$wait = $ms->query("select count(*) from think_map_status where id='{$userid}' and status='WAIT' ");
				$no = $ms->query("select count(*) from think_map_status where id='{$userid}' and status='NO' ");
				$this->assign('name',$name[0]['name']);
				$this->assign('yes',$yes[0]['count(*)']);
				$this->assign('wait',$wait[0]['count(*)']);
				$this->assign('no',$no[0]['count(*)']);
			if(isset($_POST['submit'])){

				$status = $_POST['status'];
				$years = $_POST['years'];
				$ptype = $_POST['ptype'];
			}
			//导航栏固定
			$this->assign('page','page13');

			$this->assign('status',$status);
			$this->assign('years',$years);
			$this->assign('ptype',$ptype);
			
			$array = $this->getSpecificUser($status , $years , $ptype);
			$this->assign('specificUser',$array);
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminPassValue(){
		$id = cookie('login_id');
		if($id != ''){
			if($_PSOT['data'] == 'return'){
				cookie('specific_id',null);
				$this->ajaxReturn("success");
			}else{
				$user_id = $_POST['data'];
				cookie('id',$user_id,array('expire'=>3600*3,'prefix'=>'specific_'));
				$this->ajaxReturn('success');
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}
	public function superAdminAdminPd(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			/*管理员账户信息 assign */
			$ison = 'YES';
			//导航栏固定
			$this->assign('page','page8');

			$this->assign('adminInf',$this->getAdminInfo());
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminKey(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminUserPd(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 删除cookie(user_id)
			cookie('user_id',null);
			// 默认值
			$ison = '在岗';
			$dep = '所有系';
			$search = '';
			if(isset($_POST['submit'])){
				// 接受参数
			$ison = $_POST['ison'];
			$dep = $_POST['dep'];
			$search = $_POST['search'];
			}
			//导航栏固定
			$this->assign('page','page7');

			$this->assign("ison",$ison);
			$this->assign("dep",$dep);
			$this->assign("search",$search);
			$this->assign('adminUser',$this->getUserInfo($ison , $dep ,$search));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminUserPdAdd(){
			/*
			 * isok :
			 *        0 添加失败
			 *        1 添加成功
			 *        2 项目不为空
			 *        3 修改失败
			 *        4 修改成功
			 *        5 初始化
			 */
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			//导航栏固定
			$this->assign('page','page7');

			if(isset($_POST['submit'])){
				$userid = $_POST['id'];
				$name = $_POST['name'];
				$nation = $_POST['nation'];
				$sex = $_POST['sex'];
				$birthday = $_POST['birthday'];
				$age = $_POST['age'];
				$dep = $_POST['dep'];
				$pos = $_POST['pos'];
				$title = $_POST['title'];
				$detm = $_POST['detm'];
				$lv = $_POST['lv'];
				$ison = 'YES';
				$university = $_POST['university'];
				$profession = $_POST['profession'];
				$gratm = $_POST['gratm'];
				$startm = $_POST['startm'];
				$polistatus = $_POST['polistatus'];
				$origin = $_POST['origin'];
				// 初始密码，也是身份证号
				$password = $_POST['password'];
				$tel = $_POST['tel'];
				$email = $_POST['email'];
				$photo = '';
				if($userid!='' && $name!='' && $nation!='' && $birthday!='' && $age!='' && $dep!='' && $pos!='' && $title!='' && $detm!='' && $lv!='' && $ison!='' && $university!='' && $profession!='' && $gratm!='' && $startm!='' && $polistatus!='' && $origin!='' && $password!=''){
				
					// 根据pos寻找AUTH
				$ap = D('MapAp');
				$ap->startTrans();
				$return1 = $ap->query("select auth from think_map_ap where pos='{$pos}' ");
				$auth = $return1[0]['auth'];

				// 判断$id是否存在，若存在则更新
				$login = D('Login');
				$pdM = D('PdMaintain');
				$userinfo = D('UserInfo');
				$userjob = D('UserJob');
				$useredu = D('UserEdu');
				$return = $login->query("select id from think_login where id='{$userid}' ");
				if(!empty($return)){
					/*update区*/
					//更新AUTH权限
					$return0 = $login->execute("update think_login set auth='{$auth}' where id='{$userid}' ");
					// 更新身份证号
					$return1=$pdM->execute("update think_pd_maintain set idnum='{$password}' where id='{$userid}' ");
					// 更新userinfo
					$return2=$userinfo->execute("update think_user_info set name='{$name}',nation='{$nation}',sex='{$sex}',age='{$age}',birthday='{$birthday}',polistatus='{$polistatus}',origin='{$origin}',tel='{$tel}',email='{$email}' where id='{$userid}' ");
					// 更新userjob					
					$return3=$userjob->execute("update think_user_job set dep='{$dep}',pos='{$pos}',title='{$title}',detm='{$detm}',lv='{$lv}',startm='{$startm}' where id='{$userid}' ");
					// 更新useredu
					$return4=$useredu->execute("update think_user_edu set university='{$university}',profession='{$profession}',gratm='{$gratm}' where id='{$userid}' ");
					if($return1 || $return2 || $return3 || $return4){
						$ap->commit();
						$this->assign('isok',4);
						// 重定向到superAdminUserPd
						$this->redirect('superAdminUserPd');
					}else{
						$ap->rollback();
						$this->assign('isok',3);
					 	// 重定向到superAdminUserPd
						$this->redirect('superAdminUserPd');
					}

				}else{
					/*insert区*/
					
					//插入login
					$return0 = $login->execute("insert into think_login values('{$userid}','{$password}','{$auth}')");
					// 插入身份证信息维护
					$return1 = $pdM->execute("insert into think_pd_maintain values('{$userid}','{$password}') ");
					// 插入userinfo
					$return2=$userinfo->execute("insert into think_user_info values('{$userid}','{$name}','{$nation}','{$sex}','{$age}','{$birthday}','{$polistatus}','{$origin}','{$tel}','{$email}','{$photo}') ");
					// 插入userjob
					$return3=$userjob->execute("insert into think_user_job values('{$userid}','{$dep}','{$pos}','{$title}','{$detm}','{$lv}','{$startm}','{$ison}')");
					// 插入useredu
					$return4=$useredu->execute("insert into think_user_edu values('{$userid}','{$university}','{$profession}','{$gratm}','{$edu}') ");
					if($return0 && $return1 && $return2 && $return3 && $return4){
						$ap->commit();
						$this->assign('isok',1);
						// 重定向到superAdminUserPd
						$this->redirect('superAdminUserPd');
					}else{
						$ap->rollback();
						$this->assign('isok',0);
					 	$this->display();
					}
				}

			}else{
				$this->assign('isok',2);
				$this->display();
			}
						
			}else{
				$this->assign('isok',5);
				$this->display();
			}
			
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminUserPdAddEdit(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$userid = cookie('user_id');
			// 通过userid去查所有的信息
				$userinfo = D('UserInfo');
				$return1 = $userinfo->query(" select * from think_user_info where id='{$userid}' ");
				$userjob = D('UserJob');
				$return2 = $userjob->query(" select * from think_user_job where id='{$userid}' ");
				$useredu = D('UserEdu');
				$return3 = $useredu->query(" select * from think_user_edu where id='{$userid}' ");
				$login = D('Login');
				$return4 = $login->query(" select * from think_login where id='{$userid}' ");

				$array = array(
					'userinfo' => $return1,
					'userjob'  => $return2,
					'useredu'  => $return3,
					'login'    => $return4
					);
			
			$this->ajaxReturn($array);
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}


	public function superAdminTeachAch(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 默认值
			$dep = "所有系";
			$search='';
			if(isset($_POST['submit'])){
				$dep = $_POST['dep'];
				$search = $_POST['search'];
			}
			//导航栏固定
			$this->assign('page','page21');

			$array = $this->getPtype($dep , $search , 'teach_ach');
			$this->assign("dep",$dep);
			$this->assign("search",$search);
			$this->assign("teachAch",$array);
			$this->assign("teachAch_WAIT",count($array,0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminTeachPro(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 默认值
			$dep = "所有系";
			$search='';
			if(isset($_POST['submit'])){
				$dep = $_POST['dep'];
				$search = $_POST['search'];
			}
			//导航栏固定
			$this->assign('page','page22');

			$array = $this->getPtype($dep , $search , 'teach_pro');
			$this->assign("dep",$dep);
			$this->assign("search",$search);
			$this->assign("teachPro",$array);
			$this->assign("teachPro_WAIT",count($array,0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminTeachTbp(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 默认值
			$dep = "所有系";
			$search='';
			if(isset($_POST['submit'])){
				$dep = $_POST['dep'];
				$search = $_POST['search'];
			}
			//导航栏固定
			$this->assign('page','page23');

			$array = $this->getPtype($dep , $search , 'teach_tbp');
			$this->assign("dep",$dep);
			$this->assign("search",$search);
			$this->assign("teachTbp",$array);
			$this->assign("teachTbp_WAIT",count($array,0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}	
	public function superAdminResearchPap(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 默认值
			$dep = "所有系";
			$search='';
			if(isset($_POST['submit'])){
				$dep = $_POST['dep'];
				$search = $_POST['search'];
			}
			//导航栏固定
			$this->assign('page','page31');

			$array = $this->getPtype($dep , $search , 'research_pap');
			$this->assign("dep",$dep);
			$this->assign("search",$search);
			$this->assign("researchPap",$array);
			$this->assign("researchPap_WAIT",count($array,0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminResearchPro(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 默认值
			$dep = "所有系";
			$search='';
			if(isset($_POST['submit'])){
				$dep = $_POST['dep'];
				$search = $_POST['search'];
			}
			//导航栏固定
			$this->assign('page','page34');

			$array = $this->getPtype($dep , $search,'research_pro');
			$this->assign("dep",$dep);
			$this->assign("search",$search);
			$this->assign("researchPro",$array);
			$this->assign("researchPro_WAIT",count($array,0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminResearchAch(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 默认值
			$dep = "所有系";
			$search='';
			if(isset($_POST['submit'])){
				$dep = $_POST['dep'];
				$search = $_POST['search'];
			}
			//导航栏固定
			$this->assign('page','page33');

			$array = $this->getPtype($dep , $search , 'research_ach');
			$this->assign("dep",$dep);
			$this->assign("search",$search);
			$this->assign("researchAch",$array);
			$this->assign("researchAch_WAIT",count($array,0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminResearchMpb(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 默认值
			$dep = "所有系";
			$search='';
			if(isset($_POST['submit'])){
				$dep = $_POST['dep'];
				$search = $_POST['search'];
			}
			//导航栏固定
			$this->assign('page','page32');

			$array = $this->getPtype($dep , $search,'research_mpb');
			$this->assign("dep",$dep);
			$this->assign("search",$search);
			$this->assign("researchMpb",$array);
			$this->assign("researchMpb_WAIT",count($array,0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminResearchFund(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 默认值
			$dep = "所有系";
			$search='';
			if(isset($_POST['submit'])){
				$dep = $_POST['dep'];
				$search = $_POST['search'];
			}
			//导航栏固定
			$this->assign('page','page35');

			$array = $this->getPtype($dep , $search,'research_fund');
			$this->assign("dep",$dep);
			$this->assign("search",$search);
			$this->assign("researchFund",$array);
			$this->assign("researchFund_WAIT",count($array,0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminOtherWel(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 默认值
			$dep = "所有系";
			$search='';
			if(isset($_POST['submit'])){
				$dep = $_POST['dep'];
				$search = $_POST['search'];
			}
			//导航栏固定
			$this->assign('page','page5');

			$array = $this->getPtype($dep , $search,'other_wel');
			$this->assign("dep",$dep);
			$this->assign("search",$search);
			$this->assign("otherWel",$array);
			$this->assign("otherWel_WAIT",count($array,0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminOtherNews(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 默认值
			$dep = "所有系";
			$search='';
			if(isset($_POST['submit'])){
				$dep = $_POST['dep'];
				$search = $_POST['search'];
			}//导航栏固定
			$this->assign('page','page6');

			$array = $this->getPtype($dep , $search,'other_news');
			$this->assign("dep",$dep);
			$this->assign("search",$search);
			$this->assign("OtherNews",$array);
			$this->assign("otherNews_WAIT",count($array,0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function superAdminOtherExc(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 默认值
			$dep = "所有系";
			$search='';
			if(isset($_POST['submit'])){
				$dep = $_POST['dep'];
				$search = $_POST['search'];
			}
			//导航栏固定
			$this->assign('page','page4');

			$array = $this->getPtype($dep , $search,'other_exc');
			$this->assign("dep",$dep);
			$this->assign("search",$search);
			$this->assign("otherExc",$array);
			$this->assign("otherExc_WAIT",count($array,0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}

	public function superAdminRefuse(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function scienResearchSec(){
		$this->display();
	}
	public function teachingSec(){
		$this->display();
	}

	/*
	 * 管理密匙验证
	 */
	public function keyConfirm(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 写验证代码
			$key = $_POST['key'];
			if($key == '950810'){
				$this->ajaxReturn("success");
			}else{
				$this->ajaxReturn("keyfail");			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn( "cookiefail");
		}
	}
	/*
	 * get信息区
	 * 负责获取信息，类内使用，负责给对应端口函数调用使用
	 */
	// 获取另一个页面的id参数
	public function getUserId(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			if($_POST['data'] == 'return'){
				cookie('user_id',null);
				$this->ajaxReturn('success');
			}else{
				$userid = $_POST['data'];
				// 存入全局变量
				cookie('id',$userid,array('expire'=>3600*3,'prefix'=>'user_'));
				$this->ajaxReturn('success');
			}
			
		}else{
			cookie('login_id',null);
			$this->ajaxReturn("cookiefail");
		}
	}	
	// get各个管理员账号密码信息
	public function getAdminInfo(){
		// 实例化LoginModel
		$login = D('Login');
		$array_tsec = $login->query("select id,pd from think_login where auth='C1_B5' ");
		$array_srsec = $login->query("select id,pd from think_login where auth='C2_B5'  ");
		$array_sadmin = $login->query("select id,pd from think_login where auth='D_C3_B5' ");
		// 格式化数组
		$array[0] = array(
			'id' => $array_tsec[0]['id'],
			'pd' => $array_tsec[0]['pd']
			);
		$array[1] = array(
			'id' => $array_srsec[0]['id'],
			'pd' => $array_srsec[0]['pd']
			);
		$array[2] = array(
			'id' => $array_sadmin[0]['id'],
			'pd' => $array_sadmin[0]['pd']
			);
		return $array;
	}
	// get各个老师的账户和个人信息
	public function getUserInfo($ison , $dep , $search){
		// 先处理一下ison的值
		if($ison == '在岗'){
			$ison='YES';
		}else{
			$ison = 'NO';
		}
		/*
		 *设标志$search类型的变量,默认为false
		 * 1 为 name
		 * 2 为 id
		 * 3 为 null 或者 非法字符
		 */
		//  
		$is = 3;
		if(is_numeric($search) && strlen($search)==10){
				// 则说明$search为id
				$is = 2;
		}else if(!eregi("[^\x80-\xff]","$search") && $search != ''){
				// 则说明$search为name
				$is = 1;
			}else{
				$is =3 ; 
			}
		// 实例化UserJobModel
		$userJob = D('UserJob');
		if($dep == '所有系'){
			if($is == 2){
				$info = $userJob->query("select c1.id,c2.name,c1.dep,c1.pos,c1.title,c1.lv from think_user_job c1,think_user_info c2 where c1.id=c2.id  and c2.id='{$search}' and ison='{$ison}' ");
			}else if($is == 1){
				$info = $userJob->query("select c1.id,c2.name,c1.dep,c1.pos,c1.title,c1.lv from think_user_job c1,think_user_info c2 where c1.id=c2.id  and name='{$search}' and ison='{$ison}' ");
			}else{
				$info = $userJob->query("select c1.id,c2.name,c1.dep,c1.pos,c1.title,c1.lv from think_user_job c1,think_user_info c2 where c1.id=c2.id  and ison='{$ison}' ");
			}
			
		}else{
			if($is == 2){
				$info = $userJob->query("select c1.id,c2.name,c1.dep,c1.pos,c1.title,c1.lv from think_user_job c1,think_user_info c2 where c1.id=c2.id   and ison='{$ison}' and dep='{$dep}' and c2.id='{$search}' ");
			}else if($is == 1){
				$info = $userJob->query("select c1.id,c2.name,c1.dep,c1.pos,c1.title,c1.lv from think_user_job c1,think_user_info c2 where c1.id=c2.id  and name='{$search}' and ison='{$ison}' and dep='{$dep}' ");
			}else{
				$info = $userJob->query("select c1.id,c2.name,c1.dep,c1.pos,c1.title,c1.lv from think_user_job c1,think_user_info c2 where c1.id=c2.id  and ison='{$ison}' and dep='{$dep}' ");
			}
			
		}
	    
	    return $info;
	}
	public function getSpecificUser($status , $years , $ptype){
		// 置换ptype
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
			case '主持科研项目':
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
		// 置换status
		switch ($status) {
			case '已通过':
				$status = 'YES';
				break;
			case '待审核':
				$status = 'WAIT';
				break;
			case '未通过':
				$status = 'NO';
				break;
			
			default:
				$status = 'YES';
				break;
		}

		// 数据库操作
		$userid = cookie('specific_id');
		$ms = D('MapStatus');
		if($years == '时间不限'){
			$return = $ms->query("select c1.reason,c2.* from think_map_status c1,think_{$ptype} c2 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c1.id='{$userid}' and c1.status='{$status}' ");
			
		}else{
			$return = $ms->query("select c1.reason,c2.* from think_map_status c1,think_{$ptype} c2 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c1.id='{$userid}' and c1.status='{$status}' and c1.years='{$years}' ");
		}
		return $return;
	}
	// 综合get
	public function get($status , $years , $dep , $ptype){
		// 置换ptype
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
			case '主持科研项目':
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
		// 置换status
		switch ($status) {
			case '已通过':
				$status = 'YES';
				break;
			case '待审核':
				$status = 'WAIT';
				break;
			case '未通过':
				$status = 'NO';
				break;
			
			default:
				$status = 'YES';
				break;
		}
		// 数据库操作
		$ui = D('UserInfo');
		$ms = D('MapStatus');
		if($dep == '所有系'){
			if($years == '时间不限'){
				$return = $ms->query("select c1.*,c2.reason,c3.name as sname from think_{$ptype} c1,think_map_status c2,think_user_info c3 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c2.id=c3.id and c2.status='{$status}' ");
			}else{
				$return = $ms->query("select c1.*,c2.reason,c3.name as sname from think_{$ptype} c1,think_map_status c2,think_user_info c3 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c2.id=c3.id and c2.status='{$status}' and c1.years='{$years}' ");
			}
		}else{
			if($years == '时间不限'){
				$return = $ms->query("select c1.*,c2.reason,c3.name as sname from think_{$ptype} c1,think_map_status c2,think_user_info c3 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c2.id=c3.id and c2.status='{$status}' and c2.id in(select id from think_user_job where dep='{$dep}' ) ");
			}else{
				$return = $ms->query("select c1.*,c3.name as sname,c2.reason from think_{$ptype} c1,think_map_status c2,think_user_info c3 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c2.id=c3.id and c2.status='{$status}' and c2.years='{$years}' and c3.id in(select id from think_user_job where dep='{$dep}' ) ");
			}
		}

		return $return;
	}
	// get 不同类型的项目的信息
	public function getPtype($dep , $search , $ptype){
		/*
		 *设标志$search类型的变量,默认为false
		 * 1 为 name
		 * 2 为 id
		 * 3 为 null 或者 非法字符
		 */
		//  
		$is = 3;
		if(is_numeric($search) && strlen($search)==10){
				// 则说明$search为id
				$is = 2;
		}else if(!eregi("[^\x80-\xff]","$search") && $search != ''){
				// 则说明$search为name
				$is = 1;
			}else{
				$is =3 ; 
			}
		// 实例化MapStatus
		$ms = D('MapStatus');
		if($dep == '所有系'){
			
				if($is == 2){
					$info = $ms->query("select * from think_map_status c1,think_{$ptype} c2 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c1.ptype='{$ptype}' and c1.status='WAIT' and c1.id='{$search}' ");
				}else if($is == 1){
					$info = $ms->query("select * from think_map_status c1,think_{$ptype} c2 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c1.ptype='{$ptype}' and c1.status='WAIT' and c1.id in(select id from think_user_info where name='{$search}') ");
				}else{
					$info = $ms->query("select * from think_map_status c1,think_{$ptype} c2 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c1.ptype='{$ptype}' and c1.status='WAIT' ");
				}
			
		
		}else{
			
				if($is == 2){
					$info = $ms->query("select * from think_map_status c1,think_{$ptype} c2 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c1.ptype='{$ptype}' and c1.status='WAIT' and c1.id in (select id from think_user_job where dep='{$dep}') and c1.id='{$search}' ");
				}else if($is == 1){
					$info = $ms->query("select * from think_map_status c1,think_{$ptype} c2 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c1.ptype='{$ptype}' and c1.status='WAIT' and c1.id in (select id from think_user_job where dep='{$dep}') and c1.id in (select id from think_user_info where name='{$search}') ");
				}else{
					$info = $ms->query("select * from think_map_status c1,think_{$ptype} c2 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c1.ptype='{$ptype}' and c1.status='WAIT' and c1.id in (select id from think_user_job where dep='{$dep}') ");
				}
			
			
		}
	    
	    return $info;
	}

	
	public function getUserFind($years , $dep , $search){
		/*
		 *设标志$search类型的变量,默认为3
		 * 1 为 name
		 * 2 为 id
		 * 3 为 null 或者 非法字符
		 */
		
		$is = 3;
		if(is_numeric($search) && strlen($search)==10){
				// 则说明$search为id
				$is = 2;
		}else if(!eregi("[^\x80-\xff]","$search") && $search != ''){
				// 则说明$search为name
				$is = 1;
			}else{
				$is =3 ; 
			}
		/*
		 * 设标志$years类型的变量，默认为0
		 * 0 为 时间不限
		 * 1 为 2017 或者 2018
		 */
		$y =0;
		if($years == "时间不限"){
			$y = 0;
		}else{
			$y = 1;
			$years=intval($years);
		}
		/*
		 * 设标志$dep类型变量，默认为0
		 */
		$d = 0;
		if($dep == "所有系"){
			$d = 0;
		}else{
			$d =1;
		}
		// 实例化MapStatus
		$ms = D('MapStatus');
		if($d == 0){
			if($y == 0){
				if($is == 2){
					$info_teachNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and ptype like 'teach_%' and status='YES' " );
					$info_researchNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and ptype like 'research_%' and status='YES' ");
					$info_otherNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and ptype like 'other_%' and status='YES' ");
					$info_allNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and status='YES' ");
					$info_user = $ms->query("select name,id from think_user_info where id='{$search}' group by id");
				}else if($is == 1){
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and c2.name='{$search}' and c1.ptype like 'teach_%' and status='YES' ");
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and c2.name='{$search}' and c1.ptype like 'research_%' and status='YES' ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and  c2.name='{$search}' and c1.ptype like 'other_%' and status='YES' ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and  c2.name='{$search}' and status='YES' ");
					$info_user = $ms->query("select name,id from think_user_info  where name='{$search}' group by id ");
				}else{
					$info_teachNum = $ms->query("select id,count(*) from think_map_status where ptype like 'teach_%' and status='YES' group by id ");
					$info_researchNum = $ms->query("select id,count(*) from think_map_status where ptype like 'research_%' and status='YES' group by id ");
					$info_otherNum = $ms->query("select id,count(*) from think_map_status where ptype like 'other_%' and status='YES' group by id ");
					$info_allNum = $ms->query("select id,count(*) from think_map_status where status='YES' group by id ");
					$info_user = $ms->query("select name,id from think_user_info  group by id ");
				}
			}
			// years不为时间不限
			else{
				if($is == 2){
					$info_teachNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and ptype like 'teach_%' and status='YES' and years='{$years}' " );
					$info_researchNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and ptype like 'research_%' and status='YES' and years='{$years}' ");
					$info_otherNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and ptype like 'other_%' and status='YES' and years='{$years}' ");
					$info_allNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and status='YES' and years='{$years}' ");
					$info_user = $ms->query("select name,id from think_user_info where id='{$search}' group by id");
				}else if($is == 1){
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and c2.name='{$search}' and c1.ptype like 'teach_%' and status='YES' and years='{$years}' ");
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and c2.name='{$search}' and c1.ptype like 'research_%' and status='YES' and years='{$years}' ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and  c2.name='{$search}' and c1.ptype like 'other_%' and status='YES' and years='{$years}' ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and  c2.name='{$search}' and status='YES' and years='{$years}' ");
					$info_user = $ms->query("select name,id from think_user_info  where name='{$search}' group by id ");
				}else{
					$info_teachNum = $ms->query("select id,count(*) from think_map_status where ptype like 'teach_%' and status='YES' and years='{$years}' group by id ");
					$info_researchNum = $ms->query("select id,count(*) from think_map_status where ptype like 'research_%' and status='YES' and years='{$years}' group by id ");
					$info_otherNum = $ms->query("select id,count(*) from think_map_status where ptype like 'other_%' and status='YES' and years='{$years}' group by id ");
					$info_allNum = $ms->query("select id,count(*) from think_map_status where status='YES' and years='{$years}' group by id ");
					$info_user = $ms->query("select name,id from think_user_info  group by id ");
				}
		}
	}
	//dep不为所有系
	else{
			if($y == 0){
				if($is == 2){
					$info_teachNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and ptype like 'teach_%' and status='YES' " );
					$info_researchNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and ptype like 'research_%' and status='YES' ");
					$info_otherNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and ptype like 'other_%' and status='YES' ");
					$info_allNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and status='YES' ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_user_job c2 where c1.id=c2.id and c1.id='{$search}' and c2.dep='{$dep}' group by id");
				}else if($is == 1){
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and c2.name='{$search}' and c1.ptype like 'teach_%' and status='YES' ");
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and c2.name='{$search}' and c1.ptype like 'research_%' and status='YES' ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and  c2.name='{$search}' and c1.ptype like 'other_%' and status='YES' ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and  c2.name='{$search}' and status='YES' ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_user_job c2 where c1.id=c2.id and c1.name='{$search}' and c2.dep='{$dep}' group by id");
				}else{
					$info_teachNum = $ms->query("select id,count(*) from think_map_status where ptype like 'teach_%' and status='YES' group by id ");
					$info_researchNum = $ms->query("select id,count(*) from think_map_status where ptype like 'research_%' and status='YES' group by id ");
					$info_otherNum = $ms->query("select id,count(*) from think_map_status where ptype like 'other_%' and status='YES' group by id ");
					$info_allNum = $ms->query("select id,count(*) from think_map_status where status='YES' group by id ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_user_job c2 where c1.id=c2.id and  c2.dep='{$dep}' group by id");
				}
			}else{
				if($is == 2){
					$info_teachNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and ptype like 'teach_%' and status='YES' and years='{$years}' " );
					$info_researchNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and ptype like 'research_%' and status='YES' and years='{$years}' ");
					$info_otherNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and ptype like 'other_%' and status='YES' and years='{$years}' ");
					$info_allNum = $ms->query("select id,count(*) from think_map_status where id='{$search}' and status='YES' and years='{$years}' ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_user_job c2 where c1.id=c2.id and c1.id='{$search}' and c2.dep='{$dep}' group by id");
				}else if($is == 1){
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and c2.name='{$search}' and c1.ptype like 'teach_%' and status='YES' and years='{$years}' ");
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and c2.name='{$search}' and c1.ptype like 'research_%' and status='YES' and years='{$years}' ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and  c2.name='{$search}' and c1.ptype like 'other_%' and status='YES' and years='{$years}' ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2 where c1.id=c2.id and  c2.name='{$search}' and status='YES' and years='{$years}' ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_user_job c2 where c1.id=c2.id and c1.name='{$search}' and c2.dep='{$dep}' group by id");
				}else{
					$info_teachNum = $ms->query("select id,count(*) from think_map_status where ptype like 'teach_%' and status='YES' and years='{$years}' group by id ");
					$info_researchNum = $ms->query("select id,count(*) from think_map_status where ptype like 'research_%' and status='YES' and years='{$years}' group by id ");
					$info_otherNum = $ms->query("select id,count(*) from think_map_status where ptype like 'other_%' and status='YES' and years='{$years}' group by id ");
					$info_allNum = $ms->query("select id,count(*) from think_map_status where status='YES' and years='{$years}' group by id ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_user_job c2 where c1.id=c2.id and  c2.dep='{$dep}' group by id");
			}
		}
	   }

	    $info = array();
	    // 对应表分配,以user_info为准,把Num集合数对应到教师
	    for($i=0;$i<count($info_user,0);$i++){
	    	$u = $info_user[$i]['id'];
	    	$t_sign = false;
	    	$r_sign = false;
	    	$o_sign = false;
	    	$a_sign = false;
	    	for($j=0;$j<count($info_teachNum,0);$j++){
	    		$t = $info_teachNum[$j]['id'];
	    		$r = $info_researchNum[$j]['id'];
		    	$o = $info_otherNum[$j]['id'];
		    	$a = $info_allNum[$j]['id'];
	    		if($u == $t){
	    			$info[$i]['teachNum']=$info_teachNum[$j]['count(*)'];
	    			$t_sign = true;
	    		}
	    		if($u == $r){
	    			$info[$i]['researchNum']=$info_researchNum[$j]['count(*)'];
	    			$r_sign = true;
	    		}
	    		if($u == $o){
	    			$info[$i]['otherNum']=$info_otherNum[$j]['count(*)'];
	    			$o_sign = true;
	    	}
	    		if($u == $a){
	    			$info[$i]['allNum']=$info_allNum[$j]['count(*)'];
	    			$a_sign = true;
	    		}
	    	}
	    	if(!$t_sign)$info[$i]['teachNum']=0;
	    	if(!$r_sign)$info[$i]['researchNum']=0;
	    	if(!$o_sign)$info[$i]['otherNum']=0;
	    	if(!$a_sign)$info[$i]['allNum']=0;
	    	$info[$i]['name']=$info_user[$i]['name'];
	    	$info[$i]['id']=$info_user[$i]['id'];
	    }
	    return $info;
	}
	public function getAll($years , $dep){
		
		/*
		 * 设标志$years类型的变量，默认为0
		 * 0 为 时间不限
		 * 1 为 2017 或者 2018
		 */
		$y =0;
		if($years == "时间不限"){
			$y = 0;
		}else{
			$y = 1;
			$years=intval($years);
		}
		/*
		 * 设标志$dep类型变量，默认为0
		 */
		$d = 0;
		if($dep == "所有系"){
			$d = 0;
		}else{
			$d =1;
		}
		// 实例化MapStatus
		$ms = D('MapStatus');
		if($d == 0){
			if($y == 0){
				$teachAll = $ms->query("select count(*) from think_map_status where status='YES' and ptype like 'teach_%' ");
				$teach_ach = $ms->query("select count(*) from think_map_status where status='YES' and ptype='teach_ach' ");
				$teach_tbp = $ms->query("select count(*) from think_map_status where status='YES' and ptype='teach_tbp' ");
				$teach_pro = $ms->query("select count(*) from think_map_status where status='YES' and ptype='teach_pro' ");
				$researchAll = $ms->query("select count(*) from think_map_status where status='YES' and ptype like 'research_%' ");
				$research_pap = $ms->query("select count(*) from think_map_status where status='YES' and ptype='research_pap' ");
				$research_mpb = $ms->query("select count(*) from think_map_status where status='YES' and ptype='research_mpb' ");
				$research_pro = $ms->query("select count(*) from think_map_status where status='YES' and ptype='research_pro' ");
				$research_ach = $ms->query("select count(*) from think_map_status where status='YES' and ptype='research_ach' ");
				$research_fund = $ms->query("select count(*) from think_map_status where status='YES' and ptype='research_fund' ");
				$otherAll = $ms->query("select count(*) from think_map_status where status='YES' and ptype like 'other_%' ");
				$other_exc = $ms->query("select count(*) from think_map_status where status='YES' and ptype like 'other_exc' ");
				$other_wel = $ms->query("select count(*) from think_map_status where status='YES' and ptype like 'other_wel' ");
				$other_news = $ms->query("select count(*) from think_map_status where status='YES' and ptype like 'other_news' ");
			}
			// years不为时间不限
			else{
				$teachAll = $ms->query("select count(*) from think_map_status where status='YES' and ptype like 'teach_%' and years='{$years}' ");
				$teach_ach = $ms->query("select count(*) from think_map_status where status='YES' and ptype='teach_ach' and years='{$years}' ");
				$teach_tbp = $ms->query("select count(*) from think_map_status where status='YES' and ptype='teach_tbp' and years='{$years}' ");
				$teach_pro = $ms->query("select count(*) from think_map_status where status='YES' and ptype='teach_pro' and years='{$years}' ");
				$researchAll = $ms->query("select count(*) from think_map_status where status='YES' and ptype like 'research_%' and years='{$years}' ");
				$research_pap = $ms->query("select count(*) from think_map_status where status='YES' and ptype='research_pap' and years='{$years}' ");
				$research_mpb = $ms->query("select count(*) from think_map_status where status='YES' and ptype='research_mpb' and years='{$years}' ");
				$research_pro = $ms->query("select count(*) from think_map_status where status='YES' and ptype='research_pro' and years='{$years}' ");
				$research_ach = $ms->query("select count(*) from think_map_status where status='YES' and ptype='research_ach' and years='{$years}' ");
				$research_fund = $ms->query("select count(*) from think_map_status where status='YES' and ptype='research_fund' and years='{$years}' ");
				$otherAll = $ms->query("select count(*) from think_map_status where status='YES' and ptype like 'other_%' and years='{$years}' ");
				$other_exc = $ms->query("select count(*) from think_map_status where status='YES' and ptype like 'other_exc' and years='{$years}' ");
				$other_wel = $ms->query("select count(*) from think_map_status where status='YES' and ptype like 'other_wel' and years='{$years}' ");
				$other_news = $ms->query("select count(*) from think_map_status where status='YES' and ptype like 'other_news' and years='{$years}' ");
		}
	}
	//dep不为所有系
	else{
			if($y == 0){
				$teachAll = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.status='YES' and c1.ptype like 'teach_%' and c2.dep='{$dep}' ");
				$teach_ach = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='teach_ach' and c2.dep='{$dep}' ");
				$teach_tbp = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='teach_tbp' and c2.dep='{$dep}' ");
				$teach_pro = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='teach_pro' and c2.dep='{$dep}' ");
				$researchAll = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype like 'teach_%' and c2.dep='{$dep}' ");
				$research_pap = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='research_pap' and c2.dep='{$dep}' ");
				$research_mpb = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='research_mpb' and c2.dep='{$dep}' ");
				$research_pro = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='research_pro' and c2.dep='{$dep}' ");
				$research_ach = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='research_ach' and c2.dep='{$dep}' ");
				$research_fund = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='research_fund' and c2.dep='{$dep}' ");
				$otherAll = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype like 'other_%' and c2.dep='{$dep}' ");
				$other_exc = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='other_exc' and c2.dep='{$dep}' ");
				$other_wel = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='other_wel' and c2.dep='{$dep}' ");
				$other_news = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='other_news' and c2.dep='{$dep}' ");
			}else{
				$teachAll = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype like 'teach_%' and c2.dep='{$dep}' and c1.years='{$years}' ");
				$teach_ach = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='teach_ach' and c2.dep='{$dep}' and c1.years='{$years}'  ");
				$teach_tbp = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='teach_tbp' and c2.dep='{$dep}' and c1.years='{$years}' ");
				$teach_pro = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='teach_pro' and c2.dep='{$dep}' and c1.years='{$years}' ");
				$researchAll = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype like 'research_%' and c2.dep='{$dep}' and c1.years='{$years}' ");
				$research_pap = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='research_pap' and c2.dep='{$dep}' and c1.years='{$years}' ");
				$research_mpb = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='research_mpb' and c2.dep='{$dep}' and c1.years='{$years}' ");
				$research_pro = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='research_pro' and c2.dep='{$dep}' and c1.years='{$years}' ");
				$research_ach = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='research_ach' and c2.dep='{$dep}' and c1.years='{$years}' ");
				$research_fund = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype='research_fund' and c2.dep='{$dep}' and c1.years='{$years}' ");
				$otherAll = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype like 'other_%' and c2.dep='{$dep}' and c1.years='{$years}' ");
				$other_exc = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype like 'other_exc' and c2.dep='{$dep}' and c1.years='{$years}' ");
				$other_wel = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype like 'other_wel' and c2.dep='{$dep}' and c1.years='{$years}' ");
				$other_news = $ms->query("select count(*) from think_map_status c1,think_user_job c2 where c1.id=c2.id and c1.status='YES' and c1.ptype like 'other_news' and c2.dep='{$dep}' and c1.years='{$years}' ");
		}
	   }

	    $info = array(
	    	'teachAll' => $teachAll[0]['count(*)'],
	    	'teach_ach' =>$teach_ach[0]['count(*)'],
	    	'teach_tbp' =>$teach_tbp[0]['count(*)'],
	    	'teach_pro' =>$teach_pro[0]['count(*)'],
	    	'researchAll' =>$researchAll[0]['count(*)'],
	    	'research_pap' =>$research_pap[0]['count(*)'],
	    	'research_mpb' =>$research_mpb[0]['count(*)'],
	    	'research_pro' =>$research_pro[0]['count(*)'],
	    	'research_ach' =>$research_ach[0]['count(*)'],
	    	'research_fund' =>$research_fund[0]['count(*)'],
	    	'otherAll' =>$otherAll[0]['count(*)'],
	    	'other_exc' =>$other_exc[0]['count(*)'],
	    	'other_wel' =>$other_wel[0]['count(*)'],
	    	'other_news' =>$other_news[0]['count(*)']
	    	);
	  	
	    return $info;
	}
	/*
	 * search 区
	 * 运用ajax异步技术的提交查询
	 */
	// public function searchUserInfo(){
	// 	// cookie识别
	// 	$id = cookie('login_id');
	// 	if($id != ''){
	// 		// 接受参数
	// 		$ison = $_POST['ison'];
	// 		$dep = $_POST['dep'];
	// 		$search = $_POST['search'];
	// 		// 当dep为所有系时
	// 		$return = getUserInfo($ison , $dep , $search);
	// 		$this->ajaxReturn($return);
	// 	}else{
	// 		$this->ajaxReturn("cookiefail");
	// 	}
	// }
	/*
	 * update信息区
	 * 负责修改信息
	 */
	// 修改教学秘书账号信息
	public function updateTsecL(){
		if(cookie('login_id') != ''){
			if(empty($_POST['TsecId']) || empty($_POST['TsecPd'])){
				$this->ajaxReturn("null");
			}else{
				$id = $_POST['TsecId'];
				$password = $_POST['TsecPd'];
				if(strlen($id)==10 && strlen($password)==6){
					 // 实例化LoginModel
					$L = D('Login');
					// 先要做一个账号查重检测
					$spd = $L->query("select id from think_login where id='{$id}' ");
					$sauth = $L->query("select id from think_login where auth='C1_B5' ");
					if(empty($sauth)){
						// 说明审核管理员未定义
						$return0 = $L->execute("insert into think_login values('{$id}','{$password}','C1_B5') ");
						if($return0 == true ){
							$this->ajaxReturn('success');
						}else{
							$this->ajaxReturn('fail');
						}
					}else if(empty($spd) ){
						// 说明账号无冲突
						$return = $L->execute("update think_login set id='{$id}',pd='{$password}' where auth='C1_B5' ");
						if($return == true ){
							$this->ajaxReturn('success');
						}else{
							$this->ajaxReturn('fail');
						}
					}else{
						// 说明账号已存在,则只修改密码
						$return1 = $L->execute("update think_login set pd='{$password}' where id='{$id}' and auth='C1_B5' ");
						if($return1 == true){
							$this->ajaxReturn("success");
						}else{
							$this->ajaxReturn('fail');
						}
					}		
				}else{
					$this->ajaxReturn("lengthfail");
				}			
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn("cookiefail");
		}
	}
	// 修改科研秘书账号信息
	public function updateSRsecL(){
		if(cookie('login_id') != ''){
			if(empty($_POST['SRsecId']) || empty($_POST['SRsecPd'])){
				$this->ajaxReturn("null");
			}else{
				$id = $_POST['SRsecId'];
				$password = $_POST['SRsecPd'];
				if(strlen($id)==10 && strlen($password)==6){
					 // 实例化LoginModel
					$L = D('Login');
					// 先要做一个账号查重检测
					$spd = $L->query("select id from think_login where id='{$id}' ");
					$sauth = $L->query("select id from think_login where auth='C2_B5' ");
					if(empty($sauth)){
						// 说明审核管理员未定义
						$return0 = $L->execute("insert into think_login values('{$id}','{$password}','C2_B5') ");
						if($return0 == true ){
							$this->ajaxReturn('success');
						}else{
							$this->ajaxReturn('fail');
						}
					}
					if(empty($spd)){
						// 说明账号无冲突
						$return = $L->execute("update think_login set id='{$id}',pd='{$password}' where auth='C2_B5' ");
						if($return == true ){
							$this->ajaxReturn('success');
						}else{
							$this->ajaxReturn('fail');
						}
					}else{
							// 说明账号已存在,则只修改密码
						$return1 = $L->execute("update think_login set pd='{$password}' where id='{$id}' and auth='C2_B5' ");
						if($return1 == true){
							$this->ajaxReturn("success");
						}else{
							$this->ajaxReturn('fail');
						}
					}		
				}else{
					$this->ajaxReturn("lengthfail");
				}			
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn("cookiefail");
		}
	}
	// 修改办公室主任账号信息
	public function updateSadminL(){
		if(cookie('login_id') != ''){
			if(empty($_POST['SadminId']) || empty($_POST['SadminPd'])){
				$this->ajaxReturn("null");
			}else{
				$id = $_POST['SadminId'];
				$password = $_POST['SadminPd'];
				if(strlen($id)==10 && strlen($password)==6){
					 // 实例化LoginModel
					$L = D('Login');
					// 先要做一个账号查重检测
					$spd = $L->query("select id from think_login where id='{$id}' ");
					if(empty($spd)){
						// 说明账号无冲突
						$return = $L->execute("update think_login set id='{$id}',pd='{$password}' where auth='D_C3_B5' ");
						if($return == true ){
							$this->ajaxReturn('success');
						}else{
							$this->ajaxReturn('fail');
						}
					}else{
							// 说明账号已存在,则只修改密码
						$return1 = $L->execute("update think_login set pd='{$password}' where id='{$id}' and auth='D_C3_B5' ");
						if($return1 == true){
							$this->ajaxReturn("success");
						}else{
							$this->ajaxReturn('fail');
						}
					}		
				}else{
					$this->ajaxReturn("lengthfail");
				}			
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn("cookiefail");
		}
	}
	public function updateUserPd(){

	}
	/*
	 * delete区
	 */
	public function deleteUserPd(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
		$userid = $_POST['data'];
		// 删除UserInfo
		$userinfo = D('UserInfo');
		$userinfo->startTrans();
		$return1 = $userinfo->execute("delete from think_user_info where id='{$userid}' ");
		// 删除UserJob
		$userjob = D('UserJob');
		$return2 = $userjob->execute("delete from think_user_job where id='{$userid}' ");
		// 删除UserEdu
		$useredu = D('UserEdu');
		$return3 = $useredu->execute("delete from think_user_edu where id='{$userid}' ");
		if($return1 && $return2 && $return3){
			// 删除login
			$login = D('Login');
			$return4 = $login->execute("delete from think_login where id='{$userid}' ");
			if($return4){
				$userinfo->commit();
				$this->ajaxReturn('success');
			}else{
				$userinfo->rollback();
				$this->ajaxReturn('fail');
			}
		}else{
			$userinfo->rollback();
			$this->ajaxReturn('fail');
		}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn("cookiefail");
		}
	}

	/*
	 * download区
	 */
	// 下载图片
	public function downloadPhoto(){
		$id = cookie('login_id');
		if($id != ''){
			// 实例化UserInfoModel
			$userid = $_POST['data'];
			$userinf = D('UserInfo');
			$path = $userinf->query(" select photo from think_user_info where id='{$userid}' ");
			/*文件路径字符串处理*/
			$filename = substr(strrchr($path[0]['photo'],'/') , 1);
			$download = $path[0]['photo']." ".$filename;
			$this->ajaxReturn($download);
		}else{
			cookie('login_id',null);
			$this->ajaxReturn("cookiefail");
		}
	}
	
	// 下载作证材料
	public function downloadSup(){
		
		// 实例化UserInfoModel
		$id = cookie('login_id');
		if($id!=''){
			$d = $_POST['data'];
			$data = explode("-",$d);
			$num = $data[1];
			$years = $data[2];
			$ptype = $data[3];
				// 实例化TeachAch
				$typeAll = D($ptype);
				$path = $typeAll->query("select sup from think_{$ptype} where num='{$num}' and years='{$years}'  and ptype='{$ptype}' ");
			/*文件路径字符串处理*/
			$filename = substr(strrchr($path[0]['sup'],'/') , 1);
			$download = $path[0]['sup']." ".$filename;
			$this->ajaxReturn($download);
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
		
	}
	/*
	 * 审核区
	 */
	public function passCheck(){
		$id = cookie('login_id');
		if($id != ''){
			$d = $_POST['data'];
			$data = explode("-",$d);
			$userid = $data[0];
			$num = $data[1];
			$years = $data[2];
			$ptype = $data[3];
			// 实例化MapStatus
			$ms = D('MapStatus');
			$return = $ms->execute("update think_map_status set status='YES' where id='{$userid}' and num='{$num}' and years='{$years}' and ptype='{$ptype}' ");
			if($return){
				$this->ajaxReturn('success');
			}else{
				$this->ajaxReturn('fail');
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}

	public function refuseCheck(){
				$id = cookie('login_id');
		if($id != ''){
			$d = $_POST['data'];
			$reason = $_POST['reason'];
			$data = explode("-",$d);
			$userid = $data[0];
			$num = $data[1];
			$years = $data[2];
			$ptype = $data[3];
			// 实例化MapStatus
			$ms = D('MapStatus');
			$return = $ms->execute("update think_map_status set status='NO',reason='{$reason}' where id='{$userid}' and num='{$num}' and years='{$years}' and ptype='{$ptype}' ");
			if($return){
				$this->ajaxReturn('success');
			}else{
				$this->ajaxReturn('fail');
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}
}