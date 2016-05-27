$(document).ready(function() {

	$('.data-table').DataTable({
		'language':{
			'url':'js/spanish.json',
    },
    responsive: true
	});

  $('#date-pagos.date').datepicker({
    format: "dd-mm-yyyy",
    endDate: "today",
    language: "es",
    autoclose: true,
    todayHighlight: true,
    enableOnReadonly: true
  });

	$('#b-login').click(function(e){
	  e.preventDefault();
	  var form = $('#form-login');
	  var action2 = form.attr('action');

    $('#form-login .alert').hide();
	  $('#form-login .b-loader').removeAttr('style');
	  $('#b-login').attr('disabled',true);
	  $.post(action2, form.serialize(),function(resp){
		  var json = JSON.parse(resp);

			if(json.result==false){
	      $('#form-login .b-loader').hide();
		  	$('#b-login').attr('disabled',false);
		  	$('#form-login .alert').removeAttr('style');
        $('#form-login .alert').show().delay(7000).hide('slow');
			}else{
        $('#form-login .alert').hide();
		  	window.location.replace('inicio.php');
			}
	  });
	});//#b-login

	$('#b-logout').click(function(){

		$.post('funciones/funciones.php',{
			action: 'logout'
		},function(resp){
			var json = JSON.parse(resp);
			if(json.result==true){
				window.location.replace('index.php');
			}

		});
	});//#b-logout

	$('#fr-b-productos').click(function(e){
	  e.preventDefault();
	  $('#fr-productos .progress').show();
    $('#fr-productos #fr-b-productos').button('loading');
    $('#fr-productos .alert').hide();

	  var form = $('#fr-productos');
	  var url  = form.attr('action');
	  var formdata = new FormData(form[0]);
    var request = new XMLHttpRequest();
	  var fields = $('input,textarea,select').filter('[required]').length;

	  $('input,textarea,select').filter('[required]').each(function(){
      var regex = $(this).attr('pattern');
      var val   = $(this).val();
      if(val == ""){
        $(this).closest('.form-group').addClass('has-error');
      }
      else{
        if(val.match(regex)){
          $(this).closest('.form-group').removeClass('has-error');
          fields = fields-1;
        }else{
       		$(this).closest('.form-group').addClass('has-error');   
        }
      }
    });

    if(fields!=0){
      $('#fr-productos .alert').removeClass('alert-success').addClass('alert-danger');
      $('#fr-productos .alert #msj').html('Debe completar todos los campos requeridos');
      $('#fr-productos .progress').hide();
      $('#fr-b-productos').button('reset');
      $('#fr-productos .alert').show().delay(7000).hide('slow');
    }else{

    	request.addEventListener('load',function(e){
        var json = JSON.parse(request.responseText);

      	if(json.result==true){
	        $('#fr-productos .alert').removeClass('alert-danger').addClass('alert-success');
	        $('#fr-productos #img-destino').attr('src',null);
	        $('#fr-productos #fr-b-reset').click();
	      }else if(json.result=="mod"){
          $('#fr-productos .alert').removeClass('alert-danger').addClass('alert-success');
        }else{
	        $('#fr-productos .alert').removeClass('alert-success').addClass('alert-danger');
	      }
          
        $('#fr-productos .progress').hide();
        $('#fr-b-productos').button('reset');
        $('#fr-productos #msj').html(json.msj);
        $('#fr-productos .alert').show().delay(7000).hide('slow');
      });
      request.open('post',url);
      request.send(formdata);
    }
	});//#fr-productos

	$('#fr-b-add-cat').click(function(e){
		e.preventDefault();
    $('#fr-b-add-cat').button('loading');
		var cat  = $('#fr-cat').val();
    var pasa = false;
    var regex = $('#fr-cat').attr('pattern');

    if(cat == ""){
      $('#fr-cat').closest('.form-group').addClass('has-error');
      pasa = false;
    }else{
      if(cat.match(regex)){
        $('#fr-cat').closest('.form-group').removeClass('has-error');
        pasa = true;
      }else{
     		$('#fr-cat').closest('.form-group').addClass('has-error');
     		pasa = false;
      }
    }

    if(!pasa){
      $('#fr-add-cat .alert').removeClass('alert-success').addClass('alert-danger');
      $('#fr-add-cat .alert #msj').html('Debe llenar el campo. Solo debe contener letras o espacios');
      $('#fr-b-add-cat').button('reset');
      $('#fr-add-cat .alert').show().delay(7000).hide('slow');
     }else{
     	$.post('funciones/funciones.php',{action:'add_cat',categ:cat},function(resp){
     		var json = JSON.parse(resp);

     		if(json.result==true){
		    	$('#fr-add-cat .alert').removeClass('alert-danger').addClass('alert-success');
		    	$('#fr-cat').val("");
		    	load_categorias();
     		}else{
		    	$('#fr-add-cat .alert').removeClass('alert-success').addClass('alert-danger');
     		}
		    $('#fr-add-cat .alert #msj').html(json.msj);
		    $('#fr-b-add-cat').button('reset');
		    $('#fr-add-cat .alert').show().delay(7000).hide('slow');
   		});
     }
	});

  $('#fr-b-registro').click(function(e){
    e.preventDefault();
    $('#fr-registro .progress').show();
    $('#fr-registro #fr-b-registro').button('loading');
    $('#fr-registro .alert').hide();
    var form = $('#fr-registro');
    var url = form.attr('action');
    var fields = $('input,textarea,select').filter('[required]').length;
    var pass = $('#pass2').val();
    var pass2 = $('#pass3').val();
    $('input,textarea,select').filter('[required]').each(function(){
      var regex = $(this).attr('pattern');
      var val   = $(this).val();
      if(val == ""){
        $(this).closest('.form-group').addClass('has-error');
      }
      else{
        if(val.match(regex)){
          $(this).closest('.form-group').removeClass('has-error');
          fields = fields-1;
        }else{
          $(this).closest('.form-group').addClass('has-error');   
        }
      }
    });

    if(fields!=0){
      $('#fr-registro .alert').removeClass('alert-success').addClass('alert-danger');
      $('#fr-registro .alert #msj').html('Debe completar todos los campos requeridos');
      $('#fr-registro .progress').hide();
      $('#fr-b-registro').button('reset');
      $('#fr-registro .alert').show().delay(7000).hide('slow');
    }else{
      if(pass == pass2){
        $.post(url, form.serialize()+'&action=add',function(resp){
          var json = JSON.parse(resp);
          if(json.result==true){
            $('#fr-registro .alert').removeClass('alert-danger').addClass('alert-success');
            $('#fr-registro #fr-b-reset').click();
          }else{
            $('#fr-registro .alert').removeClass('alert-success').addClass('alert-danger');
          }
          $('#fr-registro .progress').hide();
          $('#fr-b-registro').button('reset');
          $('#fr-registro #msj').html(json.msg);
          $('#fr-registro .alert').show().delay(7000).hide('slow');
        });
      }else{
        $('#fr-registro .alert').removeClass('alert-success').addClass('alert-danger');
        $('#fr-registro .alert #msj').html('Las constraseñas no coinciden');
        $('#fr-registro .progress').hide();
        $('#fr-b-registro').button('reset');
        $('#fr-registro .alert').show().delay(7000).hide('slow');
      }
    }
  });//#fr-b-registro

  $('#fr-modificar').click(function(e){
    e.preventDefault();
    $('#fr-modificar').button('loading');
    var form = $('#fr-registro');
    var url  = form.attr('action');
    var fields = $('input,textarea,select').filter('[required]').length;

    $('input,select').filter('[required]').each(function(){
      var regex = $(this).attr('pattern');
      var val   = $(this).val();

      if(val==""){
        $(this).closest('.form-group').addClass('has-error');
      }else{

        if(val.match(regex)){
          $(this).closest('.form-group').removeClass('has-error');
          fields = fields-1;
        }else{
          $(this).closest('.form-group').addClass('has-error');   
        }
      }
    });

    if(fields!=0){
      $('#fr-registro .alert').removeClass('alert-success').addClass('alert-danger');
      $('#fr-registro .alert #msj').html('Debe completar todos los campos requeridos');
      $('#fr-modificar').button('reset');
      $('#fr-registro .alert').show().delay(7000).hide('slow');
    }else{
      $.post(url,form.serialize(),function(resp){
      var json = JSON.parse(resp);

      if(json.result==true){
        $('#fr-registro .alert').removeClass('alert-danger').addClass('alert-success');
      }else{
        $('#fr-registro .alert').removeClass('alert-success').addClass('alert-danger');
      }

        $('#fr-registro .alert #msj').html(json.msj);
        $('#fr-modificar').button('reset');
        $('#fr-registro .alert').show().delay(7000).hide('slow');
      });
    }
  });//#fr-modificar

  $('#fd-guardar').click(function(e){
    e.preventDefault();
    $('#fd-guardar').button('loading');
    $('#fd-direcciones .progress').show();
    var form = $('#fd-direcciones');
    var url = form.attr('action');
    var fields = $('input,textarea,select').filter('[required]').length;

    $('input,textarea,select').filter('[required]').each(function(){
      var regex = $(this).attr('pattern');
      var val   = $(this).val();
      if( val == ""){
            $(this).closest('.form-group').addClass('has-error');
      }
      else{
        if(val.match(regex)){
          $(this).closest('.form-group').removeClass('has-error');
          fields = fields-1;
        }else{
        $(this).closest('.form-group').addClass('has-error');   
        }
      }
    });

    if(fields!=0){
      $('#fd-direcciones .alert').addClass('alert-danger');
      $('#fd-direcciones .alert #msj').html('Debe completar todos los campos requeridos');
      $('#fd-direcciones .progress').hide();
      $('#fd-guardar').button('reset');
      $('#fd-direcciones .alert').show().delay(7000).hide('slow');
    }else{
      $.post(url,form.serialize(),function(resp){
        var json = JSON.parse(resp);

        if(json.result==true || json.result=="mod"){
          $('#fd-direcciones .alert').removeClass('alert-danger').addClass('alert-success');
          if(json.result==true){
            $('#fd-reset').click();
          }
        }else{
          $('#fd-direcciones .alert').removeClass('alert-success').addClass('alert-danger');
        }
        $('#fd-direcciones .alert #msj').html(json.msj);
      $('#fd-direcciones .progress').hide();
      $('#fd-guardar').button('reset');
      $('#fd-direcciones .alert').show().delay(7000).hide('slow');
      });
    }
  }); // fin_registro

  $('#fr-b-stock').click(function(e){
    e.preventDefault();
    $('#fr-b-stock').button('loading');
    $('#fr-stock .progress').show();
    var form = $('#fr-stock');
    var url = form.attr('action');
    var fields = $('#fr-stock input').filter('[required]').length;

    $('#fr-stock input').filter('[required]').each(function(){
      var regex = $(this).attr('pattern');
      var val   = $(this).val();
      if(val == ""){
            $(this).closest('.form-group').addClass('has-error');
      }
      else{
        if(val.match(regex)){
          $(this).closest('.form-group').removeClass('has-error');
          fields = fields-1;
        }else{
        $(this).closest('.form-group').addClass('has-error');   
        }
      }
    });

    if(fields!=0){
      $('#fr-stock .alert').addClass('alert-danger');
      $('#fr-stock .alert #msj').html('Debe completar todos los campos requeridos');
      $('#fr-stock .progress').hide();
      $('#fr-b-stock').button('reset');
      $('#fr-stock .alert').show().delay(7000).hide('slow');
    }else{
      $.post(url,form.serialize(),function(resp){
        var json = JSON.parse(resp);

        if(json.result==true){
          $('#fr-stock .alert').removeClass('alert-danger').addClass('alert-success');
          $('#fr-stock #stock').val('');
          $('#prod_disponible').text(json.cantidad);
        }else{
          $('#fr-stock .alert').removeClass('alert-success').addClass('alert-danger');
        }
        $('#fr-stock .alert #msj').html(json.msj);
        $('#fr-stock .progress').hide();
        $('#fr-b-stock').button('reset');
        $('#fr-stock .alert').show().delay(5000).hide('slow');
      });
    }
  }); // fr-b-stock

  $('#fr-b-del-prod').click(function(e){
    e.preventDefault();
    $('#fr-b-del-prod').button('loading');
    $('#fr-del-prod .progress').show();
    var form = $('#fr-del-prod');
    var url  = form.attr('action');

    $.post(url,form.serialize(),function(resp){
      var json = JSON.parse(resp);

      if(json.result==true){
        $('#fr-del-prod .alert').removeClass('alert-danger').addClass('alert-success');
        setTimeout(function(){location.replace('?ver=productos')},1000);
      }else{
        $('#fr-del-prod .alert').removeClass('alert-success').addClass('alert-danger');
      }
      $('#fr-del-prod .progress').hide();
      $('#fr-del-prod .alert #msj').text(json.msj);
      $('#fr-b-del-prod').button('reset');
      $('#fr-del-prod .alert').show().delay(3000).hide('slow');;
    });
  });//#fr-b-del-pro

  $('#fr-b-pago').click(function(e){
    e.preventDefault();
    $('#fr-pago .progress').show();
    $('#fr-pago #fr-b-pago').button('loading');
    $('#fr-pago .alert').hide();
    var form = $('#fr-pago');
    var url = form.attr('action');
    var fields = $('input,select').filter('[required]').length;
    $('input,select').filter('[required]').each(function(){
      var regex = $(this).attr('pattern');
      var val   = $(this).val();
      if(val == ""){
        $(this).closest('.form-group').addClass('has-error');
      }
      else{
        if(val.match(regex)){
          $(this).closest('.form-group').removeClass('has-error');
          fields = fields-1;
        }else{
        $(this).closest('.form-group').addClass('has-error');   
        }
      }
    });

    if(fields!=0){
      $('#fr-pago .alert').removeClass('alert-success').addClass('alert-danger');
      $('#fr-pago .alert #msj').html('Debe completar todos los campos requeridos');
      $('#fr-pago .progress').hide();
      $('#fr-b-pago').button('reset');
      $('#fr-pago .alert').show().delay(7000).hide('slow');
    }else{
      $.post(url,form.serialize(),function(resp){
        var json = JSON.parse(resp);
        if(json.result==true){
          $('#fr-pago .alert').removeClass('alert-danger').addClass('alert-success');
          $('#fr-pago #fr-b-reset').click();
        }else{
          $('#fr-pago .alert').removeClass('alert-success').addClass('alert-danger');
        }

        $('#fr-pago .progress').hide();
        $('#fr-b-pago').button('reset');
        $('#fr-pago #msj').html(json.msg);
        $('#fr-pago .alert').show().delay(7000).hide('slow');
      });
    }
  });//#fr-b-pago

  $('#fr-b-activar').click(function(e){
    e.preventDefault();
    $('#fr-b-activar').button('loading');
    $('#fr-activar .progress').show();
    var form = $('#fr-activar');
    var url = form.attr('action');

    $.post(url,form.serialize(),function(resp){
      var json = JSON.parse(resp);

      if(json.result==true){
        $('#fr-activar .alert').removeClass('alert-danger').addClass('alert-success');
        $('#b-activar').remove();
      }else{
        $('#fr-activar .alert').removeClass('alert-success').addClass('alert-danger');
      }
      $('#fr-activar .progress').hide();
      $('#fr-activar .alert #msg').html(json.msg);
      $('#fr-b-activar').button('reset');
      $('#fr-activar .alert').show().delay(5000).hide('slow');
    });
  });//#fr-b-activar

  $('#anuncio-b-ven').click(function(e){
    e.preventDefault();
    $('#anuncio-ven .progress').show();
    $('#anuncio-ven #anuncio-b-ven').button('loading');
    $('#anuncio-ven .alert').hide();
    var form = $('#anuncio-ven');
    var url = form.attr('action');
    var fields = $('#anuncio-ven input, #anuncio-ven textarea, #anuncio-ven radio').filter('[required]').length;
    $('#anuncio-ven input, #anuncio-ven textarea, #anuncio-ven radio').filter('[required]').each(function(){
      var regex = $(this).attr('pattern');
      var val   = $(this).val();
      if(val == ""){
        $(this).closest('.form-group').addClass('has-error');
      }else{
        $(this).closest('.form-group').removeClass('has-error');
        fields = fields-1;
      }
    });

    if(fields!=0){
      $('#anuncio-ven .alert').removeClass('alert-success').addClass('alert-danger');
      $('#anuncio-ven .alert #msj').html('Debe completar todos los campos requeridos');
      $('#anuncio-ven .progress').hide();
      $('#anuncio-b-ven').button('reset');
      $('#anuncio-ven .alert').show().delay(7000).hide('slow');
    }else{
      $.post(url,form.serialize(),function(resp){
        var json = JSON.parse(resp);
        if(json.result==true){
          $('#anuncio-ven .alert').removeClass('alert-danger').addClass('alert-success');
        }else{
          $('#anuncio-ven .alert').removeClass('alert-success').addClass('alert-danger');
        }
        $('#anuncio-ven .progress').hide();
        $('#anuncio-b-ven').button('reset');
        $('#anuncio-ven #msj').html(json.msj);
        $('#anuncio-ven .alert').show().delay(7000).hide('slow');
      });
    }
  });//#anuncio-b-ven

  $('#anuncio-b-arg').click(function(e){
    e.preventDefault();
    $('#anuncio-arg .progress').show();
    $('#anuncio-arg #anuncio-b-arg').button('loading');
    $('#anuncio-arg .alert').hide();
    var form = $('#anuncio-arg');
    var url = form.attr('action');
    var fields = $('#anuncio-arg input, #anuncio-arg textarea, #anuncio-arg radio').filter('[required]').length;
    $('#anuncio-arg input, #anuncio-arg textarea, #anuncio-arg radio').filter('[required]').each(function(){
      var regex = $(this).attr('pattern');
      var val   = $(this).val();
      if(val == ""){
        $(this).closest('.form-group').addClass('has-error');
      }else{
        $(this).closest('.form-group').removeClass('has-error');
        fields = fields-1;
      }
    });

    if(fields!=0){
      $('#anuncio-arg .alert').removeClass('alert-success').addClass('alert-danger');
      $('#anuncio-arg .alert #msj').html('Debe completar todos los campos requeridos');
      $('#anuncio-arg .progress').hide();
      $('#anuncio-b-arg').button('reset');
      $('#anuncio-arg .alert').show().delay(7000).hide('slow');
    }else{
      $.post(url,form.serialize(),function(resp){
        var json = JSON.parse(resp);
        if(json.result==true){
          $('#anuncio-arg .alert').removeClass('alert-danger').addClass('alert-success');
        }else{
          $('#anuncio-arg .alert').removeClass('alert-success').addClass('alert-danger');
        }
        $('#anuncio-arg .progress').hide();
        $('#anuncio-b-arg').button('reset');
        $('#anuncio-arg .alert #msj').html(json.msj);
        $('#anuncio-arg .alert').show().delay(7000).hide('slow');
      });
    }
  });//#anuncio-b-arg




  $("#busqueda").keyup(function(){
    autocompletar();
  });

  $("#busqueda").blur(function(){
    $("#resultados").fadeOut(500);
  }).focus(function(){
    $("#resultados").show();
  });

  $('#calcular').click(function(){
    calcular();
  });

  $('#b-ajustar-precio').click(function(e){
    e.preventDefault();
    $('#ajustar-precio #b-ajustar-precio').button('loading');
    var form = $('#ajustar-precio');
    var url  = form.attr('action');
    var aumento = $('#aumento').val();

    if(aumento<0 || aumento ==""){
      $('#aumento').closest(".form-group").addClass('has-error');
    }else{
      $('#aumento').closest(".form-group").removeClass('has-error');
      $.post(url,form.serialize(),function(resp){
        var json = JSON.parse(resp);
        if(json.result==true){
          $('#aumento').val('');
          $('#busqueda').val('');
          $('#ajustar-precio .alert').removeClass('alert-danger').addClass('alert-success');
          $('#body-precio').html('<tr><td class="text-center" colspan="6">No se han agregado productos</td></tr>');
        }else{
          $('#ajustar-precio .alert').removeClass('alert-success').addClass('alert-danger');
        }
        $('#ajustar-precio .progress').hide();
        $('#b-ajustar-precio').button('reset');
        $('#ajustar-precio .alert #msj').html(json.msj);
        $('#ajustar-precio .alert').show().delay(7000).hide('slow');
      });
    }
  });//#b-ajustar-precio

  $('.numeros').keypress(function(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if(charCode > 31 && (charCode < 48 || charCode > 57)){
      return false;
    }else{
      return true;
    }
  });

  $('#banner-b-arg').click(function(e){
    e.preventDefault();
    $('#banner-arg .progress').show();
    $('#banner-arg #banner-b-arg').button('loading');
    $('#banner-arg .alert').hide();

    var form = $('#banner-arg');
    var url  = form.attr('action');
    var formdata = new FormData(form[0]);
    var request = new XMLHttpRequest();

    request.addEventListener('load',function(e){
      var json = JSON.parse(request.responseText);
      if(json.result==true){
        $('#banner-arg .alert').removeClass('alert-danger').addClass('alert-success');
      }else{
        $('#banner-arg .alert').removeClass('alert-success').addClass('alert-info');
      }
      $('#banner-arg .progress').hide();
      $('#banner-b-arg').button('reset');
      $('#banner-arg #msj').html(json.msj);
      $('#banner-arg .alert').show().delay(7000).hide('slow');
    });
    request.open('post',url);
    request.send(formdata);
  });//#banner-b-arg

  $('#banner-b-vzla').click(function(e){
    e.preventDefault();
    $('#banner-vzla .progress').show();
    $('#banner-vzla #banner-b-vzla').button('loading');
    $('#banner-vzla .alert').hide();

    var form = $('#banner-vzla');
    var url  = form.attr('action');
    var formdata = new FormData(form[0]);
    var request = new XMLHttpRequest();

    request.addEventListener('load',function(e){
      var json = JSON.parse(request.responseText);
      if(json.result==true){
        $('#banner-vzla .alert').removeClass('alert-danger').addClass('alert-success');
      }else{
        $('#banner-vzla .alert').removeClass('alert-success').addClass('alert-danger');
      }
      $('#banner-vzla .progress').hide();
      $('#banner-b-vzla').button('reset');
      $('#banner-vzla #msj').html(json.msj);
      $('#banner-vzla .alert').show().delay(7000).hide('slow');
    });
    request.open('post',url);
    request.send(formdata);
  });//#banner-b-vzla

  $('#send-mail').click(function(e){
    e.preventDefault();
    $('#mail_oferta .progress').show();
    $('#mail_oferta #send-mail').button('loading');
    $('#mail_oferta .alert').hide();
    var form = $('#mail_oferta');
    var url = form.attr('action');
    var fields = $('#mail_oferta input,#mail_oferta select,#mail_oferta textarea').filter('[required]').length;
    $('#mail_oferta input,#mail_oferta select,#mail_oferta textarea').filter('[required]').each(function(){
      var regex = $(this).attr('pattern');
      var val   = $(this).val();
      if(val == ""){
        $(this).closest('.form-group').addClass('has-error');
      }
      else{
        if(val.match(regex)){
          $(this).closest('.form-group').removeClass('has-error');
          fields = fields-1;
        }else{
        $(this).closest('.form-group').addClass('has-error');   
        }
      }
    });

    if(fields!=0){
      $('#mail_oferta .alert').removeClass('alert-success').addClass('alert-danger');
      $('#mail_oferta .alert #msj').html('Debe completar todos los campos requeridos');
      $('#mail_oferta .progress').hide();
      $('#send-mail').button('reset');
      $('#mail_oferta .alert').show().delay(7000).hide('slow');
    }else{
      $.post(url,form.serialize(),function(resp){
        var json = JSON.parse(resp);
        if(json.result==true){
          $('#mail_oferta .alert').removeClass('alert-danger').addClass('alert-success');
          $('#mail_oferta #send-mail-reset').click();
        }else{
          $('#mail_oferta .alert').removeClass('alert-success').addClass('alert-danger');
        }

        $('#mail_oferta .progress').hide();
        $('#send-mail').button('reset');
        $('#mail_oferta #msj').html(json.msg);
        $('#mail_oferta .alert').show().delay(7000).hide('slow');
      });
    }
  });//#send-mail



});//document.ready

function del_cat(id){
	$.post('funciones/funciones.php',{action:'del_cat',id:id},function(resp){
		var json = JSON.parse(resp);

		if(json.result==true){
    	$('#fr-add-cat .alert').removeClass('alert-danger').addClass('alert-success');
    	load_categorias();
 		}else{
    	$('#fr-add-cat .alert').removeClass('alert-success').addClass('alert-danger');
 		}
    $('#fr-add-cat .alert #msj').html(json.msj);
    $('#fr-add-cat .alert').show().delay(5000).hide('slow');
	});
}

function load_categorias(){
	$('#ul-categorias').html('');
	$('#in-edit-cats').html('');
	var id = $('#fr-productos #id_prod').val();
	$('#loading').show();
	$.post('funciones/funciones.php',{action:'load-cats',id:id},function(resp){
	  var json = JSON.parse(resp);
	  $('#ul-categorias').html(json.ul);
	  $('#in-edit-cats').html(json.edit);
	  $('#loading').hide();
	});
}

function autocompletar(){
  var MIN = 2;
  var keyword = $("#busqueda").val();
  if (keyword.length >= MIN) {
    $.post("../funciones/metodos_productos.php",{
      action:'busqueda',
      busqueda:keyword
    }).done(function(data){
      $('#resultados-box').html('');
      var json = JSON.parse(data);
      if(json.result==true){
        $('#resultados').attr('style','box-shadow: 0 3px 4px 3px rgba(0, 0, 0, .5);');
        $('#resultados-box').append(json.li);
        $("#resultados").show();

        $('#resultados-box .result-item').click(function(){
          addRows(this);
        });
      }
    });
  }else{
    $('#resultados-box').html('');
    $('#resultados').hide();
  }
}

function addRows(prod){
  var rows = parseInt($('#body-precio').attr('prows'));
  var producto = $(prod);
  var porcentaje = $('#aumento').val();
  if(porcentaje>0){
    porcentaje = porcentaje/100;
  }else{porcentaje=0;}
  var precio = producto.attr("precio");
  var nombre = producto.html();
  var referencia = producto.attr("ref");
  var aumento = parseFloat(precio)*porcentaje;
  var nuevo = parseFloat(precio)+parseFloat(aumento);
  var prod = producto.attr("prod");
  if(rows==0){
    $('#body-precio').html('');
  }
  rows = rows+1;
  $('#body-precio').attr('prows',rows);
  $('#body-precio').append(
    '<tr id="'+rows+'"><td class="text-center"><button class="btn btn-danger btn-sm" type="button" onclick="delRow(this)" title="Eliminar" style="padding:5px;font-size:16px;line-height:0;"><i class="fa fa-times-circle" aria-hidden="true"></i></button></td>'+
    '<td><input type="hidden" name="productos[]" value="'+prod+'">'+referencia+'</td>'+
    '<td>'+nombre+'</td>'+
    '<td id="p'+rows+'"  class="text-right">'+precio+'</td>'+
    '<td id="a'+rows+'" class="text-right">'+aumento+'</td>'+
    '<td id="n'+rows+'" class="text-right">'+nuevo+'</td>'+
    '</tr>');
}

function delRow(row){ 
  var rows = parseInt($('#body-precio').attr('prows'));
  rows = rows-1;
  $(row).closest('tr').remove();
  $('#body-precio').attr('prows',rows);
  if(rows==0){
    $('#body-precio').append('<tr><td class="text-center" colspan="6">No se han agregado productos</td></tr>');
  }
}

function calcular(){
  var porcentaje = $('#aumento').val();
  if(porcentaje<=0){porcentaje=0;}
  porcentaje = parseFloat(porcentaje)/100;
  $('#body-precio tr').each(function(){
    var id = $(this).attr('id');
    var aumento = parseFloat($('#p'+id).html())*porcentaje;
    $('#a'+id).html(aumento);
    $('#n'+id).html(parseFloat($('#p'+id).html())+aumento);
  });
}