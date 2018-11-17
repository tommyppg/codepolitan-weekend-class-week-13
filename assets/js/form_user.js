$('#form_user').submit(function(element){
	$.ajax({
		url: "http://localhost/latihan_ci/index.php/user/process",
		data: $('#form_user').serialize(),
		method: "POST",
		dataType: "json",
		beforeSend: function(){
			//disable tombol submit
			$('#btn_submit').prop('disabled', true);

			//ganti text simpan menjadi loading
			$('#btn_submit').html("Loading...");
		},
		success: function(result){
			//print hasil json di console
			console.log(result);

			//baca kondisi json
			if(result.status == true){
				alert(result.message);
				window.location.href = "http://localhost/latihan_ci/index.php/user";
			}else{
				alert(result.message);
			}

			//enable tombol submit
			$('#btn_submit').prop('disabled', false);
			
			//ganti text loading menjadi simpan
			$('#btn_submit').html("Simpan");
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert("Koneksi gagal!");
		}
	});

	//menghentikan aktivitas default dari element. contohnya menghentikan proses redirect pada formulir
	element.preventDefault();
})