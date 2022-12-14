// адрес нашего списка ресурсов (где идет вывод getResources)
var uri = '/katalog-ajax.html?';
var $min_price;
var $max_price;
var max_cost = $('.maxCost').val();
var min_cost = $('.minCost').val();

$(document).ready(function () {
  // загружаем начальный блок
  loadCatalog(0, 1);
  ;

  // клик на кнопку "Еще"
  $('#more').on('click', function () {
    var showPage = $(this).data('show');
    //console.log(showPage);
    var preloadPage = parseInt(showPage) + 1;
    //console.log(preloadPage);
    loadCatalog(showPage, preloadPage);
    //$('#more').data('show', showPage);
  });
  //Сортировка
  $('.sort button').on('click', function () {
    $('.sort button').removeClass('active');
    $(this).addClass('active');
    uri = setAttr('sortby', $(this).data('sort'));
    uri = setAttr('sortdir', $(this).data('sortdir'));
    $('#catalog_ajax').html('');
    loadCatalog(0, 1);
    return false;
  });
  //Количество для показа
  $('.limit button').on('click', function () {
    $('.limit button').removeClass('active');
    $(this).addClass('active');
    uri = setAttr('limit', $(this).data('limit'));

    //uri = setAttr('sortdir', $(this).data('sortdir'));
    $('#catalog_ajax').html('');
    loadCatalog(0, 1);
    return false;
  });
  //Обработка фильтра
  $(document).on("click", ".catalog_ajax_filter_submit span", function (event) {
    filter();
  });
  $(document).on("keyup", ".maxCost", function (event) {
    setTimeout(filter, 3000);
  });

  //Бегунки Цены
  var $node = $('.slider').css({ 'width': 300, margin: 20 });

  var $input = $node.find('input');
  var min, max;
  
  // var max_data_val = $('.maxCost').val();
  // console.log(max_data_val);
  // $('#foo').data('max', max_data_val);

  //console.log($input);
  //console.log($max_price);
  $input.keyup(_.debounce(function (e) {
    $(e.target).change();
  }, 100));

  // update event for case when user need to change the values from R - he call js code that
  // will change values and/or data attributes and call node.trigger('update');

  $node.on('update', function () {
    
    updateBoundaries();
    $slider.slider('option', 'max', max);
    $slider.slider('option', 'min', min);
    // handle out if range values
    if ($input.length == 1) {
      var value = +$input.val();

      if (value < min) {
        $input.val(min);
      } else if (value > max) {
        $input.val(max);
      }
    } else {
      var $from = $input.eq(0);
      var $to = $input.eq(1);
      var range = [+$from.val(), +$to.val()];

      if (range[0] < min || range[0] > max) {
        $from.val(min);
      }
      if (range[1] < min || range[1] > max) {
        $to.val(max);
      }
    }
    // we trigger change on first input because both inputs have the same event and
    // it will also work when there is one input
    $input.eq(0).change();
  });

  function updateBoundaries() {
    min = +$node.data('min');
    //max = +$node.data('max');
    max = $('.maxCost').val();
    
    //var max_val = $('.maxCost').val();
    //var min_val = $('.minCost').val();

    if (isNaN(min)) {
      //min = 10;
      //***********************************
      min = 0;
      //console.log(min);
    }
    if (isNaN(max)) {
      max = $max_price;
    }
  }

  updateBoundaries();

  var $slider;
  if ($input.length == 1) {
    $input.change(function () {
      var value = +$input.val();
      $slider.slider('option', 'value', value);
      setProps(value);
      $node.trigger('change');
    });
    var value = +$input.val();
    $slider = $node.find('.ui').slider({
      min: min,
      max: max,
      step: 1,
      value: value,
      slide: function (event, ui) {
        $input.val(ui.value);
        setProps(ui.value);
        $node.trigger('change');
      }
    });
    setProps(value);
  } else {
    $node.addClass('range');
    var $from = $node.find('.from input');
    var $to = $node.find('.to input');
    var range = [+$from.val(), +$to.val()];
    $input.change(function () {
      var range = [+$from.val(), +$to.val()];
      $slider.slider('option', 'values', range);
      setProps(range);
      $node.trigger('change');
    });

    $slider = $node.find('.ui').slider({
      min: min,
      max: max,
      step: 1,
      values: range,
      slide: function (event, ui) {
        $from.val(ui.values[0]);
        $to.val(ui.values[1]);
        setProps(ui.values);
        $node.trigger('change');
      }
    });
    setProps(range);
  }

  function percent(value) {
    return ((value - min) * 100) / (max - min);
  }
  function setProps(value) {
    if (value instanceof Array) {
      var from = Math.min.apply(Math, value);
      var to = Math.max.apply(Math, value);
      // css variables aka custom properties are used to render background
      // between slider handlers
      $slider[0].style.setProperty("--from", percent(from));
      $slider[0].style.setProperty("--to", percent(to));
      var minRange = +$node.data('min-range');
      if (isNaN(minRange)) {
        $node.toggleClass('error', value[1] <= value[0]);
      } else {
        $node.toggleClass('error', value[1] - value[0] <= minRange);
      }
    } else {
      $slider[0].style.setProperty("--to", (value / max) * 100);
    }
  }
  
  //console.log(max_cost);
  //$('.labels .max').append(max_cost);
    //var min_val = $('.minCost').val();
  updateSlider('foo', { values: [10, 3000]})


});

function updateSlider(id, data) {
  var node = $('#' + id);
  if (data.max != undefined) {
    node.attr('data-max', data.max);
  }
  if (data.min != undefined) {
    node.attr('data-min', data.min);
  }
  if (data.values != undefined && data.values.length) {
    var inputs = node.find('input');

    data.values.forEach(function (value, i) {
      inputs.eq(i).val(value);
    });
  }
  if (data.boundaryLabels != undefined) {
    node.find('.min').text(data.boundaryLabels[0]);
    node.find('.max').text(data.boundaryLabels[1]);
  } else {
    if (data.max != undefined) {
      node.find('.max').text(data.max);
    }
    if (data.min != undefined) {
      node.find('.min').text(data.min);
    }
  }
  node.trigger('update');
}

function filter() {

  var value = '';
  var minCost;
  var maxCost;
  minCost = $('.minCost').val();
  maxCost = $('.maxCost').val();

  if (minCost !== '') {
    value = minCost + '|' + maxCost;
    //console.log(value);
    uri = setAttr("price", value);
    $('#catalog_ajax').html('');
    loadCatalog(0, 1);
    return false;
  } else {
    $('.minCost').css('border', '1px solid red');
    //alert('Введите значение цены "от"');
  }
  $('body').on("change", '.minCost', function (event) {
    setTimeout(filter, 3000);
    die();
  });

}

function setAttr(prmName, val) {
  var res = '';
  var d = uri.split("?");
  var base = d[0];
  var query = d[1];
  if (query) {
    var params = query.split("&");
    for (var i = 0; i < params.length; i++) {
      var keyval = params[i].split("=");
      if (keyval[0] != prmName) {
        res += params[i] + '&';
      }
    }
  }
  if (val !== '') res += prmName + '=' + val;
  return base + '?' + res;
}
function loadCatalog(showPage, preloadPage) {
  // скрываем кнопку "Еще"
  $('#more').hide();

  // показываем блок с ранее загруженным контентом и прокручиваем к нему
  if (showPage !== 0) {
    $('#page' + showPage).show('slow');
    $('html,body').animate({ scrollTop: $('#page' + showPage).offset().top - 100 }, 1000);
  }

  // создаем блок под новую загрузку
  $('#catalog_ajax').append('<div id="page' + preloadPage + '"></div>');

  //uri = uri + 'page=' + preloadPage + '&';
  uri = setAttr('page', preloadPage);
  var cur_sec = $('#catalog_ajax').data('cur_sec');

  // загружаем ajax-ом контент следующей страницы, но не показываем его
  $.ajax({
    url: uri,
    cache: false,
    data: { 'type': cur_sec },
    success: function (html) {
      if (html !== '') {
        $('#more').data('show', preloadPage);
        $('#more').show();
        $('#page' + preloadPage).hide();
        $('#page' + preloadPage).html(html);
        if (preloadPage == 1) loadCatalog(1, 2);


      }
    }
  });

  $min_price = $('.data-price').filter(':first').data('min');
  
  $.ajax({
    url: '/katalog-ajax.html?sortby=price&sortdir=desc&page=1',
    cache: false,
    data: {'type' : cur_sec},
    success: function (html) {
        if (html !== '') {
            $('.price_block').html(html);
        }
    }
  });
  $max_price = $('.price_block .catalog_section__price .data-price').filter(':first').data('min');
  //console.log(max_price)
  //console.log(uri);
  
  $('.minCost').val($min_price);
  //$('.minCost').val(0);
  //************************************************
  $('.maxCost').val($max_price);


  // var $node = $('.slider').css({ 'width': 300, margin: 20 });

  // var $input = $node.find('input');
  // $input.change();
}
