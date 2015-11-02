<?php

include '../../config.php';
include '../../functions.php';

/**
 * List all tickets including pagination and filtering.
 *
 * Response: JSON
 * Type: GET
 * URL: /tickets
 *
 * --
 *
 * GET Params:
 *
 * - page: Current page
 * - status: Filer ticket status (OPEN,ASSIGNED,CLOSED)
 * - date_from: Select tickets newer than created date (Y-m-d)
 * - date_until: Select tickets older than created date  (Y-m-d)
 */
$list = api_request($config['token'], $config['endpoint'].'tickets?page=1&status=ASSIGNED&date_from=2015-01-01&date_until=2016-01-01');

print_r($list);
