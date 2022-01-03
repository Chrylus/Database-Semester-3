$(function(){
	var owl = $('.owl-carousel');
	owl.owlCarousel({
		items:1,
		nav:true,
		navText: ["<i class='ion-chevron-left'></i><span class='itemSlideStatus'></span>","<i class='ion-chevron-right'></i>"],
		onInitialized  : counter, 
		onTranslated : counter
	});

	function counter(event) {
		var element   = event.target;       
		var items     = event.item.count;   
		var item      = event.item.index + 1;   
		$('.itemSlideStatus').html(item+" of "+items)
	}
});
$('#lampiran').change(function() {
	var html =  '<ul style="list-style-type:none">';
	var files = $('#lampiran').prop("files");

	var names = $.map(files, function(val) {
		return val.name;
	});
	for (var i =0; i <names.length; i++) {
		html+='<li>'+names[i]+' </li>';
	}
	html+='</ul>';
	$('#file-upload').html(html);
});


$(document).ready(function() {
	$('.nav-tabs').on('shown.bs.tab', 'a', function(e) {
		console.log(e.relatedTarget);
		if (e.relatedTarget) {
			$(e.relatedTarget).removeClass('active');
		}
	}); 
	CKEDITOR.replaceClass = 'ckeditor';   
	var win_height = $(window).height();
	var nav_height = $("#top-nav").outerHeight();
	var footer_height = $("footer").outerHeight();
	var content_height = win_height-(nav_height+footer_height);
	$("body").css({"padding-top":nav_height+"px"});
	$(".page-tentang .container, .page-penjelasan .container, .page-saranPengaduanShow .container, .page-profile .container, .page-saranPengaduanAdd .container").css({'min-height': content_height+"px"});
	pendaftaran();
	// reply();
	// lupapass();
});

function reply(){
	document.getElementById('beri').style.display = 'none';
	document.getElementById('reply').style.display = '';
}

$('#confirm_pass').on('keyup', function () {
	if ($('#new_pass').val() == "" && $('#confirm_pass').val() == "") {
		$('#message').html('');
	}else if ($('#new_pass').val() == $('#confirm_pass').val()) {
		$('#message').html('<small><b>Matching</b></small>').css('color', 'green');
	} else if($('#new_pass').val() != $('#confirm_pass').val()){
	$('#message').html('<small><b>Not Matching</b></small>').css('color', 'red');
	}
});

$('#input-password').on('keyup', function () {
	if ($.trim($('#input-password').val()).length > 0 && $.trim($('#input-password').val()).length < 8) {
		$('#message2').html('<small>Password Minimal 8 Karakter </small>').css('color', 'red');
	}else{
		$('#message2').html('');
	}
});

$('#no_id').on('keyup', function () {
	if ($.trim($('#no_id').val()).length > 0 && $.trim($('#no_id').val()).length < 12) {
		document.getElementById('input-no_id2').style.display = '';
		document.getElementById('input-no_id').style.display = '';
	}else{
		document.getElementById('input-no_id').style.display = 'none';
		document.getElementById('input-no_id2').style.display = 'none';
	}
});

$('#phone').on('keyup', function () {
	if ($.trim($('#phone').val()).length > 0 && $.trim($('#phone').val()).length < 10) {
		document.getElementById('input-telp2').style.display = '';
		document.getElementById('input-telp').style.display = '';
	}else{
		document.getElementById('input-telp').style.display = 'none';
		document.getElementById('input-telp2').style.display = 'none';
	}
});

$('#add-one').click(function(){
	$('#lampiran').first().clone().appendTo('.dynamic-stuff').show();
	attach_delete();
});

//Attach functionality to delete buttons
function attach_delete(){
	$('.delete').off();
	$('.delete').click(function(){
		console.log("click");
		$(this).closest('#lampiran').remove();
	});
}

$('#pekerjaan').on('click', function(){
	var pekerjaan = $(this).val();
	if (pekerjaan == 'PK00013') {
		document.getElementById('input-pekerja').style.display = '';
		document.getElementById('input-pekerja2').style.display = '';
	}else{
		document.getElementById('input-pekerja').style.display = 'none';
		document.getElementById('input-pekerja2').style.display = 'none';
	}
});

$("#show").click(function () {
	if ($("#input-password").attr("type")=="password") {
		$("#input-password").attr("type", "text");
	}else{
		$("#input-password").attr("type", "password");
	}
});

 $(function () {
	 $('[data-toggle="tooltip"]').tooltip()
 });

function lupapass(){
	$("#lupapassword").modal();
}
function deletelaporan(){
	$("#myModal2").modal();
}


function pendaftaran(){
	var nama_belakang = $('#registrasi input[name="nama_belakang"]').val();
	var nama_depan 	  = $('#registrasi input[name="nama_depan"]').val();
	var email = $('#registrasi input[name="email"]').val();
	var password = $('#registrasi input[name="password"]').val();
	// var x = $('#registrasi input[name="email"]').val();;
	// var atpos = x.indexOf("@");
	// var dotpos = x.lastIndexOf(".");
	var bool_namdep = 'TRUE';
	var bool_nambel = 'TRUE';
	var bool_email = 'TRUE';
	var bool_pass = 'TRUE';

	if (nama_depan == '') {
		// $("#alert-namdep").modal();
		bool_namdep = 'false';
	}else if (nama_belakang == '') {
		// $("#alert-namdep").modal();
		bool_nambel = 'false';
	}else if(email == ''){
		// $("#alert-namdep").modal();
		bool_email = 'false';
	}else if(!validateEmail(email)){
		// $("#alert-email").modal();
		bool_email = 'false';
	}else if(password == '' && password <8){
		// $("#alert-namdep").modal();
		bool_pass = 'false';
	}
	if ( bool_namdep == 'TRUE' && bool_nambel == 'TRUE' && bool_email=='TRUE' && bool_pass=='TRUE') {
		var post = {
			'nama_depan': nama_depan,
			'nama_belakang' : nama_belakang,
			'email' : email,
			'password' : password
		};
		var target = "https://pengaduan.pu.go.id/page/ajax_registrasi";
		$.post(target, post,function(response){
			$("#confirmasi").modal();
		});
	}
	
}

function validateEmail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}
function get_file() {
	$('#lampiran').val();
}
function aduan() {
	document.forms("#aduan").submit();
}
$('#confirmApprove').click(function () { 
	$("#myModal2").modal();
	$('form').submit();
});
function Rating(){
	$("#rating").modal();
}

function Addwork(){
	$("#addwork").modal();
}

$(function(){
	$(".datepicker").datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true,
		todayHighlight: true,
	});
});

