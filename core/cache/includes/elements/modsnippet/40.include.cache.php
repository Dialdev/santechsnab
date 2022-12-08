<?php
$cache_key = "chunk_".$name;

$output = $modx->cacheManager->get($cache_key);

if (empty($output)) {
  $output = $modx->getChunk($name, $scriptProperties);
  $modx->cacheManager->set($cache_key,$output);
}

return $output;
return;
