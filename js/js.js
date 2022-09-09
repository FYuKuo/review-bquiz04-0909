// JavaScript Document
function lof(x)
{
	location.href=x
}

function del(id,table)
{
	$.post('./api/del.php',{id,table},()=>{
		location.reload();
	})
}

function sh(id,sh,table)
{
	$.post('./api/sh.php',{id,sh,table},()=>{
		location.reload();
	})
}

function get_mid(){
	$('#mid').load('./api/get_mid.php',{big:$('#big').val()});
}

function get_big(){
	$('#bigtype').load('./api/get_big.php');
}