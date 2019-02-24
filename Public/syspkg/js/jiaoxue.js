	// $(function(){
	// 	var g_table = $("#pass");
	// 	var init_data_url = "data.php?action=init_data_list_pass";
	// 	$.get(init_data_url,{  
 //                //从第几条开始请求；  
 //                "start" : 0,  
 //                //请求多少条数据  
 //                "count" : 10  
 //            }, function(data){
	// 		var row_items = $.parseJSON(data);
	// 		var total_row = data.total.length;	
	// 		var total_page = total_row/5;

	// 		for(var i = 0 , j = total_row ; i < j ; i++){
	// 			var data_dom = create_row(row_items[i]);
	// 			g_table.append(data_dom);
	// 		}
	// 	},jsonp);

	// 	function create_row(data_item) {
	// 		var row_obj = $("<tr></tr>")
	// 		for (var k in data_item)
	// 		{
	// 			if("id"!=k){
	// 			var col_td = $("<td></td>")
	// 			col_td.html(data_item[k])
	// 			row_obj.append(col_td);
	// 			}
	// 		}
	// 		return row_obj;
	// 	}
	// });
 $('a.bianji').on('click', function(){
    layer.msg('hello');
  });
	$(a.bianji).click(function(){
		layer.confirm('您是如何看待前端开发？', {
  btn: ['重要','奇葩'] //按钮
}, function(){
  layer.msg('的确很重要', {icon: 1});
}, function(){
  layer.msg('也可以这样', {
    time: 20000, //20s后自动关闭
    btn: ['明白了', '知道了']
  });
});
	})