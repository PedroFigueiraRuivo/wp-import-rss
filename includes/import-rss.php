<?php
function httfox_get_rss($rss_url, $limit) {
  $posts_per_page = is_numeric($limit) ? $limit : 0;

  $rss = simplexml_load_file($rss_url);
  $arr_rss = array();
  $cont = 0;
  
  if ($rss) {
    $namespace = $rss->getNamespaces(true)['media'];
    foreach ($rss->channel->item as $item) {

      $imgUrl = (string) $item->children($namespace)->content->attributes()['url'];

      $arr_rss[] = [
        'img_url' => $imgUrl,
        'title' => utf8_decode($item->title),
        'description' => utf8_decode($item->description),
        'link' => utf8_decode($item->link),
      ];

      $cont++;

      if ($posts_per_page > 0 && $cont >= $posts_per_page) {
        break;
      }
    }

    return $arr_rss;
  }

  return null;
}
