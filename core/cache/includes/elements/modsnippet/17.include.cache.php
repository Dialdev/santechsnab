<?php
/*print_r($_SESSION);*/
if (!isset($_SESSION['basket'])) return "<h2>Ваша корзина пуста.<br> Для заказа товара перейдите в <a href='katalog'>каталог</a></h2>
<div class='uslov_dostavki'>
<p>При заказе счетов от 10 000 руб. доставка по г. Тула осуществляется бесплатно.</p>
<p>По области стоимость доставки определяется индивидуально.</p>
<p>При крупных заказах (от 50 000 руб) - бесплатно.</p>
</div>";
echo "<div class='basket_content'>";
$summ = 0;
foreach ($_SESSION['basket'] as $id => $count)
{
  $resource = $modx->getObject('modResource', $id);
  $price = $resource->getTVValue('price');
  $summ += $price*$count;
  
echo '
<div style="display:none"><span class="minus">-</span><input type="text" value="',$count,'" data-id="',$id,'" data-value="',$count,'"  data-price="',$price,'"><span class="plus">+</span></div>
<table id="basket_table">
<tr>
	<td class="name" rowspan="2"><a href="[[~',$id,']]">',$resource->pagetitle,'</a></td>
	<td class="quantity">Количество</td>
	<td class="price">Цена</td>
	<td class="summ">Сумма</td>
	<td class="delete">Удалить</td>
</tr>
';

  echo '
<tr>
	
	<td><span class="minus">-</span><input type="text" value="',$count,'" data-id="',$id,'" data-value="',$count,'"  data-price="',$price,'"><span class="plus">+</span></td>
	<td class="price_val">',number_format($price, 2, '.', ''),'</td>
	<td class="summ_val">',number_format($price*$count, 2, '.', ''),'</td>
	<td><span class="delete delete_btn">x</span></td>
</tr>
<tr>
    <td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
</table>';
}

echo '
<div class="itog">
	Сумма общего заказа:
	<div id="total_summ">
		<span>',number_format($summ, 2, '.', ''),'</span> руб.
	</div>
	<a href="[[~522]]">Оформить заказ</a>
</div>
</div>
<div class="uslov_dostavki">
<p>При заказе счетов от 10 000 руб. доставка по г. Тула осуществляется бесплатно.</p>
<p>По области стоимость доставки определяется индивидуально.</p>
<p>При крупных заказах (от 50 000 руб) - бесплатно.</p>
</div>
';
return;
