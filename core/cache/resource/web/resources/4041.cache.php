<?php  return array (
  'resourceClass' => 'modDocument',
  'resource' => 
  array (
    'id' => 4041,
    'type' => 'document',
    'contentType' => 'text/html',
    'pagetitle' => 'Каталог ajax',
    'longtitle' => '',
    'description' => '',
    'alias' => 'katalog-ajax',
    'link_attributes' => '',
    'published' => 1,
    'pub_date' => 0,
    'unpub_date' => 0,
    'parent' => 0,
    'isfolder' => 0,
    'introtext' => '',
    'content' => '',
    'richtext' => 0,
    'template' => 8,
    'menuindex' => 18,
    'searchable' => 0,
    'cacheable' => 1,
    'createdby' => 2,
    'createdon' => 1561654550,
    'editedby' => 1,
    'editedon' => 1571823633,
    'deleted' => 0,
    'deletedon' => 0,
    'deletedby' => 0,
    'publishedon' => 1561654500,
    'publishedby' => 2,
    'menutitle' => '',
    'donthit' => 0,
    'privateweb' => 0,
    'privatemgr' => 0,
    'content_dispo' => 0,
    'hidemenu' => 1,
    'class_key' => 'modDocument',
    'context_key' => 'web',
    'content_type' => 1,
    'uri' => 'katalog-ajax/',
    'uri_override' => 0,
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'properties' => '{"autoredirector":{"old_uri":"katalog-ajax\\/"}}',
    'image' => 
    array (
      0 => 'image',
      1 => 'assets/images/bez_kartin.jpg',
      2 => 'default',
      3 => NULL,
      4 => 'image',
    ),
    'SEOdescription' => 
    array (
      0 => 'SEOdescription',
      1 => '',
      2 => 'default',
      3 => NULL,
      4 => 'text',
    ),
    'Keywords' => 
    array (
      0 => 'Keywords',
      1 => '',
      2 => 'default',
      3 => NULL,
      4 => 'text',
    ),
    'img_banner_catalog' => 
    array (
      0 => 'img_banner_catalog',
      1 => '',
      2 => 'default',
      3 => NULL,
      4 => 'image',
    ),
    'test' => 
    array (
      0 => 'test',
      1 => '',
      2 => 'default',
      3 => NULL,
      4 => 'text',
    ),
    '_content' => '<!-- <table id="all_items" border="1" cellspacing="0" cellpadding="3">-->
<!--	<tbody>-->
<!--    	<tr>-->
<!--    		<td><center>Наименование</center></td>-->
<!--    		<td>Ед.изм.</td>				-->
<!--    		<td>Цена</td>-->
<!--    		<td>Кол-во</td>-->
<!--<td>Добавить</td>-->
<!--    	</tr>-->
  
[[!getPage@catalogPaging? 
&elementClass=`modSnippet` 
&element=`getResources`
&limit=`[[!catalog_ajax_limit]]`
&includeTVs=`image,detail_page,price,edinica_meri`
&parents=`[[!get_cur_sec]]`
&hideContainers=`1`
&tpl=`catalog_ajax_tpl`
&includeTVs=`1` 
&sortby=`[[!sort]]` 
&sortbyTV=`[[!sortbyTV]]` 
&sortdirTV=`[[!sortdirTV]]` 
&sortbyTVType=`integer` 
&tvFilters=`[[!filter]]`
&pageNavVar=`page.nav`
]] 
<div class="wp-pagenavi pagen_test" style="display:none;">
    <!--<span class="pages">Page [[+page]] of [[+pageCount]]</span>-->
[[!+page.nav]]
</div>
',
    '_isForward' => false,
  ),
  'contentType' => 
  array (
    'id' => 1,
    'name' => 'HTML',
    'description' => 'HTML content',
    'mime_type' => 'text/html',
    'file_extensions' => '/',
    'headers' => 'a:0:{}',
    'binary' => 0,
  ),
  'policyCache' => 
  array (
  ),
  'elementCache' => 
  array (
    '[[$catalog_ajax]]' => '<!-- <table id="all_items" border="1" cellspacing="0" cellpadding="3">-->
<!--	<tbody>-->
<!--    	<tr>-->
<!--    		<td><center>Наименование</center></td>-->
<!--    		<td>Ед.изм.</td>				-->
<!--    		<td>Цена</td>-->
<!--    		<td>Кол-во</td>-->
<!--<td>Добавить</td>-->
<!--    	</tr>-->
  
[[!getPage@catalogPaging? 
&elementClass=`modSnippet` 
&element=`getResources`
&limit=`[[!catalog_ajax_limit]]`
&includeTVs=`image,detail_page,price,edinica_meri`
&parents=`[[!get_cur_sec]]`
&hideContainers=`1`
&tpl=`catalog_ajax_tpl`
&includeTVs=`1` 
&sortby=`[[!sort]]` 
&sortbyTV=`[[!sortbyTV]]` 
&sortdirTV=`[[!sortdirTV]]` 
&sortbyTVType=`integer` 
&tvFilters=`[[!filter]]`
&pageNavVar=`page.nav`
]] 
<div class="wp-pagenavi pagen_test" style="display:none;">
    <!--<span class="pages">Page [[+page]] of [[+pageCount]]</span>-->
[[!+page.nav]]
</div>',
    '[[If? &subject=`да` &operator=`eq` &operand=`да` &then=`<span class="text_min">Клапан обратный ПВХ Ду 160 (рыж.)</span>` &else=`<a class="text_min" href="katalog/trubyi-i-fitingi-pvx-beznapornyie/klapanyi-obratnyie-pvx/klapan-obratnyij-pvx-du-160-(ryizh.)/">Клапан обратный ПВХ Ду 160 (рыж.)</a>`]]' => '<span class="text_min">Клапан обратный ПВХ Ду 160 (рыж.)</span>',
    '[[If? &subject=`true` &operator=`eq` &operand=`true` &then=`<span class="add_to_basket">	<img src="template/img/car2.png" alt=""><br>Купить</span>` &else=`<div class="ask-price">Запросить <br/>цену</div>`]]' => '<span class="add_to_basket">	<img src="template/img/car2.png" alt=""><br>Купить</span>',
    '[[If? &subject=`да` &operator=`eq` &operand=`да` &then=`<span class="text_min">Клапан обратный ПВХ Ду 110 (рыж.)</span>` &else=`<a class="text_min" href="katalog/trubyi-i-fitingi-pvx-beznapornyie/klapanyi-obratnyie-pvx/klapan-obratnyij-pvx-du-110-(ryizh.)/">Клапан обратный ПВХ Ду 110 (рыж.)</a>`]]' => '<span class="text_min">Клапан обратный ПВХ Ду 110 (рыж.)</span>',
    '[[If? &subject=`да` &operator=`eq` &operand=`да` &then=`<span class="text_min">Ревизия ПВХ с крышкой 160 (рыжая)</span>` &else=`<a class="text_min" href="katalog/trubyi-i-fitingi-pvx-beznapornyie/revizii-pvx/reviziya-pvx-s-kr.-160-(ryizh.)/">Ревизия ПВХ с крышкой 160 (рыжая)</a>`]]' => '<span class="text_min">Ревизия ПВХ с крышкой 160 (рыжая)</span>',
    '[[If? &subject=`да` &operator=`eq` &operand=`да` &then=`<span class="text_min">Труба ПВХ 160 L=2 м (рыжая)</span>` &else=`<a class="text_min" href="katalog/trubyi-i-fitingi-pvx-beznapornyie/trubyi-pvx/truba-pvx-160-l2-m-(ryizh.)/">Труба ПВХ 160 L=2 м (рыжая)</a>`]]' => '<span class="text_min">Труба ПВХ 160 L=2 м (рыжая)</span>',
    '[[If? &subject=`да` &operator=`eq` &operand=`да` &then=`<span class="text_min">Тройник ПВХ (45°) 160 (рыжий)</span>` &else=`<a class="text_min" href="katalog/trubyi-i-fitingi-pvx-beznapornyie/trojniki-pvx/trojnik-pvx-(45°)-160-(ryizh.)/">Тройник ПВХ (45°) 160 (рыжий)</a>`]]' => '<span class="text_min">Тройник ПВХ (45°) 160 (рыжий)</span>',
    '[[If? &subject=`да` &operator=`eq` &operand=`да` &then=`<span class="text_min">Тройник ПВХ (90°) 160 (рыжий)</span>` &else=`<a class="text_min" href="katalog/trubyi-i-fitingi-pvx-beznapornyie/trojniki-pvx/trojnik-pvx-(90°)-160-(ryizh.)/">Тройник ПВХ (90°) 160 (рыжий)</a>`]]' => '<span class="text_min">Тройник ПВХ (90°) 160 (рыжий)</span>',
    '[[If? &subject=`да` &operator=`eq` &operand=`да` &then=`<span class="text_min">Тройник ПВХ (45°) 160х110 (рыжий)</span>` &else=`<a class="text_min" href="katalog/trubyi-i-fitingi-pvx-beznapornyie/trojniki-pvx/trojnik-pvx-(45°)-160x110-(ryizh.)/">Тройник ПВХ (45°) 160х110 (рыжий)</a>`]]' => '<span class="text_min">Тройник ПВХ (45°) 160х110 (рыжий)</span>',
    '[[If? &subject=`да` &operator=`eq` &operand=`да` &then=`<span class="text_min">Тройник ПВХ (90°) 160х110 (рыжий)</span>` &else=`<a class="text_min" href="katalog/trubyi-i-fitingi-pvx-beznapornyie/trojniki-pvx/trojnik-pvx-(90°)-160x110-(ryizh.)/">Тройник ПВХ (90°) 160х110 (рыжий)</a>`]]' => '<span class="text_min">Тройник ПВХ (90°) 160х110 (рыжий)</span>',
    '[[If? &subject=`да` &operator=`eq` &operand=`да` &then=`<span class="text_min">Труба ПВХ 110 L=2 м (рыжая)</span>` &else=`<a class="text_min" href="katalog/trubyi-i-fitingi-pvx-beznapornyie/trubyi-pvx/truba-pvx-110-l2-m-(ryizh.)/">Труба ПВХ 110 L=2 м (рыжая)</a>`]]' => '<span class="text_min">Труба ПВХ 110 L=2 м (рыжая)</span>',
    '[[If? &subject=`да` &operator=`eq` &operand=`да` &then=`<span class="text_min">Труба ПВХ 110 L=2 м (серая)</span>` &else=`<a class="text_min" href="katalog/trubyi-i-fitingi-pvx-beznapornyie/trubyi-pvx/truba-pvx-110-l2-m-(ser.)/">Труба ПВХ 110 L=2 м (серая)</a>`]]' => '<span class="text_min">Труба ПВХ 110 L=2 м (серая)</span>',
    '[[$?namespace=``&limit=`10`&offset=`0`&page=`1`&pageVarKey=`page`&totalVar=`total`&pageLimit=`5`&elementClass=`modSnippet`&pageNavVar=`page.nav`&pageNavTpl=`<a href="[[+href]]" class="page" title="[[+pageNo]]">[[+pageNo]]</a>`&pageNavOuterTpl=`[[+first]][[+prev]][[+pages]][[+next]][[+last]]`&pageActiveTpl=`<span class="current">[[+pageNo]]</span>`&pageFirstTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">First</a></li>`&pageLastTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">Last</a></li>`&pagePrevTpl=`<a href="[[+href]]">Предыдущая</a>`&pageNextTpl=`<a href="[[+href]]">Следующая</a>`&cache=``&cache_key=`resource`&cache_handler=`xPDOFileCache`&cache_expires=`0`&pageNavScheme=``&element=`getResources`&includeTVs=`1`&parents=`30`&hideContainers=`1`&tpl=`catalog_ajax_tpl`&sortby=``&sortbyTV=`price`&sortdirTV=`DESC`&sortbyTVType=`integer`&tvFilters=`price>=0,price<=100000`&total=`64`&pageOneLimit=`10`&actualLimit=`10`&toPlaceholder=``&qs=`5e32bb12c9a7d8910fd726fbee3ecb64`&pageCount=`7`&href=`katalog-ajax/?sortby=price&amp;sortdir=desc&amp;type=30&amp;_=1670340351667`&pageNo=`1`]]' => '<span class="current">1</span>',
    '[[$?namespace=``&limit=`10`&offset=`0`&page=`1`&pageVarKey=`page`&totalVar=`total`&pageLimit=`5`&elementClass=`modSnippet`&pageNavVar=`page.nav`&pageNavTpl=`<a href="[[+href]]" class="page" title="[[+pageNo]]">[[+pageNo]]</a>`&pageNavOuterTpl=`[[+first]][[+prev]][[+pages]][[+next]][[+last]]`&pageActiveTpl=`<span class="current">[[+pageNo]]</span>`&pageFirstTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">First</a></li>`&pageLastTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">Last</a></li>`&pagePrevTpl=`<a href="[[+href]]">Предыдущая</a>`&pageNextTpl=`<a href="[[+href]]">Следующая</a>`&cache=``&cache_key=`resource`&cache_handler=`xPDOFileCache`&cache_expires=`0`&pageNavScheme=``&element=`getResources`&includeTVs=`1`&parents=`30`&hideContainers=`1`&tpl=`catalog_ajax_tpl`&sortby=``&sortbyTV=`price`&sortdirTV=`DESC`&sortbyTVType=`integer`&tvFilters=`price>=0,price<=100000`&total=`64`&pageOneLimit=`10`&actualLimit=`10`&toPlaceholder=``&qs=`d0563927b2a746738d125b20ba7f1962`&pageCount=`7`&href=`katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=2&amp;type=30&amp;_=1670340351667`&pageNo=`2`]]' => '<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=2&amp;type=30&amp;_=1670340351667" class="page" title="2">2</a>',
    '[[$?namespace=``&limit=`10`&offset=`0`&page=`1`&pageVarKey=`page`&totalVar=`total`&pageLimit=`5`&elementClass=`modSnippet`&pageNavVar=`page.nav`&pageNavTpl=`<a href="[[+href]]" class="page" title="[[+pageNo]]">[[+pageNo]]</a>`&pageNavOuterTpl=`[[+first]][[+prev]][[+pages]][[+next]][[+last]]`&pageActiveTpl=`<span class="current">[[+pageNo]]</span>`&pageFirstTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">First</a></li>`&pageLastTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">Last</a></li>`&pagePrevTpl=`<a href="[[+href]]">Предыдущая</a>`&pageNextTpl=`<a href="[[+href]]">Следующая</a>`&cache=``&cache_key=`resource`&cache_handler=`xPDOFileCache`&cache_expires=`0`&pageNavScheme=``&element=`getResources`&includeTVs=`1`&parents=`30`&hideContainers=`1`&tpl=`catalog_ajax_tpl`&sortby=``&sortbyTV=`price`&sortdirTV=`DESC`&sortbyTVType=`integer`&tvFilters=`price>=0,price<=100000`&total=`64`&pageOneLimit=`10`&actualLimit=`10`&toPlaceholder=``&qs=`7917dfd69d00cf68d48dcf3e3e41913b`&pageCount=`7`&href=`katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=3&amp;type=30&amp;_=1670340351667`&pageNo=`3`]]' => '<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=3&amp;type=30&amp;_=1670340351667" class="page" title="3">3</a>',
    '[[$?namespace=``&limit=`10`&offset=`0`&page=`1`&pageVarKey=`page`&totalVar=`total`&pageLimit=`5`&elementClass=`modSnippet`&pageNavVar=`page.nav`&pageNavTpl=`<a href="[[+href]]" class="page" title="[[+pageNo]]">[[+pageNo]]</a>`&pageNavOuterTpl=`[[+first]][[+prev]][[+pages]][[+next]][[+last]]`&pageActiveTpl=`<span class="current">[[+pageNo]]</span>`&pageFirstTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">First</a></li>`&pageLastTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">Last</a></li>`&pagePrevTpl=`<a href="[[+href]]">Предыдущая</a>`&pageNextTpl=`<a href="[[+href]]">Следующая</a>`&cache=``&cache_key=`resource`&cache_handler=`xPDOFileCache`&cache_expires=`0`&pageNavScheme=``&element=`getResources`&includeTVs=`1`&parents=`30`&hideContainers=`1`&tpl=`catalog_ajax_tpl`&sortby=``&sortbyTV=`price`&sortdirTV=`DESC`&sortbyTVType=`integer`&tvFilters=`price>=0,price<=100000`&total=`64`&pageOneLimit=`10`&actualLimit=`10`&toPlaceholder=``&qs=`942c02b6b8a1c4d8f593a4c9be9c4d0b`&pageCount=`7`&href=`katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=4&amp;type=30&amp;_=1670340351667`&pageNo=`4`]]' => '<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=4&amp;type=30&amp;_=1670340351667" class="page" title="4">4</a>',
    '[[$?namespace=``&limit=`10`&offset=`0`&page=`1`&pageVarKey=`page`&totalVar=`total`&pageLimit=`5`&elementClass=`modSnippet`&pageNavVar=`page.nav`&pageNavTpl=`<a href="[[+href]]" class="page" title="[[+pageNo]]">[[+pageNo]]</a>`&pageNavOuterTpl=`[[+first]][[+prev]][[+pages]][[+next]][[+last]]`&pageActiveTpl=`<span class="current">[[+pageNo]]</span>`&pageFirstTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">First</a></li>`&pageLastTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">Last</a></li>`&pagePrevTpl=`<a href="[[+href]]">Предыдущая</a>`&pageNextTpl=`<a href="[[+href]]">Следующая</a>`&cache=``&cache_key=`resource`&cache_handler=`xPDOFileCache`&cache_expires=`0`&pageNavScheme=``&element=`getResources`&includeTVs=`1`&parents=`30`&hideContainers=`1`&tpl=`catalog_ajax_tpl`&sortby=``&sortbyTV=`price`&sortdirTV=`DESC`&sortbyTVType=`integer`&tvFilters=`price>=0,price<=100000`&total=`64`&pageOneLimit=`10`&actualLimit=`10`&toPlaceholder=``&qs=`dc7c59d555a7ae7e0a4331b394804b5c`&pageCount=`7`&href=`katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=5&amp;type=30&amp;_=1670340351667`&pageNo=`5`]]' => '<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=5&amp;type=30&amp;_=1670340351667" class="page" title="5">5</a>',
    '[[$?namespace=``&limit=`10`&offset=`0`&page=`1`&pageVarKey=`page`&totalVar=`total`&pageLimit=`5`&elementClass=`modSnippet`&pageNavVar=`page.nav`&pageNavTpl=`<a href="[[+href]]" class="page" title="[[+pageNo]]">[[+pageNo]]</a>`&pageNavOuterTpl=`[[+first]][[+prev]][[+pages]][[+next]][[+last]]`&pageActiveTpl=`<span class="current">[[+pageNo]]</span>`&pageFirstTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">First</a></li>`&pageLastTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">Last</a></li>`&pagePrevTpl=`<a href="[[+href]]">Предыдущая</a>`&pageNextTpl=`<a href="[[+href]]">Следующая</a>`&cache=``&cache_key=`resource`&cache_handler=`xPDOFileCache`&cache_expires=`0`&pageNavScheme=``&element=`getResources`&includeTVs=`1`&parents=`30`&hideContainers=`1`&tpl=`catalog_ajax_tpl`&sortby=``&sortbyTV=`price`&sortdirTV=`DESC`&sortbyTVType=`integer`&tvFilters=`price>=0,price<=100000`&total=`64`&pageOneLimit=`10`&actualLimit=`10`&toPlaceholder=``&qs=`af72602bc27a27e9b94d2252a8223638`&pageCount=`7`&href=`katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=6&amp;type=30&amp;_=1670340351667`&pageNo=`6`]]' => '<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=6&amp;type=30&amp;_=1670340351667" class="page" title="6">6</a>',
    '[[$?namespace=``&limit=`10`&offset=`0`&page=`1`&pageVarKey=`page`&totalVar=`total`&pageLimit=`5`&elementClass=`modSnippet`&pageNavVar=`page.nav`&pageNavTpl=`<a href="[[+href]]" class="page" title="[[+pageNo]]">[[+pageNo]]</a>`&pageNavOuterTpl=`[[+first]][[+prev]][[+pages]][[+next]][[+last]]`&pageActiveTpl=`<span class="current">[[+pageNo]]</span>`&pageFirstTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">First</a></li>`&pageLastTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">Last</a></li>`&pagePrevTpl=`<a href="[[+href]]">Предыдущая</a>`&pageNextTpl=`<a href="[[+href]]">Следующая</a>`&cache=``&cache_key=`resource`&cache_handler=`xPDOFileCache`&cache_expires=`0`&pageNavScheme=``&element=`getResources`&includeTVs=`1`&parents=`30`&hideContainers=`1`&tpl=`catalog_ajax_tpl`&sortby=``&sortbyTV=`price`&sortdirTV=`DESC`&sortbyTVType=`integer`&tvFilters=`price>=0,price<=100000`&total=`64`&pageOneLimit=`10`&actualLimit=`10`&toPlaceholder=``&qs=`ebf3b0a6f4c05fbd5f1fcfa8983e6ba6`&pageCount=`7`&href=`katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=2&amp;type=30&amp;_=1670340351667`&pageNo=`2`]]' => '<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=2&amp;type=30&amp;_=1670340351667">Следующая</a>',
    '[[$?namespace=``&limit=`10`&offset=`0`&page=`1`&pageVarKey=`page`&totalVar=`total`&pageLimit=`5`&elementClass=`modSnippet`&pageNavVar=`page.nav`&pageNavTpl=`<a href="[[+href]]" class="page" title="[[+pageNo]]">[[+pageNo]]</a>`&pageNavOuterTpl=`[[+first]][[+prev]][[+pages]][[+next]][[+last]]`&pageActiveTpl=`<span class="current">[[+pageNo]]</span>`&pageFirstTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">First</a></li>`&pageLastTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">Last</a></li>`&pagePrevTpl=`<a href="[[+href]]">Предыдущая</a>`&pageNextTpl=`<a href="[[+href]]">Следующая</a>`&cache=``&cache_key=`resource`&cache_handler=`xPDOFileCache`&cache_expires=`0`&pageNavScheme=``&element=`getResources`&includeTVs=`1`&parents=`30`&hideContainers=`1`&tpl=`catalog_ajax_tpl`&sortby=``&sortbyTV=`price`&sortdirTV=`DESC`&sortbyTVType=`integer`&tvFilters=`price>=0,price<=100000`&total=`64`&pageOneLimit=`10`&actualLimit=`10`&toPlaceholder=``&qs=`d977c11611e0f98b56ce776218c3b03a`&pageCount=`7`&href=`katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=7&amp;type=30&amp;_=1670340351667`&pageNo=`7`]]' => '<li class="control"><a[[+classes]][[+title]] href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=7&amp;type=30&amp;_=1670340351667">Last</a></li>',
    '[[$?namespace=``&limit=`10`&offset=`0`&page=`1`&pageVarKey=`page`&totalVar=`total`&pageLimit=`5`&elementClass=`modSnippet`&pageNavVar=`page.nav`&pageNavTpl=`<a href="[[+href]]" class="page" title="[[+pageNo]]">[[+pageNo]]</a>`&pageNavOuterTpl=`[[+first]][[+prev]][[+pages]][[+next]][[+last]]`&pageActiveTpl=`<span class="current">[[+pageNo]]</span>`&pageFirstTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">First</a></li>`&pageLastTpl=`<li class="control"><a[[+classes]][[+title]] href="[[+href]]">Last</a></li>`&pagePrevTpl=`<a href="[[+href]]">Предыдущая</a>`&pageNextTpl=`<a href="[[+href]]">Следующая</a>`&cache=``&cache_key=`resource`&cache_handler=`xPDOFileCache`&cache_expires=`0`&pageNavScheme=``&element=`getResources`&includeTVs=`1`&parents=`30`&hideContainers=`1`&tpl=`catalog_ajax_tpl`&sortby=``&sortbyTV=`price`&sortdirTV=`DESC`&sortbyTVType=`integer`&tvFilters=`price>=0,price<=100000`&total=`64`&pageOneLimit=`10`&actualLimit=`10`&toPlaceholder=``&qs=`e917835311cf52b6d78db3f900e275c3`&pageCount=`7`&pages=`<span class="current">1</span>
<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=2&amp;type=30&amp;_=1670340351667" class="page" title="2">2</a>
<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=3&amp;type=30&amp;_=1670340351667" class="page" title="3">3</a>
<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=4&amp;type=30&amp;_=1670340351667" class="page" title="4">4</a>
<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=5&amp;type=30&amp;_=1670340351667" class="page" title="5">5</a>
<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=6&amp;type=30&amp;_=1670340351667" class="page" title="6">6</a>`&next=`<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=2&amp;type=30&amp;_=1670340351667">Следующая</a>`&last=`<li class="control"><a[[+classes]][[+title]] href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=7&amp;type=30&amp;_=1670340351667">Last</a></li>`]]' => '[[+first]][[+prev]]<span class="current">1</span>
<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=2&amp;type=30&amp;_=1670340351667" class="page" title="2">2</a>
<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=3&amp;type=30&amp;_=1670340351667" class="page" title="3">3</a>
<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=4&amp;type=30&amp;_=1670340351667" class="page" title="4">4</a>
<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=5&amp;type=30&amp;_=1670340351667" class="page" title="5">5</a>
<a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=6&amp;type=30&amp;_=1670340351667" class="page" title="6">6</a><a href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=2&amp;type=30&amp;_=1670340351667">Следующая</a><li class="control"><a[[+classes]][[+title]] href="katalog-ajax/?sortby=price&amp;sortdir=desc&amp;page=7&amp;type=30&amp;_=1670340351667">Last</a></li>',
  ),
  'sourceCache' => 
  array (
    'modChunk' => 
    array (
      'catalog_ajax' => 
      array (
        'fields' => 
        array (
          'id' => 55,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'catalog_ajax',
          'description' => '',
          'editor_type' => 0,
          'category' => 13,
          'cache_type' => 0,
          'snippet' => '<!-- <table id="all_items" border="1" cellspacing="0" cellpadding="3">-->
<!--	<tbody>-->
<!--    	<tr>-->
<!--    		<td><center>Наименование</center></td>-->
<!--    		<td>Ед.изм.</td>				-->
<!--    		<td>Цена</td>-->
<!--    		<td>Кол-во</td>-->
<!--<td>Добавить</td>-->
<!--    	</tr>-->
  
[[!getPage@catalogPaging? 
&elementClass=`modSnippet` 
&element=`getResources`
&limit=`[[!catalog_ajax_limit]]`
&includeTVs=`image,detail_page,price,edinica_meri`
&parents=`[[!get_cur_sec]]`
&hideContainers=`1`
&tpl=`catalog_ajax_tpl`
&includeTVs=`1` 
&sortby=`[[!sort]]` 
&sortbyTV=`[[!sortbyTV]]` 
&sortdirTV=`[[!sortdirTV]]` 
&sortbyTVType=`integer` 
&tvFilters=`[[!filter]]`
&pageNavVar=`page.nav`
]] 
<div class="wp-pagenavi pagen_test" style="display:none;">
    <!--<span class="pages">Page [[+page]] of [[+pageCount]]</span>-->
[[!+page.nav]]
</div>',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '<!-- <table id="all_items" border="1" cellspacing="0" cellpadding="3">-->
<!--	<tbody>-->
<!--    	<tr>-->
<!--    		<td><center>Наименование</center></td>-->
<!--    		<td>Ед.изм.</td>				-->
<!--    		<td>Цена</td>-->
<!--    		<td>Кол-во</td>-->
<!--<td>Добавить</td>-->
<!--    	</tr>-->
  
[[!getPage@catalogPaging? 
&elementClass=`modSnippet` 
&element=`getResources`
&limit=`[[!catalog_ajax_limit]]`
&includeTVs=`image,detail_page,price,edinica_meri`
&parents=`[[!get_cur_sec]]`
&hideContainers=`1`
&tpl=`catalog_ajax_tpl`
&includeTVs=`1` 
&sortby=`[[!sort]]` 
&sortbyTV=`[[!sortbyTV]]` 
&sortdirTV=`[[!sortdirTV]]` 
&sortbyTVType=`integer` 
&tvFilters=`[[!filter]]`
&pageNavVar=`page.nav`
]] 
<div class="wp-pagenavi pagen_test" style="display:none;">
    <!--<span class="pages">Page [[+page]] of [[+pageCount]]</span>-->
[[!+page.nav]]
</div>',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
    ),
    'modSnippet' => 
    array (
      'catalog_ajax_limit' => 
      array (
        'fields' => 
        array (
          'id' => 56,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'catalog_ajax_limit',
          'description' => '',
          'editor_type' => 0,
          'category' => 13,
          'cache_type' => 0,
          'snippet' => 'if(isset($_GET[\'limit\'])){
    $sec_limit = $_GET[\'limit\'];
    echo $sec_limit;
    //print_r($sec_id);
}else{
    echo 10;
}',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => 'if(isset($_GET[\'limit\'])){
    $sec_limit = $_GET[\'limit\'];
    echo $sec_limit;
    //print_r($sec_id);
}else{
    echo 10;
}',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
      'get_cur_sec' => 
      array (
        'fields' => 
        array (
          'id' => 55,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'get_cur_sec',
          'description' => '',
          'editor_type' => 0,
          'category' => 13,
          'cache_type' => 0,
          'snippet' => 'if(isset($_GET[\'type\'])){
    $sec_id = $_GET[\'type\'];
    echo $sec_id;
    //print_r($sec_id);
}',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => 'if(isset($_GET[\'type\'])){
    $sec_id = $_GET[\'type\'];
    echo $sec_id;
    //print_r($sec_id);
}',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
      'sort' => 
      array (
        'fields' => 
        array (
          'id' => 51,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'sort',
          'description' => 'Сниппет для catalog_ajax',
          'editor_type' => 0,
          'category' => 13,
          'cache_type' => 0,
          'snippet' => '$sort_name = isset($_GET[\'sortby\']) ? strip_tags($_GET[\'sortby\']) : \'price\';

$sort_direction = (isset($_GET[\'sortdir\']) && $_GET[\'sortdir\'] == \'desc\') ? \'DESC\' : \'ASC\';

if ($sort_name == \'title\') return \'{"pagetitle":"\' . $sort_direction . \'"}\';
//if ($sort_name == \'title\') return \'"pagetitle":"\' . $sort_direction . \'",\';
return \'\';',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => '$sort_name = isset($_GET[\'sortby\']) ? strip_tags($_GET[\'sortby\']) : \'price\';

$sort_direction = (isset($_GET[\'sortdir\']) && $_GET[\'sortdir\'] == \'desc\') ? \'DESC\' : \'ASC\';

if ($sort_name == \'title\') return \'{"pagetitle":"\' . $sort_direction . \'"}\';
//if ($sort_name == \'title\') return \'"pagetitle":"\' . $sort_direction . \'",\';
return \'\';',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
      'sortbyTV' => 
      array (
        'fields' => 
        array (
          'id' => 50,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'sortbyTV',
          'description' => 'Сниппет для catalog_ajax',
          'editor_type' => 0,
          'category' => 13,
          'cache_type' => 0,
          'snippet' => '$sort_name = isset($_GET[\'sortby\']) ? strip_tags($_GET[\'sortby\']) : \'price\';
if ($sort_name != \'title\') return $sort_name;
return \'\';',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => '$sort_name = isset($_GET[\'sortby\']) ? strip_tags($_GET[\'sortby\']) : \'price\';
if ($sort_name != \'title\') return $sort_name;
return \'\';',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
      'sortdirTV' => 
      array (
        'fields' => 
        array (
          'id' => 49,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'sortdirTV',
          'description' => 'Сниппет для catalog_ajax',
          'editor_type' => 0,
          'category' => 13,
          'cache_type' => 0,
          'snippet' => '$sort_direction = (isset($_GET[\'sortdir\']) && $_GET[\'sortdir\'] == \'desc\') ? \'DESC\' : \'ASC\';
return $sort_direction;',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => '$sort_direction = (isset($_GET[\'sortdir\']) && $_GET[\'sortdir\'] == \'desc\') ? \'DESC\' : \'ASC\';
return $sort_direction;',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
      'filter' => 
      array (
        'fields' => 
        array (
          'id' => 53,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'filter',
          'description' => 'Сниппет для catalog_ajax',
          'editor_type' => 0,
          'category' => 13,
          'cache_type' => 0,
          'snippet' => '$out = array();

//echo $_GET[\'price\'];

if(!empty($_GET[\'price\'])){
    $price = isset($_GET[\'price\']) ? strip_tags($_GET[\'price\']) : \'\';
    $prices = explode(\'|\', $price);
    if (!empty($prices)) {
        $out[] = \'price>=\' . $prices[0];
        $out[] = \'price<=\' . $prices[1];
    }
    return implode(\',\', $out);
}else{
    //$out[] = \'price>=1\';
    $out[] = \'price>=0\';
    $out[] = \'price<=100000\';
    return implode(\',\', $out);
}
//print_r($out);
//die();',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => '$out = array();

//echo $_GET[\'price\'];

if(!empty($_GET[\'price\'])){
    $price = isset($_GET[\'price\']) ? strip_tags($_GET[\'price\']) : \'\';
    $prices = explode(\'|\', $price);
    if (!empty($prices)) {
        $out[] = \'price>=\' . $prices[0];
        $out[] = \'price<=\' . $prices[1];
    }
    return implode(\',\', $out);
}else{
    //$out[] = \'price>=1\';
    $out[] = \'price>=0\';
    $out[] = \'price<=100000\';
    return implode(\',\', $out);
}
//print_r($out);
//die();',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
      'getPage' => 
      array (
        'fields' => 
        array (
          'id' => 6,
          'source' => 0,
          'property_preprocess' => false,
          'name' => 'getPage',
          'description' => '<b>1.2.4-pl</b> A generic wrapper snippet for returning paged results and navigation from snippets that return limitable collections.',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '/**
 * @package getpage
 */
$output = \'\';

$properties =& $scriptProperties;
$properties[\'page\'] = (isset($_GET[$properties[\'pageVarKey\']]) && ($page = intval($_GET[$properties[\'pageVarKey\']]))) ? $page : null;
if ($properties[\'page\'] === null) {
    $properties[\'page\'] = (isset($_REQUEST[$properties[\'pageVarKey\']]) && ($page = intval($_REQUEST[$properties[\'pageVarKey\']]))) ? $page : 1;
}
$properties[\'limit\'] = (isset($_GET[\'limit\'])) ? intval($_GET[\'limit\']) : null;
if ($properties[\'limit\'] === null) {
    $properties[\'limit\'] = (isset($_REQUEST[\'limit\'])) ? intval($_REQUEST[\'limit\']) : intval($limit);
}
$properties[\'offset\'] = (!empty($properties[\'limit\']) && !empty($properties[\'page\'])) ? ($properties[\'limit\'] * ($properties[\'page\'] - 1)) : 0;
$properties[\'totalVar\'] = empty($totalVar) ? "total" : $totalVar;
$properties[$properties[\'totalVar\']] = !empty($properties[$properties[\'totalVar\']]) && $total = intval($properties[$properties[\'totalVar\']]) ? $total : 0;
$properties[\'pageOneLimit\'] = (!empty($pageOneLimit) && $pageOneLimit = intval($pageOneLimit)) ? $pageOneLimit : $properties[\'limit\'];
$properties[\'actualLimit\'] = $properties[\'limit\'];
$properties[\'pageLimit\'] = isset($pageLimit) && is_numeric($pageLimit) ? intval($pageLimit) : 5;
$properties[\'element\'] = empty($element) ? \'\' : $element;
$properties[\'elementClass\'] = empty($elementClass) ? \'modChunk\' : $elementClass;
$properties[\'pageNavVar\'] = empty($pageNavVar) ? \'page.nav\' : $pageNavVar;
$properties[\'pageNavTpl\'] = !isset($pageNavTpl) ? "<li[[+classes]]><a[[+classes]][[+title]] href=\\"[[+href]]\\">[[+pageNo]]</a></li>" : $pageNavTpl;
$properties[\'pageNavOuterTpl\'] = !isset($pageNavOuterTpl) ? "[[+first]][[+prev]][[+pages]][[+next]][[+last]]" : $pageNavOuterTpl;
$properties[\'pageActiveTpl\'] = !isset($pageActiveTpl) ? "<li[[+activeClasses:default=` class=\\"active\\"`]]><a[[+activeClasses:default=` class=\\"active\\"`]][[+title]] href=\\"[[+href]]\\">[[+pageNo]]</a></li>" : $pageActiveTpl;
$properties[\'pageFirstTpl\'] = !isset($pageFirstTpl) ? "<li class=\\"control\\"><a[[+title]] href=\\"[[+href]]\\">First</a></li>" : $pageFirstTpl;
$properties[\'pageLastTpl\'] = !isset($pageLastTpl) ? "<li class=\\"control\\"><a[[+title]] href=\\"[[+href]]\\">Last</a></li>" : $pageLastTpl;
$properties[\'pagePrevTpl\'] = !isset($pagePrevTpl) ? "<li class=\\"control\\"><a[[+title]] href=\\"[[+href]]\\">&lt;&lt;</a></li>" : $pagePrevTpl;
$properties[\'pageNextTpl\'] = !isset($pageNextTpl) ? "<li class=\\"control\\"><a[[+title]] href=\\"[[+href]]\\">&gt;&gt;</a></li>" : $pageNextTpl;
$properties[\'toPlaceholder\'] = !empty($toPlaceholder) ? $toPlaceholder : \'\';
$properties[\'cache\'] = isset($cache) ? (boolean) $cache : (boolean) $modx->getOption(\'cache_resource\', null, false);
if (empty($cache_key)) $properties[xPDO::OPT_CACHE_KEY] = $modx->getOption(\'cache_resource_key\', null, \'resource\');
if (empty($cache_handler)) $properties[xPDO::OPT_CACHE_HANDLER] = $modx->getOption(\'cache_resource_handler\', null, \'xPDOFileCache\');
if (empty($cache_expires)) $properties[xPDO::OPT_CACHE_EXPIRES] = (integer) $modx->getOption(\'cache_resource_expires\', null, 0);

if ($properties[\'page\'] == 1 && $properties[\'pageOneLimit\'] !== $properties[\'actualLimit\']) {
    $properties[\'limit\'] = $properties[\'pageOneLimit\'];
}

if ($properties[\'cache\']) {
    $properties[\'cachePageKey\'] = $modx->resource->getCacheKey() . \'/\' . $properties[\'page\'] . \'/\' . md5(http_build_query($modx->request->getParameters()) . http_build_query($scriptProperties));
    $properties[\'cacheOptions\'] = array(
        xPDO::OPT_CACHE_KEY => $properties[xPDO::OPT_CACHE_KEY],
        xPDO::OPT_CACHE_HANDLER => $properties[xPDO::OPT_CACHE_HANDLER],
        xPDO::OPT_CACHE_EXPIRES => $properties[xPDO::OPT_CACHE_EXPIRES],
    );
}
$cached = false;
if ($properties[\'cache\']) {
    if ($modx->getCacheManager()) {
        $cached = $modx->cacheManager->get($properties[\'cachePageKey\'], $properties[\'cacheOptions\']);
    }
}
if (empty($cached) || !isset($cached[\'properties\']) || !isset($cached[\'output\'])) {
    $elementObj = $modx->getObject($properties[\'elementClass\'], array(\'name\' => $properties[\'element\']));
    if ($elementObj) {
        $elementObj->setCacheable(false);
        if (!empty($properties[\'toPlaceholder\'])) {
            $elementObj->process($properties);
            $output = $modx->getPlaceholder($properties[\'toPlaceholder\']);
        } else {
            $output = $elementObj->process($properties);
        }
    }

    include_once $modx->getOption(\'getpage.core_path\',$properties,$modx->getOption(\'core_path\', $properties, MODX_CORE_PATH) . \'components/getpage/\').\'include.getpage.php\';

    $qs = $modx->request->getParameters();
    $properties[\'qs\'] =& $qs;

    $totalSet = $modx->getPlaceholder($properties[\'totalVar\']);
    $properties[$properties[\'totalVar\']] = (($totalSet = intval($totalSet)) ? $totalSet : $properties[$properties[\'totalVar\']]);
    if (!empty($properties[$properties[\'totalVar\']]) && !empty($properties[\'actualLimit\'])) {
        if ($properties[\'pageOneLimit\'] !== $properties[\'actualLimit\']) {
            $adjustedTotal = $properties[$properties[\'totalVar\']] - $properties[\'pageOneLimit\'];
            $properties[\'pageCount\'] = $adjustedTotal > 0 ? ceil($adjustedTotal / $properties[\'actualLimit\']) + 1 : 1;
        } else {
            $properties[\'pageCount\'] = ceil($properties[$properties[\'totalVar\']] / $properties[\'actualLimit\']);
        }
    } else {
        $properties[\'pageCount\'] = 1;
    }
    if (empty($properties[$properties[\'totalVar\']]) || empty($properties[\'actualLimit\']) || $properties[$properties[\'totalVar\']] <= $properties[\'actualLimit\'] || ($properties[\'page\'] == 1 && $properties[$properties[\'totalVar\']] <= $properties[\'pageOneLimit\'])) {
        $properties[\'page\'] = 1;
    } else {
        $pageNav = getpage_buildControls($modx, $properties);
        $properties[$properties[\'pageNavVar\']] = $modx->newObject(\'modChunk\')->process(array_merge($properties, $pageNav), $properties[\'pageNavOuterTpl\']);
        if ($properties[\'page\'] > 1) {
            $qs[$properties[\'pageVarKey\']] = $properties[\'page\'];
        }
    }

    $properties[\'firstItem\'] = $properties[\'offset\'] + 1;
    $properties[\'lastItem\'] = ($properties[\'offset\'] + $properties[\'limit\']) < $totalSet ? ($properties[\'offset\'] + $properties[\'limit\']) : $totalSet;

    $properties[\'pageUrl\'] = $modx->makeUrl($modx->resource->get(\'id\'), \'\', $qs);
    if ($properties[\'cache\'] && $modx->getCacheManager()) {
        $cached = array(\'properties\' => $properties, \'output\' => $output);
        $modx->cacheManager->set($properties[\'cachePageKey\'], $cached, $properties[xPDO::OPT_CACHE_EXPIRES], $properties[\'cacheOptions\']);
    }
} else {
    $properties = $cached[\'properties\'];
    $output = $cached[\'output\'];
}
$modx->setPlaceholders($properties, $properties[\'namespace\']);
if (!empty($properties[\'toPlaceholder\'])) {
    $modx->setPlaceholder($properties[\'toPlaceholder\'], $output);
    $output = \'\';
}

return $output;',
          'locked' => false,
          'properties' => 
          array (
            'namespace' => 
            array (
              'name' => 'namespace',
              'desc' => 'An execution namespace that serves as a prefix for placeholders set by a specific instance of the getPage snippet.',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'An execution namespace that serves as a prefix for placeholders set by a specific instance of the getPage snippet.',
              'area_trans' => '',
            ),
            'limit' => 
            array (
              'name' => 'limit',
              'desc' => 'The result limit per page; can be overridden in the $_REQUEST.',
              'type' => 'textfield',
              'options' => '',
              'value' => '10',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'The result limit per page; can be overridden in the $_REQUEST.',
              'area_trans' => '',
            ),
            'offset' => 
            array (
              'name' => 'offset',
              'desc' => 'The offset, or record position to start at within the collection for rendering results for the current page; should be calculated based on page variable set in pageVarKey.',
              'type' => 'textfield',
              'options' => '',
              'value' => '0',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'The offset, or record position to start at within the collection for rendering results for the current page; should be calculated based on page variable set in pageVarKey.',
              'area_trans' => '',
            ),
            'page' => 
            array (
              'name' => 'page',
              'desc' => 'The page to display; this is determined based on the value indicated by the page variable set in pageVarKey, typically in the $_REQUEST.',
              'type' => 'textfield',
              'options' => '',
              'value' => '0',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'The page to display; this is determined based on the value indicated by the page variable set in pageVarKey, typically in the $_REQUEST.',
              'area_trans' => '',
            ),
            'pageVarKey' => 
            array (
              'name' => 'pageVarKey',
              'desc' => 'The key of a property that indicates the current page.',
              'type' => 'textfield',
              'options' => '',
              'value' => 'page',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'The key of a property that indicates the current page.',
              'area_trans' => '',
            ),
            'totalVar' => 
            array (
              'name' => 'totalVar',
              'desc' => 'The key of a placeholder that must contain the total records in the limitable collection being paged.',
              'type' => 'textfield',
              'options' => '',
              'value' => 'total',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'The key of a placeholder that must contain the total records in the limitable collection being paged.',
              'area_trans' => '',
            ),
            'pageLimit' => 
            array (
              'name' => 'pageLimit',
              'desc' => 'The maximum number of pages to display when rendering paging controls',
              'type' => 'textfield',
              'options' => '',
              'value' => '5',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'The maximum number of pages to display when rendering paging controls',
              'area_trans' => '',
            ),
            'elementClass' => 
            array (
              'name' => 'elementClass',
              'desc' => 'The class of element that will be called by the getPage snippet instance.',
              'type' => 'textfield',
              'options' => '',
              'value' => 'modSnippet',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'The class of element that will be called by the getPage snippet instance.',
              'area_trans' => '',
            ),
            'pageNavVar' => 
            array (
              'name' => 'pageNavVar',
              'desc' => 'The key of a placeholder to be set with the paging navigation controls.',
              'type' => 'textfield',
              'options' => '',
              'value' => 'page.nav',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'The key of a placeholder to be set with the paging navigation controls.',
              'area_trans' => '',
            ),
            'pageNavTpl' => 
            array (
              'name' => 'pageNavTpl',
              'desc' => 'Content representing a single page navigation control.',
              'type' => 'textfield',
              'options' => '',
              'value' => '<li[[+classes]]><a[[+classes]][[+title]] href="[[+href]]">[[+pageNo]]</a></li>',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'Content representing a single page navigation control.',
              'area_trans' => '',
            ),
            'pageNavOuterTpl' => 
            array (
              'name' => 'pageNavOuterTpl',
              'desc' => 'Content representing the layout of the page navigation controls.',
              'type' => 'textfield',
              'options' => '',
              'value' => '[[+first]][[+prev]][[+pages]][[+next]][[+last]]',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'Content representing the layout of the page navigation controls.',
              'area_trans' => '',
            ),
            'pageActiveTpl' => 
            array (
              'name' => 'pageActiveTpl',
              'desc' => 'Content representing the current page navigation control.',
              'type' => 'textfield',
              'options' => '',
              'value' => '<li[[+activeClasses]]><a[[+activeClasses:default=` class="active"`]][[+title]] href="[[+href]]">[[+pageNo]]</a></li>',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'Content representing the current page navigation control.',
              'area_trans' => '',
            ),
            'pageFirstTpl' => 
            array (
              'name' => 'pageFirstTpl',
              'desc' => 'Content representing the first page navigation control.',
              'type' => 'textfield',
              'options' => '',
              'value' => '<li class="control"><a[[+classes]][[+title]] href="[[+href]]">First</a></li>',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'Content representing the first page navigation control.',
              'area_trans' => '',
            ),
            'pageLastTpl' => 
            array (
              'name' => 'pageLastTpl',
              'desc' => 'Content representing the last page navigation control.',
              'type' => 'textfield',
              'options' => '',
              'value' => '<li class="control"><a[[+classes]][[+title]] href="[[+href]]">Last</a></li>',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'Content representing the last page navigation control.',
              'area_trans' => '',
            ),
            'pagePrevTpl' => 
            array (
              'name' => 'pagePrevTpl',
              'desc' => 'Content representing the previous page navigation control.',
              'type' => 'textfield',
              'options' => '',
              'value' => '<li class="control"><a[[+classes]][[+title]] href="[[+href]]">&lt;&lt;</a></li>',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'Content representing the previous page navigation control.',
              'area_trans' => '',
            ),
            'pageNextTpl' => 
            array (
              'name' => 'pageNextTpl',
              'desc' => 'Content representing the next page navigation control.',
              'type' => 'textfield',
              'options' => '',
              'value' => '<li class="control"><a[[+classes]][[+title]] href="[[+href]]">&gt;&gt;</a></li>',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'Content representing the next page navigation control.',
              'area_trans' => '',
            ),
            'cache' => 
            array (
              'name' => 'cache',
              'desc' => 'If true, unique page requests will be cached according to addition cache properties.',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => false,
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'If true, unique page requests will be cached according to addition cache properties.',
              'area_trans' => '',
            ),
            'cache_key' => 
            array (
              'name' => 'cache_key',
              'desc' => 'The key of the cache provider to use; leave empty to use the cache_resource_key cache partition (default is "resource").',
              'type' => 'textfield',
              'options' => '',
              'value' => false,
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'The key of the cache provider to use; leave empty to use the cache_resource_key cache partition (default is "resource").',
              'area_trans' => '',
            ),
            'cache_handler' => 
            array (
              'name' => 'cache_handler',
              'desc' => 'The cache provider implementation to use; leave empty unless you are caching to a custom cache_key.',
              'type' => 'textfield',
              'options' => '',
              'value' => false,
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'The cache provider implementation to use; leave empty unless you are caching to a custom cache_key.',
              'area_trans' => '',
            ),
            'cache_expires' => 
            array (
              'name' => 'cache_expires',
              'desc' => 'The number of seconds before the cached pages expire and must be regenerated; leave empty to use the cache provider option for cache_expires.',
              'type' => 'textfield',
              'options' => '',
              'value' => false,
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'The number of seconds before the cached pages expire and must be regenerated; leave empty to use the cache provider option for cache_expires.',
              'area_trans' => '',
            ),
            'pageNavScheme' => 
            array (
              'name' => 'pageNavScheme',
              'desc' => 'Optionally specify a scheme for use when generating page navigation links; will use link_tag_scheme if empty or not specified (default is empty).',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'Optionally specify a scheme for use when generating page navigation links; will use link_tag_scheme if empty or not specified (default is empty).',
              'area_trans' => '',
            ),
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => '/**
 * @package getpage
 */
$output = \'\';

$properties =& $scriptProperties;
$properties[\'page\'] = (isset($_GET[$properties[\'pageVarKey\']]) && ($page = intval($_GET[$properties[\'pageVarKey\']]))) ? $page : null;
if ($properties[\'page\'] === null) {
    $properties[\'page\'] = (isset($_REQUEST[$properties[\'pageVarKey\']]) && ($page = intval($_REQUEST[$properties[\'pageVarKey\']]))) ? $page : 1;
}
$properties[\'limit\'] = (isset($_GET[\'limit\'])) ? intval($_GET[\'limit\']) : null;
if ($properties[\'limit\'] === null) {
    $properties[\'limit\'] = (isset($_REQUEST[\'limit\'])) ? intval($_REQUEST[\'limit\']) : intval($limit);
}
$properties[\'offset\'] = (!empty($properties[\'limit\']) && !empty($properties[\'page\'])) ? ($properties[\'limit\'] * ($properties[\'page\'] - 1)) : 0;
$properties[\'totalVar\'] = empty($totalVar) ? "total" : $totalVar;
$properties[$properties[\'totalVar\']] = !empty($properties[$properties[\'totalVar\']]) && $total = intval($properties[$properties[\'totalVar\']]) ? $total : 0;
$properties[\'pageOneLimit\'] = (!empty($pageOneLimit) && $pageOneLimit = intval($pageOneLimit)) ? $pageOneLimit : $properties[\'limit\'];
$properties[\'actualLimit\'] = $properties[\'limit\'];
$properties[\'pageLimit\'] = isset($pageLimit) && is_numeric($pageLimit) ? intval($pageLimit) : 5;
$properties[\'element\'] = empty($element) ? \'\' : $element;
$properties[\'elementClass\'] = empty($elementClass) ? \'modChunk\' : $elementClass;
$properties[\'pageNavVar\'] = empty($pageNavVar) ? \'page.nav\' : $pageNavVar;
$properties[\'pageNavTpl\'] = !isset($pageNavTpl) ? "<li[[+classes]]><a[[+classes]][[+title]] href=\\"[[+href]]\\">[[+pageNo]]</a></li>" : $pageNavTpl;
$properties[\'pageNavOuterTpl\'] = !isset($pageNavOuterTpl) ? "[[+first]][[+prev]][[+pages]][[+next]][[+last]]" : $pageNavOuterTpl;
$properties[\'pageActiveTpl\'] = !isset($pageActiveTpl) ? "<li[[+activeClasses:default=` class=\\"active\\"`]]><a[[+activeClasses:default=` class=\\"active\\"`]][[+title]] href=\\"[[+href]]\\">[[+pageNo]]</a></li>" : $pageActiveTpl;
$properties[\'pageFirstTpl\'] = !isset($pageFirstTpl) ? "<li class=\\"control\\"><a[[+title]] href=\\"[[+href]]\\">First</a></li>" : $pageFirstTpl;
$properties[\'pageLastTpl\'] = !isset($pageLastTpl) ? "<li class=\\"control\\"><a[[+title]] href=\\"[[+href]]\\">Last</a></li>" : $pageLastTpl;
$properties[\'pagePrevTpl\'] = !isset($pagePrevTpl) ? "<li class=\\"control\\"><a[[+title]] href=\\"[[+href]]\\">&lt;&lt;</a></li>" : $pagePrevTpl;
$properties[\'pageNextTpl\'] = !isset($pageNextTpl) ? "<li class=\\"control\\"><a[[+title]] href=\\"[[+href]]\\">&gt;&gt;</a></li>" : $pageNextTpl;
$properties[\'toPlaceholder\'] = !empty($toPlaceholder) ? $toPlaceholder : \'\';
$properties[\'cache\'] = isset($cache) ? (boolean) $cache : (boolean) $modx->getOption(\'cache_resource\', null, false);
if (empty($cache_key)) $properties[xPDO::OPT_CACHE_KEY] = $modx->getOption(\'cache_resource_key\', null, \'resource\');
if (empty($cache_handler)) $properties[xPDO::OPT_CACHE_HANDLER] = $modx->getOption(\'cache_resource_handler\', null, \'xPDOFileCache\');
if (empty($cache_expires)) $properties[xPDO::OPT_CACHE_EXPIRES] = (integer) $modx->getOption(\'cache_resource_expires\', null, 0);

if ($properties[\'page\'] == 1 && $properties[\'pageOneLimit\'] !== $properties[\'actualLimit\']) {
    $properties[\'limit\'] = $properties[\'pageOneLimit\'];
}

if ($properties[\'cache\']) {
    $properties[\'cachePageKey\'] = $modx->resource->getCacheKey() . \'/\' . $properties[\'page\'] . \'/\' . md5(http_build_query($modx->request->getParameters()) . http_build_query($scriptProperties));
    $properties[\'cacheOptions\'] = array(
        xPDO::OPT_CACHE_KEY => $properties[xPDO::OPT_CACHE_KEY],
        xPDO::OPT_CACHE_HANDLER => $properties[xPDO::OPT_CACHE_HANDLER],
        xPDO::OPT_CACHE_EXPIRES => $properties[xPDO::OPT_CACHE_EXPIRES],
    );
}
$cached = false;
if ($properties[\'cache\']) {
    if ($modx->getCacheManager()) {
        $cached = $modx->cacheManager->get($properties[\'cachePageKey\'], $properties[\'cacheOptions\']);
    }
}
if (empty($cached) || !isset($cached[\'properties\']) || !isset($cached[\'output\'])) {
    $elementObj = $modx->getObject($properties[\'elementClass\'], array(\'name\' => $properties[\'element\']));
    if ($elementObj) {
        $elementObj->setCacheable(false);
        if (!empty($properties[\'toPlaceholder\'])) {
            $elementObj->process($properties);
            $output = $modx->getPlaceholder($properties[\'toPlaceholder\']);
        } else {
            $output = $elementObj->process($properties);
        }
    }

    include_once $modx->getOption(\'getpage.core_path\',$properties,$modx->getOption(\'core_path\', $properties, MODX_CORE_PATH) . \'components/getpage/\').\'include.getpage.php\';

    $qs = $modx->request->getParameters();
    $properties[\'qs\'] =& $qs;

    $totalSet = $modx->getPlaceholder($properties[\'totalVar\']);
    $properties[$properties[\'totalVar\']] = (($totalSet = intval($totalSet)) ? $totalSet : $properties[$properties[\'totalVar\']]);
    if (!empty($properties[$properties[\'totalVar\']]) && !empty($properties[\'actualLimit\'])) {
        if ($properties[\'pageOneLimit\'] !== $properties[\'actualLimit\']) {
            $adjustedTotal = $properties[$properties[\'totalVar\']] - $properties[\'pageOneLimit\'];
            $properties[\'pageCount\'] = $adjustedTotal > 0 ? ceil($adjustedTotal / $properties[\'actualLimit\']) + 1 : 1;
        } else {
            $properties[\'pageCount\'] = ceil($properties[$properties[\'totalVar\']] / $properties[\'actualLimit\']);
        }
    } else {
        $properties[\'pageCount\'] = 1;
    }
    if (empty($properties[$properties[\'totalVar\']]) || empty($properties[\'actualLimit\']) || $properties[$properties[\'totalVar\']] <= $properties[\'actualLimit\'] || ($properties[\'page\'] == 1 && $properties[$properties[\'totalVar\']] <= $properties[\'pageOneLimit\'])) {
        $properties[\'page\'] = 1;
    } else {
        $pageNav = getpage_buildControls($modx, $properties);
        $properties[$properties[\'pageNavVar\']] = $modx->newObject(\'modChunk\')->process(array_merge($properties, $pageNav), $properties[\'pageNavOuterTpl\']);
        if ($properties[\'page\'] > 1) {
            $qs[$properties[\'pageVarKey\']] = $properties[\'page\'];
        }
    }

    $properties[\'firstItem\'] = $properties[\'offset\'] + 1;
    $properties[\'lastItem\'] = ($properties[\'offset\'] + $properties[\'limit\']) < $totalSet ? ($properties[\'offset\'] + $properties[\'limit\']) : $totalSet;

    $properties[\'pageUrl\'] = $modx->makeUrl($modx->resource->get(\'id\'), \'\', $qs);
    if ($properties[\'cache\'] && $modx->getCacheManager()) {
        $cached = array(\'properties\' => $properties, \'output\' => $output);
        $modx->cacheManager->set($properties[\'cachePageKey\'], $cached, $properties[xPDO::OPT_CACHE_EXPIRES], $properties[\'cacheOptions\']);
    }
} else {
    $properties = $cached[\'properties\'];
    $output = $cached[\'output\'];
}
$modx->setPlaceholders($properties, $properties[\'namespace\']);
if (!empty($properties[\'toPlaceholder\'])) {
    $modx->setPlaceholder($properties[\'toPlaceholder\'], $output);
    $output = \'\';
}

return $output;',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
        ),
      ),
      'If' => 
      array (
        'fields' => 
        array (
          'id' => 15,
          'source' => 0,
          'property_preprocess' => false,
          'name' => 'If',
          'description' => 'Simple if (conditional) snippet',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '/**
 * If
 *
 * Copyright 2009-2010 by Jason Coward <jason@modx.com> and Shaun McCormick
 * <shaun@modx.com>
 *
 * If is free software; you can redistribute it and/or modify it under the terms
 * of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * If is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * If; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package if
 */
/**
 * Simple if (conditional) snippet
 *
 * @package if
 */
if (!empty($debug)) {
    print_r($scriptProperties);
    if (!empty($die)) die();
}
$modx->parser->processElementTags(\'\',$subject,true,true);

$output = \'\';
$operator = !empty($operator) ? $operator : \'\';
$operand = !isset($operand) ? \'\' : $operand;
if (isset($subject)) {
    if (!empty($operator)) {
        $operator = strtolower($operator);
        switch ($operator) {
            case \'!=\':
            case \'neq\':
            case \'not\':
            case \'isnot\':
            case \'isnt\':
            case \'unequal\':
            case \'notequal\':
                $output = (($subject != $operand) ? $then : (isset($else) ? $else : \'\'));
                break;
            case \'<\':
            case \'lt\':
            case \'less\':
            case \'lessthan\':
                $output = (($subject < $operand) ? $then : (isset($else) ? $else : \'\'));
                break;
            case \'>\':
            case \'gt\':
            case \'greater\':
            case \'greaterthan\':
                $output = (($subject > $operand) ? $then : (isset($else) ? $else : \'\'));
                break;
            case \'<=\':
            case \'lte\':
            case \'lessthanequals\':
            case \'lessthanorequalto\':
                $output = (($subject <= $operand) ? $then : (isset($else) ? $else : \'\'));
                break;
            case \'>=\':
            case \'gte\':
            case \'greaterthanequals\':
            case \'greaterthanequalto\':
                $output = (($subject >= $operand) ? $then : (isset($else) ? $else : \'\'));
                break;
            case \'isempty\':
            case \'empty\':
                $output = empty($subject) ? $then : (isset($else) ? $else : \'\');
                break;
            case \'!empty\':
            case \'notempty\':
            case \'isnotempty\':
                $output = !empty($subject) && $subject != \'\' ? $then : (isset($else) ? $else : \'\');
                break;
            case \'isnull\':
            case \'null\':
                $output = $subject == null || strtolower($subject) == \'null\' ? $then : (isset($else) ? $else : \'\');
                break;
            case \'inarray\':
            case \'in_array\':
            case \'ia\':
                $operand = explode(\',\',$operand);
                $output = in_array($subject,$operand) ? $then : (isset($else) ? $else : \'\');
                break;
            case \'==\':
            case \'=\':
            case \'eq\':
            case \'is\':
            case \'equal\':
            case \'equals\':
            case \'equalto\':
            default:
                $output = (($subject == $operand) ? $then : (isset($else) ? $else : \'\'));
                break;
        }
    }
}
if (!empty($debug)) { var_dump($output); }
unset($subject);
return $output;',
          'locked' => false,
          'properties' => 
          array (
            'subject' => 
            array (
              'name' => 'subject',
              'desc' => 'The data being affected.',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'The data being affected.',
              'area_trans' => '',
            ),
            'operator' => 
            array (
              'name' => 'operator',
              'desc' => 'The type of conditional.',
              'type' => 'list',
              'options' => 
              array (
                0 => 
                array (
                  'value' => 'EQ',
                  'text' => 'EQ',
                  'name' => 'EQ',
                ),
                1 => 
                array (
                  'value' => 'NEQ',
                  'text' => 'NEQ',
                  'name' => 'NEQ',
                ),
                2 => 
                array (
                  'value' => 'LT',
                  'text' => 'LT',
                  'name' => 'LT',
                ),
                3 => 
                array (
                  'value' => 'GT',
                  'text' => 'GT',
                  'name' => 'GT',
                ),
                4 => 
                array (
                  'value' => 'LTE',
                  'text' => 'LTE',
                  'name' => 'LTE',
                ),
                5 => 
                array (
                  'value' => 'GT',
                  'text' => 'GTE',
                  'name' => 'GTE',
                ),
                6 => 
                array (
                  'value' => 'EMPTY',
                  'text' => 'EMPTY',
                  'name' => 'EMPTY',
                ),
                7 => 
                array (
                  'value' => 'NOTEMPTY',
                  'text' => 'NOTEMPTY',
                  'name' => 'NOTEMPTY',
                ),
                8 => 
                array (
                  'value' => 'ISNULL',
                  'text' => 'ISNULL',
                  'name' => 'ISNULL',
                ),
                9 => 
                array (
                  'value' => 'inarray',
                  'text' => 'INARRAY',
                  'name' => 'INARRAY',
                ),
              ),
              'value' => 'EQ',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'The type of conditional.',
              'area_trans' => '',
            ),
            'operand' => 
            array (
              'name' => 'operand',
              'desc' => 'When comparing to the subject, this is the data to compare to.',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'When comparing to the subject, this is the data to compare to.',
              'area_trans' => '',
            ),
            'then' => 
            array (
              'name' => 'then',
              'desc' => 'If conditional was successful, output this.',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'If conditional was successful, output this.',
              'area_trans' => '',
            ),
            'else' => 
            array (
              'name' => 'else',
              'desc' => 'If conditional was unsuccessful, output this.',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'If conditional was unsuccessful, output this.',
              'area_trans' => '',
            ),
            'debug' => 
            array (
              'name' => 'debug',
              'desc' => 'Will output the parameters passed in, as well as the end output. Leave off when not testing.',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => false,
              'lexicon' => NULL,
              'area' => '',
              'desc_trans' => 'Will output the parameters passed in, as well as the end output. Leave off when not testing.',
              'area_trans' => '',
            ),
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => '/**
 * If
 *
 * Copyright 2009-2010 by Jason Coward <jason@modx.com> and Shaun McCormick
 * <shaun@modx.com>
 *
 * If is free software; you can redistribute it and/or modify it under the terms
 * of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * If is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * If; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package if
 */
/**
 * Simple if (conditional) snippet
 *
 * @package if
 */
if (!empty($debug)) {
    print_r($scriptProperties);
    if (!empty($die)) die();
}
$modx->parser->processElementTags(\'\',$subject,true,true);

$output = \'\';
$operator = !empty($operator) ? $operator : \'\';
$operand = !isset($operand) ? \'\' : $operand;
if (isset($subject)) {
    if (!empty($operator)) {
        $operator = strtolower($operator);
        switch ($operator) {
            case \'!=\':
            case \'neq\':
            case \'not\':
            case \'isnot\':
            case \'isnt\':
            case \'unequal\':
            case \'notequal\':
                $output = (($subject != $operand) ? $then : (isset($else) ? $else : \'\'));
                break;
            case \'<\':
            case \'lt\':
            case \'less\':
            case \'lessthan\':
                $output = (($subject < $operand) ? $then : (isset($else) ? $else : \'\'));
                break;
            case \'>\':
            case \'gt\':
            case \'greater\':
            case \'greaterthan\':
                $output = (($subject > $operand) ? $then : (isset($else) ? $else : \'\'));
                break;
            case \'<=\':
            case \'lte\':
            case \'lessthanequals\':
            case \'lessthanorequalto\':
                $output = (($subject <= $operand) ? $then : (isset($else) ? $else : \'\'));
                break;
            case \'>=\':
            case \'gte\':
            case \'greaterthanequals\':
            case \'greaterthanequalto\':
                $output = (($subject >= $operand) ? $then : (isset($else) ? $else : \'\'));
                break;
            case \'isempty\':
            case \'empty\':
                $output = empty($subject) ? $then : (isset($else) ? $else : \'\');
                break;
            case \'!empty\':
            case \'notempty\':
            case \'isnotempty\':
                $output = !empty($subject) && $subject != \'\' ? $then : (isset($else) ? $else : \'\');
                break;
            case \'isnull\':
            case \'null\':
                $output = $subject == null || strtolower($subject) == \'null\' ? $then : (isset($else) ? $else : \'\');
                break;
            case \'inarray\':
            case \'in_array\':
            case \'ia\':
                $operand = explode(\',\',$operand);
                $output = in_array($subject,$operand) ? $then : (isset($else) ? $else : \'\');
                break;
            case \'==\':
            case \'=\':
            case \'eq\':
            case \'is\':
            case \'equal\':
            case \'equals\':
            case \'equalto\':
            default:
                $output = (($subject == $operand) ? $then : (isset($else) ? $else : \'\'));
                break;
        }
    }
}
if (!empty($debug)) { var_dump($output); }
unset($subject);
return $output;',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
        ),
      ),
      'is_numeric' => 
      array (
        'fields' => 
        array (
          'id' => 22,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'is_numeric',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => 'if (is_numeric($price)) echo "true";
else echo "false";',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => 'if (is_numeric($price)) echo "true";
else echo "false";',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
      'price_format' => 
      array (
        'fields' => 
        array (
          'id' => 21,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'price_format',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => 'echo number_format((double)$price, 2, \'.\', \'\');',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => 'echo number_format((double)$price, 2, \'.\', \'\');',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
    ),
    'modTemplateVar' => 
    array (
    ),
  ),
);