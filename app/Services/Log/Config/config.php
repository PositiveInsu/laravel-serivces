<?php


/**
 * config key : custom_log
 *
 */
return [
    'date_format' => "Y-m-d H:i:s",
    'delimiter' => "|",
    'formatter_format' => "%datetime%"."|"."%level_name%"."|"."%message%\n",
    'info_status' => true,
    'error_status' => true,
];
