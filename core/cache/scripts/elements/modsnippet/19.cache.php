<?php  return '$summ = 0;
if ($_SESSION[\'basket\']) {
foreach ($_SESSION[\'basket\'] as $count)
  $summ += $count;
}
return $summ;
return;
';