$(function(){
	$(window).scroll(function () {
		if ($(this).scrollTop()>400) {
			$('#move_up').fadeIn();
		} else {
			$('#move_up').fadeOut(400);
		}
	});
    $('#move_up').click(function () {
		$('body,html').animate({scrollTop: 0}, 800);
		return false;
	});
	
	$(function() {
  var d = function() {};
  $(document).delegate(".b-ball_bounce", "mouseenter", function() {
    b(this);
    m(this)
  }).delegate(".b-ball_bounce .b-ball__right", "mouseenter", function(i) {
    i.stopPropagation();
    b(this);
    m(this)
  });

  function f() {
    var i = "ny2012.swf";
    i = i + "?nc=" + (new Date().getTime());
    swfobject.embedSWF(i, "z-audio__player", "1", "1", "9.0.0", null, {}, {
      allowScriptAccess: "always",
      hasPriority: "true"
    })
  }

  function h(i) {
    if ($.browser.msie) {
      return window[i]
    } else {
      return document[i]
    }
  }
  window.flashInited = function() {
    d = function(j) {
      try {
        h("z-audio__player").playSound(j)
      } catch (i) {}
    }
  };
  if (window.swfobject) {
    window.setTimeout(function() {
      $("body").append('<div class="g-invisible"><div id="z-audio__player"></div></div>');
      f()
    }, 100)
  }
  var l = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "-", "=", "q", "w", "e", "r", "t", "y", "u", "i", "o", "p", "[", "]", "a", "s", "d", "f", "g", "h", "j", "k", "l", ";", "'", "\\"];
  var k = ["z", "x", "c", "v", "b", "n", "m", ",", ".", "/"];
  var g = 36;
  var a = {};
  for (var e = 0, c = l.length; e < c; e++) {
    a[l[e].charCodeAt(0)] = e
  }
  for (var e = 0, c = k.length; e < c; e++) {
    a[k[e].charCodeAt(0)] = e
  }
  $(document).keypress(function(j) {
    var i = $(j.target);
    if (!i.is("input") && j.which in a) {
      d(a[j.which])
    }
  });

  function b(n) {
    if (n.className.indexOf("b-ball__right") > -1) {
      n = n.parentNode
    }
    var i = /b-ball_n(\d+)/.exec(n.className);
    var j = /b-head-decor__inner_n(\d+)/.exec(n.parentNode.className);
    if (i && j) {
      i = parseInt(i[1], 10) - 1;
      j = parseInt(j[1], 10) - 1;
      d((i + j * 9) % g)
    }
  }

  function m(j) {
    var i = $(j);
    if (j.className.indexOf(" bounce") > -1) {
      return
    }
    i.addClass("bounce");

    function n() {
      i.removeClass("bounce").addClass("bounce1");

      function o() {
        i.removeClass("bounce1").addClass("bounce2");

        function p() {
          i.removeClass("bounce2").addClass("bounce3");

          function q() {
            i.removeClass("bounce3")
          }
          setTimeout(q, 300)
        }
        setTimeout(p, 300)
      }
      setTimeout(o, 300)
    }
    setTimeout(n, 300)
  }
});

  //input в привью карточки товара - начало
  /*$(".product-quantity__minus").click(function() {
    var a = $(this).next(), d = a.data("ratio"), e = parseInt(a.val()) - d;
    e < d && (e = d);
    a.val(e);
    c(e);
  });*/
  $(".product-quantity__input").change(function() {
    var a = parseInt($(this).val()), d = $(this).data("ratio");
    if (a < d || isNaN(a)) {
      a = d;
    }
    0 != a % d && (a = (Math.floor(a / d) + 1) * d);
    $(this).val(a);
    c(a);
  });
  /*$(".product-quantity__plus").click(function() {
    var a = $(this).prev(), d = a.data("ratio");
    d = parseInt(a.val()) + d;
    a.val(d);
    c(d);
  });*/
  $( "body" ).on( "click", ".product-quantity__minus", function() {
 
    var a = $(this).next(), d = a.data("ratio"), e = parseInt(a.val()) - d;
    e < d && (e = d);
    a.val(e);
    c(e);
  });
  /*$(".product-quantity__input").change(function() {
    var a = parseInt($(this).val()), d = $(this).data("ratio");
    if (a < d || isNaN(a)) {
      a = d;
    }
    0 != a % d && (a = (Math.floor(a / d) + 1) * d);
    $(this).val(a);
    c(a);
  });*/
  $( "body" ).on( "click", ".product-quantity__plus", function() {
    var a = $(this).prev(), d = a.data("ratio");
    d = parseInt(a.val()) + d;
    a.val(d);
    c(d);
  });
  //input в привью карточки товара - окончание

  $( "body" ).on( "submit", ".modal.map-feedback", function() {
    var trackerName = ga.getAll()[0].get('name');
    ga(trackerName + '.send', 'event', 'sendmail', 'click'); // не известно название цели

  });

  $( "body" ).on( "submit", ".header-feedback__modal", function() {
    var trackerName = ga.getAll()[0].get('name');
    ga(trackerName + '.send', 'event', 'callback', 'click'); // не известно название цели
  });

  $( "body" ).on( "click", ".catalog_section__buy_btn", function() {
    // var trackerName = ga.getAll()[0].get('name');
    //ga(trackerName + '.send', 'event', 'tobasket', 'click'); // не известно название цели
  });
  $(".input__phone").inputmask("+7 (999) 999-99-99");

});



$(function(){
//   $('#find').click(function(event) {
//   if ($(event.target).closest(".header__phone").length) return;
//   $(".header__phone").hide('fast');
//   event.stopPropagation();
//  });
  $('#find').on('focus', function() {
      $(".header__phone").addClass('hide');
    
  });
  $('#find').on('blur', function() {
      $(".header__phone").removeClass('hide');
    
  });
});
























