<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Config for Multilingual CI
 *
 * Default language is set in the config.php - $config['language']	= 'english';
 *
 * by Tanel Tammik - keevitaja@gmail.com - 2012
 *
 */

// Supported languages
// By adding/romoving languages changes must be done in routes.php as well

$config['mci_languages']['da'] = 'dari';
$config['mci_languages']['pa'] = 'pashto';
//$config['mci_languages']['en'] = 'english';
// Hides language segment for default language
$config['mci_hide_default'] = true;

// html wrappers for language bar
$config['mci_wrapper_language'] = "<span>%s</span>";
$config['mci_wrapper_section'] = "<nav>%s</nav>";

// display names for the language bar
$config['mci_display']['da']['name'] = "دری";
$config['mci_display']['da']['title'] = "دری";
$config['mci_display']['pa']['name'] = " پشتو";
$config['mci_display']['pa']['title'] = "پشتو";
//$config['mci_display']['en']['name'] = "ENG";
//$config['mci_display']['en']['title'] = "In English";

/* End of file mci_languages.php */
/* Location: ./application/config/mci_languages.php */