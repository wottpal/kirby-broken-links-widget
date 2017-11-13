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
    // Gather Plugin-Options
    $include_external = c::get('broken-links.include-external', false);
    $include_fields = c::get('broken-links.include-fields', ['text']);
    $exclude_pages = c::get('broken-links.exclude-pages', []);

    // Initialization
    $site = panel()->site();
    $base_url = $site->url();
    $all_links = [];
    $broken_links = [];
    $regex = '/https?\:\/\/[^\" \n]+/i';

    // Filter out excluded pages
    $pages = $site->index()->filter(function ($page) use ($exclude_pages) {
      return !in_array($page->id(), $exclude_pages);
    });

    // Look through all pages and fields
    foreach($pages as $page) {
      foreach($include_fields as $field) {

        if ($page->$field()->isNotEmpty()) {
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
    }

    // Populate the Widget-Template
    return tpl::load(__DIR__ . DS . 'template.php', [
      'broken_links' => $broken_links,
      'has_broken_links' => !empty(array_filter($broken_links))
    ]);
  }

];
