<?php  return '$summ = 0;
echo "
<table border=\'1\' cellpadding=\'10\'>
<tr>
    <td>Название</td>
	<td>Количество</td>
	<td>Цена</td>
	<td>Сумма</td>
</tr>";
foreach ($_SESSION[\'basket\'] as $id => $count)
{
  $resource = $modx->getObject(\'modResource\', $id);
  $price = $resource->getTVValue(\'price\');
  $summ += $price*$count;
  
echo \'
<tr>
	<td>\',$resource->pagetitle,\'</td>
	<td>\',$count,\'</td>
	<td class="price_val">\',$price,\'</td>
	<td class="summ_val">\',$price*$count,\'</td>

</tr>
\';
}
echo \'
</table>
Сумма общего заказа: \',$summ,\' руб.\';
//unset($_SESSION[\'basket\']);
return;
';