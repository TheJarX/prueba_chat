'uses-strict'
console.log('succes!');

var template = '<div class="msg">'+
				'<h5>\':nick:\' dice:</h5>'+
				'<p class="msg-text" > :msg: </p>'+
				'</div>';



$(function(){

var msg = $('#msg');
var btnSend = $('#send');
var nick = $('#nick');
var ctn = $('#chat-body').find('#msg-ctn');
var btnRef = $('#refresh');

	$('body').scrollTop('900');


	msg.keyup(function(){
		if ( (msg.val()).length>150) {
			alert('Excedió los 150 caracteres!');
		}
	});

//Enviar mensaje

	btnSend.on('click',function(){
	
			if(nick.val()!=""){

				$.post('chat.php',{
					nick:nick.val(),
					msg:msg.val()})
					.done(function(){
						listar();
					})
					.fail(error=>{
						console.log(error);
					});

		}else{
				$.post('chat.php',{
					msg:msg.val()})
					.done(function(){
						listar();
					})
					.fail(error=>{
						console.log(error);
					});
		}

	});

//leer
	listar();
	

		btnRef.on('click',function(){
			listar();
		});

})//fin


function listar(){
	$('.msg').remove();
	$('.non').remove();
	$('#msg').val("");
	$('#nick').val("");
	$.get('read.php',data=>{
			var msgs=JSON.parse(data);
			var ctn=$('#chat-body').find('#msg-ctn');
			msgs.forEach(msg=>{
				var messages = template
				.replace(':nick:',msg.nick)
				//.replace(':fecha:',msg.date)
				.replace(':msg:',msg.msg);

				ctn.append($(messages));
			});
			var ctn=$('#chat-body').find('#msg-ctn');
			ctn.append('<span id="a" class="non"></span>');
			go();
	});
}