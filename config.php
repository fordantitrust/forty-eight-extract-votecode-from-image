<?php

/**
 *
 * LICENSE
 *
 * This source file is subject to the GNU LGPL 2.1 license that is bundled
 * with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://creativecommons.org/licenses/LGPL/2.1
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to annop@thaicyberpoint.com so we can send you a copy immediately.
 *
 * @package	   akb48-election-ocr
 * @author     Ford AntiTrust
 * @since	   Version 2018
 * @license    GNU LGPL 2.1 http://creativecommons.org/licenses/LGPL/2.1
 */

// Google Cloud Platform: Google Vision API Key
define('GOOGLE_VISION_APIKEY', '');

// Image storage directory
define('IMAGE_DIR', 'C:\xxx\xxx'); // Last directory without "\" ore "/"

// Pattern AKB48 Code (xxxxxxxx xxxxxxxx)
// [a-zA-Z0-9]{8} [a-zA-Z0-9]{8}
define('AKB48_CODE_PATTERN', '/[a-zA-Z0-9]{8} [a-zA-Z0-9]{8}/');