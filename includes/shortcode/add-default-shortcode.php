<?php  
function httfox_rssinc_create_shortcode($atts) {
  $args = shortcode_atts(array(
    'rss_url' => null,
    'posts_per_block' => 3,
    'add_class_container' => null,
    'button_text' => 'Ver post',
    'button_target' => '_self',
  ), $atts);

  if (empty($args['rss_url'])) return "Nenhum url de posts definido";

  $posts = httfox_get_rss($args['rss_url'], $args['posts_per_block']);
  if (empty($posts)) return "Nenhum post encontrado";

  // Shortcode logic
  $output = '';
  $addClass = $args['add_class_container'];
  
  if (!empty($addClass)) {
    $output = "<ul class='httfox-rss-import--feed_box $addClass'>";
  } else {
    $output = '<ul class="httfox-rss-import--feed_box">';
  }
  
  foreach($posts as $post) {
    $output .= '<li class="httfox-rss-import--item">';
    $output .= '<article class="httfox-rss-import--article">';
    $output .= '<div class="httfox-rss-import--img-box">';
    $output .= '<img class="httfox-rss-import--img" src="' . $post['img_url'] . '" alt="icon">';
    $output .= '</div>';
    $output .= '<a href="' . $post['link'] . '" target="' . $args['button_target'] . '">';
    $output .= '<h4 class="httfox-rss-import--title">' . $post['title'] . '</h4>';
    $output .= '</a>';
    $output .= '<div class="httfox-rss-import--description">' . $post['description'] . '</div>';
    $output .= '<a class="httfox-rss-import--link" href="' . $post['link'] . '" target="' . $args['button_target'] . '">' . $args['button_text'] . '</a>';
    $output .= '</article>';
    $output .= '</li>';
  }
  
  $output .= '</ul>';

  return $output;
}

add_shortcode('httfox_rss_inc_feed', 'httfox_rssinc_create_shortcode');
?>