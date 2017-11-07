<?php

include_once __DIR__ . DS . '..' . DS . 'helpers.php';


return [

  'title' => 'Broken Links',

  // 'options' => [
  //   [
  //     'text' => 'Check now',
  //     'icon' => 'play-circle-o',
  //     'link' => '#imagekit-action-create',
  //   ],
  // ],

  'html' => function () {
    $site = panel()->site();
    $all_links = [];
    $broken_links = [];
    $regex = '/https?\:\/\/[^\" \n]+/i';
    $base_url = $site->url();

    // Gather Plugin-Options
    $include_external = c::get('broken-links.include-external', false);

    // Determine all links in all pages
    foreach($site->index() as $page) {
      if ($page->text()->isNotEmpty()) {
        $text = $page->text()->kt();
        preg_match_all($regex, $text, $matches);

        // Determine internal & broken links
        foreach($matches[0] as $link) {
          $is_internal = substr($link, 0, strlen($base_url)) === $base_url;
          if (!$is_internal && !$include_external) continue;

          $is_broken = get_http_response_code($link) == '404';
          if (!$is_broken) continue;

          // Remove Base-URL Prefix (internal)
          if ($is_internal) {
            $link = substr($link, strlen($base_url));
          }

          $broken_links[$page->id()][] = $link;
        }
      }
    }

    // Populate the Widget-Template
    return tpl::load(__DIR__ . DS . 'template.php', [
      'broken_links' => $broken_links,
      'has_broken_links' => !empty(array_filter($broken_links))
    ]);
  }

];
