<?php
function get_config() {
    global $config;

    // Configurations
    $config = new stdClass();
    $config->site_title = "Movimento 5 Stelle";
    $config->location = "Palestrina";
    $config->contacts = new stdClass();
    $config->contacts->mail = "info@palestrina5stelle.it";
    $config->contacts->cell = "392 9459404";

    return $config;
}
