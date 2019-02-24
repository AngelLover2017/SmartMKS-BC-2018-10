<?php
	
/*
 * phpexcel 过程封装
 */

/*
 * importPkg
 * 导入PHPExcel
 */
function importPkg(){
	import("Vendor.PHPExcel.PHPExcel");
	import("Vendor.PHPExcel.PHPExcel.IOFactory");
	import("Vendor.PHPExcel.PHPExcel.Writer.Excel2007");
	import("Vendor.PHPExcel.PHPExcel.Writer.Excel5");
}

/*
 * recode
 * 使用urlencode对文件名进行重新编码
 */
function recode($filename){
	 $ua = $_SERVER['HTTP_USER_AGENT'];
	    $ua = strtolower($ua);
	    if(preg_match('/msie/', $ua) || preg_match('/edge/', $ua)) { //判断是否为IE或Edge浏览器
	    $filename = str_replace('+', '%20', urlencode($filename)); //使用urlencode对文件名进行重新编码
	}
	return $filename;
}
/*
 * setProp
 * 设置表属性
 */
function setProp($excel){
		//设置excel 的属性
	    $excel->getProperties()->setCreator("wisdommrix")
	                           ->setLastModifiedBy("wisdommrix")
	                           ->setTitle("PHPexcel")
	                           ->setDescription("无")
	                           ->setCategory("years tables");
}
/*
 * exportExcel
 * $filename 文件名
 * $excel    PHPExcel对象
 */
function exportExcel($filename , $excel){
	//导出表
	header('Content-Type: application/vnd.ms-excel;');
	header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
	header('Cache-Control: max-age=0');
	//清除缓存区
	ob_end_clean();
	       
	$excelwriter = \PHPExcel_IOFactory::createWriter($excel , 'Excel5');
	$excelwriter->save('php://output');
}
?>