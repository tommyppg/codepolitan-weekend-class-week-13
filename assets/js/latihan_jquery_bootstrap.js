//contoh event click
$('#btn_click').click(function(){
	alert("Tombol berhasil di klik!");
});

//contoh event double click
$('#btn_double_click').dblclick(function(){
	alert("Tombol berhasil di double klik!");
});

//contoh event change
$('select[name=gender]').change(function(){
	//get value dari this selector
	var gender = $(this).val();

	//condition
	if(gender == "L"){
		$('#motor_input').show();
		$('#makeup_input').hide();

		$('#modal_jquery').modal('show');
	}else if(gender == "P"){
		$('#motor_input').hide();
		$('#makeup_input').show();
	}else{
		$('#motor_input').hide();
		$('#makeup_input').hide();
	}
});

//contoh modal dengan jquery
$('#btn_modal_jquery').click(function(){
	$('#modal_jquery').modal('show');
});