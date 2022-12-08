<?php return array (
  '5a1831c721ee021808e265f63f699ad3' => 
  array (
    'criteria' => 
    array (
      'name' => 'debugparser',
    ),
    'object' => 
    array (
      'name' => 'debugparser',
      'path' => '{core_path}components/debugparser/',
      'assets_path' => '',
    ),
  ),
  'cd50533c2f776a9a5bcca6d63c85092a' => 
  array (
    'criteria' => 
    array (
      'category' => 'debugParser',
    ),
    'object' => 
    array (
      'id' => 7,
      'parent' => 0,
      'category' => 'debugParser',
      'rank' => 0,
    ),
  ),
  '8bb75d9baeab524239168002a706343b' => 
  array (
    'criteria' => 
    array (
      'name' => 'debugParser',
    ),
    'object' => 
    array (
      'id' => 8,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'debugParser',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
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
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/debugparser/elements/plugins/plugin.debugparser.php',
      'content' => 'if (empty($_REQUEST[\'debug\']) || !$modx->user->hasSessionContext(\'mgr\') || $modx->context->key == \'mgr\') {
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
    ),
  ),
  '65bb5285dc4068e3da9cb92580ebcfd3' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 8,
      'event' => 'OnHandleRequest',
    ),
    'object' => 
    array (
      'pluginid' => 8,
      'event' => 'OnHandleRequest',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '90d231663984c603855f770667c5cf4d' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 8,
      'event' => 'OnWebPagePrerender',
    ),
    'object' => 
    array (
      'pluginid' => 8,
      'event' => 'OnWebPagePrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '09b91133b5aebd6b076a6a43c9d339ea' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 8,
      'event' => 'OnWebPageInit',
    ),
    'object' => 
    array (
      'pluginid' => 8,
      'event' => 'OnWebPageInit',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'e1915571b0870b74f5a6985e060fd99a' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 8,
      'event' => 'OnLoadWebPageCache',
    ),
    'object' => 
    array (
      'pluginid' => 8,
      'event' => 'OnLoadWebPageCache',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
);