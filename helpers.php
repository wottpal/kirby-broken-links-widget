<?php


/**
 * Returns either singular or plural "Links" string.
 * TODO Has to be localized.
 */
function link_string($count) {
  return $count == 1 ? "Link" : "Links";
}


/**
 * Returns the HTTP-Response-Code of a given Domain.
 */
function get_http_response_code($domain1) {
  $headers = get_headers($domain1);
  return substr($headers[0], 9, 3);
}
