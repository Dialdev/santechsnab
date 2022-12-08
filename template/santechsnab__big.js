$(function(){
$('.lb').lightBox();

$('.close').click(function(){
	$('.popup_bg').fadeOut().remove();
});

$('#catalog ul li.active .more_menu').addClass('active');

$('.more_menu').click(function(){
	obj=$(this).parent().find('ul');
	obj.slideToggle('slow');
	$(this).toggleClass('active');
});

$('#right').click(function(){
  if ($('.long_block').css('left')!='0px') return;
  $('.long_block').animate({'left':'-175px'},1000,function(){
    $('.long_block').css('left','0px');
    $('.long_block .special:first').detach().appendTo('.long_block');
  });  
});
$('#left').click(function(){
  if ($('.long_block').css('left')!='0px') return;
  $('.long_block').css('left','-175px');
  $('.long_block .special:last').detach().prependTo('.long_block');
  $('.long_block').animate({'left':'0px'},1000);  
});

$('.r').click(rclick);
$('.l').click(lclick);

function rclick(){
  next=$('.banner .active').fadeOut().removeClass('active').next('a');
  if (next.length) next.fadeIn().addClass('active');
  else $('.banner a:first').fadeIn().addClass('active');
}
setInterval(rclick,5000);

function lclick(){
  prev=$('.banner .active').fadeOut().removeClass('active').prev('a');
  if (prev.length) prev.fadeIn().addClass('active');
  else $('.banner a:last').fadeIn().addClass('active');
}

$('.add_to_basket').click(function(){
  data = {};
  count = $(this).parent().prev().children('.count');
  data[count.attr('data-id')] = count.val();
  count = count.val() - 0;
  $.ajax({
      type: "POST", 
      url: "ajax", 
      data: {add: 1, data: data},
      success: function(){ 
          $('.basket_message').fadeIn('fast'); 
          setTimeout(function(){$('.basket_message').fadeOut('fast');} , 1000 )
      }
  });
  $('#basket span').text( $('#basket span').text() - 0 + count );
});
$('.mass_add_to_basket').click(function(){
  data = {};
  count = 0;
  counts = $('.checkbox:checked').parent().prev().children('.count');
  if (counts.length == 0) return;
  counts.each(function(){
    data[$(this).attr('data-id')] = $(this).val();
    count = count + ($(this).val() - 0);
  });
  $.ajax({
      type: "POST", 
      url: "ajax", 
      data: {add: 1, data: data},
      success: function(){ 
          $('.basket_message').fadeIn('fast'); 
          setTimeout(function(){$('.basket_message').fadeOut('fast');} , 1000 )
      }
  });
  $('#basket span').text( $('#basket span').text() - 0 + count );
});
$('.to_basket span').click(function(){
    data = {};
    count = $(this).parent().find('input').val();
    
    data[ $(this).parent().find('input').attr('data-id')] = count;
    $.ajax({
        type: "POST", 
        url: "ajax", 
        data: {add: count, data: data},
        success: function(){ 
          $('.basket_message').fadeIn('fast'); 
          setTimeout(function(){$('.basket_message').fadeOut('fast');} , 1000 )
        }
    });
    $('#basket span').text( $('#basket span').text() - 0 + (count - 0) );
    $('#basketpopup').fadeOut();
});

$('.buy').click(function(){
    $('#basketpopup').fadeOut();
    $(this).parent().next('#basketpopup').fadeIn();
});

$('.ord_link').click(function(event){
	event.preventDefault();
	$(this).parent().find('.to_basket span').click();
	setTimeout(function(){
		location.href = '/basket.html';
	},2000);
});

$('.basketpopup_close').click(function(){
	$(this).parent().fadeOut();
})



$('#basket_table input').change(function(){
  if ($(this).val()!=0)
  {
    price = $(this).parent().next().text();
    $(this).parent().next().next().text( ($(this).val()*price).toFixed(2) );
	
	var total_sum=0;
	$('.summ_val').each(function(){
		row_summ=$(this).text();
		total_sum=row_summ*1-0+total_sum*1;
	});
	
	$('#total_summ span').text(total_sum.toFixed(2));
	
    change = $(this).val() - $(this).attr('data-value');
    $('#basket span').text( $('#basket span').text() - 0 + change );
    $(this).attr('data-value',$(this).val());
    data = {};
    data[$(this).attr('data-id')] = change;
    $.ajax({type: "POST", url: "ajax", data: {add: 1, data: data}});
  }
  else
  {
		price = $(this).parent().next().text();
		$('#basket span').text( $('#basket span').text() - $(this).attr('data-value') );
		$.ajax({type: "POST", url: "ajax", data: {remove: 1, id: $(this).attr('data-id')}});
		$(this).parent().parent().parent().parent().remove();
		var total_sum=0;
		$('.summ_val').each(function(){
			row_summ=$(this).text();
			total_sum=row_summ*1-0+total_sum*1;
		});	
		$('#total_summ span').text(total_sum.toFixed(2));
	if ($('.content').find('#basket_table').length<1){
		$('.basket_content').empty();
		$('.basket_content').html('<h2>Ваша корзина пуста.<br> Для заказа товара перейдите в <a href="katalog.html">каталог</a></h2>');
	}
 	if($('#basket_table').find('.price_val').html().trim() === ''){
      console.log(123);
  }
  }
  
});
$('#basket_table .delete').click(function(){$(this).parent().prev().prev().prev().children('input').val(0).change();});

$('.minus').click(function(){
	count=$(this).next().val();
	$(this).next().val(count-1).change();
	
});
$('.plus').click(function(){
	count=$(this).prev().val();
	$(this).prev().val(parseFloat(count)+1).change();
	
});



});



$(function() {
	$('.letter,.ask-price').click(function(){
		$('#respond').fadeIn();
		$('.black_block').fadeIn();
		if ($(this).hasClass('ask-price')) {
			item = $(this).parent().parent().find('td').eq(0).text();
			console.log(item);
			$('div#respond textarea').val('Запрос цены товара: '+item);
		}
	});
	$('.black_block,#respond .close').click(function(){
		$('#respond').fadeOut();
		$('.black_block').fadeOut();
	});	
        //if($('#respond .error').length > 0){$('.letter').click();}
        setTimeout(function(){ $('.message_success').fadeOut();},5000);

// forms
    $('.town_kontakt').first().css("display","block");
    $('.town').click(function(){
        obj=$(this);
        num=obj.index();
        obj_s=$('.town_kontakt');
        if (obj.hasClass('active')) {
        return;
        }
        else {
        $('.town').removeClass('active');
        obj.addClass('active');
        obj_s.hide();
        obj_s.eq(num).toggle();
        }
    });
$(window).bind("scroll",function(){
	  if ($(this).scrollTop()>240) {
		if (!$('#basket').hasClass('basket-fix')) $('#basket').addClass('basket-fix');
	  } else {
		if ($('#basket').hasClass('basket-fix')) $('#basket').removeClass('basket-fix');
	  }
	});	
});