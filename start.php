<?php
function pleio_init() {
    register_pam_handler('pleio_pam_handler');
}

elgg_register_event_handler('init', 'system', 'pleio_init');

function pleio_pam_handler($credentials) {
    if ($credentials['username'] == "test" && $credentials['password'] == "test") {
        return true;
    } else {
        return false;
    }
}