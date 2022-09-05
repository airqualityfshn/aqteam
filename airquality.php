<?php
/**
 * Plugin Name:       Air Quality
 * Plugin URI:        http://airqualityfshn.info/
 * Description:       Air Quality - Retrieve and display data from API
 * Version:           0.0.1
 * Author:            Anxhela Kosta <anxhela.kosta@fshn.edu.al>
 * Author URI:        
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        #
 * Text Domain:       airquality
 * Domain Path:       /languages
 */


require_once __DIR__ . '/vendor/autoload.php';
#require_once __DIR__ . '/src/Airquality.php';

return new Airquality\Airquality;