<?php

declare(strict_types=1);

namespace vBulletin;

require 'vendor/autoload.php';

use vBulletin\Render\View;
use vBulletin\Connection\DB;
use vBulletin\Connection\Enum\Driver;
use vBulletin\Env;
use vBulletin\Logger\Log;
use vBulletin\Search\Search;
use vBulletin\Helpers\Input;

$db = new DB(Driver::MYSQL, Env::DBNAME, Env::HOST, Env::USER, Env::PASSWORD);

if (! $db->connect()) {
    Log::error('Couldn\'t connect to DB. Check logs for details.');
}

$vb = new Search($db);
$results = [];

if (isset($_REQUEST['q'])) {
    $value = Input::sanitize($_REQUEST['q']);
    $results = $vb->searchProcess($value);
} else if (isset($_REQUEST['searchid'])) {
    $id = (int) Input::sanitize($_REQUEST['searchid']);
    $results = $vb->searchResults($id);
}

if ($results) {
    View::renderSearchResults($results);
} else {
    View::renderSearchResult("<h2>Search in forum</h2><form><input name='q'></form>");
}
