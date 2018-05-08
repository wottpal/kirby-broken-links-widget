<?php


/**
 * Returns the HTTP-Response-Code of a given Domain.
 */
function get_http_response_code($domain1) {
  $headers = get_headers($domain1);
  return substr($headers[0], 9, 3);
}
