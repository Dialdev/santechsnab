<?php  return array (
  'config' => 
  array (
    'allow_tags_in_post' => '1',
    'modRequest.class' => 'modManagerRequest',
  ),
  'aliasMap' => 
  array (
  ),
  'webLinkMap' => 
  array (
  ),
  'eventMap' => 
  array (
    'OnBeforeDocFormSave' => 
    array (
      19 => '19',
    ),
    'OnChunkFormPrerender' => 
    array (
      11 => '11',
    ),
    'OnDocFormPrerender' => 
    array (
      11 => '11',
    ),
    'OnDocFormRender' => 
    array (
      17 => '17',
    ),
    'OnDocFormSave' => 
    array (
      4 => '4',
      17 => '17',
      19 => '19',
    ),
    'OnDocPublished' => 
    array (
      4 => '4',
    ),
    'OnDocUnPublished' => 
    array (
      4 => '4',
    ),
    'OnFileCreateFormPrerender' => 
    array (
      11 => '11',
    ),
    'OnFileEditFormPrerender' => 
    array (
      11 => '11',
    ),
    'OnFileManagerUpload' => 
    array (
      13 => '13',
    ),
    'OnHandleRequest' => 
    array (
      8 => '8',
    ),
    'OnLoadWebDocument' => 
    array (
      13 => '13',
    ),
    'OnLoadWebPageCache' => 
    array (
      8 => '8',
    ),
    'OnManagerPageAfterRender' => 
    array (
      7 => '7',
    ),
    'OnManagerPageBeforeRender' => 
    array (
      7 => '7',
      9 => '9',
      11 => '11',
    ),
    'OnManagerPageInit' => 
    array (
      19 => '19',
    ),
    'OnMODXInit' => 
    array (
      10 => '10',
    ),
    'OnPageNotFound' => 
    array (
      19 => '19',
      13 => '13',
      17 => '17',
    ),
    'OnPluginFormPrerender' => 
    array (
      11 => '11',
    ),
    'OnResourceBeforeSort' => 
    array (
      19 => '19',
    ),
    'OnResourceDelete' => 
    array (
      4 => '4',
    ),
    'OnResourceDuplicate' => 
    array (
      4 => '4',
    ),
    'OnResourceSort' => 
    array (
      19 => '19',
    ),
    'OnResourceUndelete' => 
    array (
      4 => '4',
    ),
    'OnRichTextBrowserInit' => 
    array (
      6 => '6',
    ),
    'OnRichTextEditorInit' => 
    array (
      6 => '6',
    ),
    'OnRichTextEditorRegister' => 
    array (
      6 => '6',
      11 => '11',
    ),
    'OnSiteRefresh' => 
    array (
      12 => '12',
      13 => '13',
      10 => '10',
    ),
    'OnSnipFormPrerender' => 
    array (
      11 => '11',
    ),
    'OnTempFormPrerender' => 
    array (
      11 => '11',
    ),
    'OnWebPageInit' => 
    array (
      18 => '18',
      8 => '8',
    ),
    'OnWebPagePrerender' => 
    array (
      10 => '10',
      8 => '8',
    ),
  ),
  'pluginCache' => 
  array (
    4 => 
    array (
      'id' => '4',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'SimpleSearchIndexer',
      'description' => 'Automatically indexes Resources into Solr.',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * SimpleSearch
 *
 * Copyright 2010-11 by Shaun McCormick <shaun+sisea@modx.com>
 *
 * This file is part of SimpleSearch, a simple search component for MODx
 * Revolution. It is loosely based off of AjaxSearch for MODx Evolution by
 * coroico/kylej, minus the ajax.
 *
 * SimpleSearch is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * SimpleSearch is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * SimpleSearch; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package simplesearch
 */
/**
 * Plugin to index Resources whenever they are changed, published, unpublished,
 * deleted, or undeleted.
 *
 * @var modX $modx
 * @var SimpleSearch $search
 *
 * @package simplesearch
 */

require_once $modx->getOption(\'sisea.core_path\',null,$modx->getOption(\'core_path\').\'components/simplesearch/\').\'model/simplesearch/simplesearch.class.php\';
$search = new SimpleSearch($modx,$scriptProperties);

$search->loadDriver($scriptProperties);
if (!$search->driver || (!($search->driver instanceof SimpleSearchDriverSolr) && !($search->driver instanceof SimpleSearchDriverElastic))) return;

/**
 * helper method for missing params in events
 * @param modX $modx
 * @param array $children
 * @param int $parent
 * @return boolean
 */
if (!function_exists(\'SimpleSearchGetChildren\')) {
    function SimpleSearchGetChildren(&$modx,&$children,$parent) {
        $success = false;
        $kids = $modx->getCollection(\'modResource\',array(
            \'parent\' => $parent,
        ));
        if (!empty($kids)) {
            /** @var modResource $kid */
            foreach ($kids as $kid) {
                $children[] = $kid->toArray();
                SimpleSearchGetChildren($modx,$children,$kid->get(\'id\'));
            }
        }
        return $success;
    }
}

$action = \'index\';
$resourcesToIndex = array();
switch ($modx->event->name) {
    case \'OnDocFormSave\':
        $action = \'index\';
        $resourceArray = $scriptProperties[\'resource\']->toArray();

        if ($resourceArray[\'published\'] == 1 && $resourceArray[\'deleted\'] == 0) {
            $action = \'index\';
            foreach ($_POST as $k => $v) {
                if (substr($k,0,2) == \'tv\') {
                    $id = str_replace(\'tv\',\'\',$k);
                    /** @var modTemplateVar $tv */
                    $tv = $modx->getObject(\'modTemplateVar\',$id);
                    if ($tv) {
                        $resourceArray[$tv->get(\'name\')] = $tv->renderOutput($resource->get(\'id\'));
                        $modx->log(modX::LOG_LEVEL_DEBUG,\'Indexing \'.$tv->get(\'name\').\': \'.$resourceArray[$tv->get(\'name\')]);
                    }
                    unset($resourceArray[$k]);
                }
            }
        } else {
            $action = \'removeIndex\';
        }

        unset($resourceArray[\'ta\'],$resourceArray[\'action\'],$resourceArray[\'tiny_toggle\'],$resourceArray[\'HTTP_MODAUTH\'],$resourceArray[\'modx-ab-stay\'],$resourceArray[\'resource_groups\']);
        $resourcesToIndex[] = $resourceArray;
        break;
    case \'OnDocPublished\':
        $action = \'index\';
        $resourceArray = $scriptProperties[\'resource\']->toArray();
        unset($resourceArray[\'ta\'],$resourceArray[\'action\'],$resourceArray[\'tiny_toggle\'],$resourceArray[\'HTTP_MODAUTH\'],$resourceArray[\'modx-ab-stay\'],$resourceArray[\'resource_groups\']);
        $resourcesToIndex[] = $resourceArray;
        break;
    case \'OnDocUnpublished\':
    case \'OnDocUnPublished\':
        $action = \'removeIndex\';
        $resourceArray = $scriptProperties[\'resource\']->toArray();
        unset($resourceArray[\'ta\'],$resourceArray[\'action\'],$resourceArray[\'tiny_toggle\'],$resourceArray[\'HTTP_MODAUTH\'],$resourceArray[\'modx-ab-stay\'],$resourceArray[\'resource_groups\']);
        $resourcesToIndex[] = $resourceArray;
        break;
    case \'OnResourceDuplicate\':
        $action = \'index\';
        /** @var modResource $newResource */
        $resourcesToIndex[] = $newResource->toArray();
        $children = array();
        SimpleSearchGetChildren($modx,$children,$newResource->get(\'id\'));
        foreach ($children as $child) {
            $resourcesToIndex[] = $child;
        }
        break;
    case \'OnResourceDelete\':
        $action = \'removeIndex\';
        $resourcesToIndex[] = $resource->toArray();
        $children = array();
        SimpleSearchGetChildren($modx,$children,$resource->get(\'id\'));
        foreach ($children as $child) {
            $resourcesToIndex[] = $child;
        }
        break;
    case \'OnResourceUndelete\':
        $action = \'index\';
        $resourcesToIndex[] = $resource->toArray();
        $children = array();
        SimpleSearchGetChildren($modx,$children,$resource->get(\'id\'));
        foreach ($children as $child) {
            $resourcesToIndex[] = $child;
        }
        break;
}

foreach ($resourcesToIndex as $resourceArray) {
    if (!empty($resourceArray[\'id\'])) {
        if ($action == \'index\') {
            $search->driver->index($resourceArray);
        } else if ($action == \'removeIndex\') {
            $search->driver->removeIndex($resourceArray[\'id\']);
        }
    }
}
return;',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    6 => 
    array (
      'id' => '6',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'TinyMCE',
      'description' => 'TinyMCE 4.3.4-pl plugin for MODx Revolution',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * TinyMCE RichText Editor Plugin
 *
 * Events: OnRichTextEditorInit, OnRichTextEditorRegister,
 * OnBeforeManagerPageInit, OnRichTextBrowserInit
 *
 * @author Jeff Whitfield <jeff@collabpad.com>
 * @author Shaun McCormick <shaun@collabpad.com>
 *
 * @var modX $modx
 * @var array $scriptProperties
 *
 * @package tinymce
 * @subpackage build
 */
if ($modx->event->name == \'OnRichTextEditorRegister\') {
    $modx->event->output(\'TinyMCE\');
    return;
}
require_once $modx->getOption(\'tiny.core_path\',null,$modx->getOption(\'core_path\').\'components/tinymce/\').\'tinymce.class.php\';
$tiny = new TinyMCE($modx,$scriptProperties);

$useEditor = $tiny->context->getOption(\'use_editor\',false);
$whichEditor = $tiny->context->getOption(\'which_editor\',\'\');

/* Handle event */
switch ($modx->event->name) {
    case \'OnRichTextEditorInit\':
        if ($useEditor && $whichEditor == \'TinyMCE\') {
            unset($scriptProperties[\'chunk\']);
            if (isset($forfrontend) || $modx->context->get(\'key\') != \'mgr\') {
                $def = $tiny->context->getOption(\'cultureKey\',$tiny->context->getOption(\'manager_language\',\'en\'));
                $tiny->properties[\'language\'] = $modx->getOption(\'fe_editor_lang\',array(),$def);
                $tiny->properties[\'frontend\'] = true;
                unset($def);
            }
            /* commenting these out as it causes problems with richtext tvs */
            //if (isset($scriptProperties[\'resource\']) && !$resource->get(\'richtext\')) return;
            //if (!isset($scriptProperties[\'resource\']) && !$modx->getOption(\'richtext_default\',null,false)) return;
            $tiny->setProperties($scriptProperties);
            $html = $tiny->initialize();
            $modx->event->output($html);
            unset($html);
        }
        break;
    case \'OnRichTextBrowserInit\':
        if ($useEditor && $whichEditor == \'TinyMCE\') {
            $inRevo20 = (boolean)version_compare($modx->version[\'full_version\'],\'2.1.0-rc1\',\'<\');
            $modx->getVersionData();
            $source = $tiny->context->getOption(\'default_media_source\',null,1);
            
            $modx->controller->addHtml(\'<script type="text/javascript">var inRevo20 = \'.($inRevo20 ? 1 : 0).\';MODx.source = "\'.$source.\'";</script>\');
            
            $modx->controller->addJavascript($tiny->config[\'assetsUrl\'].\'jscripts/tiny_mce/tiny_mce_popup.js\');
            if (file_exists($tiny->config[\'assetsPath\'].\'jscripts/tiny_mce/langs/\'.$tiny->properties[\'language\'].\'.js\')) {
                $modx->controller->addJavascript($tiny->config[\'assetsUrl\'].\'jscripts/tiny_mce/langs/\'.$tiny->properties[\'language\'].\'.js\');
            } else {
                $modx->controller->addJavascript($tiny->config[\'assetsUrl\'].\'jscripts/tiny_mce/langs/en.js\');
            }
            $modx->controller->addJavascript($tiny->config[\'assetsUrl\'].\'tiny.browser.js\');
            $modx->event->output(\'Tiny.browserCallback\');
        }
        return \'\';
        break;

   default: break;
}
return;',
      'locked' => '0',
      'properties' => 'a:39:{s:22:"accessibility_warnings";a:7:{s:4:"name";s:22:"accessibility_warnings";s:4:"desc";s:315:"If this option is set to true some accessibility warnings will be presented to the user if they miss specifying that information. This option is set to true by default, since we should all try to make this world a better place for disabled people. But if you are annoyed with the warnings, set this option to false.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:23:"apply_source_formatting";a:7:{s:4:"name";s:23:"apply_source_formatting";s:4:"desc";s:229:"This option enables you to tell TinyMCE to apply some source formatting to the output HTML code. With source formatting, the output HTML code is indented and formatted. Without source formatting, the output HTML is more compact. ";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:15:"button_tile_map";a:7:{s:4:"name";s:15:"button_tile_map";s:4:"desc";s:338:"If this option is set to true TinyMCE will use tiled images instead of individual images for most of the editor controls. This produces faster loading time since only one GIF image needs to be loaded instead of a GIF for each individual button. This option is set to false by default since it doesn\'t work with some DOCTYPE declarations. ";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:7:"cleanup";a:7:{s:4:"name";s:7:"cleanup";s:4:"desc";s:331:"This option enables or disables the built-in clean up functionality. TinyMCE is equipped with powerful clean up functionality that enables you to specify what elements and attributes are allowed and how HTML contents should be generated. This option is set to true by default, but if you want to disable it you may set it to false.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:18:"cleanup_on_startup";a:7:{s:4:"name";s:18:"cleanup_on_startup";s:4:"desc";s:135:"If you set this option to true, TinyMCE will perform a HTML cleanup call when the editor loads. This option is set to false by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:22:"convert_fonts_to_spans";a:7:{s:4:"name";s:22:"convert_fonts_to_spans";s:4:"desc";s:348:"If you set this option to true, TinyMCE will convert all font elements to span elements and generate span elements instead of font elements. This option should be used in order to get more W3C compatible code, since font elements are deprecated. How sizes get converted can be controlled by the font_size_classes and font_size_style_values options.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:23:"convert_newlines_to_brs";a:7:{s:4:"name";s:23:"convert_newlines_to_brs";s:4:"desc";s:128:"If you set this option to true, newline characters codes get converted into br elements. This option is set to false by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:12:"convert_urls";a:7:{s:4:"name";s:12:"convert_urls";s:4:"desc";s:495:"This option enables you to control whether TinyMCE is to be clever and restore URLs to their original values. URLs are automatically converted (messed up) by default because the built-in browser logic works this way. There is no way to get the real URL unless you store it away. If you set this option to false it will try to keep these URLs intact. This option is set to true by default, which means URLs will be forced to be either absolute or relative depending on the state of relative_urls.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:11:"dialog_type";a:7:{s:4:"name";s:11:"dialog_type";s:4:"desc";s:246:"This option enables you to specify how dialogs/popups should be opened. Possible values are "window" and "modal", where the window option opens a normal window and the dialog option opens a modal dialog. This option is set to "window" by default.";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{i:0;s:6:"window";s:4:"text";s:6:"Window";}i:1;a:2:{i:0;s:5:"modal";s:4:"text";s:5:"Modal";}}s:5:"value";s:6:"window";s:7:"lexicon";N;s:4:"area";s:0:"";}s:14:"directionality";a:7:{s:4:"name";s:14:"directionality";s:4:"desc";s:261:"This option specifies the default writing direction. Some languages (Like Hebrew, Arabic, Urdu...) write from right to left instead of left to right. The default value of this option is "ltr" but if you want to use from right to left mode specify "rtl" instead.";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:5:"value";s:3:"ltr";s:4:"text";s:13:"Left to Right";}i:1;a:2:{s:5:"value";s:3:"rtl";s:4:"text";s:13:"Right to Left";}}s:5:"value";s:3:"ltr";s:7:"lexicon";N;s:4:"area";s:0:"";}s:14:"element_format";a:7:{s:4:"name";s:14:"element_format";s:4:"desc";s:210:"This option enables control if elements should be in html or xhtml mode. xhtml is the default state for this option. This means that for example &lt;br /&gt; will be &lt;br&gt; if you set this option to "html".";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:5:"value";s:5:"xhtml";s:4:"text";s:5:"XHTML";}i:1;a:2:{s:5:"value";s:4:"html";s:4:"text";s:4:"HTML";}}s:5:"value";s:5:"xhtml";s:7:"lexicon";N;s:4:"area";s:0:"";}s:15:"entity_encoding";a:7:{s:4:"name";s:15:"entity_encoding";s:4:"desc";s:70:"This option controls how entities/characters get processed by TinyMCE.";s:4:"type";s:4:"list";s:7:"options";a:4:{i:0;a:2:{s:5:"value";s:0:"";s:4:"text";s:4:"None";}i:1;a:2:{s:5:"value";s:5:"named";s:4:"text";s:5:"Named";}i:2;a:2:{s:5:"value";s:7:"numeric";s:4:"text";s:7:"Numeric";}i:3;a:2:{s:5:"value";s:3:"raw";s:4:"text";s:3:"Raw";}}s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}s:16:"force_p_newlines";a:7:{s:4:"name";s:16:"force_p_newlines";s:4:"desc";s:147:"This option enables you to disable/enable the creation of paragraphs on return/enter in Mozilla/Firefox. The default value of this option is true. ";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:22:"force_hex_style_colors";a:7:{s:4:"name";s:22:"force_hex_style_colors";s:4:"desc";s:277:"This option enables you to control TinyMCE to force the color format to use hexadecimal instead of rgb strings. It converts for example "color: rgb(255, 255, 0)" to "#FFFF00". This option is set to true by default since otherwice MSIE and Firefox would differ in this behavior.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:6:"height";a:7:{s:4:"name";s:6:"height";s:4:"desc";s:38:"Sets the height of the TinyMCE editor.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:5:"400px";s:7:"lexicon";N;s:4:"area";s:0:"";}s:11:"indentation";a:7:{s:4:"name";s:11:"indentation";s:4:"desc";s:139:"This option allows specification of the indentation level for indent/outdent buttons in the UI. This defaults to 30px but can be any value.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:4:"30px";s:7:"lexicon";N;s:4:"area";s:0:"";}s:16:"invalid_elements";a:7:{s:4:"name";s:16:"invalid_elements";s:4:"desc";s:163:"This option should contain a comma separated list of element names to exclude from the content. Elements in this list will removed when TinyMCE executes a cleanup.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}s:6:"nowrap";a:7:{s:4:"name";s:6:"nowrap";s:4:"desc";s:212:"This nowrap option enables you to control how whitespace is to be wordwrapped within the editor. This option is set to false by default, but if you enable it by setting it to true editor contents will never wrap.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:15:"object_resizing";a:7:{s:4:"name";s:15:"object_resizing";s:4:"desc";s:148:"This option gives you the ability to turn on/off the inline resizing controls of tables and images in Firefox/Mozilla. These are enabled by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:12:"path_options";a:7:{s:4:"name";s:12:"path_options";s:4:"desc";s:119:"Sets a group of options. Note: This will override the relative_urls, document_base_url and remove_script_host settings.";s:4:"type";s:9:"textfield";s:7:"options";a:3:{i:0;a:2:{s:5:"value";s:11:"docrelative";s:4:"text";s:17:"Document Relative";}i:1;a:2:{s:5:"value";s:12:"rootrelative";s:4:"text";s:13:"Root Relative";}i:2;a:2:{s:5:"value";s:11:"fullpathurl";s:4:"text";s:13:"Full Path URL";}}s:5:"value";s:11:"docrelative";s:7:"lexicon";N;s:4:"area";s:0:"";}s:28:"plugin_insertdate_dateFormat";a:7:{s:4:"name";s:28:"plugin_insertdate_dateFormat";s:4:"desc";s:53:"Formatting of dates when using the InsertDate plugin.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:8:"%Y-%m-%d";s:7:"lexicon";N;s:4:"area";s:0:"";}s:28:"plugin_insertdate_timeFormat";a:7:{s:4:"name";s:28:"plugin_insertdate_timeFormat";s:4:"desc";s:53:"Formatting of times when using the InsertDate plugin.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:8:"%H:%M:%S";s:7:"lexicon";N;s:4:"area";s:0:"";}s:12:"preformatted";a:7:{s:4:"name";s:12:"preformatted";s:4:"desc";s:231:"If you enable this feature, whitespace such as tabs and spaces will be preserved. Much like the behavior of a &lt;pre&gt; element. This can be handy when integrating TinyMCE with webmail clients. This option is disabled by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:13:"relative_urls";a:7:{s:4:"name";s:13:"relative_urls";s:4:"desc";s:231:"If this option is set to true, all URLs returned from the file manager will be relative from the specified document_base_url. If it is set to false all URLs will be converted to absolute URLs. This option is set to true by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:17:"remove_linebreaks";a:7:{s:4:"name";s:17:"remove_linebreaks";s:4:"desc";s:531:"This option controls whether line break characters should be removed from output HTML. This option is enabled by default because there are differences between browser implementations regarding what to do with white space in the DOM. Gecko and Safari place white space in text nodes in the DOM. IE and Opera remove them from the DOM and therefore the line breaks will automatically be removed in those. This option will normalize this behavior when enabled (true) and all browsers will have a white-space-stripped DOM serialization.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:18:"remove_script_host";a:7:{s:4:"name";s:18:"remove_script_host";s:4:"desc";s:221:"If this option is enabled the protocol and host part of the URLs returned from the file manager will be removed. This option is only used if the relative_urls option is set to false. This option is set to true by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:20:"remove_trailing_nbsp";a:7:{s:4:"name";s:20:"remove_trailing_nbsp";s:4:"desc";s:392:"This option enables you to specify that TinyMCE should remove any traling &nbsp; characters in block elements if you start to write inside them. Paragraphs are default padded with a &nbsp; and if you write text into such paragraphs the space will remain. Setting this option to true will remove the space. This option is set to false by default since the cursor jumps a bit in Gecko browsers.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:4:"skin";a:7:{s:4:"name";s:4:"skin";s:4:"desc";s:330:"This option enables you to specify what skin you want to use with your theme. A skin is basically a CSS file that gets loaded from the skins directory inside the theme. The advanced theme that TinyMCE comes with has two skins, these are called "default" and "o2k7". We added another skin named "cirkuit" that is chosen by default.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:7:"cirkuit";s:7:"lexicon";N;s:4:"area";s:0:"";}s:12:"skin_variant";a:7:{s:4:"name";s:12:"skin_variant";s:4:"desc";s:403:"This option enables you to specify a variant for the skin, for example "silver" or "black". "default" skin does not offer any variant, whereas "o2k7" default offers "silver" or "black" variants to the default one. For the "cirkuit" skin there\'s one variant named "silver". When creating a skin, additional variants may also be created, by adding ui_[variant_name].css files alongside the default ui.css.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}s:20:"table_inline_editing";a:7:{s:4:"name";s:20:"table_inline_editing";s:4:"desc";s:231:"This option gives you the ability to turn on/off the inline table editing controls in Firefox/Mozilla. According to the TinyMCE documentation, these controls are somewhat buggy and not redesignable, so they are disabled by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:22:"theme_advanced_disable";a:7:{s:4:"name";s:22:"theme_advanced_disable";s:4:"desc";s:111:"This option should contain a comma separated list of controls to disable from any toolbar row/panel in TinyMCE.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}s:19:"theme_advanced_path";a:7:{s:4:"name";s:19:"theme_advanced_path";s:4:"desc";s:331:"This option gives you the ability to enable/disable the element path. This option is only useful if the theme_advanced_statusbar_location option is set to "top" or "bottom". This option is set to "true" by default. Setting this option to "false" will effectively hide the path tool, though it still takes up room in the Status Bar.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:32:"theme_advanced_resize_horizontal";a:7:{s:4:"name";s:32:"theme_advanced_resize_horizontal";s:4:"desc";s:319:"This option gives you the ability to enable/disable the horizontal resizing. This option is only useful if the theme_advanced_statusbar_location option is set to "top" or "bottom" and when the theme_advanced_resizing is set to true. This option is set to true by default, allowing both resizing horizontal and vertical.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:23:"theme_advanced_resizing";a:7:{s:4:"name";s:23:"theme_advanced_resizing";s:4:"desc";s:216:"This option gives you the ability to enable/disable the resizing button. This option is only useful if the theme_advanced_statusbar_location option is set to "top" or "bottom". This option is set to false by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:33:"theme_advanced_statusbar_location";a:7:{s:4:"name";s:33:"theme_advanced_statusbar_location";s:4:"desc";s:257:"This option enables you to specify where the element statusbar with the path and resize tool should be located. This option can be set to "top" or "bottom". The default value is set to "top". This option can only be used when the theme is set to "advanced".";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:5:"value";s:3:"top";s:4:"text";s:3:"Top";}i:1;a:2:{s:5:"value";s:6:"bottom";s:4:"text";s:6:"Bottom";}}s:5:"value";s:6:"bottom";s:7:"lexicon";N;s:4:"area";s:0:"";}s:28:"theme_advanced_toolbar_align";a:7:{s:4:"name";s:28:"theme_advanced_toolbar_align";s:4:"desc";s:187:"This option enables you to specify the alignment of the toolbar, this value can be "left", "right" or "center" (the default). This option can only be used when theme is set to "advanced".";s:4:"type";s:9:"textfield";s:7:"options";a:3:{i:0;a:2:{s:5:"value";s:6:"center";s:4:"text";s:6:"Center";}i:1;a:2:{s:5:"value";s:4:"left";s:4:"text";s:4:"Left";}i:2;a:2:{s:5:"value";s:5:"right";s:4:"text";s:5:"Right";}}s:5:"value";s:4:"left";s:7:"lexicon";N;s:4:"area";s:0:"";}s:31:"theme_advanced_toolbar_location";a:7:{s:4:"name";s:31:"theme_advanced_toolbar_location";s:4:"desc";s:191:"
This option enables you to specify where the toolbar should be located. This option can be set to "top" or "bottom" (the defualt). This option can only be used when theme is set to advanced.";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:5:"value";s:3:"top";s:4:"text";s:3:"Top";}i:1;a:2:{s:5:"value";s:6:"bottom";s:4:"text";s:6:"Bottom";}}s:5:"value";s:3:"top";s:7:"lexicon";N;s:4:"area";s:0:"";}s:5:"width";a:7:{s:4:"name";s:5:"width";s:4:"desc";s:32:"The width of the TinyMCE editor.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"95%";s:7:"lexicon";N;s:4:"area";s:0:"";}s:33:"template_selected_content_classes";a:7:{s:4:"name";s:33:"template_selected_content_classes";s:4:"desc";s:234:"Specify a list of CSS class names for the template plugin. They must be separated by spaces. Any template element with one of the specified CSS classes will have its content replaced by the selected editor content when first inserted.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    7 => 
    array (
      'id' => '7',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'AjaxManager',
      'description' => 'Speeds up manager panel by using ajax page loading.',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * AjaxManager Plugin
 *
 * Events: OnManagerPageBeforeRender, OnManagerPageAfterRender
 *
 * @author Danil Kostin <danya.postfactum(at)gmail.com>
 *
 * @package ajaxmanager
 */

$enabled = $modx->getOption(\'ajaxmanager.enabled\', null, true);

if (!$enabled){
    return;
}

$managerUrl = $modx->getOption(\'manager_url\', null, MODX_MANAGER_URL);

$controller =& $scriptProperties[\'controller\'];

$preload = $modx->getOption(\'ajaxmanager.preload\', null, true);

$files = $preload ? array(
    \'sections/context/list.js\',
    \'sections/context/update.js\',
    \'sections/context/view.js\',
    \'sections/element/chunk/create.js\',
    \'sections/element/chunk/update.js\',
    \'sections/element/plugin/create.js\',
    \'sections/element/plugin/update.js\',
    \'sections/element/propertyset/index.js\',
    \'sections/element/snippet/create.js\',
    \'sections/element/snippet/update.js\',
    \'sections/element/template/create.js\',
    \'sections/element/template/update.js\',
    \'sections/element/tv/create.js\',
    \'sections/element/tv/update.js\',
    \'sections/fc/list.js\',
    \'sections/fc/profile/update.js\',
    \'sections/fc/set/update.js\',
    \'sections/resource/create.js\',
    \'sections/resource/data.js\',
    \'sections/resource/schedule.js\',
    \'sections/resource/static/create.js\',
    \'sections/resource/static/update.js\',
    \'sections/resource/symlink/create.js\',
    \'sections/resource/symlink/update.js\',
    \'sections/resource/update.js\',
    \'sections/resource/weblink/create.js\',
    \'sections/resource/weblink/update.js\',
    \'sections/search.js\',
    \'sections/security/access/policy/template/update.js\',
    \'sections/security/access/policy/update.js\',
    \'sections/security/message/list.js\',
    \'sections/security/permissions/list.js\',
    \'sections/security/profile/update.js\',
    \'sections/security/resourcegroup/list.js\',
    \'sections/security/user/create.js\',
    \'sections/security/user/list.js\',
    \'sections/security/user/update.js\',
    \'sections/security/usergroup/update.js\',
    \'sections/source/index.js\',
    \'sections/source/update.js\',
    \'sections/system/action.js\',
    \'sections/system/content.type.js\',
    \'sections/system/dashboards/create.js\',
    \'sections/system/dashboards/list.js\',
    \'sections/system/dashboards/update.js\',
    \'sections/system/dashboards/widget/create.js\',
    \'sections/system/dashboards/widget/update.js\',
    \'sections/system/error.log.js\',
    \'sections/system/file/create.js\',
    \'sections/system/file/edit.js\',
    \'sections/system/help.js\',
    \'sections/system/import/html.js\',
    \'sections/system/import/resource.js\',
    \'sections/system/info.js\',
    \'sections/system/logs.js\',
    \'sections/system/settings.js\',
    \'sections/welcome.js\',
    \'widgets/core/modx.console.js\',
    \'widgets/core/modx.grid.js\',
    \'widgets/core/modx.grid.local.property.js\',
    \'widgets/core/modx.grid.settings.js\',
    \'widgets/core/modx.orm.js\',
    \'widgets/core/modx.panel.wizard.js\',
    \'widgets/core/modx.portal.js\',
    \'widgets/core/modx.rte.browser.js\',
    \'widgets/element/modx.grid.element.properties.js\',
    \'widgets/element/modx.grid.plugin.event.js\',
    \'widgets/element/modx.grid.template.tv.js\',
    \'widgets/element/modx.grid.tv.security.js\',
    \'widgets/element/modx.grid.tv.template.js\',
    \'widgets/element/modx.panel.chunk.js\',
    \'widgets/element/modx.panel.plugin.js\',
    \'widgets/element/modx.panel.property.set.js\',
    \'widgets/element/modx.panel.snippet.js\',
    \'widgets/element/modx.panel.template.js\',
    \'widgets/element/modx.panel.tv.js\',
    \'widgets/element/modx.panel.tv.renders.js\',
    \'widgets/element/modx.tree.element.js\',
    \'widgets/fc/modx.fc.common.js\',
    \'widgets/fc/modx.grid.fcprofile.js\',
    \'widgets/fc/modx.grid.fcset.js\',
    \'widgets/fc/modx.panel.fcprofile.js\',
    \'widgets/fc/modx.panel.fcset.js\',
    \'widgets/modx.panel.search.js\',
    \'widgets/modx.panel.welcome.js\',
    \'widgets/modx.treedrop.js\',
    \'widgets/resource/modx.grid.resource.active.js\',
    \'widgets/resource/modx.grid.resource.security.js\',
    \'widgets/resource/modx.grid.resource.security.local.js\',
    \'widgets/resource/modx.panel.resource.data.js\',
    \'widgets/resource/modx.panel.resource.js\',
    \'widgets/resource/modx.panel.resource.schedule.js\',
    \'widgets/resource/modx.panel.resource.static.js\',
    \'widgets/resource/modx.panel.resource.symlink.js\',
    \'widgets/resource/modx.panel.resource.tv.js\',
    \'widgets/resource/modx.panel.resource.weblink.js\',
    \'widgets/resource/modx.tree.resource.js\',
    \'widgets/resource/modx.tree.resource.simple.js\',
    \'widgets/security/modx.grid.access.context.js\',
    \'widgets/security/modx.grid.access.policy.js\',
    \'widgets/security/modx.grid.access.policy.template.js\',
    \'widgets/security/modx.grid.message.js\',
    \'widgets/security/modx.grid.role.js\',
    \'widgets/security/modx.grid.role.user.js\',
    \'widgets/security/modx.grid.user.group.category.js\',
    \'widgets/security/modx.grid.user.group.context.js\',
    \'widgets/security/modx.grid.user.group.js\',
    \'widgets/security/modx.grid.user.group.resource.js\',
    \'widgets/security/modx.grid.user.group.source.js\',
    \'widgets/security/modx.grid.user.js\',
    \'widgets/security/modx.grid.user.recent.resource.js\',
    \'widgets/security/modx.grid.user.settings.js\',
    \'widgets/security/modx.panel.access.policy.js\',
    \'widgets/security/modx.panel.access.policy.template.js\',
    \'widgets/security/modx.panel.groups.roles.js\',
    \'widgets/security/modx.panel.resource.group.js\',
    \'widgets/security/modx.panel.user.group.js\',
    \'widgets/security/modx.panel.user.js\',
    \'widgets/security/modx.tree.resource.group.js\',
    \'widgets/security/modx.tree.user.group.js\',
    \'widgets/source/modx.grid.source.access.js\',
    \'widgets/source/modx.grid.source.properties.js\',
    \'widgets/source/modx.panel.source.js\',
    \'widgets/source/modx.panel.sources.js\',
    \'widgets/system/modx.grid.content.type.js\',
    \'widgets/system/modx.grid.context.js\',
    \'widgets/system/modx.grid.context.settings.js\',
    \'widgets/system/modx.grid.dashboard.widgets.js\',
    \'widgets/system/modx.grid.manager.log.js\',
    \'widgets/system/modx.grid.system.event.js\',
    \'widgets/system/modx.panel.actions.js\',
    \'widgets/system/modx.panel.context.js\',
    \'widgets/system/modx.panel.dashboard.js\',
    \'widgets/system/modx.panel.dashboard.widget.js\',
    \'widgets/system/modx.panel.dashboards.js\',
    \'widgets/system/modx.panel.error.log.js\',
    \'widgets/system/modx.panel.import.html.js\',
    \'widgets/system/modx.panel.import.resources.js\',
    \'widgets/system/modx.panel.system.settings.js\',
    \'widgets/system/modx.tree.directory.js\',
    \'widgets/system/modx.tree.menu.js\',
    \'widgets/system/mysql/modx.grid.databasetables.js\',
    \'widgets/system/sqlsrv/modx.grid.databasetables.js\',
    \'widgets/windows.js\',
    \'workspace/combos.js\',
    \'workspace/index.js\',
    \'workspace/lexicon/combos.js\',
    \'workspace/lexicon/index.js\',
    \'workspace/lexicon/language.grid.js\',
    \'workspace/lexicon/lexicon.grid.js\',
    \'workspace/lexicon/lexicon.panel.js\',
    \'workspace/lexicon/lexicon.topic.grid.js\',
    \'workspace/namespace/index.js\',
    \'workspace/namespace/modx.namespace.panel.js\',
    \'workspace/package/index.js\',
    \'workspace/package/package.panel.js\',
    \'workspace/package/package.versions.grid.js\',
    \'workspace/package.browser.panels.js\',
    \'workspace/package.browser.tree.js\',
    \'workspace/package.containers.js\',
    \'workspace/package.grid.js\',
    \'workspace/package.panels.js\',
    \'workspace/package.windows.js\',
    \'workspace/provider.grid.js\',
    \'workspace/workspace.panel.js\',
) : array();

switch ($modx->event->name)
{
    case \'OnManagerPageBeforeRender\':
        if ($controller->loadHeader && $controller->loadFooter) {
            if (isset($_SERVER[\'HTTP_X_REQUESTED_WITH\']) && $_SERVER[\'HTTP_X_REQUESTED_WITH\'] == \'XMLHttpRequest\') {
                $route = $modx->request->action;
                if (intval($route) > 0) {
                    $action = $modx->actionMap[$route];
                    $namespace = $action[\'namespace\'];
                } else {
                    $namespace = $modx->request->namespace;
                }
                $namespaces = explode(\',\', $modx->getOption(\'ajaxmanager.compatible_namespaces\', null, \'core\'));
                if ($route && !in_array($namespace, $namespaces)) {
                    die();
                }
                $controller->loadHeader = false;
                $controller->loadFooter = false;
                $controller->packToJSON = true;
            } else {
                foreach ($files as $file) {
                        $controller->addJavaScript($managerUrl . \'assets/modext/\' . $file);
                }
                $controller->addJavaScript($managerUrl. \'assets/components/ajaxmanager/ajaxmanager.js\');
                $controller->packToJSON = false;
            }
        }
        break;
    case \'OnManagerPageAfterRender\':
        if ($controller->packToJSON) {

            $content = $controller->content;
            $title = $controller->getPageTitle();

            $scripts = array();
            $styles = array();
            $sources = array();
            $standalone = array();
            $topics = array();


            $loaded = json_decode($_REQUEST[\'loaded\'], true);

            $embedded = array();
            $embedded[\'styles\']   = array();
            $embedded[\'scripts\']  = array();

            foreach ($controller->head[\'css\'] as $src) {
                if (!in_array($src, $loaded[\'styleSheets\']))
                    $styles[] = $src;
            }

            foreach ($controller->head[\'js\'] as $src) {
                $src = strtok($src, \'?\'); // Trim query string
                if (!in_array($src, $loaded[\'scripts\']))
                    $sources[] = $src;
            }

            foreach ($controller->head[\'html\'] as $html) {
                if (preg_match(\'/<script(.*?)>/\', $html)){
                    $embedded[\'scripts\'][] = $html;
                } else if (preg_match(\'/<style(.*?)>/\', $html)){
                    $embedded[\'styles\'][] = $html;
                }
            }

            foreach ($modx->sjscripts as $html) {
                if (preg_match(\'/<script(.*?)>/\', $html, $matches)){
                    if (preg_match(\'/src\\s*=\\s*(["\\\'])(?P<src>.*?)\\1/\', $matches[1], $matches)) {
                        $src = $matches[\'src\'];
                        $src = strtok($src, \'?\'); // Trim query string
                        if (in_array($src, $loaded[\'scripts\'])) continue;
                        if (preg_match(\'/tiny_mce(_src)?.js$/\', $src)) {
                            $standalone[] = $src;
                            continue;
                        }
                        $sources[] = $src;
                    } else {
                        $embedded[\'scripts\'][] = str_replace(\'MODx.loadRTE();\', \'\', $html);
                    }
                } else if (preg_match(\'/<style(.*?)>/\', $html)){
                    $embedded[\'styles\'][] = $html;
                }
            }

            foreach ($controller->head[\'lastjs\'] as $src) {
                $src = strtok($src, \'?\'); // Trim query string
                if (!in_array($src, $loaded[\'scripts\']))
                    $sources[] = $src;
            }

            if (count($sources)){
                $scripts[] = $managerUrl.\'min/index.php?f=\'.implode(\',\',$sources);
            }
            $scripts = array_merge($scripts, $standalone);

            $langTopics = $controller->getPlaceholder(\'_lang_topics\');
            $langTopics = explode(\',\',$langTopics);
            foreach($langTopics as $topic) {
                if (!in_array($topic, $loaded[\'topics\']))
                    $topics[] = $topic;
            }
            if (count($topics)){
                $scripts[] = $modx->getOption(\'connectors_url\', null, MODX_CONNECTORS_URL). \'components/ajaxmanager/lang.js.php?ctx=mgr&topic=\'.implode(\',\', $topics);
            }

            $response = array(
                \'title\'     => $title,
                \'content\'   => $content,
                \'scripts\'   => $scripts,
                \'styles\'    => $styles,
                \'embedded\'  => array(
                    \'scripts\'    => $embedded[\'scripts\'],
                    \'styles\'     => $embedded[\'styles\']
                )
            );

            $controller->content = json_encode($response);

            header(\'Content-Type: application/json\');
        }
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    8 => 
    array (
      'id' => '8',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'debugParser',
      'description' => '',
      'editor_type' => '0',
      'category' => '7',
      'cache_type' => '0',
      'plugincode' => 'if (empty($_REQUEST[\'debug\']) || !$modx->user->hasSessionContext(\'mgr\') || $modx->context->key == \'mgr\') {
	return;
}

switch ($modx->event->name) {

	case \'OnHandleRequest\':
		if ($modx->parser instanceof pdoParser && $modx->loadClass(\'debugPdoParser\', MODX_CORE_PATH . \'components/debugparser/model/\', false, true)) {
			$modx->parser = new debugPdoParser($modx);
		}
		elseif ($modx->loadClass(\'debugParser\', MODX_CORE_PATH . \'components/debugparser/model/\', false, true)) {
			$modx->parser = new debugParser($modx);
		}
		break;

	case \'OnWebPageInit\':
		if (method_exists($modx->parser, \'clearCache\') && empty($_REQUEST[\'cache\'])) {
			$modx->parser->clearCache();
		}
		break;

	case \'OnLoadWebPageCache\':
		if (property_exists($modx->parser, \'from_cache\')) {
			$modx->parser->from_cache = true;
		}
		break;

	case \'OnWebPagePrerender\':
		if (method_exists($modx->parser, \'generateReport\')) {
			$modx->parser->generateReport();
		}
		break;
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => 'core/components/debugparser/elements/plugins/plugin.debugparser.php',
    ),
    9 => 
    array (
      'id' => '9',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'FormIt',
      'description' => '',
      'editor_type' => '0',
      'category' => '2',
      'cache_type' => '0',
      'plugincode' => '/**
 * FormIt
 *
 * Copyright 2009-2017 by Sterc <modx@sterc.nl>
 *
 * FormIt is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * FormIt is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FormIt; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package formit
 */
/**
 * FormIt plugin
 *
 * @package formit
 */

$formit = $modx->getService(
    \'formit\',
    \'FormIt\',
    $modx->getOption(\'formit.core_path\', null, $modx->getOption(\'core_path\').\'components/formit/\') .\'model/formit/\',
    array()
);

if (!($formit instanceof FormIt)) {
    return;
}

switch ($modx->event->name) {
    case \'OnManagerPageBeforeRender\':
        // If migration status is false, show migrate alert message bar in manager
        if (method_exists(\'FormIt\',\'encryptionMigrationStatus\')) {
            if (!$formit->encryptionMigrationStatus()) {
                $modx->lexicon->load(\'formit:mgr\');
                $properties = array(\'message\' => $modx->lexicon(\'formit.migrate_alert\'));
                $chunk = $formit->_getTplChunk(\'migrate/alert\');
                if ($chunk) {
                    $modx->regClientStartupHTMLBlock($chunk->process($properties));
                    $modx->regClientCSS($formit->config[\'cssUrl\'] . \'migrate.css\');
                }
            }
        }
}',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    10 => 
    array (
      'id' => '10',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'pdoTools',
      'description' => '',
      'editor_type' => '0',
      'category' => '8',
      'cache_type' => '0',
      'plugincode' => '/** @var modX $modx */
switch ($modx->event->name) {

    case \'OnMODXInit\':
        $fqn = $modx->getOption(\'pdoTools.class\', null, \'pdotools.pdotools\', true);
        $path = $modx->getOption(\'pdotools_class_path\', null, MODX_CORE_PATH . \'components/pdotools/model/\', true);
        $modx->loadClass($fqn, $path, false, true);

        $fqn = $modx->getOption(\'pdoFetch.class\', null, \'pdotools.pdofetch\', true);
        $path = $modx->getOption(\'pdofetch_class_path\', null, MODX_CORE_PATH . \'components/pdotools/model/\', true);
        $modx->loadClass($fqn, $path, false, true);
        break;

    case \'OnSiteRefresh\':
        /** @var pdoTools $pdoTools */
        if ($pdoTools = $modx->getService(\'pdoTools\')) {
            if ($pdoTools->clearFileCache()) {
                $modx->log(modX::LOG_LEVEL_INFO, $modx->lexicon(\'refresh_default\') . \': pdoTools\');
            }
        }
        break;

    case \'OnWebPagePrerender\':
        $parser = $modx->getParser();
        if ($parser instanceof pdoParser) {
            foreach ($parser->pdoTools->ignores as $key => $val) {
                $modx->resource->_output = str_replace($key, $val, $modx->resource->_output);
            }
        }
        break;
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => 'core/components/pdotools/elements/plugins/plugin.pdotools.php',
    ),
    11 => 
    array (
      'id' => '11',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'Ace',
      'description' => 'Ace code editor plugin for MODx Revolution',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * Ace Source Editor Plugin
 *
 * Events: OnManagerPageBeforeRender, OnRichTextEditorRegister, OnSnipFormPrerender,
 * OnTempFormPrerender, OnChunkFormPrerender, OnPluginFormPrerender,
 * OnFileCreateFormPrerender, OnFileEditFormPrerender, OnDocFormPrerender
 *
 * @author Danil Kostin <danya.postfactum(at)gmail.com>
 *
 * @package ace
 *
 * @var array $scriptProperties
 * @var Ace $ace
 */
if ($modx->event->name == \'OnRichTextEditorRegister\') {
    $modx->event->output(\'Ace\');
    return;
}

if ($modx->getOption(\'which_element_editor\', null, \'Ace\') !== \'Ace\') {
    return;
}

$ace = $modx->getService(\'ace\', \'Ace\', $modx->getOption(\'ace.core_path\', null, $modx->getOption(\'core_path\').\'components/ace/\').\'model/ace/\');
$ace->initialize();

$extensionMap = array(
    \'tpl\'   => \'text/x-smarty\',
    \'htm\'   => \'text/html\',
    \'html\'  => \'text/html\',
    \'css\'   => \'text/css\',
    \'scss\'  => \'text/x-scss\',
    \'less\'  => \'text/x-less\',
    \'svg\'   => \'image/svg+xml\',
    \'xml\'   => \'application/xml\',
    \'xsl\'   => \'application/xml\',
    \'js\'    => \'application/javascript\',
    \'json\'  => \'application/json\',
    \'php\'   => \'application/x-php\',
    \'sql\'   => \'text/x-sql\',
    \'md\'    => \'text/x-markdown\',
    \'txt\'   => \'text/plain\',
    \'twig\'  => \'text/x-twig\'
);

// Defines wether we should highlight modx tags
$modxTags = false;
switch ($modx->event->name) {
    case \'OnSnipFormPrerender\':
        $field = \'modx-snippet-snippet\';
        $mimeType = \'application/x-php\';
        break;
    case \'OnTempFormPrerender\':
        $field = \'modx-template-content\';
        $modxTags = true;

        switch (true) {
            case $modx->getOption(\'twiggy_class\'):
                $mimeType = \'text/x-twig\';
                break;
            case $modx->getOption(\'pdotools_fenom_parser\'):
                $mimeType = \'text/x-smarty\';
                break;
            default:
                $mimeType = \'text/html\';
                break;
        }

        break;
    case \'OnChunkFormPrerender\':
        $field = \'modx-chunk-snippet\';
        if ($modx->controller->chunk && $modx->controller->chunk->isStatic()) {
            $extension = pathinfo($modx->controller->chunk->getSourceFile(), PATHINFO_EXTENSION);
            $mimeType = isset($extensionMap[$extension]) ? $extensionMap[$extension] : \'text/plain\';
        } else {
            $mimeType = \'text/html\';
        }
        $modxTags = true;

        switch (true) {
            case $modx->getOption(\'twiggy_class\'):
                $mimeType = \'text/x-twig\';
                break;
            case $modx->getOption(\'pdotools_fenom_default\'):
                $mimeType = \'text/x-smarty\';
                break;
            default:
                $mimeType = \'text/html\';
                break;
        }

        break;
    case \'OnPluginFormPrerender\':
        $field = \'modx-plugin-plugincode\';
        $mimeType = \'application/x-php\';
        break;
    case \'OnFileCreateFormPrerender\':
        $field = \'modx-file-content\';
        $mimeType = \'text/plain\';
        break;
    case \'OnFileEditFormPrerender\':
        $field = \'modx-file-content\';
        $extension = pathinfo($scriptProperties[\'file\'], PATHINFO_EXTENSION);
        $mimeType = isset($extensionMap[$extension])
            ? $extensionMap[$extension]
            : \'text/plain\';
        $modxTags = $extension == \'tpl\';
        break;
    case \'OnDocFormPrerender\':
        if (!$modx->controller->resourceArray) {
            return;
        }
        $field = \'ta\';
        $mimeType = $modx->getObject(\'modContentType\', $modx->controller->resourceArray[\'content_type\'])->get(\'mime_type\');

        switch (true) {
            case $mimeType == \'text/html\' && $modx->getOption(\'twiggy_class\'):
                $mimeType = \'text/x-twig\';
                break;
            case $mimeType == \'text/html\' && $modx->getOption(\'pdotools_fenom_parser\'):
                $mimeType = \'text/x-smarty\';
                break;
        }

        if ($modx->getOption(\'use_editor\')){
            $richText = $modx->controller->resourceArray[\'richtext\'];
            $classKey = $modx->controller->resourceArray[\'class_key\'];
            if ($richText || in_array($classKey, array(\'modStaticResource\',\'modSymLink\',\'modWebLink\',\'modXMLRPCResource\'))) {
                $field = false;
            }
        }
        $modxTags = true;
        break;
    default:
        return;
}

$modxTags = (int) $modxTags;
$script = \'\';
if ($field) {
    $script .= "MODx.ux.Ace.replaceComponent(\'$field\', \'$mimeType\', $modxTags);";
}

if ($modx->event->name == \'OnDocFormPrerender\' && !$modx->getOption(\'use_editor\')) {
    $script .= "MODx.ux.Ace.replaceTextAreas(Ext.query(\'.modx-richtext\'));";
}

if ($script) {
    $modx->controller->addHtml(\'<script>Ext.onReady(function() {\' . $script . \'});</script>\');
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => 'ace/elements/plugins/ace.plugin.php',
    ),
    12 => 
    array (
      'id' => '12',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'phpThumbOfCacheManager',
      'description' => 'Handles cache cleaning when clearing the Site Cache.',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * phpThumbOf
 *
 * Copyright 2009-2012 by Shaun McCormick <shaun@modx.com>
 *
 * phpThumbOf is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * phpThumbOf is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * phpThumbOf; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package phpthumbof
 */
/**
 * Handles cache management for phpthumbof filter
 *
 * @var \\modX $modx
 * @var array $scriptProperties
 *
 * @package phpthumbof
 */
if (empty($results)) $results = array();

switch ($modx->event->name) {
    case \'OnSiteRefresh\':
        if (!$modx->loadClass(\'modPhpThumb\',$modx->getOption(\'core_path\').\'model/phpthumb/\',true,true)) {
            $modx->log(modX::LOG_LEVEL_ERROR,\'[phpThumbOf] Could not load modPhpThumb class in plugin.\');
            return;
        }
        $assetsPath = $modx->getOption(\'phpthumbof.assets_path\',$scriptProperties,$modx->getOption(\'assets_path\').\'components/phpthumbof/\');
        $phpThumb = new modPhpThumb($modx);
        $cacheDir = $assetsPath.\'cache/\';

        /* clear local cache */
        if (!empty($cacheDir)) {
            /** @var DirectoryIterator $file */
            foreach (new DirectoryIterator($cacheDir) as $file) {
                if (!$file->isFile()) continue;
                @unlink($file->getPathname());
            }
        }

        /* if using amazon s3, clear our cache there */
        $useS3 = $modx->getOption(\'phpthumbof.use_s3\',$scriptProperties,false);
        if ($useS3) {
            $modelPath = $modx->getOption(\'phpthumbof.core_path\',null,$modx->getOption(\'core_path\').\'components/phpthumbof/\').\'model/\';
            /** @var modAws $modaws */
            $modaws = $modx->getService(\'modaws\',\'modAws\',$modelPath.\'aws/\',$scriptProperties);
            $s3path = $modx->getOption(\'phpthumbof.s3_path\',null,\'phpthumbof/\');
            
            $list = $modaws->getObjectList($s3path);
            if (!empty($list) && is_array($list)) {
                foreach ($list as $obj) {
                    if (empty($obj->Key)) continue;

                    $results[] = $modaws->deleteObject($obj->Key);
                }
            }
        }

        break;
}
return;',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    13 => 
    array (
      'id' => '13',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'phpThumbsUp',
      'description' => '',
      'editor_type' => '0',
      'category' => '10',
      'cache_type' => '0',
      'plugincode' => '/**
 * The main handler for phpthumbsup. Instantiates model and performs appropriate actions based on event.
 *
 * @package   phpThumbsUp
 * @author    Darkstar Design (info@darkstardesign.com)
 */

// path to model
$default_path = $modx->getOption(\'core_path\') . \'components/phpthumbsup/\';

$path = $modx->getOption(\'phpthumbsup.core_path\', NULL, $default_path) . \'model/phpthumbsup/\';
$thumbsup = $modx->getService(\'thumbsup\', \'PhpThumbsUp\', $path, $scriptProperties);
$do_responsive_threshold = $modx->getOption(\'phpthumbsup.responsive\');

// make sure model loaded, if not log error and return
if (!($thumbsup instanceof PhpThumbsUp)) {
    $modx->log(modX::LOG_LEVEL_ERROR, \'[phpThumbsUp] Could not load PhpThumbsUp class.\');
    return NULL;
}

// handle events
switch ($modx->event->name) {

    // OnFileManagerUpload we want to auto create thumbs if specified in settings
    case \'OnFileManagerUpload\':
        $thumbsup->process_upload($files, $directory);
        break;

    // OnPageNotFound and OnHandleRequest means we need to look for a thumb
    case \'OnHandleRequest\':
    case \'OnPageNotFound\':
        $thumbsup->process_thumb();
        break;

    // OnSiteRefresh delete phpthumbsup cache
    case \'OnSiteRefresh\':
        $thumbsup->clear_cache();
        break;

    // OnLoadWebDocument add javascript
    case \'OnLoadWebDocument\':
        if ($do_responsive_threshold) {
            $modx->regClientStartupScript(MODX_ASSETS_URL . \'components/phpthumbsup/js/responsive.js\');
        }
        break;

    // if we didn\'t match an event just return null
    default:
        return NULL;

}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    17 => 
    array (
      'id' => '17',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'Redirector',
      'description' => '',
      'editor_type' => '0',
      'category' => '18',
      'cache_type' => '0',
      'plugincode' => '/**
 * @package redirector
 *
 * @var modX|xPDO $modx
 * @var array $scriptProperties
 * @var modResource $resource
 * @var string $mode
 */

/* load redirector class */
$corePath = $modx->getOption(\'redirector.core_path\', $scriptProperties, $modx->getOption(\'core_path\') . \'components/redirector/\');
$redirector = $modx->getService(\'redirector\', \'Redirector\', $corePath . \'model/redirector/\', $scriptProperties);
if (!($redirector instanceof Redirector)) {
    return \'\';
}

$eventName = $modx->event->name;
switch ($eventName) {
    case \'OnPageNotFound\':
        /* handle redirects */
        $search = rawurldecode($_SERVER[\'REQUEST_URI\']);
        $baseUrl = $modx->getOption(\'base_url\', null, MODX_BASE_URL);
        if (!empty($baseUrl) && $baseUrl != \'/\' && $baseUrl != \' \' && $baseUrl != \'/\' . $modx->context->get(\'key\') . \'/\') {
            $search = str_replace($baseUrl, \'\', $search);
        }

        $search = ltrim($search, \'/\');
        if (!empty($search)) {
            $searchEscape = $modx->quote($search);

            /** @var modRedirect $redirect */
            $redirect = $modx->getObject(\'modRedirect\', array(
                "(`modRedirect`.`pattern` = " . $searchEscape . ")",
                "(`modRedirect`.`context_key` = \'" . $modx->context->get(\'key\') . "\' OR `modRedirect`.`context_key` IS NULL OR `modRedirect`.`context_key` = \'\')",
                \'active\' => true,
            ));

            // when not found, check a REGEX record..
            // need to separate this one because of some \'alias.html > target.html\' vs. \'best-alias.html > best-target.html\' issues...
            if (empty($redirect) || !is_object($redirect)) {
                $c = $modx->newQuery(\'modRedirect\');
                $c->where(array(
                    "(`modRedirect`.`pattern` = " . $searchEscape . " OR " . $searchEscape . " REGEXP `modRedirect`.`pattern` OR " . $searchEscape . " REGEXP CONCAT(\'^\', `modRedirect`.`pattern`, \'$\'))",
                    "(`modRedirect`.`context_key` = \'" . $modx->context->get(\'key\') . "\' OR `modRedirect`.`context_key` IS NULL OR `modRedirect`.`context_key` = \'\')",
                    \'active\' => true,
                ));
                $redirect = $modx->getObject(\'modRedirect\', $c);
            }

            if (!empty($redirect) && is_object($redirect)) {

                /** @var modContext $context */
                $context = $redirect->getOne(\'Context\');
                if (empty($context) || !($context instanceof modContext)) {
                    $context = $modx->context;
                }

                $target = $redirect->get(\'target\');
                $modx->parser->processElementTags(\'\', $target, true, true);

                if ($target != $modx->resourceIdentifier && $target != $search) {
                    if (strpos($target, \'$\') !== false) {
                        $pattern = $redirect->get(\'pattern\');
                        $target = preg_replace(\'/\' . $pattern . \'/\', $target, $search);
                    }
                    if (!strpos($target, \'://\')) {
                        $target = rtrim($context->getOption(\'site_url\'), \'/\') . \'/\' . (($target == \'/\') ? \'\' : ltrim($target, \'/\'));
                    }
                    $modx->log(modX::LOG_LEVEL_INFO, \'Redirector plugin redirecting request for \' . $search . \' to \' . $target);

                    $redirect->registerTrigger();

                    $options = array(\'responseCode\' => \'HTTP/1.1 301 Moved Permanently\');
                    $modx->sendRedirect($target, $options);
                }
            }
        }

        break;

    case \'OnDocFormRender\':
        $track_uri_updates = (boolean)$modx->getOption(\'redirector.track_uri_updates\', null, 1);
        $track_uri_updates = (in_array($track_uri_updates, array(false, \'false\', 0, \'0\', \'no\', \'n\'), true)) ? false : true;

        if ($mode == \'upd\' && $track_uri_updates) {
            $_SESSION[\'modx_resource_uri\'] = $resource->get(\'uri\');
        }

        break;

    case \'OnDocFormSave\':
        /* if uri has changed, add to redirects */
        $track_uri_updates = $modx->getOption(\'redirector.track_uri_updates\', null, 1);
        $track_uri_updates = (in_array($track_uri_updates, array(false, \'false\', 0, \'0\', \'no\', \'n\'), true)) ? false : true;
        $context_key = $resource->get(\'context_key\');
        $new_uri = $resource->get(\'uri\');

        if ($mode == \'upd\' && $track_uri_updates && !empty($_SESSION[\'modx_resource_uri\'])) {
            $old_uri = $_SESSION[\'modx_resource_uri\'];
            if ($old_uri != $new_uri) {
                /* uri changed */
                $redirect = $modx->getObject(\'modRedirect\', array(
                    \'pattern\' => $old_uri,
                    \'context_key\' => $context_key,
                    \'active\' => true
                ));
                if (empty($redirect)) {
                    /* no record for old uri */
                    $new_redirect = $modx->newObject(\'modRedirect\');
                    $new_redirect->fromArray(array(
                        \'pattern\' => $old_uri,
                        \'target\' => \'[[~\' . $resource->get(\'id\') . \']]\',
                        \'context_key\' => $context_key,
                        \'active\' => true,
                    ));

                    if ($new_redirect->save() == false) {
                        return $modx->error->failure($modx->lexicon(\'redirector.redirect_err_save\'));
                    }
                }
            }

            $_SESSION[\'modx_resource_uri\'] = $new_uri;
        }

        break;
}

return \'\';',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    18 => 
    array (
      'id' => '18',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'redirect',
      'description' => '',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => 'switch ($modx->event->name)
{
case \'OnWebPageInit\':
        if (stristr($_SERVER[\'REQUEST_URI\'], \'//\'))
        {
                $g = preg_replace("|[//\\s]+|is", "/", $_SERVER[\'REQUEST_URI\']);
                $modx->sendRedirect($g);
        }
        if (stristr($_SERVER[\'REQUEST_URI\'], \'/index\'))
        {
                $g = preg_replace("|[/index\\s]+|is", "/", $_SERVER[\'REQUEST_URI\']);
                $modx->sendRedirect($g);
        }
        
        break;
}',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    19 => 
    array (
      'id' => '19',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'autoRedirector',
      'description' => '',
      'editor_type' => '0',
      'category' => '19',
      'cache_type' => '0',
      'plugincode' => '$resourceEvents = array(\'OnBeforeDocFormSave\', \'OnDocFormSave\');
if (in_array($modx->event->name, $resourceEvents)) {
    foreach($scriptProperties as & $object){
        if(
            is_object($object)
            AND $object instanceof modResource
            AND $original = $modx->getObject(\'modResource\', $object->id)
        ){
            $resource = $object;
            break;
        }
    }
}
switch ($modx->event->name) {
    case "OnManagerPageInit":
	$cssFile = MODX_ASSETS_URL.\'components/autoredirector/css/mgr/main.css\';
	$modx->regClientCSS($cssFile);
	break;

    case "OnBeforeDocFormSave":
        $resources = array(
                $resource,
                $modx->getObject(\'modResource\',$resource->get(\'parent\'))
            );
        if($child_ids = $modx->getChildIds($resource->id,50,array(\'context\' => $resource->context_key))){
            $resources = array_merge($resources, $modx->getCollection(\'modResource\',array("id:IN" => $child_ids)));
        }
    case "OnResourceBeforeSort":
        if (empty($resources)) {
            foreach ($nodes as $node) {
                $resources[] = $modx->getObject(\'modResource\',$node[\'id\']);
            }
        }
        foreach ($resources as $res) {
            if (!empty($res)) {
                if (!$res->getProperty(\'old_uri\',\'autoredirector\')) {
                    $res->setProperty(\'old_uri\',$res->get(\'uri\'),\'autoredirector\');
                    $res->save();
                }
            }
        }
        break;
    case "OnDocFormSave":
        $resources = array(
                $resource,
                $modx->getObject(\'modResource\',$resource->get(\'parent\'))
            );
        if($child_ids = $modx->getChildIds($resource->id,50,array(\'context\' => $resource->context_key))){
            $resources = array_merge($resources, $modx->getCollection(\'modResource\',array("id:IN" => $child_ids)));
        }
    case "OnResourceSort":
        if (empty($resources)) {
            foreach ($nodesAffected as $node) {
                $resources[] = $node;
            }
        }
        $modelPath = $modx->getOption(\'autoredirector_core_path\',null,$modx->getOption(\'core_path\').\'components/autoredirector/\').\'model/\';
		$modx->addPackage(\'autoredirector\', $modelPath);
        $processorProps = array(\'processors_path\' => $modx->getOption(\'autoredirector_core_path\',null,$modx->getOption(\'core_path\').\'components/autoredirector/\').\'processors/\');
        foreach ($resources as $res) {
            if (!empty($res)) {
                $old_uri = $res->getProperty(\'old_uri\',\'autoredirector\');
                $current_uri = $res->getAliasPath($res->get(\'alias\'));
                if ($old_uri && $current_uri != $old_uri) {
                    $currentRuleQ = array(\'uri\' => $current_uri);
                    if (!$modx->getOption(\'global_duplicate_uri_check\')) {
                        $currentRuleQ[\'context_key\'] = $res->get(\'context_key\');
                    }
                    if ($currentRule = $modx->getObject(\'arRule\', $currentRuleQ)) {
                        $response = $modx->runProcessor(\'mgr/item/remove\', $currentRule->toArray(), $processorProps);
                        if ($response->isError()) {
                            $modx->log(modX::LOG_LEVEL_ERROR, \'AutoRedirector removing error. Message: \'.$response->getMessage());
                        }
                    }
                    $arRule = array(\'uri\' => $old_uri
                        , \'context_key\' => $res->get(\'context_key\')
                        , \'res_id\' => $res->get(\'id\'));
                    if (!$modx->getObject(\'arRule\', $arRule)) {
                        $response = $modx->runProcessor(\'mgr/item/create\', $arRule, $processorProps);
                        if ($response->isError()) {
                            $modx->log(modX::LOG_LEVEL_ERROR, \'AutoRedirector creating error. Message: \'.$response->getMessage());
                        }
                    }
                }
                $res->setProperty(\'old_uri\',$current_uri,\'autoredirector\');
                $res->save();
            }
        }
        break;
    case "OnPageNotFound":
        $uri = $_SERVER[\'REQUEST_URI\'];
        $uri = str_replace($modx->getOption("site_url"),"",$uri);
        if (substr($uri, 0, 1) == "/") $uri = substr($uri, 1);
        $uri = urldecode($uri);

        $RuleQ = array(\'uri\' => $uri);
        if (!$modx->getOption(\'global_duplicate_uri_check\')) {
            $RuleQ[\'context_key\'] = $modx->context->get(\'key\');
        }
        $modelPath = $modx->getOption(\'autoredirector_core_path\',null,$modx->getOption(\'core_path\').\'components/autoredirector/\').\'model/\';
    	$modx->addPackage(\'autoredirector\', $modelPath);
        if ($Rule = $modx->getObject(\'arRule\', $RuleQ)) {
            if ($url = $modx->makeUrl($Rule->get(\'res_id\'))) {
                $modx->sendRedirect($url,array(\'responseCode\' => \'HTTP/1.1 301 Moved Permanently\'));
            }
        }
        break;
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => 'core/components/autoredirector/elements/plugins/plugin.autoredirector.php',
    ),
  ),
  'policies' => 
  array (
    'modAccessContext' => 
    array (
      'mgr' => 
      array (
        0 => 
        array (
          'principal' => 1,
          'authority' => 0,
          'policy' => 
          array (
            'about' => true,
            'access_permissions' => true,
            'actions' => true,
            'change_password' => true,
            'change_profile' => true,
            'charsets' => true,
            'class_map' => true,
            'components' => true,
            'content_types' => true,
            'countries' => true,
            'create' => true,
            'credits' => true,
            'customize_forms' => true,
            'dashboards' => true,
            'database' => true,
            'database_truncate' => true,
            'delete_category' => true,
            'delete_chunk' => true,
            'delete_context' => true,
            'delete_document' => true,
            'delete_eventlog' => true,
            'delete_plugin' => true,
            'delete_propertyset' => true,
            'delete_role' => true,
            'delete_snippet' => true,
            'delete_template' => true,
            'delete_tv' => true,
            'delete_user' => true,
            'directory_chmod' => true,
            'directory_create' => true,
            'directory_list' => true,
            'directory_remove' => true,
            'directory_update' => true,
            'edit_category' => true,
            'edit_chunk' => true,
            'edit_context' => true,
            'edit_document' => true,
            'edit_locked' => true,
            'edit_plugin' => true,
            'edit_propertyset' => true,
            'edit_role' => true,
            'edit_snippet' => true,
            'edit_template' => true,
            'edit_tv' => true,
            'edit_user' => true,
            'element_tree' => true,
            'empty_cache' => true,
            'error_log_erase' => true,
            'error_log_view' => true,
            'events' => true,
            'export_static' => true,
            'file_create' => true,
            'file_list' => true,
            'file_manager' => true,
            'file_remove' => true,
            'file_tree' => true,
            'file_update' => true,
            'file_upload' => true,
            'file_unpack' => true,
            'file_view' => true,
            'flush_sessions' => true,
            'frames' => true,
            'help' => true,
            'home' => true,
            'import_static' => true,
            'languages' => true,
            'lexicons' => true,
            'list' => true,
            'load' => true,
            'logout' => true,
            'logs' => true,
            'menus' => true,
            'menu_reports' => true,
            'menu_security' => true,
            'menu_site' => true,
            'menu_support' => true,
            'menu_system' => true,
            'menu_tools' => true,
            'menu_user' => true,
            'messages' => true,
            'namespaces' => true,
            'new_category' => true,
            'new_chunk' => true,
            'new_context' => true,
            'new_document' => true,
            'new_document_in_root' => true,
            'new_plugin' => true,
            'new_propertyset' => true,
            'new_role' => true,
            'new_snippet' => true,
            'new_static_resource' => true,
            'new_symlink' => true,
            'new_template' => true,
            'new_tv' => true,
            'new_user' => true,
            'new_weblink' => true,
            'packages' => true,
            'policy_delete' => true,
            'policy_edit' => true,
            'policy_new' => true,
            'policy_save' => true,
            'policy_template_delete' => true,
            'policy_template_edit' => true,
            'policy_template_new' => true,
            'policy_template_save' => true,
            'policy_template_view' => true,
            'policy_view' => true,
            'property_sets' => true,
            'providers' => true,
            'publish_document' => true,
            'purge_deleted' => true,
            'remove' => true,
            'remove_locks' => true,
            'resource_duplicate' => true,
            'resourcegroup_delete' => true,
            'resourcegroup_edit' => true,
            'resourcegroup_new' => true,
            'resourcegroup_resource_edit' => true,
            'resourcegroup_resource_list' => true,
            'resourcegroup_save' => true,
            'resourcegroup_view' => true,
            'resource_quick_create' => true,
            'resource_quick_update' => true,
            'resource_tree' => true,
            'save' => true,
            'save_category' => true,
            'save_chunk' => true,
            'save_context' => true,
            'save_document' => true,
            'save_plugin' => true,
            'save_propertyset' => true,
            'save_role' => true,
            'save_snippet' => true,
            'save_template' => true,
            'save_tv' => true,
            'save_user' => true,
            'search' => true,
            'settings' => true,
            'sources' => true,
            'source_delete' => true,
            'source_edit' => true,
            'source_save' => true,
            'source_view' => true,
            'steal_locks' => true,
            'tree_show_element_ids' => true,
            'tree_show_resource_ids' => true,
            'undelete_document' => true,
            'unlock_element_properties' => true,
            'unpublish_document' => true,
            'usergroup_delete' => true,
            'usergroup_edit' => true,
            'usergroup_new' => true,
            'usergroup_save' => true,
            'usergroup_user_edit' => true,
            'usergroup_user_list' => true,
            'usergroup_view' => true,
            'view' => true,
            'view_category' => true,
            'view_chunk' => true,
            'view_context' => true,
            'view_document' => true,
            'view_element' => true,
            'view_eventlog' => true,
            'view_offline' => true,
            'view_plugin' => true,
            'view_propertyset' => true,
            'view_role' => true,
            'view_snippet' => true,
            'view_sysinfo' => true,
            'view_template' => true,
            'view_tv' => true,
            'view_unpublished' => true,
            'view_user' => true,
            'workspaces' => true,
          ),
        ),
      ),
    ),
  ),
);