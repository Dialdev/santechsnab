<?php
$sort_name = isset($_GET['sortby']) ? strip_tags($_GET['sortby']) : 'price';

$sort_direction = (isset($_GET['sortdir']) && $_GET['sortdir'] == 'desc') ? 'DESC' : 'ASC';

if ($sort_name == 'title') return '{"pagetitle":"' . $sort_direction . '"}';
//if ($sort_name == 'title') return '"pagetitle":"' . $sort_direction . '",';
return '';
return;
