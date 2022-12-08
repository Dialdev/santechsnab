<?php
switch ($modx->event->name)
{
case 'OnWebPageInit':
        if (stristr($_SERVER['REQUEST_URI'], '//'))
        {
                $g = preg_replace("|[//\s]+|is", "/", $_SERVER['REQUEST_URI']);
                $modx->sendRedirect($g);
        }
        if (stristr($_SERVER['REQUEST_URI'], '/index'))
        {
                $g = preg_replace("|[/index\s]+|is", "/", $_SERVER['REQUEST_URI']);
                $modx->sendRedirect($g);
        }
        
        break;
}
return;
