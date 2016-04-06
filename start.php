<?php
function pleio_init() {
    register_pam_handler('pleio_pam_handler');

    elgg_register_plugin_hook_handler('action', 'register', 'pleio_block_action_handler');
    elgg_register_plugin_hook_handler('action', 'user/changepassword', 'pleio_block_action_handler');
    elgg_register_plugin_hook_handler('action', 'user/requestnewpassword', 'pleio_block_action_handler');
    elgg_register_plugin_hook_handler('action', 'avatar/upload', 'pleio_block_action_handler');
    elgg_register_plugin_hook_handler('action', 'admin/user/resetpassword', 'pleio_block_action_handler');
    elgg_register_plugin_hook_handler('action', 'useradd', 'pleio_block_action_handler');
}

elgg_register_event_handler('init', 'system', 'pleio_init');

function pleio_pam_handler($credentials) {
    if ($credentials['username'] == "bart" && $credentials['password'] == "test") {
        return true;
    } else {
        return false;
    }
}

function pleio_block_action_handler($event, $object_type, $object) {
    register_error(elgg_echo('pleio:action_blocked'));
    return false;
}