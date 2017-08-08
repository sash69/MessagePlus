<?php

namespace Drupal\messageplus\Controller;

use Drupal\Core\Controller\ControllerBase;

class MessageplusController extends ControllerBase {

    public static function add_custom_message($delimiter){
        $config = \Drupal::config('messageplus.settings');
        $text_to_add = $config->get('messageplus.text_to_add');
        drupal_set_message($text_to_add.$delimiter);
    }
}