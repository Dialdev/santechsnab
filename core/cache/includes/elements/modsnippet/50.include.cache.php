<?php
$sort_name = isset($_GET['sortby']) ? strip_tags($_GET['sortby']) : 'price';
if ($sort_name != 'title') return $sort_name;
return '';
return;
