<?php
function httfox_get_rss_posts($rss, $posts_per_page) {
  if ($rss) {
    $arr_rss = array();
    $cont = 0;
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

function httfox_get_rss($rss_url, $limit) {
  $posts_per_page = is_numeric($limit) ? $limit : 0;

  $simple_rss = simplexml_load_file($rss_url);
  if ($simple_rss) {
    return httfox_get_rss_posts($simple_rss, $posts_per_page);
  }
  
  if (class_exists('SimpleXMLElement')) {
    $get_rss = file_get_contents($rss_url);
    if ($get_rss) {
      $rss_per_class = new SimpleXMLElement($get_rss);
      return httfox_get_rss_posts($rss_per_class, $posts_per_page);
    }
  }

  return null;
}
