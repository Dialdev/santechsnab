<?php
session_start();

if (isset($_POST['add'])) { 
    foreach ($_POST['data'] as $id => $count) {
         $_SESSION['basket'][$id]  += $count;
        //print_r ($_SESSION['basket']);
         //print_r ($_SESSION);
    }
    return "add";
} 
if ($_POST['remove'] == 1)
{
  unset($_SESSION['basket'][$_POST['id']]);
  if (count($_SESSION['basket']) == 0) unset($_SESSION['basket']);
}
//print_r ($_SESSION);
return;
