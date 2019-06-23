$(document).ready(function(){
	var nRow = '';
		$('#add_btn').click(function(){
		for(nRow=1; nRow > 8; nRow++);
		id = 'frm'+nRow;
		$('#nline').after("<tr id='+id+'><td><input type='text' style='width:30px;'></td>,<td><input type='text'></td>,<td><input type='text'style='width:60px;'></td><td><input type='text' style='width:30px;'></td><td><input type='text'></td><td><input type='text'></td><td><input type='text'style='width:60px;'></td><td><input type='text' style='width:60px;'></td></tr>");
});
		$('#remove_btn').click(function(){
		var dis = '#frm'+nRow;
		$(dis).remove();
		nRow = nRow - 1;


	});


		$('#flip1').click(function(){
			$('#flip1').replaceWith($('#flip2'));

		});

		$("#cust_nam").select2( {
			placeholder:"Search for customer",
			allowClear: true
	});
		$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
});

