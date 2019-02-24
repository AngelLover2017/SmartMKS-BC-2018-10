<?php

namespace Home\Controller;
use Think\Controller;

class HomeController extends Controller{

	// public function excelUser(){
	// 	$id = cookie('login_id');
	// 	// 判断cookie是否已过期或者删除
	// 	if($id != ''){
			
	// 	}else{
	// 		cookie('login_id',null);
	// 		$this->redirect('Index/index','cookie已过期！请重新登录...');
	// 	}
	// }
	/*generalTeacher*/
	public function generalTeacher(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			/*个人信息 assign */
			$array_inf = $this->getInfo($id);
			$this->assign('inf',$array_inf);
			$years = "时间不限";
			if(isset($_POST['submit'])){
				$years = $_POST['years'];
			}
			// 导航栏定位
			$this->assign('page',"page1");

			$this->assign('years',$years);
			$array = $this->getAll($years);
			$this->assign('all',$array);
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
		
	}
	public function generalTeacherUserInf(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			/*个人信息 assign */
			$array_inf = $this->getInfo($id);
			// 导航栏定位
			$this->assign('page',"page7");

			$this->assign('inf',$array_inf);
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	// 
	public function generalTeacherTeachAch(){

		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 导航栏定位
			$this->assign('page',"page21");
			/*个人信息 assign */
			$array = $this->getTeachAchALL();
			$this->assign('teachAchWAIT',$array['WAIT']);
			$this->assign('teachAch_WAIT',count($array['WAIT'],0));
			$this->assign('teachAchYES',$array['YES']);
			$this->assign('teachAch_YES',count($array['YES'],0));
			$this->assign('teachAchNO',$array['NO']);
			$this->assign('teachAch_NO',count($array['NO'],0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherTeachAchAdd(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
	}
	}
	public function generalTeacherTeachAchEdit(){

		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	// 
	public function generalTeacherTeachPro(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 导航栏定位
			$this->assign('page',"page22");
			/*个人信息 assign */
			$array = $this->getTeachProALL();
			$this->assign('teachProWAIT',$array['WAIT']);
			$this->assign('teachPro_WAIT',count($array['WAIT'],0));
			$this->assign('teachProYES',$array['YES']);
			$this->assign('teachPro_YES',count($array['YES'],0));
			$this->assign('teachProNO',$array['NO']);
			$this->assign('teachPro_NO',count($array['NO'],0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherTeachProAdd(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherTeachProEdit(){

		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	// 
	public function generalTeacherTeachTbp(){

		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 导航栏定位
			$this->assign('page',"page23");
			/*个人信息 assign */
			$array = $this->getTeachTbpALL();
			$this->assign('teachTbpWAIT',$array['WAIT']);
			$this->assign('teachTbp_WAIT',count($array['WAIT'],0));
			$this->assign('teachTbpYES',$array['YES']);
			$this->assign('teachTbp_YES',count($array['YES'],0));
			$this->assign('teachTbpNO',$array['NO']);
			$this->assign('teachTbp_NO',count($array['NO'],0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherTeachTbpAdd(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherTeachTbpEdit(){

		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	// 
	public function generalTeacherResearchPap(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 导航栏定位
			$this->assign('page',"page31");
			/*个人信息 assign */
			$array = $this->getResearchPapALL();
			$this->assign('researchPapWAIT',$array['WAIT']);
			$this->assign('researchPap_WAIT',count($array['WAIT'],0));
			$this->assign('researchPapYES',$array['YES']);
			$this->assign('researchPap_YES',count($array['YES'],0));
			$this->assign('researchPapNO',$array['NO']);
			$this->assign('researchPap_NO',count($array['NO'],0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherResearchPapAdd(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherResearchPapEdit(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherResearchPro(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 导航栏定位
			$this->assign('page',"page34");
			/*个人信息 assign */
			$array = $this->getResearchProALL();
			$this->assign('researchProWAIT',$array['WAIT']);
			$this->assign('researchPro_WAIT',count($array['WAIT'],0));
			$this->assign('researchProYES',$array['YES']);
			$this->assign('researchPro_YES',count($array['YES'],0));
			$this->assign('researchProNO',$array['NO']);
			$this->assign('researchPro_NO',count($array['NO'],0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherResearchProAdd(){
			$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherResearchProEdit(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherResearchMpb(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 导航栏定位
			$this->assign('page',"page32");
			/*个人信息 assign */
			$array = $this->getResearchMpbALL();
			$this->assign('researchMpbWAIT',$array['WAIT']);
			$this->assign('researchMpb_WAIT',count($array['WAIT'],0));
			$this->assign('researchMpbYES',$array['YES']);
			$this->assign('researchMpb_YES',count($array['YES'],0));
			$this->assign('researchMpbNO',$array['NO']);
			$this->assign('researchMpb_NO',count($array['NO'],0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherResearchMpbAdd(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherResearchMpbEdit(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherResearchFund(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 导航栏定位
			$this->assign('page',"page35");
			/*个人信息 assign */
			$array = $this->getResearchFundALL();
			$this->assign('researchFundWAIT',$array['WAIT']);
			$this->assign('researchFund_WAIT',count($array['WAIT'],0));
			$this->assign('researchFundYES',$array['YES']);
			$this->assign('researchFund_YES',count($array['YES'],0));
			$this->assign('researchFundNO',$array['NO']);
			$this->assign('researchFund_NO',count($array['NO'],0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherResearchFundAdd(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherResearchFundEdit(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherResearchAch(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 导航栏定位
			$this->assign('page',"page33");
			/*个人信息 assign */
			$array = $this->getResearchAchALL();
			$this->assign('researchAchWAIT',$array['WAIT']);
			$this->assign('researchAch_WAIT',count($array['WAIT'],0));
			$this->assign('researchAchYES',$array['YES']);
			$this->assign('researchAch_YES',count($array['YES'],0));
			$this->assign('researchAchNO',$array['NO']);
			$this->assign('researchAch_NO',count($array['NO'],0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherResearchAchAdd(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherResearchAchEdit(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	// 
	public function generalTeacherOtherNews(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 导航栏定位
			$this->assign('page',"page6");
			/*个人信息 assign */
			$array = $this->getOtherNewsALL();
			$this->assign('otherNewsWAIT',$array['WAIT']);
			$this->assign('otherNews_WAIT',count($array['WAIT'],0));
			$this->assign('otherNewsYES',$array['YES']);
			$this->assign('otherNews_YES',count($array['YES'],0));
			$this->assign('otherNewsNO',$array['NO']);
			$this->assign('otherNews_NO',count($array['NO'],0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherOtherNewsAdd(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherOtherNewsEdit(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}

	public function generalTeacherOtherWel(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 导航栏定位
			$this->assign('page',"page5");
			/*个人信息 assign */
			$array = $this->getOtherWelALL();
			$this->assign('otherWelWAIT',$array['WAIT']);
			$this->assign('otherWel_WAIT',count($array['WAIT'],0));
			$this->assign('otherWelYES',$array['YES']);
			$this->assign('otherWel_YES',count($array['YES'],0));
			$this->assign('otherWelNO',$array['NO']);
			$this->assign('otherWel_NO',count($array['NO'],0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherOtherWelAdd(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherOtherWelEdit(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherOtherExc(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			// 导航栏定位
			$this->assign('page',"page4");
			/*个人信息 assign */
			$array = $this->getOtherExcALL();
			$this->assign('otherExcWAIT',$array['WAIT']);
			$this->assign('otherExc_WAIT',count($array['WAIT'],0));
			$this->assign('otherExcYES',$array['YES']);
			$this->assign('otherExc_YES',count($array['YES'],0));
			$this->assign('otherExcNO',$array['NO']);
			$this->assign('otherExc_NO',count($array['NO'],0));
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherOtherExcAdd(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	public function generalTeacherOtherExcEdit(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index');
		}
	}
	// 查看权限
	public function generalTeacherCount(){
		$id = cookie('login_id');
		// 判断cookie是否已过期或者删除
		if($id != ''){
			$years="时间不限";
			$dep = "所有系";
			if(isset($_POST['submit'])){
				$years = $_POST['years'];
				$dep = $_POST['dep'];
			}
			// 导航栏定位
			$this->assign('page',"page81");

			$this->assign('years',$years);
			$this->assign('dep',$dep);
			$array = $this->getAllS($years , $dep);
			$this->assign('all',$array);
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function generalTeacherClassifySearch(){
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
			// 导航栏定位
			$this->assign('page',"page82");

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
	public function generalTeacherUserFind(){
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
			// 导航栏定位
			$this->assign('page',"page83");

			$this->assign('years',$years);
			$this->assign('dep',$dep);
			$this->assign('search',$search);
			//8888的point
			$array = $this->getUserFind($years , $dep , $search);
			$this->assign('UserFind',$array);
			$this->display();
		}else{
			cookie('login_id',null);
			$this->redirect('Index/index','cookie已过期！请重新登录...');
		}
	}
	public function generalTeacherUserFindNext(){
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
			// 导航栏定位
			$this->assign('page',"page83");

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
	public function generalTeacherPassValue(){
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
	



	/*
	 * get信息区
	 * 负责获取信息，类内使用，负责给对应端口函数调用使用
	 */
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
		// 数据权限控制AUTH
		$id = cookie('login_id');
		$login = D('Login');
		$result = $login->query("select auth from think_login where id='{$id}' ");
		$auth = $result[0]['auth'];

		// 实例化MapStatus
		$ms = D('MapStatus');
		if($d == 0){
			if($y == 0){
				if($is == 2){
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and c2.auth<='{$auth}' and c1.ptype like 'teach_%' and c1.status='YES' " );
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and c2.auth<='{$auth}' and c1.ptype like 'research_%' and c1.status='YES' ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and c2.auth<='{$auth}' and c1.ptype like 'other_%' and c1.status='YES' ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and c1.status='YES' and c2.auth<='{$auth}' ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and c2.auth<='{$auth}' group by id");
				}else if($is == 1){
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and c2.name='{$search}' and c1.ptype like 'teach_%' and status='YES' and c3.auth<='{$auth}' ");
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and c2.name='{$search}' and c1.ptype like 'research_%' and status='YES' and c3.auth<='{$auth}' ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and  c2.name='{$search}' and c1.ptype like 'other_%' and status='YES' and c3.auth<='{$auth}' ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2,think_login c3 where c1.id=c2.id  and c1.id=c3.id and  c2.name='{$search}' and status='YES' and c3.auth<='{$auth}' ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_login c2 where c1.id=c2.id and c1.name='{$search}' and c2.auth<='{$auth}' group by id ");
				}else{
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.ptype like 'teach_%' and status='YES' and c2.auth<='{$auth}' group by id ");
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.ptype like 'research_%' and status='YES' and c2.auth<='{$auth}' group by id ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.ptype like 'other_%' and status='YES' and c2.auth<='{$auth}' group by id ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.status='YES' and c2.auth<='{$auth}' group by id ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_login c2 where c1.id=c2.id and c2.auth<='{$auth}' group by id ");
				}
			}
			// years不为时间不限
			else{
				if($is == 2){
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and ptype like 'teach_%' and status='YES' and years='{$years}' and c3.auth<='{$auth}' " );
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and ptype like 'research_%' and status='YES' and years='{$years}' and c3.auth<='{$auth}' ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and ptype like 'other_%' and status='YES' and years='{$years}' and c3.auth<='{$auth}' ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and status='YES' and years='{$years}' and c3.auth<='{$auth}' ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and c3.auth<='{$auth}' group by id");
				}else if($is == 1){
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and c2.name='{$search}' and c1.ptype like 'teach_%' and status='YES' and years='{$years}' and c3.auth<='{$auth}' ");
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and c2.name='{$search}' and c1.ptype like 'research_%' and status='YES' and years='{$years}' and c3.auth<='{$auth}' ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and  c2.name='{$search}' and c1.ptype like 'other_%' and status='YES' and years='{$years}' and c3.auth<='{$auth}' ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and  c2.name='{$search}' and status='YES' and years='{$years}' and c3.auth<='{$auth}' ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_login c2 where c1.id=c2.id and c1.name='{$search}' and c3.auth<='{$auth}' group by id ");
				}else{
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c3 where c1.id=c2.id and c1.ptype like 'teach_%' and status='YES' and years='{$years}' and c3.auth<='{$auth}' group by id ");
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c3 where c1.id=c2.id and c1.ptype like 'research_%' and status='YES' and years='{$years}' and c3.auth<='{$auth}' group by id ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c3 where c1.id=c2.id and c1.ptype like 'other_%' and status='YES' and years='{$years}' and c3.auth<='{$auth}' group by id ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c3 where c1.id=c2.id and c1.status='YES' and years='{$years}' and c3.auth<='{$auth}' group by id ");
					$info_user = $ms->query("select name,id from think_user_info  and c3.auth<='{$auth}' group by id ");
				}
		}
	}
	//dep不为所有系
	else{
			if($y == 0){
				if($is == 2){
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and c1.ptype like 'teach_%' and c1.status='YES' and c2.auth<='{$auth}' " );
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and c1.ptype like 'research_%' and c1.status='YES' and c2.auth<='{$auth}' ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and c1.ptype like 'other_%' and c1.status='YES' and c2.auth<='{$auth}' ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and c1.status='YES' and c2.auth<='{$auth}' ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_user_job c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and c1.id='{$search}' and c2.dep='{$dep}' and c3.auth<='{$auth}' group by id");
				}else if($is == 1){
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and c2.name='{$search}' and c1.ptype like 'teach_%' and status='YES' and c3.auth<='{$auth}' ");
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2,think_login and c3 where c1.id=c2.id and c1.id=c3.id and c2.name='{$search}' and c1.ptype like 'research_%' and status='YES' and c3.auth<='{$auth}' ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_usc1.er_info c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and  c2.name='{$search}' and c1.ptype like 'other_%' and status='YES' and c3.auth<='{$auth}' ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and  c2.name='{$search}' and status='YES' and c3.auth<='{$auth}' ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_user_job c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and c1.name='{$search}' and c2.dep='{$dep}' and c3.auth<='{$auth}' group by id");
				}else{
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.ptype like 'teach_%' and status='YES' and c2.auth<='{$auth}' group by id ");
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.ptype like 'research_%' and status='YES' and c2.auth<='{$auth}' group by id ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.ptype like 'other_%' and status='YES' and c2.auth<='{$auth}' group by id ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.status='YES' and c2.auth<='{$auth}' group by id ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_user_job c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and c2.dep='{$dep}' and c3.auth<='{$auth}' group by id");
				}
			}else{
				if($is == 2){
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and ptype like 'teach_%' and status='YES' and years='{$years}' and c2.auth<='{$auth}' " );
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and ptype like 'research_%' and status='YES' and years='{$years}' and c2.auth<='{$auth}' ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and ptype like 'other_%' and status='YES' and years='{$years}' and c2.auth<='{$auth}' ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.id='{$search}' and status='YES' and years='{$years}' and c2.auth<='{$auth}' ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_user_job c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and c1.id='{$search}' and c2.dep='{$dep}' and c3.auth<='{$auth}' group by id");
				}else if($is == 1){
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and c2.name='{$search}' and c1.ptype like 'teach_%' and status='YES' and years='{$years}' and c3.auth<='{$auth}' ");
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and c2.name='{$search}' and c1.ptype like 'research_%' and status='YES' and years='{$years}' and c3.auth<='{$auth}' ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and  c2.name='{$search}' and c1.ptype like 'other_%' and status='YES' and years='{$years}' and c3.auth<='{$auth}' ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_user_info c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and  c2.name='{$search}' and status='YES' and years='{$years}' and c3.auth<='{$auth}' ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_user_job c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and c1.name='{$search}' and c2.dep='{$dep}' and c3.auth<='{$auth}' group by id");
				}else{
					$info_teachNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.ptype like 'teach_%' and status='YES' and years='{$years}' and c2.auth<='{$auth}' group by id ");
					$info_researchNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.ptype like 'research_%' and status='YES' and years='{$years}' and c2.auth<='{$auth}' group by id ");
					$info_otherNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.ptype like 'other_%' and status='YES' and years='{$years}' and c2.auth<='{$auth}' group by id ");
					$info_allNum = $ms->query("select c1.id,count(*) from think_map_status c1,think_login c2 where c1.id=c2.id and c1.status='YES' and years='{$years}' and c2.auth<='{$auth}' group by id ");
					$info_user = $ms->query("select c1.name,c1.id from think_user_info c1,think_user_job c2,think_login c3 where c1.id=c2.id and c1.id=c3.id and c2.dep='{$dep}' and  c3.auth<='{$auth}' group by id");
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
		// 数据权限控制AUTH
		$id = cookie('login_id');
		$login = D('Login');
		$result = $login->query("select auth from think_login where id='{$id}' ");
		$auth = $result[0]['auth'];
		// 数据库操作
		$ui = D('UserInfo');
		$ms = D('MapStatus');
		if($dep == '所有系'){
			if($years == '时间不限'){
				$return = $ms->query("select c1.*,c2.reason,c3.name as sname from think_{$ptype} c1,think_map_status c2,think_user_info c3 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c2.id=c3.id and c2.status='{$status}' and c3.id in(select id from think_login where auth<='{$auth}') ");
			}else{
				$return = $ms->query("select c1.*,c2.reason,c3.name as sname from think_{$ptype} c1,think_map_status c2,think_user_info c3 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c2.id=c3.id and c2.status='{$status}' and c1.years='{$years}' and c3.id in(select id from think_login where auth<='{$auth}') ");
			}
		}else{
			if($years == '时间不限'){
				$return = $ms->query("select c1.*,c2.reason,c3.name as sname from think_{$ptype} c1,think_map_status c2,think_user_info c3 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c2.id=c3.id and c2.status='{$status}' and c2.id in(select id from think_user_job where dep='{$dep}' ) and c3.id in(select id from think_login where auth<='{$auth}') ");
			}else{
				$return = $ms->query("select c1.*,c3.name as sname,c2.reason from think_{$ptype} c1,think_map_status c2,think_user_info c3 where c1.num=c2.num and c1.years=c2.years and c1.ptype=c2.ptype and c2.id=c3.id and c2.status='{$status}' and c2.years='{$years}' and c3.id in(select id from think_user_job where dep='{$dep}' ) and c3.id in(select id from think_login where auth<='{$auth}') ");
			}
		}

		return $return;
	}
	//
		public function getAllS($years , $dep){
		
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
	// 获取个人信息
	protected function getInfo($id){
		// 实例化UserInfoModel
		$user_info = D('UserInfo');
		$array_userinfo = $user_info->query("select * from think_user_info where id = '{$id}' ");
		// 实例化UserJobModel
		$user_job = D('UserJob');
		$array_userjob = $user_job->query("select * from think_user_job where id = '{$id}' ");
		//实例化UserEdu
		$user_edu = D('UserEdu');
		$array_useredu = $user_edu->query("select * from think_user_edu where id = '{$id}' ");
		// 实例化LoginModel
		$L = D('Login');
		$pd = $L->query("select pd from think_login where id ='{$id}' ");
		// 格式化数据并存入多维数组
		$array = array(
			"info" => array(
				"id" => $array_userinfo[0]['id'],
				"name" => $array_userinfo[0]['name'],
				"nation" => $array_userinfo[0]['nation'],
				"sex" => $array_userinfo[0]['sex'],
				"age" => $array_userinfo[0]['age'],
				"birthday" => $array_userinfo[0]['birthday'],
				"polistatus" => $array_userinfo[0]['polistatus'],
				"origin" => $array_userinfo[0]['origin']
				),
			"job"  => array(
				"dep" => $array_userjob[0]['dep'],
				"pos" => $array_userjob[0]['pos'],
				"title" => $array_userjob[0]['title'],
				"detm" => $array_userjob[0]['detm'],
				"lv" => $array_userjob[0]['lv'],
				"startm" => $array_userjob[0]['startm'],
				"ison" => $array_userjob[0]['ison']
				),
			"edu"  => array(
				"university" => $array_useredu[0]['university'],
				"profession" => $array_useredu[0]['profession'],
				"gratm" => $array_useredu[0]['gratm'],
				"edu" => $array_useredu[0]['edu']
				),
			"changeble" => array(
				"photo" => $array_userinfo[0]['photo'],
				"password" =>$pd[0]['pd'],
				"tel" => $array_userinfo[0]['tel'],
				"email" => $array_userinfo[0]['email']
				)
			);

		return $array;
	}
	// 根据years获取所有个人项目统计信息
	public function getAll($years){
		$id = cookie('login_id');
		/*
		 * 设标志$years类型的变量，默认为0
		 * 0 为 时间不限
		 * 1 为 2017 或者 2018
		 */
		$y =0;
		if($years == "时间不限"){
			$y = 0;
		}else if($years == '2017' || $years == '2018'){
			$y = 1;
			$years=intval($years);
		}
		// 实例化MapStatus
		$ms = D('MapStatus');
		if($y == 0){
			$all = $ms->query("select ptype,status from think_map_status where id='{$id}' ");
		}else{
			$all = $ms->query("select ptype,status from think_map_status where id='{$id}' and years='{$years}' ");
		}
		// 筛选分拣算法,默认值为0
			$teachAchYES = 0;
			$teachProYES = 0;
			$teachTbpYES = 0;
			$teachAchWAIT = 0;
			$teachProWAIT = 0;
			$teachTbpWAIT = 0;
			$teachAchNO = 0;
			$teachProNO = 0;
			$teachTbpNO = 0;
			$researchPapYES = 0;
			$researchMpbYES = 0;
			$researchProYES = 0;
			$researchAchYES = 0;
			$researchFundYES = 0;
			$researchPapWAIT = 0;
			$researchMpbWAIT = 0;
			$researchProWAIT = 0;
			$researchAchWAIT = 0;
			$researchFundWAIT = 0;
			$researchPapNO = 0;
			$researchMpbNO = 0;
			$researchProNO = 0;
			$researchAchNO = 0;
			$researchFundNO = 0;
			$otherExcYES  = 0;
			$otherWelYES = 0;
			$otherNewsYES = 0;
			$otherExcWAIT = 0;
			$otherWelWAIT = 0;
			$otherNewsWAIT = 0;
			$otherExcNO = 0;
			$otherWelNO = 0;
			$otherNewsNO = 0;
		for($i=0;$i<count($all,0);$i++){
					if($all[$i]['ptype']=='teach_ach'){
						if($all[$i]['status']=='YES')$teachAchYES++;
						if($all[$i]['status']=='WAIT')$teachAchWAIT++;
						if($all[$i]['status']=='NO')$teachAchNO++;

					}else if($all[$i]['ptype']=='teach_pro'){
						if($all[$i]['status']=='YES')$teachProYES++;
						if($all[$i]['status']=='WAIT')$teachProWAIT++;
						if($all[$i]['status']=='NO')$teachProNO++;
					
					}else if($all[$i]['ptype']=='teach_tbp'){
						if($all[$i]['status']=='YES')$teachTbpYES++;
						if($all[$i]['status']=='WAIT')$teachTbpWAIT++;
						if($all[$i]['status']=='NO')$teachTbpNO++;

					}else if($all[$i]['ptype']=='research_pap'){
						if($all[$i]['status']=='YES')$researchPapYES++;
						if($all[$i]['status']=='WAIT')$researchPapWAIT++;
						if($all[$i]['status']=='NO')$researchPapNO++;

					}else if($all[$i]['ptype']=='research_mpb'){
						if($all[$i]['status']=='YES')$researchMpbYES++;
						if($all[$i]['status']=='WAIT')$researchMpbWAIT++;
						if($all[$i]['status']=='NO')$researchMpbNO++;
					
					}else if($all[$i]['ptype']=='research_pro'){
						if($all[$i]['status']=='YES')$researchProYES++;
						if($all[$i]['status']=='WAIT')$researchProWAIT++;
						if($all[$i]['status']=='NO')$researchProNO++;
					}else if($all[$i]['ptype']=='research_ach'){
						if($all[$i]['status']=='YES')$researchAchYES++;
						if($all[$i]['status']=='WAIT')$researchAchWAIT++;
						if($all[$i]['status']=='NO')$researchAchNO++;
					}else if($all[$i]['ptype']=='research_fund'){
						if($all[$i]['status']=='YES')$researchFundYES++;
						if($all[$i]['status']=='WAIT')$researchFundWAIT++;
						if($all[$i]['status']=='NO')$researchFundNO++;
					}else if($all[$i]['ptype']=='other_exc'){
						if($all[$i]['status']=='YES')$otherExcYES++;
						if($all[$i]['status']=='WAIT')$otherExcWAIT++;
						if($all[$i]['status']=='NO')$otherExcNO++;

					}else if($all[$i]['ptype']=='other_wel'){
						if($all[$i]['status']=='YES')$otherWelYES++;
						if($all[$i]['status']=='WAIT')$otherWelWAIT++;
						if($all[$i]['status']=='NO')$otherWelNO++;
					
					}else if($all[$i]['ptype']=='other_news'){
						if($all[$i]['status']=='YES')$otherNewsYES++;
						if($all[$i]['status']=='WAIT')$otherNewsWAIT++;
						if($all[$i]['status']=='NO')$otherNewsNO++;
					}
				
					
		}
		$info = array(
			'teachAllYES' => $teachAchYES+$teachProYES+$teachTbpYES,
			'teachAllWAIT'=> $teachAchWAIT+$teachProWAIT+$teachTbpWAIT,
			'teachAllNO' => $teachAchNO+$teachProNO+$teachTbpNO,
			'teachAchYES' => $teachAchYES,
			'teachProYES' => $teachProYES,
			'teachTbpYES' => $teachTbpYES,
			'teachAchWAIT' => $teachAchWAIT,
			'teachProWAIT' => $teachProWAIT,
			'teachTbpWAIT' => $teachTbpWAIT,
			'teachAchNO' => $teachAchNO,
			'teachProNO' => $teachProNO,
			'teachTbpNO' => $teachTbpNO,
			'researchAllYES' => $researchPapYES+$researchMpbYES+$researchProYES+$researchAchYES+$researchFundYES,
			'researchAllWAIT' => $researchPapWAIT+$researchMpbWAIT+$researchProWAIT+$researchAchWAIT+$researchFundWAIT,
			'researchAllNO' => $researchPapNO+$researchMpbNO+$researchProNO+$researchAchNO+$researchFundNO,
			'researchPapYES' => $researchPapYES,
			'researchMpbYES' => $researchMpbYES,
			'researchProYES' => $researchProYES,
			'researchAchYES' => $researchAchYES,
			'researchFundYES' => $researchFundYES,
			'researchPapWAIT' => $researchPapWAIT,
			'researchMpbWAIT' => $researchMpbWAIT,
			'researchProWAIT' => $researchProWAIT,
			'researchAchWAIT' => $researchAchWAIT,
			'researchFundWAIT' => $researchFundWAIT,
			'researchPapNO' => $researchPapNO,
			'researchMpbNO' => $researchMpbNO,
			'researchProNO' => $researchProNO,
			'researchAchNO' => $researchAchNO,
			'researchFundNO' => $researchFundNO,
			'otherAllYES' => $otherExcYES+$otherWelYES+$otherNewsYES,
			'otherAllWAIT' => $otherExcWAIT+$otherWelWAIT+$otherNewsWAIT,
			'otherAllNO' => $otherExcNO+$otherWelNO+$otherNewsNO,
			'otherExcYES' => $otherExcYES ,
			'otherWelYES' => $otherWelYES,
			'otherNewsYES' => $otherNewsYES,
			'otherExcWAIT' => $otherExcWAIT,
			'otherWelWAIT' => $otherWelWAIT,
			'otherNewsWAIT' => $otherNewsWAIT,
			'otherExcNO' => $otherExcNO,
			'otherWelNO' => $otherWelNO,
			'otherNewsNO' => $otherNewsNO,
			);
		return $info;
	}
	//获取所有项目信息(已通过)(待审核)(未通过)
	public function getTeachAchALL(){
		$id = cookie('login_id');
		// 实例化TeachAchModel
		$teachAch = D('TeachAch');
		$array_teachAchWAIT = $teachAch->query("select * from think_teach_ach c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='teach_ach' and c2.status='WAIT' ");
		$array_teachAchYES = $teachAch->query("select * from think_teach_ach c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='teach_ach' and c2.status='YES' ");
		$array_teachAchNO = $teachAch->query("select * from think_teach_ach c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='teach_ach' and c2.status='NO' ");
		$array = array(
			'WAIT' => $array_teachAchWAIT,
			'YES' => $array_teachAchYES,
			'NO' => $array_teachAchNO
			);
		return $array;
	}
	//获取所有项目信息(已通过)(待审核)(未通过)
	public function getTeachProALL(){
		$id = cookie('login_id');
		// 实例化TeachProModel
		$teachAch = D('TeachPro');
		$array_teachProWAIT = $teachAch->query("select * from think_teach_pro c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='teach_pro' and c2.status='WAIT' ");
		$array_teachProYES = $teachAch->query("select * from think_teach_pro c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='teach_pro' and c2.status='YES' ");
		$array_teachProNO = $teachAch->query("select * from think_teach_pro c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='teach_pro' and c2.status='NO' ");
		$array = array(
			'WAIT' => $array_teachProWAIT,
			'YES' => $array_teachProYES,
			'NO' => $array_teachProNO 
			);
		return $array;
	}
	//获取所有项目信息(已通过)(待审核)(未通过)
	public function getTeachTbpALL(){
		$id = cookie('login_id');
		// 实例化TeachProModel
		$teachAch = D('TeachTbp');
		$array_teachTbpWAIT = $teachAch->query("select * from think_teach_tbp c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='teach_tbp' and c2.status='WAIT' ");
		$array_teachTbpYES = $teachAch->query("select * from think_teach_tbp c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='teach_tbp' and c2.status='YES' ");
		$array_teachTbpNO = $teachAch->query("select * from think_teach_tbp c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='teach_tbp' and c2.status='NO' ");
		$array = array(
			'WAIT' => $array_teachTbpWAIT,
			'YES' => $array_teachTbpYES,
			'NO' => $array_teachTbpNO 
			);
		return $array;
	}
	public function getResearchFundALL(){
		$id = cookie('login_id');
		// 实例化TeachProModel
		$researchFund = D('ResearchFund');
		$array_researchFundWAIT = $researchFund->query("select * from think_research_fund c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='research_fund' and c2.status='WAIT' ");
		$array_researchFundYES = $researchFund->query("select * from think_research_fund c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='research_fund' and c2.status='YES' ");
		$array_researchFundNO = $researchFund->query("select * from think_research_fund c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='research_fund' and c2.status='NO' ");
		$array = array(
			'WAIT' => $array_researchFundWAIT,
			'YES' => $array_researchFundYES,
			'NO' => $array_researchFundNO 
			);
		return $array;
	}

	public function getResearchPapALL(){
		$id = cookie('login_id');
		// 实例化TeachProModel
		$researchPap = D('ResearchPap');
		$array_researchPapWAIT = $researchPap->query("select * from think_research_pap c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='research_pap' and c2.status='WAIT' ");
		$array_researchPapYES = $researchPap->query("select * from think_research_pap c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='research_pap' and c2.status='YES' ");
		$array_researchPapNO = $researchPap->query("select * from think_research_pap c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='research_pap' and c2.status='NO' ");
		$array = array(
			'WAIT' => $array_researchPapWAIT,
			'YES' => $array_researchPapYES,
			'NO' => $array_researchPapNO 
			);
		return $array;
	}

	public function getResearchMpbALL(){
		$id = cookie('login_id');
		// 实例化TeachProModel
		$researchMpb = D('ResearchMpb');
		$array_researchMpbWAIT = $researchMpb->query("select * from think_research_mpb c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='research_mpb' and c2.status='WAIT' ");
		$array_researchMpbYES = $researchMpb->query("select * from think_research_mpb c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='research_mpb' and c2.status='YES' ");
		$array_researchMpbNO = $researchMpb->query("select * from think_research_mpb c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='research_mpb' and c2.status='NO' ");
		$array = array(
			'WAIT' => $array_researchMpbWAIT,
			'YES' => $array_researchMpbYES,
			'NO' => $array_researchMpbNO 
			);
		return $array;
	}

	public function getResearchAchALL(){
		$id = cookie('login_id');
		// 实例化TeachProModel
		$researchAch = D('ResearchAch');
		$array_researchAchWAIT = $researchAch->query("select * from think_research_ach c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='research_ach' and c2.status='WAIT' ");
		$array_researchAchYES = $researchAch->query("select * from think_research_ach c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='research_ach' and c2.status='YES' ");
		$array_researchAchNO = $researchAch->query("select * from think_research_ach c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='research_ach' and c2.status='NO' ");
		$array = array(
			'WAIT' => $array_researchAchWAIT,
			'YES' => $array_researchAchYES,
			'NO' => $array_researchAchNO 
			);
		return $array;
	}
	public function getResearchProALL(){
		$id = cookie('login_id');
		// 实例化TeachProModel
		$researchPro = D('ResearchPro');
		$array_researchProWAIT = $researchPro->query("select * from think_research_pro c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='research_pro' and c2.status='WAIT' ");
		$array_researchProYES = $researchPro->query("select * from think_research_pro c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='research_pro' and c2.status='YES' ");
		$array_researchProNO = $researchPro->query("select * from think_research_pro c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='research_pro' and c2.status='NO' ");
		$array = array(
			'WAIT' => $array_researchProWAIT,
			'YES' => $array_researchProYES,
			'NO' => $array_researchProNO 
			);
		return $array;
	}

	public function getOtherExcALL(){
		$id = cookie('login_id');
		// 实例化TeachProModel
		$otherExc = D('OtherExc');
		$array_otherExcWAIT = $otherExc->query("select * from think_other_exc c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='other_exc' and c2.status='WAIT' ");
		$array_otherExcYES = $otherExc->query("select * from think_other_exc c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='other_exc' and c2.status='YES' ");
		$array_otherExcNO = $otherExc->query("select * from think_other_exc c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='other_exc' and c2.status='NO' ");
		$array = array(
			'WAIT' => $array_otherExcWAIT,
			'YES' => $array_otherExcYES,
			'NO' => $array_otherExcNO 
			);
		return $array;
	}

	public function getOtherWelALL(){
		$id = cookie('login_id');
		// 实例化TeachProModel
		$otherWel = D('OtherWel');
		$array_otherWelWAIT = $otherWel->query("select * from think_other_wel c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='other_wel' and c2.status='WAIT' ");
		$array_otherWelYES = $otherWel->query("select * from think_other_wel c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='other_wel' and c2.status='YES' ");
		$array_otherWelNO = $otherWel->query("select * from think_other_wel c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='other_wel' and c2.status='NO' ");
		$array = array(
			'WAIT' => $array_otherWelWAIT,
			'YES' => $array_otherWelYES,
			'NO' => $array_otherWelNO 
			);
		return $array;
	}

	public function getOtherNewsALL(){
		$id = cookie('login_id');
		// 实例化TeachProModel
		$otherNews = D('OtherNews');
		$array_otherNewsWAIT = $otherNews->query("select * from think_other_news c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='other_news' and c2.status='WAIT' ");
		$array_otherNewsYES = $otherNews->query("select * from think_other_news c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='other_news' and c2.status='YES' ");
		$array_otherNewsNO = $otherNews->query("select * from think_other_news c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='other_news' and c2.status='NO' ");
		$array = array(
			'WAIT' => $array_otherNewsWAIT,
			'YES' => $array_otherNewsYES,
			'NO' => $array_otherNewsNO 
			);
		return $array;
	}
	// // 获取待审核项目的信息
	// public function getTeachAchWAIT(){
	// 	$id = cookie('login_id');
	// 	// 实例化TeachAchModel
	// 	$teachAch = D('TeachAch');
	// 	$array_teachAch = $teachAch->query("select c1.years,c1.num, c1.name,c1.dep,c1.tm,c1.lv from think_teach_ach c1,think_map_status c2 where c1.num=c2.num and c1.ptype=c2.ptype and c2.id='{$id}' and c2.ptype='teach_ach' ");
	// 	$this->ajaxReturn($array_teachAch);
	// }
	// 处理头像的上传和下载
/*	public function test(){
		if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }
	}*/

	/*
	 * 图片上传下载区	
	 */
	public function updatePhoto(){
		$id = cookie('login_id');
		if($id != ''){
		if(isset($_FILES['photo'])){
		$photo = $_FILES['photo'];
			   /*
		 		* 文件上传，需要修改phpini中的配置
		 		*/
			$config = array( 
				'maxSize'  => 10485760 ,
				'rootPath' => './',
				'savePath' => '/Public/photo/',
				'saveName' => $id."_".cookie('user_name'),
				'exts'     => array('jpg','png'),
				'subName'  => $id ,
				'uploadReplace' => true ,
				);
			$upload = new \Think\Upload($config);
			$info = $upload->upload();

			if(!$info){
				$this->ajaxReturn('uploadfail');
			}else{
				$file_path = $info['photo']['savepath'].$info['photo']['savename'];
				/*更新数据库*/
				$userInfo = D('UserInfo');
				$return = $userInfo->execute("update think_user_info set photo = '{$file_path}' where id={$id} ");				
				if($return==true ){
					$this->ajaxReturn($file_path);
				}else{
					$this->ajaxReturn("fail");
				}
			}
		}	
	}else{
		cookie('login_id',null);
		$this->ajaxReturn('cookiefail');
	}
	}
	/*下载图片*/
	public function downloadPhoto(){

		// 实例化UserInfoModel
		$id = cookie('login_id');
		if($id != ''){
		$userinf = D('UserInfo');
		$path = $userinf->query(" select photo from think_user_info where id='{$id}' ");
		/*文件路径字符串处理*/
		$filename = substr(strrchr($path[0]['photo'],'/') , 1);
		$download = $path[0]['photo']." ".$filename;
		$this->ajaxReturn($download);
	}else{
		cookie('login_id',null);
		$this->ajaxReturn('cookiefail');
	}
	}

	/*
	 * update信息区
	 */
	public function updateOtherNews(){
		$id  = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$result = explode("-", $data);
		$num = $result[0];
		$years = $result[1];
		
		$rep = $_POST['rep'];
		$title   = $_POST['title'];
		$content = $_POST['content'];
		$sup  = $_FILES['sup'];
			
		   		/*
		 		* 文件上传，需要修改phpini中的配置
		 		*/
			$config = array( 
				'maxSize'  => 31457280,
				'rootPath' => './',
				'savePath' => '/Public/support/',
				'saveName' => cookie('user_name').'_otherExc_'.$num,
				'exts'     => array('jpg','png','jpeg','rar','zip'),
				'subName'  => $id ,
				'uploadReplace' => true ,
				);
			$upload = new \Think\Upload($config);
			$info = $upload->upload();
			if(!$info){
				$this->ajaxReturn('uploadfail');
			}else{
				$file_path = $info['sup']['savepath'].$info['sup']['savename'];
				/*更新数据库*/
				$otherNews = D('OtherNews');
				$return = $otherNews->execute("update think_other_news set rep='{$rep}',title='{$title}',content='{$content}',sup='{$file_path}' where num={$num} and years={$years} and ptype='other_news' ");
				/*
				 *实例化think_map_status
				 *先要查看项目状态是否是WAIT状态
				 *将编辑后项目置为待审核状态
				 */
				$mapS = D('MapStatus');
				$status = $mapS->query(" select status from think_map_status where num={$num} and years={$years} and ptype='other_news' and id='{$id}' ");
				if($status[0]['status'] != 'WAIT'){
					$return1 = $mapS->execute("update think_map_status set status='WAIT',reason='' where num={$num} and years={$years} and ptype='other_news' and id='{$id}' ");
				}else{
					$return1 = true;
				}
				
				if($return==true || $return1==true){
					$this->ajaxReturn("success");
				}else{
					$this->ajaxReturn("fail");
				}
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}

	public function updateOtherWel(){
		$id  = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$result = explode("-", $data);
		$num = $result[0];
		$years = $result[1];
		$tm = $_POST['tm'];
		$place   = $_POST['place'];
		$content = $_POST['content'];
		$sup  = $_FILES['sup'];
			
		   		/*
		 		* 文件上传，需要修改phpini中的配置
		 		*/
			$config = array( 
				'maxSize'  => 31457280,
				'rootPath' => './',
				'savePath' => '/Public/support/',
				'saveName' => cookie('user_name').'_otherWel_'.$num,
				'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
				'subName'  => $id ,
				'uploadReplace' => true ,
				);
			$upload = new \Think\Upload($config);
			$info = $upload->upload();
			if(!$info){
				$this->ajaxReturn('uploadfail');
			}else{
				$file_path = $info['sup']['savepath'].$info['sup']['savename'];
				/*更新数据库*/
				$otherWel = D('OtherWel');
				$return = $otherWel->execute("update think_other_wel set tm='{$tm}',place='{$place}',content='{$content}',sup='{$file_path}' where num={$num} and years={$years} and ptype='other_wel' ");
				/*
				 *实例化think_map_status
				 *先要查看项目状态是否是WAIT状态
				 *将编辑后项目置为待审核状态
				 */
				$mapS = D('MapStatus');
				$status = $mapS->query(" select status from think_map_status where num={$num} and years={$years} and ptype='other_wel' and id='{$id}' ");
				if($status[0]['status'] != 'WAIT'){
					$return1 = $mapS->execute("update think_map_status set status='WAIT',reason='' where num={$num} and years={$years} and ptype='other_wel' and id='{$id}' ");
				}else{
					$return1 = true;
				}
				
				if($return==true || $return1==true){
					$this->ajaxReturn("success");
				}else{
					$this->ajaxReturn("fail");
				}
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}

	public function updateOtherExc(){
		$id  = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		$country = $_POST['country'];
		$tmin  = $_POST['tmin'];
		$place = $_POST['place'];
		$sch   = $_POST['sch'];
		$content   = $_POST['content'];
		$sup  = $_FILES['sup'];
			
		   		/*
		 		* 文件上传，需要修改phpini中的配置
		 		*/
			$config = array( 
				'maxSize'  => 31457280,
				'rootPath' => './',
				'savePath' => '/Public/support/',
				'saveName' => cookie('user_name').'_otherExc_'.$num,
				'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
				'subName'  => $id ,
				'uploadReplace' => true ,
				);
			$upload = new \Think\Upload($config);
			$info = $upload->upload();
			if(!$info){
				$this->ajaxReturn('uploadfail');
			}else{
				$file_path = $info['sup']['savepath'].$info['sup']['savename'];
				/*更新数据库*/
				$otherExc = D('OtherExc');
				$return = $otherExc->execute("update think_other_exc set country='{$country}',tmin='{$tmin}',place='{$place}',sch='{$sch}',content='{$content}',sup='{$file_path}' where num={$num} and years={$years} and ptype='other_exc' ");
				/*
				 *实例化think_map_status
				 *先要查看项目状态是否是WAIT状态
				 *将编辑后项目置为待审核状态
				 */
				$mapS = D('MapStatus');
				$status = $mapS->query(" select status from think_map_status where num={$num} and years={$years} and ptype='other_exc' and id='{$id}' ");
				if($status[0]['status'] != 'WAIT'){
					$return1 = $mapS->execute("update think_map_status set status='WAIT',reason='' where num={$num} and years={$years} and ptype='other_exc' and id='{$id}' ");
				}else{
					$return1 = true;
				}
				
				if($return==true || $return1==true){
					$this->ajaxReturn("success");
				}else{
					$this->ajaxReturn("fail");
				}
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}
	public function updateTeachAch(){
	$id  = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		$achName = $_POST['achName'];
		$achDep  = $_POST['achDep'];
		$achTime = $_POST['achTime'];
		$achLv   = $_POST['achLv'];
		$achSup  = $_FILES['achSup'];
			
		   		/*
		 		* 文件上传，需要修改phpini中的配置
		 		*/
			$config = array( 
				'maxSize'  => 31457280,
				'rootPath' => './',
				'savePath' => '/Public/support/',
				'saveName' => cookie('user_name').'_teachAch_'.$num,
				'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
				'subName'  => $id ,
				'uploadReplace' => true ,
				);
			$upload = new \Think\Upload($config);
			$info = $upload->upload();
			if(!$info){
				$this->ajaxReturn('uploadfail');
			}else{
				$file_path = $info['achSup']['savepath'].$info['achSup']['savename'];
				/*更新数据库*/
				$teachAch = D('TeachAch');
				$return = $teachAch->execute("update think_teach_ach set name='{$achName}',dep='{$achDep}',tm='{$achTime}',lv='{$achLv}',sup='{$file_path}' where num={$num} and years={$years} and ptype='teach_ach' ");
				/*
				 *实例化think_map_status
				 *先要查看项目状态是否是WAIT状态
				 *将编辑后项目置为待审核状态
				 */
				$mapS = D('MapStatus');
				$status = $mapS->query(" select status from think_map_status where num={$num} and years={$years} and ptype='teach_ach' and id='{$id}' ");
				if($status[0]['status'] != 'WAIT'){
					$return1 = $mapS->execute("update think_map_status set status='WAIT',reason='' where num={$num} and years={$years} and ptype='teach_ach' and id='{$id}' ");
				}else{
					$return1 = true;
				}
				
				if($return==true || $return1==true){
					$this->ajaxReturn("success");
				}else{
					$this->ajaxReturn("fail");
				}
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
		
	}
	public function updateTeachPro(){
	$id = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		$proName = $_POST['proName'];
		$proTp  = $_POST['proTp'];
		$proTm = $_POST['proTm'];
		$proFund   = $_POST['proFund'];
		$proPaid = $_POST['proPaid'];
		$proRemain = $_POST['proRemain'];
		$proSup  = $_FILES['proSup'];

		
			
		   	   /*
		 		* 文件上传，需要修改phpini中的配置
		 		*/
			$config = array( 
				'maxSize'  => 31457280,
				'rootPath' => './',
				'savePath' => '/Public/support/',
				'saveName' => cookie('user_name').'_teachPro_'.$num,
				'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
				'subName'  => $id ,
				'uploadReplace' => true ,
				);
			$upload = new \Think\Upload($config);
			$info = $upload->upload();
			if(!$info){
				$this->ajaxReturn('uploadfail');
			}else{
				$file_path = $info['proSup']['savepath'].$info['proSup']['savename'];
				/*更新数据库*/
				$teachPro = D('TeachPro');
				$return = $teachPro->execute("update think_teach_pro set name='{$proName}',tp='{$proTp}',tm='{$proTm}',fund='{$proFund}',paid='{$proPaid}',remain='{$proRemain}',sup='{$file_path}' where num={$num} and years={$years} and ptype='teach_pro' ");
				/*
				 *实例化think_map_status
				 *先要查看项目状态是否是WAIT状态
				 *将编辑后项目置为待审核状态
				 */
				$mapS = D('MapStatus');
				$status = $mapS->query(" select status from think_map_status where num={$num} and years={$years} and ptype='teach_pro' and id='{$id}' ");
				if($status[0]['status'] != 'WAIT'){
					$return1 = $mapS->execute("update think_map_status set status='WAIT',reason='' where num={$num} and years={$years} and ptype='teach_pro' and id='{$id}' ");
				}else{
					$return1 = true;
				}
				
				if($return==true || $return1==true){
					$this->ajaxReturn("success");
				}else{
					$this->ajaxReturn("fail");
				}
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
		
	}
	// 
	public function updateTeachTbp(){
	$id  = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		$tbpName = $_POST['tbpName'];
		$tbpPub  = $_POST['tbpPub'];
		$tbpSignature = $_POST['tbpSignature'];
		$tbpTm   = $_POST['tbpTm'];
		$tbpSup  = $_FILES['tbpSup'];
		
			
		   	   /*
		 		* 文件上传，需要修改phpini中的配置
		 		*/
			$config = array( 
				'maxSize'  => 31457280,
				'rootPath' => './',
				'savePath' => '/Public/support/',
				'saveName' => cookie('user_name').'_teachTbp_'.$num,
				'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
				'subName'  => $id ,
				'uploadReplace' => true ,
				);
			$upload = new \Think\Upload($config);
			$info = $upload->upload();
			if(!$info){
				$this->ajaxReturn('uploadfail');
			}else{
				$file_path = $info['tbpSup']['savepath'].$info['tbpSup']['savename'];
				/*更新数据库*/
				$teachPro = D('TeachTbp');
				$return = $teachPro->execute("update think_teach_tbp set name='{$tbpName}',pub='{$tbpPub}',signature='{$tbpSignature}',tm='{$tbpTm}',sup='{$file_path}' where num={$num} and years={$years} and ptype='teach_tbp' ");
				/*
				 *实例化think_map_status
				 *先要查看项目状态是否是WAIT状态
				 *将编辑后项目置为待审核状态
				 */
				$mapS = D('MapStatus');
				$status = $mapS->query(" select status from think_map_status where num={$num} and years={$years} and ptype='teach_tbp' and id='{$id}' ");
				if($status[0]['status'] != 'WAIT'){
					$return1 = $mapS->execute("update think_map_status set status='WAIT',reason='' where num={$num} and years={$years} and ptype='teach_tbp' and id='{$id}' ");
				}else{
					$return1 = true;
				}
				
				if($return==true || $return1==true){
					$this->ajaxReturn("success");
				}else{
					$this->ajaxReturn("fail");
				}
			}
		}else{
			$this->ajaxReturn('cookiefail');
		}
		
	}
	public function updateResearchFund(){
			$id  = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		$fundName = $_POST['fundName'];
		$fundStm  = $_POST['fundStm'];
		$fundFund = $_POST['fundFund'];
		$fundPaid   = $_POST['fundPaid'];
		$fundRemain = $_POST['fundRemain'];
		$fundSup  = $_FILES['fundSup'];
		
			
		   	   /*
		 		* 文件上传，需要修改phpini中的配置
		 		*/
			$config = array( 
				'maxSize'  => 31457280,
				'rootPath' => './',
				'savePath' => '/Public/support/',
				'saveName' => cookie('user_name').'_researchFund_'.$num,
				'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
				'subName'  => $id ,
				'uploadReplace' => true ,
				);
			$upload = new \Think\Upload($config);
			$info = $upload->upload();
			if(!$info){
				$this->ajaxReturn('uploadfail');
			}else{
				$file_path = $info['fundSup']['savepath'].$info['fundSup']['savename'];
				/*更新数据库*/
				$researchFund = D('ResearchFund');
				$return = $researchFund->execute("update think_research_fund set name='{$fundName}',stm='{$fundStm}',fund='{$fundFund}',paid='{$fundPaid}',remain='{$fundRemain}',sup='{$file_path}' where num={$num} and years={$years} and ptype='research_fund' ");
				/*
				 *实例化think_map_status
				 *先要查看项目状态是否是WAIT状态
				 *将编辑后项目置为待审核状态
				 */
				$mapS = D('MapStatus');
				$status = $mapS->query(" select status from think_map_status where num={$num} and years={$years} and ptype='research_fund' and id='{$id}' ");
				if($status[0]['status'] != 'WAIT'){
					$return1 = $mapS->execute("update think_map_status set status='WAIT',reason='' where num={$num} and years={$years} and ptype='research_fund' and id='{$id}' ");
				}else{
					$return1 = true;
				}
				
				if($return==true || $return1==true){
					$this->ajaxReturn("success");
				}else{
					$this->ajaxReturn("fail");
				}
			}
		}else{
			$this->ajaxReturn('cookiefail');
		}
	}

	public function updateResearchPap(){
				$id  = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		$name = $_POST['name'];
		$pub  = $_POST['pub'];
		$vnum = $_POST['vnum'];
		$partner = $_POST['partner'];
		$lv = $_POST['lv'];
		$tm = $_POST['tm'];
		$sup  = $_FILES['sup'];
		
			
		   	   /*
		 		* 文件上传，需要修改phpini中的配置
		 		*/
			$config = array( 
				'maxSize'  => 31457280,
				'rootPath' => './',
				'savePath' => '/Public/support/',
				'saveName' => cookie('user_name').'_researchPap_'.$num,
				'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
				'subName'  => $id ,
				'uploadReplace' => true ,
				);
			$upload = new \Think\Upload($config);
			$info = $upload->upload();
			if(!$info){
				$this->ajaxReturn('uploadfail');
			}else{
				$file_path = $info['sup']['savepath'].$info['sup']['savename'];
				/*更新数据库*/
				$researchPap = D('ResearchPap');
				$return = $researchPap->execute("update think_research_pap set name='{$name}',pub='{$pub}',vnum='{$vnum}',partner='{$partner}',lv='{$lv}',tm='{$tm}' ,sup='{$file_path}' where num={$num} and years={$years} and ptype='research_pap' ");
				/*
				 *实例化think_map_status
				 *先要查看项目状态是否是WAIT状态
				 *将编辑后项目置为待审核状态
				 */
				$mapS = D('MapStatus');
				$status = $mapS->query(" select status from think_map_status where num={$num} and years={$years} and ptype='research_pap' and id='{$id}' ");
				if($status[0]['status'] != 'WAIT'){
					$return1 = $mapS->execute("update think_map_status set status='WAIT',reason='' where num={$num} and years={$years} and ptype='research_pap' and id='{$id}' ");
				}else{
					$return1 = true;
				}
				
				if($return==true || $return1==true){
					$this->ajaxReturn("success");
				}else{
					$this->ajaxReturn("fail");
				}
			}
		}else{
			$this->ajaxReturn('cookiefail');
		}
	}

	public function updateResearchMpb(){
					$id  = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		$name = $_POST['name'];
		$pub  = $_POST['pub'];
		$partner = $_POST['partner'];
		$tm = $_POST['tm'];
		$sup  = $_FILES['sup'];
		
			
		   	   /*
		 		* 文件上传，需要修改phpini中的配置
		 		*/
			$config = array( 
				'maxSize'  => 31457280,
				'rootPath' => './',
				'savePath' => '/Public/support/',
				'saveName' => cookie('user_name').'_researchMpb_'.$num,
				'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
				'subName'  => $id ,
				'uploadReplace' => true ,
				);
			$upload = new \Think\Upload($config);
			$info = $upload->upload();
			if(!$info){
				$this->ajaxReturn('uploadfail');
			}else{
				$file_path = $info['sup']['savepath'].$info['sup']['savename'];
				/*更新数据库*/
				$researchMpb = D('ResearchMpb');
				$return = $researchMpb->execute("update think_research_mpb set name='{$name}',pub='{$pub}',partner='{$partner}',tm='{$tm}' ,sup='{$file_path}' where num={$num} and years={$years} and ptype='research_mpb' ");
				/*
				 *实例化think_map_status
				 *先要查看项目状态是否是WAIT状态
				 *将编辑后项目置为待审核状态
				 */
				$mapS = D('MapStatus');
				$status = $mapS->query(" select status from think_map_status where num={$num} and years={$years} and ptype='research_mpb' and id='{$id}' ");
				if($status[0]['status'] != 'WAIT'){
					$return1 = $mapS->execute("update think_map_status set status='WAIT',reason='' where num={$num} and years={$years} and ptype='research_mpb' and id='{$id}' ");
				}else{
					$return1 = true;
				}
				
				if($return==true || $return1==true){
					$this->ajaxReturn("success");
				}else{
					$this->ajaxReturn("fail");
				}
			}
		}else{
			$this->ajaxReturn('cookiefail');
		}
	}

	public function updateResearchAch(){
					$id  = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		$name = $_POST['name'];
		$dep  = $_POST['dep'];
		$tm = $_POST['tm'];
		$lv = $_POST['lv'];
		$sup  = $_FILES['sup'];
		
			
		   	   /*
		 		* 文件上传，需要修改phpini中的配置
		 		*/
			$config = array( 
				'maxSize'  => 31457280,
				'rootPath' => './',
				'savePath' => '/Public/support/',
				'saveName' => cookie('user_name').'_researchAch_'.$num,
				'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
				'subName'  => $id ,
				'uploadReplace' => true ,
				);
			$upload = new \Think\Upload($config);
			$info = $upload->upload();
			if(!$info){
				$this->ajaxReturn('uploadfail');
			}else{
				$file_path = $info['sup']['savepath'].$info['sup']['savename'];
				/*更新数据库*/
				$researchAch = D('ResearchAch');
				$return = $researchAch->execute("update think_research_ach set name='{$name}',dep='{$dep}',tm='{$tm}',lv='{$lv}' ,sup='{$file_path}' where num={$num} and years={$years} and ptype='research_ach' ");
				/*
				 *实例化think_map_status
				 *先要查看项目状态是否是WAIT状态
				 *将编辑后项目置为待审核状态
				 */
				$mapS = D('MapStatus');
				$status = $mapS->query(" select status from think_map_status where num={$num} and years={$years} and ptype='research_ach' and id='{$id}' ");
				if($status[0]['status'] != 'WAIT'){
					$return1 = $mapS->execute("update think_map_status set status='WAIT',reason='' where num={$num} and years={$years} and ptype='research_ach' and id='{$id}' ");
				}else{
					$return1 = true;
				}
				
				if($return==true || $return1==true){
					$this->ajaxReturn("success");
				}else{
					$this->ajaxReturn("fail");
				}
			}
		}else{
			$this->ajaxReturn('cookiefail');
		}
	}

		public function updateResearchPro(){
			$id  = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		$name = $_POST['name'];
		$source   = $_POST['source'];
		$stm = $_POST['stm'];
		$deadline = $_POST['deadline'];
		$fund   = $_POST['fund'];
		$paid = $_POST['paid'];
		$remain = $_POST['remain'];
		$sup  = $_FILES['sup'];
		
			
		   	   /*
		 		* 文件上传，需要修改phpini中的配置
		 		*/
			$config = array( 
				'maxSize'  => 31457280,
				'rootPath' => './',
				'savePath' => '/Public/support/',
				'saveName' => cookie('user_name').'_researchPro_'.$num,
				'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
				'subName'  => $id ,
				'uploadReplace' => true ,
				);
			$upload = new \Think\Upload($config);
			$info = $upload->upload();
			if(!$info){
				$this->ajaxReturn('uploadfail');
			}else{
				$file_path = $info['sup']['savepath'].$info['sup']['savename'];
				/*更新数据库*/
				$researchPro = D('ResearchPro');
				$return = $researchPro->execute("update think_research_pro set name='{$name}',source='{$source}',stm='{$stm}',deadline='{$deadline}',fund='{$fund}',paid='{$paid}',remain='{$remain}',sup='{$file_path}' where num={$num} and years={$years} and ptype='research_pro' ");
				/*
				 *实例化think_map_status
				 *先要查看项目状态是否是WAIT状态
				 *将编辑后项目置为待审核状态
				 */
				$mapS = D('MapStatus');
				$status = $mapS->query(" select status from think_map_status where num={$num} and years={$years} and ptype='research_pro' and id='{$id}' ");
				if($status[0]['status'] != 'WAIT'){
					$return1 = $mapS->execute("update think_map_status set status='WAIT',reason='' where num={$num} and years={$years} and ptype='research_pro' and id='{$id}' ");
				}else{
					$return1 = true;
				}
				
				if($return==true || $return1==true){
					$this->ajaxReturn("success");
				}else{
					$this->ajaxReturn("fail");
				}
			}
		}else{
			$this->ajaxReturn('cookiefail');
		}
	}
	// 个人信息-可修改项修改密码
	public function changePd(){

		if(empty($_POST['pd'])){
			$this->error( "密码空值");
		}else{
			if(cookie('login_id') != ''){
				$password = $_POST['pd'];
				/*这里需要加一个正则表达，匹配6位数字字母组合的密码*/
				if(strlen($password)==6){
					 // 实例化LoginModel
					$L = D('Login');
					$L->execute("update think_login set pd='{$password}' where id='{$_COOKIE['login_id']}' ");
					$this->redirect('generalTeacherUserInf');

				}else{
					$this->error("密码长度错误");
				}			
			}else{
				cookie('login_id',null);
				$this->redirect('Index/index',3,'cookie已过期！请重新登录...');
			}
		}
	}
	//个人信息-可修改项修改手机
	public function changeTel(){

		if(empty($_POST['tel'])){
			$this->error("数据空值");
		}else{
			if(cookie('login_id') != ''){
				$tel = $_POST['tel'];
				/*这里需要加一个正则表达，匹配11位数字的手机号*/
				if(strlen($tel)==11){
					 // 实例化UserInfoModel
					$L = D('UserInfo');
					$L->execute("update think_user_info set tel='{$tel}' where id='{$_COOKIE['login_id']}' ");
					$this->redirect('generalTeacherUserInf');

				}else{
					$this->error("手机号长度错误");
				}			
			}else{
				cookie('login_id',null);
				$this->redirect('Index/index',3,'cookie已过期！请重新登录...');
			}
		}
	}
	//个人信息-可修改项修改邮箱
	public function changeEmail(){

		if(empty($_POST['email'])){
			$this->error("数据空值");
		}else{
			if(cookie('login_id') != ''){
				$email = $_POST['email'];
				/*这里需要加一个正则表达，匹配11位数字的手机号*/
				if(strlen($email)<=50){
					 // 实例化UserInfoModel
					$L = D('UserInfo');
					$L->execute("update think_user_info set email='{$email}' where id='{$_COOKIE['login_id']}' ");
					$this->redirect('generalTeacherUserInf');

				}else{
					$this->error("邮箱名过长，请换个邮箱重试");
				}			
			}else{
				cookie('login_id',null);
				$this->redirect('Index/index',3,'cookie已过期！请重新登录...');
			}
		}
	}
	/*
	 * 插入新数据区
	 */
	public function insertTeachAch(){

		if(cookie('login_id')!=''){
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$achName = $_POST['achName'];
				$achDep  = $_POST['achDep'];
				$achTime = $_POST['achTime'];
				$achLv   = $_POST['achLv'];
				$achSup  = $_FILES['achSup'];
				$id      = cookie('login_id');
				// 实例化SysTimerModel,找到对应类型计数器的值
				$Timer = D('SysTimer');
				$years = date("Y"); 
				$content = $Timer->query("select timer from think_sys_timer where ptype='teach_ach' and years={$years} ");
				$t = $content[0]['timer'];
				/*文件上传，并拿到文件URL*/
				$config = array(
					'maxSize'  => 31457280,
					'rootPath' => './',
					'savePath' => '/Public/support/',
					'saveName' => cookie('user_name').'_teachAch_'.$t,
					'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
					'subName'  => $id ,
					'uploadReplace' => true,
					);
				$upload = new \Think\Upload($config);
				$info = $upload->upload();
				if(!$info){
					$this->error($upload->getError());
				}else{
					$file_path = $info['achSup']['savepath'].$info['achSup']['savename'];
					/*更新数据库*/
					// 为避免INT类型超出数值范围
					if($t < 4294967295){
						// 并更新timer，使timer + 1
						$t1 = $t + 1;

						$Timer->execute(" update think_sys_timer set timer={$t1} where  ptype='teach_ach' and years={$years} ");
					// 实例化TeachAchModel
					$teachAch = D('TeachAch');
					$teachAch->execute("insert into think_teach_ach values({$t},{$years},'teach_ach','{$achName}','{$achDep}','{$achTime}','{$achLv}','{$file_path}')");
					// 实例化MapStatusModel
					$ms = D('MapStatus');
					$ms->execute("insert into think_map_status values('{$id}',{$years},'teach_ach',{$t},'WAIT','') ");
					$this->ajaxReturn('success');
					}else{
						$this->ajaxReturn("fail");
					}
					}							
			}else{
				$this->ajaxReturn("fail");
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}

	public function insertTeachPro(){

		if(cookie('login_id')!=''){
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$proName = $_POST['proName'];
				$proTp  = $_POST['proTp'];
				$proTm = $_POST['proTm'];
				$proFund   = $_POST['proFund'];
				$proPaid = $_POST['proPaid'];
				$proRemain = $_POST['proRemain'];
				$proSup  = $_FILES['proSup'];
				$id      = cookie('login_id');
				// 实例化SysTimerModel,找到对应类型计数器的值
				$Timer = D('SysTimer');
				$years = date("Y"); 
				$content = $Timer->query("select timer from think_sys_timer where ptype='teach_pro' and years={$years} ");
				$t = $content[0]['timer'];
				/*文件上传，并拿到文件URL*/
				$config = array(
					'maxSize'  => 31457280,
					'rootPath' => './',
					'savePath' => '/Public/support/',
					'saveName' => cookie('user_name').'_teachPro_'.$t,
					'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
					'subName'  => $id ,
					'uploadReplace' => true,
					);
				$upload = new \Think\Upload($config);
				$info = $upload->upload();
				if(!$info){
					$this->error($upload->getError());
				}else{
					$file_path = $info['proSup']['savepath'].$info['proSup']['savename'];
					/*更新数据库*/
					// 为避免INT类型超出数值范围
					if($t < 4294967295){
						// 并更新timer，使timer + 1
						$t1 = $t + 1;

						$Timer->execute(" update think_sys_timer set timer={$t1} where  ptype='teach_pro' and years={$years} ");
					// 实例化TeachProModel
					$teachPro = D('TeachPro');
					$teachPro->execute("insert into think_teach_pro values({$t},{$years},'teach_pro','{$proName}','{$proTp}','{$proTm}','{$proFund}','{$proPaid}','{$proRemain}','{$file_path}')");
					// 实例化MapStatusModel
					$ms = D('MapStatus');
					$ms->execute("insert into think_map_status values('{$id}',{$years},'teach_pro',{$t},'WAIT','') ");
					$this->ajaxReturn('success');
					}else{
						$this->ajaxReturn("fail");
					}
					}							
			}else{
				$this->ajaxReturn("fail");
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}
	// 
	public function insertTeachTbp(){

		if(cookie('login_id')!=''){
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$tbpName = $_POST['tbpName'];
				$tbpPub  = $_POST['tbpPub'];
				$tbpSignature = $_POST['tbpSignature'];
				$tbpTm   = $_POST['tbpTm'];
				$tbpSup  = $_FILES['tbpSup'];
				$id      = cookie('login_id');
				// 实例化SysTimerModel,找到对应类型计数器的值
				$Timer = D('SysTimer');
				$years = date("Y"); 
				$content = $Timer->query("select timer from think_sys_timer where ptype='teach_tbp' and years={$years} ");
				$t = $content[0]['timer'];
				/*文件上传，并拿到文件URL*/
				$config = array(
					'maxSize'  => 31457280,
					'rootPath' => './',
					'savePath' => '/Public/support/',
					'saveName' => cookie('user_name').'_teachTbp_'.$t,
					'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
					'subName'  => $id ,
					'uploadReplace' => true,
					);
				$upload = new \Think\Upload($config);
				$info = $upload->upload();
				if(!$info){
					$this->error($upload->getError());
				}else{
					$file_path = $info['tbpSup']['savepath'].$info['tbpSup']['savename'];
					/*更新数据库*/
					// 为避免INT类型超出数值范围
					if($t < 4294967295){
						// 并更新timer，使timer + 1
						$t1 = $t + 1;

						$Timer->execute(" update think_sys_timer set timer={$t1} where  ptype='teach_tbp' and years={$years} ");
					// 实例化TeachProModel
					$teachTbp = D('TeachTbp');
					$teachTbp->execute("insert into think_teach_tbp values({$t},{$years},'teach_tbp','{$tbpName}','{$tbpPub}','{$tbpSignature}','{$tbpTm}','{$file_path}') ");
					// 实例化MapStatusModel
					$ms = D('MapStatus');
					$ms->execute("insert into think_map_status values('{$id}',{$years},'teach_tbp',{$t},'WAIT','') ");
					$this->ajaxReturn('success');
					}else{
						$this->ajaxReturn("fail");
					}
					}							
			}else{
				$this->ajaxReturn("fail");
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}
	public function insertResearchFund(){
				if(cookie('login_id')!=''){
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$fundName = $_POST['fundName'];
				$fundStm  = $_POST['fundStm'];
				$fundFund = $_POST['fundFund'];
				$fundPaid   = $_POST['fundPaid'];
				$fundRemain = $_POST['fundRemain'];
				$fundSup  = $_FILES['fundSup'];
				$id      = cookie('login_id');
				// 实例化SysTimerModel,找到对应类型计数器的值
				$Timer = D('SysTimer');
				$years = date("Y"); 
				$content = $Timer->query("select timer from think_sys_timer where ptype='research_fund' and years={$years} ");
				$t = $content[0]['timer'];
				/*文件上传，并拿到文件URL*/
				$config = array(
					'maxSize'  => 31457280,
					'rootPath' => './',
					'savePath' => '/Public/support/',
					'saveName' => cookie('user_name').'_researchFund_'.$t,
					'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
					'subName'  => $id ,
					'uploadReplace' => true,
					);
				$upload = new \Think\Upload($config);
				$info = $upload->upload();
				if(!$info){
					$this->error($upload->getError());
				}else{
					$file_path = $info['fundSup']['savepath'].$info['fundSup']['savename'];
					/*更新数据库*/
					// 为避免INT类型超出数值范围
					if($t < 4294967295){
						// 并更新timer，使timer + 1
						$t1 = $t + 1;

						$Timer->execute(" update think_sys_timer set timer={$t1} where  ptype='research_fund' and years={$years} ");
					// 实例化ResearchFundModel
					$researchFund = D('ResearchFund');
					$researchFund->execute("insert into think_research_fund values({$t},{$years},'research_fund','{$fundName}','{$fundStm}',{$fundFund},{$fundPaid},{$fundRemain},'{$file_path}') ");
					// 实例化MapStatusModel
					$ms = D('MapStatus');
					$ms->execute("insert into think_map_status values('{$id}',{$years},'research_fund',{$t},'WAIT','') ");
					$this->ajaxReturn('success');
					}else{
						$this->ajaxReturn("fail");
					}
					}							
			}else{
				$this->ajaxReturn("fail");
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}

	public function insertResearchPap(){
			if(cookie('login_id')!=''){
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$name = $_POST['name'];
				$pub  = $_POST['pub'];
				$vnum = $_POST['vnum'];
				$partner   = $_POST['partner'];
				$lv = $_POST['lv'];
				$tm = $_POST['tm'];
				$sup  = $_FILES['sup'];
				$id      = cookie('login_id');
				// 实例化SysTimerModel,找到对应类型计数器的值
				$Timer = D('SysTimer');
				$years = date("Y"); 
				$content = $Timer->query("select timer from think_sys_timer where ptype='research_pap' and years={$years} ");
				$t = $content[0]['timer'];
				/*文件上传，并拿到文件URL*/
				$config = array(
					'maxSize'  => 31457280,
					'rootPath' => './',
					'savePath' => '/Public/support/',
					'saveName' => cookie('user_name').'_researchPap_'.$t,
					'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
					'subName'  => $id ,
					'uploadReplace' => true,
					);
				$upload = new \Think\Upload($config);
				$info = $upload->upload();
				if(!$info){
					$this->error($upload->getError());
				}else{
					$file_path = $info['sup']['savepath'].$info['sup']['savename'];
					/*更新数据库*/
					// 为避免INT类型超出数值范围
					if($t < 4294967295){
						// 并更新timer，使timer + 1
						$t1 = $t + 1;

						$Timer->execute(" update think_sys_timer set timer={$t1} where  ptype='research_pap' and years={$years} ");
					// 实例化ResearchFundModel
					$researchPap = D('ResearchPap');
					$researchPap->execute("insert into think_research_pap values({$t},{$years},'research_pap','{$name}','{$pub}','{$vnum}','{$partner}','{$lv}','{$tm}','{$file_path}') ");
					// 实例化MapStatusModel
					$ms = D('MapStatus');
					$ms->execute("insert into think_map_status values('{$id}',{$years},'research_pap',{$t},'WAIT','') ");
					$this->ajaxReturn('success');
					}else{
						$this->ajaxReturn("fail");
					}
					}							
			}else{
				$this->ajaxReturn("fail");
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}

	public function insertResearchMpb(){
		if(cookie('login_id')!=''){
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$name = $_POST['name'];
				$pub  = $_POST['pub'];
				$partner   = $_POST['partner'];
				$tm = $_POST['tm'];
				$sup  = $_FILES['sup'];
				$id      = cookie('login_id');
				// 实例化SysTimerModel,找到对应类型计数器的值
				$Timer = D('SysTimer');
				$years = date("Y"); 
				$content = $Timer->query("select timer from think_sys_timer where ptype='research_mpb' and years={$years} ");
				$t = $content[0]['timer'];
				/*文件上传，并拿到文件URL*/
				$config = array(
					'maxSize'  => 31457280,
					'rootPath' => './',
					'savePath' => '/Public/support/',
					'saveName' => cookie('user_name').'_researchMpb_'.$t,
					'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
					'subName'  => $id ,
					'uploadReplace' => true,
					);
				$upload = new \Think\Upload($config);
				$info = $upload->upload();
				if(!$info){
					$this->error($upload->getError());
				}else{
					$file_path = $info['sup']['savepath'].$info['sup']['savename'];
					/*更新数据库*/
					// 为避免INT类型超出数值范围
					if($t < 4294967295){
						// 并更新timer，使timer + 1
						$t1 = $t + 1;

						$Timer->execute(" update think_sys_timer set timer={$t1} where  ptype='research_mpb' and years={$years} ");
					// 实例化ResearchFundModel
					$researchMpb = D('ResearchMpb');
					$researchMpb->execute("insert into think_research_mpb values({$t},{$years},'research_mpb','{$name}','{$pub}','{$partner}','{$tm}','{$file_path}') ");
					// 实例化MapStatusModel
					$ms = D('MapStatus');
					$ms->execute("insert into think_map_status values('{$id}',{$years},'research_mpb',{$t},'WAIT','') ");
					$this->ajaxReturn('success');
					}else{
						$this->ajaxReturn("fail");
					}
					}							
			}else{
				$this->ajaxReturn("fail");
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}

	public function insertResearchAch(){
		if(cookie('login_id')!=''){
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$name = $_POST['name'];
				$dep   = $_POST['dep'];
				$tm = $_POST['tm'];
				$lv = $_POST['lv'];
				$sup  = $_FILES['sup'];
				$id      = cookie('login_id');
				// 实例化SysTimerModel,找到对应类型计数器的值
				$Timer = D('SysTimer');
				$years = date("Y"); 
				$content = $Timer->query("select timer from think_sys_timer where ptype='research_ach' and years={$years} ");
				$t = $content[0]['timer'];
				/*文件上传，并拿到文件URL*/
				$config = array(
					'maxSize'  => 31457280,
					'rootPath' => './',
					'savePath' => '/Public/support/',
					'saveName' => cookie('user_name').'_researchAch_'.$t,
					'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
					'subName'  => $id ,
					'uploadReplace' => true,
					);
				$upload = new \Think\Upload($config);
				$info = $upload->upload();
				if(!$info){
					$this->error($upload->getError());
				}else{
					$file_path = $info['sup']['savepath'].$info['sup']['savename'];
					/*更新数据库*/
					// 为避免INT类型超出数值范围
					if($t < 4294967295){
						// 并更新timer，使timer + 1
						$t1 = $t + 1;

						$Timer->execute(" update think_sys_timer set timer={$t1} where  ptype='research_ach' and years={$years} ");
					// 实例化ResearchFundModel
					$researchAch = D('ResearchAch');
					$researchAch->execute("insert into think_research_ach values({$t},{$years},'research_ach','{$name}','{$dep}','{$tm}','{$lv}','{$file_path}') ");
					// 实例化MapStatusModel
					$ms = D('MapStatus');
					$ms->execute("insert into think_map_status values('{$id}',{$years},'research_ach',{$t},'WAIT','') ");
					$this->ajaxReturn('success');
					}else{
						$this->ajaxReturn("fail");
					}
					}							
			}else{
				$this->ajaxReturn("fail");
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}
	public function insertResearchPro(){
		if(cookie('login_id')!=''){
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$name = $_POST['name'];
				$source   = $_POST['source'];
				$stm = $_POST['stm'];
				$deadline = $_POST['deadline'];
				$fund   = $_POST['fund'];
				$paid = $_POST['paid'];
				$remain = $_POST['remain'];
				$sup  = $_FILES['sup'];
				$id      = cookie('login_id');
				// 实例化SysTimerModel,找到对应类型计数器的值
				$Timer = D('SysTimer');
				$years = date("Y"); 
				$content = $Timer->query("select timer from think_sys_timer where ptype='research_pro' and years={$years} ");
				$t = $content[0]['timer'];
				/*文件上传，并拿到文件URL*/
				$config = array(
					'maxSize'  => 31457280,
					'rootPath' => './',
					'savePath' => '/Public/support/',
					'saveName' => cookie('user_name').'_researchPro_'.$t,
					'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
					'subName'  => $id ,
					'uploadReplace' => true,
					);
				$upload = new \Think\Upload($config);
				$info = $upload->upload();
				if(!$info){
					$this->error($upload->getError());
				}else{
					$file_path = $info['sup']['savepath'].$info['sup']['savename'];
					/*更新数据库*/
					// 为避免INT类型超出数值范围
					if($t < 4294967295){
						// 并更新timer，使timer + 1
						$t1 = $t + 1;

						$Timer->execute(" update think_sys_timer set timer={$t1} where  ptype='research_pro' and years={$years} ");
					// 实例化ResearchFundModel
					$researchPro = D('ResearchPro');
					$researchPro->execute("insert into think_research_pro values({$t},{$years},'research_pro','{$name}','{$source}','{$stm}','{$deadline}','{$fund}','{$paid}','{$remain}','{$file_path}') ");
					// 实例化MapStatusModel
					$ms = D('MapStatus');
					$ms->execute("insert into think_map_status values('{$id}',{$years},'research_pro',{$t},'WAIT','') ");
					$this->ajaxReturn('success');
					}else{
						$this->ajaxReturn("fail");
					}
					}							
			}else{
				$this->ajaxReturn("fail");
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}

	public function insertOtherExc(){
		if(cookie('login_id')!=''){
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$country = $_POST['country'];
				$tmin   = $_POST['tmin'];
				$place = $_POST['place'];
				$sch = $_POST['sch'];
				$content   = $_POST['content'];
				$sup  = $_FILES['sup'];
				$id      = cookie('login_id');
				// 实例化SysTimerModel,找到对应类型计数器的值
				$Timer = D('SysTimer');
				$years = date("Y"); 
				$result = $Timer->query("select timer from think_sys_timer where ptype='other_exc' and years={$years} ");
				$t = $result[0]['timer'];
				/*文件上传，并拿到文件URL*/
				$config = array(
					'maxSize'  => 31457280,
					'rootPath' => './',
					'savePath' => '/Public/support/',
					'saveName' => cookie('user_name').'_otherExc_'.$t,
					'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
					'subName'  => $id ,
					'uploadReplace' => true,
					);
				$upload = new \Think\Upload($config);
				$info = $upload->upload();
				if(!$info){
					$this->error($upload->getError());
				}else{
					$file_path = $info['sup']['savepath'].$info['sup']['savename'];
					/*更新数据库*/
					// 为避免INT类型超出数值范围
					if($t < 4294967295){
						// 并更新timer，使timer + 1
						$t1 = $t + 1;

						$Timer->execute(" update think_sys_timer set timer={$t1} where  ptype='other_exc' and years={$years} ");
					// 实例化ResearchFundModel
					$otherExc = D('OtherExc');
					$otherExc->execute("insert into think_other_exc values({$t},{$years},'other_exc','{$country}','{$tmin}','{$place}','{$sch}','{$content}','{$file_path}') ");
					// 实例化MapStatusModel
					$ms = D('MapStatus');
					$ms->execute("insert into think_map_status values('{$id}',{$years},'other_exc',{$t},'WAIT','') ");
					$this->ajaxReturn('success');
					}else{
						$this->ajaxReturn("fail");
					}
					}							
			}else{
				$this->ajaxReturn("fail");
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}

	public function insertOtherWel(){
		if(cookie('login_id')!=''){
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$tm = $_POST['tm'];
				$place   = $_POST['place'];
				$content = $_POST['content'];
				$sup  = $_FILES['sup'];
				$id      = cookie('login_id');
				// 实例化SysTimerModel,找到对应类型计数器的值
				$Timer = D('SysTimer');
				$years = date("Y"); 
				$result = $Timer->query("select timer from think_sys_timer where ptype='other_wel' and years={$years} ");
				$t = $result[0]['timer'];
				/*文件上传，并拿到文件URL*/
				$config = array(
					'maxSize'  => 31457280,
					'rootPath' => './',
					'savePath' => '/Public/support/',
					'saveName' => cookie('user_name').'_otherExc_'.$t,
					'exts'     => array('jpg','png','jpeg','docx','doc','xlsx','rar','zip'),
					'subName'  => $id ,
					'uploadReplace' => true,
					);
				$upload = new \Think\Upload($config);
				$info = $upload->upload();
				if(!$info){
					$this->error($upload->getError());
				}else{
					$file_path = $info['sup']['savepath'].$info['sup']['savename'];
					/*更新数据库*/
					// 为避免INT类型超出数值范围
					if($t < 4294967295){
						// 并更新timer，使timer + 1
						$t1 = $t + 1;

						$Timer->execute(" update think_sys_timer set timer={$t1} where  ptype='other_wel' and years={$years} ");
					// 实例化ResearchFundModel
					$otherWel = D('OtherWel');
					$otherWel->execute("insert into think_other_wel values({$t},{$years},'other_wel','{$tm}','{$place}','{$content}','{$file_path}') ");
					// 实例化MapStatusModel
					$ms = D('MapStatus');
					$ms->execute("insert into think_map_status values('{$id}',{$years},'other_wel',{$t},'WAIT','') ");
					$this->ajaxReturn('success');
					}else{
						$this->ajaxReturn("fail");
					}
					}							
			}else{
				$this->ajaxReturn("fail");
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}


	public function insertOtherNews(){
		if(cookie('login_id')!=''){
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$rep = $_POST['rep'];
				$title   = $_POST['title'];
				$content = $_POST['content'];
				$sup  = $_FILES['sup'];
				$id      = cookie('login_id');
				// 实例化SysTimerModel,找到对应类型计数器的值
				$Timer = D('SysTimer');
				$years = date("Y"); 
				$result = $Timer->query("select timer from think_sys_timer where ptype='other_news' and years={$years} ");
				$t = $result[0]['timer'];
				/*文件上传，并拿到文件URL*/
				$config = array(
					'maxSize'  => 31457280,
					'rootPath' => './',
					'savePath' => '/Public/support/',
					'saveName' => cookie('user_name').'_otherNews_'.$t,
					'exts'     => array('jpg','png','jpeg','rar','zip'),
					'subName'  => $id ,
					'uploadReplace' => true,
					);
				$upload = new \Think\Upload($config);
				$info = $upload->upload();
				if(!$info){
					$this->error($upload->getError());
				}else{
					$file_path = $info['sup']['savepath'].$info['sup']['savename'];
					/*更新数据库*/
					// 为避免INT类型超出数值范围
					if($t < 4294967295){
						// 并更新timer，使timer + 1
						$t1 = $t + 1;

						$Timer->execute(" update think_sys_timer set timer={$t1} where  ptype='other_news' and years={$years} ");
					// 实例化ResearchFundModel
					$otherNews = D('OtherNews');
					$otherNews->execute("insert into think_other_news values({$t},{$years},'other_news','{$rep}','{$title}','{$content}','{$file_path}') ");
					// 实例化MapStatusModel
					$ms = D('MapStatus');
					$ms->execute("insert into think_map_status values('{$id}',{$years},'other_news',{$t},'WAIT','') ");
					$this->ajaxReturn('success');
					}else{
						$this->ajaxReturn("fail");
					}
					}							
			}else{
				$this->ajaxReturn("fail");
			}
		}else{
			cookie('login_id',null);
			$this->ajaxReturn('cookiefail');
		}
	}




	/*
	 * delete删除区
	 */
	public function deleteOtherNews(){
		$id    = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		/*
		 * 删除与项目有关的所有表中数据
		 * think_teach_ach表
		 * think_map_status表
		 */
		// 实例化TeachAchModel
		$deleteta = D('OtherExc');
		// 先拿到材料文件地址URL，为完全删除做准备
		$url = $deleteta->query("select sup from think_other_news where num={$num} and years={$years} and ptype='other_news' ");
		$return = $deleteta->execute("delete from think_other_news where num={$num} and years={$years} and ptype='other_news' ");
		$deletems = D('MapStatus');
		$return1 = $deletems->execute("delete from think_map_status where id='{$id}' and num={$num} and years={$years} and ptype='other_news' ");
		if($return==true&&$return1==true){
			/*
			 * 删除服务器上对应的文件
			 * [注意：文件名为中文是要进行编码转化]
			 */
			// 
			$url =".".$url[0]['sup'];
			// 将编码从utf-8转化为gbk
			$url=iconv('utf-8', 'gbk', $url);
			if(file_exists($url)){
				//文件存在执行删除操作
				@unlink($url);
				$this->ajaxReturn($data);
			}else{
				$data="fail";
				$this->ajaxReturn($data);
			}
			
		}else{
			$data="fail";
			$this->ajaxReturn($data);
		}
	}else{
		cookie('login_id',null);
		$this->ajaxReturn('cookiefail');
	}
	}

	public function deleteOtherWel(){
		$id    = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		/*
		 * 删除与项目有关的所有表中数据
		 * think_teach_ach表
		 * think_map_status表
		 */
		// 实例化TeachAchModel
		$deleteta = D('OtherWel');
		// 先拿到材料文件地址URL，为完全删除做准备
		$url = $deleteta->query("select sup from think_other_wel where num={$num} and years={$years} and ptype='other_wel' ");
		$return = $deleteta->execute("delete from think_other_wel where num={$num} and years={$years} and ptype='other_wel' ");
		$deletems = D('MapStatus');
		$return1 = $deletems->execute("delete from think_map_status where id='{$id}' and num={$num} and years={$years} and ptype='other_wel' ");
		if($return==true&&$return1==true){
			/*
			 * 删除服务器上对应的文件
			 * [注意：文件名为中文是要进行编码转化]
			 */
			// 
			$url =".".$url[0]['sup'];
			// 将编码从utf-8转化为gbk
			$url=iconv('utf-8', 'gbk', $url);
			if(file_exists($url)){
				//文件存在执行删除操作
				@unlink($url);
				$this->ajaxReturn($data);
			}else{
				$data="fail";
				$this->ajaxReturn($data);
			}
			
		}else{
			$data="fail";
			$this->ajaxReturn($data);
		}
	}else{
		cookie('login_id',null);
		$this->ajaxReturn('cookiefail');
	}
	}

	public function deleteOtherExc(){
		$id    = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		/*
		 * 删除与项目有关的所有表中数据
		 * think_teach_ach表
		 * think_map_status表
		 */
		// 实例化TeachAchModel
		$deleteta = D('OtherExc');
		// 先拿到材料文件地址URL，为完全删除做准备
		$url = $deleteta->query("select sup from think_other_exc where num={$num} and years={$years} and ptype='other_exc' ");
		$return = $deleteta->execute("delete from think_other_exc where num={$num} and years={$years} and ptype='other_exc' ");
		$deletems = D('MapStatus');
		$return1 = $deletems->execute("delete from think_map_status where id='{$id}' and num={$num} and years={$years} and ptype='other_exc' ");
		if($return==true&&$return1==true){
			/*
			 * 删除服务器上对应的文件
			 * [注意：文件名为中文是要进行编码转化]
			 */
			// 
			$url =".".$url[0]['sup'];
			// 将编码从utf-8转化为gbk
			$url=iconv('utf-8', 'gbk', $url);
			if(file_exists($url)){
				//文件存在执行删除操作
				@unlink($url);
				$this->ajaxReturn($data);
			}else{
				$data="fail";
				$this->ajaxReturn($data);
			}
			
		}else{
			$data="fail";
			$this->ajaxReturn($data);
		}
	}else{
		cookie('login_id',null);
		$this->ajaxReturn('cookiefail');
	}
	}
	public function deleteTeachAch(){
	$id    = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		/*
		 * 删除与项目有关的所有表中数据
		 * think_teach_ach表
		 * think_map_status表
		 */
		// 实例化TeachAchModel
		$deleteta = D('TeachAch');
		// 先拿到材料文件地址URL，为完全删除做准备
		$url = $deleteta->query("select sup from think_teach_ach where num={$num} and years={$years} and ptype='teach_ach' ");
		$return = $deleteta->execute("delete from think_teach_ach where num={$num} and years={$years} and ptype='teach_ach' ");
		$deletems = D('MapStatus');
		$return1 = $deletems->execute("delete from think_map_status where id='{$id}' and num={$num} and years={$years} and ptype='teach_ach' ");
		if($return==true&&$return1==true){
			/*
			 * 删除服务器上对应的文件
			 * [注意：文件名为中文是要进行编码转化]
			 */
			// 
			$url =".".$url[0]['sup'];
			// 将编码从utf-8转化为gbk
			$url=iconv('utf-8', 'gbk', $url);
			if(file_exists($url)){
				//文件存在执行删除操作
				@unlink($url);
				$this->ajaxReturn($data);
			}else{
				$data="fail";
				$this->ajaxReturn($data);
			}
			
		}else{
			$data="fail";
			$this->ajaxReturn($data);
		}
	}else{
		cookie('login_id',null);
		$this->ajaxReturn('cookiefail');
	}
	}
	// 
	public function deleteTeachPro(){
	$id    = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		/*
		 * 删除与项目有关的所有表中数据
		 * think_teach_ach表
		 * think_map_status表
		 */
		// 实例化TeachProModel
		$deleteta = D('TeachPro');
		// 先拿到材料文件地址URL，为完全删除做准备
		$url = $deleteta->query("select sup from think_teach_pro where num={$num} and years={$years} and ptype='teach_pro' ");
		$return = $deleteta->execute("delete from think_teach_pro where num={$num} and years={$years} and ptype='teach_pro' ");
		$deletems = D('MapStatus');
		$return1 = $deletems->execute("delete from think_map_status where id='{$id}' and num={$num} and years={$years} and ptype='teach_pro' ");
		if($return==true&&$return1==true){
			/*
			 * 删除服务器上对应的文件
			 * [注意：文件名为中文是要进行编码转化]
			 */
			// 
			$url =".".$url[0]['sup'];
			// 将编码从utf-8转化为gbk
			$url=iconv('utf-8', 'gbk', $url);
			if(file_exists($url)){
				//文件存在执行删除操作
				@unlink($url);
				$this->ajaxReturn($data);
			}else{
				$data="fail";
				$this->ajaxReturn($data);
			}
			
		}else{
			$data="fail";
			$this->ajaxReturn($data);
		}
	}else{
		cookie('login_id',null);
		$this->ajaxReturn('cookiefail');
	}
		
	}
	// 
	public function deleteTeachTbp(){
	$id    = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		/*
		 * 删除与项目有关的所有表中数据
		 * think_teach_ach表
		 * think_map_status表
		 */
		// 实例化TeachProModel
		$deleteta = D('TeachTbp');
		// 先拿到材料文件地址URL，为完全删除做准备
		$url = $deleteta->query("select sup from think_teach_tbp where num={$num} and years={$years} and ptype='teach_tbp' ");
		$return = $deleteta->execute("delete from think_teach_tbp where num={$num} and years={$years} and ptype='teach_tbp' ");
		$deletems = D('MapStatus');
		$return1 = $deletems->execute("delete from think_map_status where id='{$id}' and num={$num} and years={$years} and ptype='teach_tbp' ");
		if($return==true&&$return1==true){
			/*
			 * 删除服务器上对应的文件
			 * [注意：文件名为中文是要进行编码转化]
			 */
			// 
			$url =".".$url[0]['sup'];
			// 将编码从utf-8转化为gbk
			$url=iconv('utf-8', 'gbk', $url);
			if(file_exists($url)){
				//文件存在执行删除操作
				@unlink($url);
				$this->ajaxReturn($data);
			}else{
				$data="fail";
				$this->ajaxReturn($data);
			}
			
		}else{
			$data="fail";
			$this->ajaxReturn($data);
		}
	}else{
		cookie('login_id',null);
		$this->ajaxReturn('cookiefail');
	}
		
	}

	public function deleteResearchFund(){
			$id    = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		/*
		 * 删除与项目有关的所有表中数据
		 * think_teach_ach表
		 * think_map_status表
		 */
		// 实例化TeachProModel
		$deleteta = D('ResearchFund');
		// 先拿到材料文件地址URL，为完全删除做准备
		$url = $deleteta->query("select sup from think_research_fund where num={$num} and years={$years} and ptype='research_fund' ");
		$return = $deleteta->execute("delete from think_research_fund where num={$num} and years={$years} and ptype='research_fund' ");
		$deletems = D('MapStatus');
		$return1 = $deletems->execute("delete from think_map_status where id='{$id}' and num={$num} and years={$years} and ptype='research_fund' ");
		if($return==true&&$return1==true){
			/*
			 * 删除服务器上对应的文件
			 * [注意：文件名为中文是要进行编码转化]
			 */
			// 
			$url =".".$url[0]['sup'];
			// 将编码从utf-8转化为gbk
			$url=iconv('utf-8', 'gbk', $url);
			if(file_exists($url)){
				//文件存在执行删除操作
				@unlink($url);
				$this->ajaxReturn($data);
			}else{
				$data="fail";
				$this->ajaxReturn($data);
			}
			
		}else{
			$data="fail";
			$this->ajaxReturn($data);
		}
	}else{
		cookie('login_id',null);
		$this->ajaxReturn('cookiefail');
	}
	}

	public function deleteResearchPap(){
				$id    = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		/*
		 * 删除与项目有关的所有表中数据
		 * think_teach_ach表
		 * think_map_status表
		 */
		// 实例化TeachProModel
		$deleteta = D('ResearchPap');
		// 先拿到材料文件地址URL，为完全删除做准备
		$url = $deleteta->query("select sup from think_research_pap where num={$num} and years={$years} and ptype='research_pap' ");
		$return = $deleteta->execute("delete from think_research_pap where num={$num} and years={$years} and ptype='research_pap' ");
		$deletems = D('MapStatus');
		$return1 = $deletems->execute("delete from think_map_status where id='{$id}' and num={$num} and years={$years} and ptype='research_pap' ");
		if($return==true&&$return1==true){
			/*
			 * 删除服务器上对应的文件
			 * [注意：文件名为中文是要进行编码转化]
			 */
			// 
			$url =".".$url[0]['sup'];
			// 将编码从utf-8转化为gbk
			$url=iconv('utf-8', 'gbk', $url);
			if(file_exists($url)){
				//文件存在执行删除操作
				@unlink($url);
				$this->ajaxReturn($data);
			}else{
				$data="fail";
				$this->ajaxReturn($data);
			}
			
		}else{
			$data="fail";
			$this->ajaxReturn($data);
		}
	}else{
		cookie('login_id',null);
		$this->ajaxReturn('cookiefail');
	}
	}

	public function deleteResearchMpb(){
						$id    = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		/*
		 * 删除与项目有关的所有表中数据
		 * think_teach_ach表
		 * think_map_status表
		 */
		// 实例化TeachProModel
		$deleteta = D('ResearchMpb');
		// 先拿到材料文件地址URL，为完全删除做准备
		$url = $deleteta->query("select sup from think_research_mpb where num={$num} and years={$years} and ptype='research_mpb' ");
		$return = $deleteta->execute("delete from think_research_mpb where num={$num} and years={$years} and ptype='research_mpb' ");
		$deletems = D('MapStatus');
		$return1 = $deletems->execute("delete from think_map_status where id='{$id}' and num={$num} and years={$years} and ptype='research_mpb' ");
		if($return==true&&$return1==true){
			/*
			 * 删除服务器上对应的文件
			 * [注意：文件名为中文是要进行编码转化]
			 */
			// 
			$url =".".$url[0]['sup'];
			// 将编码从utf-8转化为gbk
			$url=iconv('utf-8', 'gbk', $url);
			if(file_exists($url)){
				//文件存在执行删除操作
				@unlink($url);
				$this->ajaxReturn($data);
			}else{
				$data="fail";
				$this->ajaxReturn($data);
			}
			
		}else{
			$data="fail";
			$this->ajaxReturn($data);
		}
	}else{
		cookie('login_id',null);
		$this->ajaxReturn('cookiefail');
	}
	}

	public function deleteResearchAch(){
	$id    = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		/*
		 * 删除与项目有关的所有表中数据
		 * think_teach_ach表
		 * think_map_status表
		 */
		// 实例化TeachProModel
		$deleteta = D('ResearchAch');
		// 先拿到材料文件地址URL，为完全删除做准备
		$url = $deleteta->query("select sup from think_research_ach where num={$num} and years={$years} and ptype='research_ach' ");
		$return = $deleteta->execute("delete from think_research_ach where num={$num} and years={$years} and ptype='research_ach' ");
		$deletems = D('MapStatus');
		$return1 = $deletems->execute("delete from think_map_status where id='{$id}' and num={$num} and years={$years} and ptype='research_ach' ");
		if($return==true&&$return1==true){
			/*
			 * 删除服务器上对应的文件
			 * [注意：文件名为中文是要进行编码转化]
			 */
			// 
			$url =".".$url[0]['sup'];
			// 将编码从utf-8转化为gbk
			$url=iconv('utf-8', 'gbk', $url);
			if(file_exists($url)){
				//文件存在执行删除操作
				@unlink($url);
				$this->ajaxReturn($data);
			}else{
				$data="fail";
				$this->ajaxReturn($data);
			}
			
		}else{
			$data="fail";
			$this->ajaxReturn($data);
		}
	}else{
		cookie('login_id',null);
		$this->ajaxReturn('cookiefail');
	}
	}

	public function deleteResearchPro(){
		$id    = cookie('login_id');
	if($id != ''){

		$data = isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
		$content = explode("-", $data);
		$num = $content[0];
		$years = $content[1];
		/*
		 * 删除与项目有关的所有表中数据
		 * think_teach_ach表
		 * think_map_status表
		 */
		// 实例化TeachProModel
		$deleteta = D('ResearchPro');
		// 先拿到材料文件地址URL，为完全删除做准备
		$url = $deleteta->query("select sup from think_research_pro where num={$num} and years={$years} and ptype='research_pro' ");
		$return = $deleteta->execute("delete from think_research_pro where num={$num} and years={$years} and ptype='research_pro' ");
		$deletems = D('MapStatus');
		$return1 = $deletems->execute("delete from think_map_status where id='{$id}' and num={$num} and years={$years} and ptype='research_pro' ");
		if($return==true&&$return1==true){
			/*
			 * 删除服务器上对应的文件
			 * [注意：文件名为中文是要进行编码转化]
			 */
			// 
			$url =".".$url[0]['sup'];
			// 将编码从utf-8转化为gbk
			$url=iconv('utf-8', 'gbk', $url);
			if(file_exists($url)){
				//文件存在执行删除操作
				@unlink($url);
				$this->ajaxReturn($data);
			}else{
				$data="fail";
				$this->ajaxReturn($data);
			}
			
		}else{
			$data="fail";
			$this->ajaxReturn($data);
		}
	}else{
		cookie('login_id',null);
		$this->ajaxReturn('cookiefail');
	}
	}
	/**
     * 数据导出为.xls格式
     * @param string $fileName 导出的文件名
     * @param $expCellName     array -> 数据库字段以及字段的注释
     * @param $expTableData    Model -> 连接的数据库
     */
    public function exportExcel($fileName='table',$expCellName,$expTableData){
        $xlsTitle = iconv('utf-8', 'gb2312', $fileName);//文件名称
        $xlsName = $fileName.date("_Y.m.d_H.i.s"); //or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);

        import("Vendor.PHPExcel.PHPExcel");
        import("Vendor.PHPExcel.Writer.Excel5");
        import("Vendor.PHPExcel.IOFactory.php");

        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $fileName.'  Export time:'.date('Y-m-d H:i:s'));
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }

        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$xlsName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

} 
?>