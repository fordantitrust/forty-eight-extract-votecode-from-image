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

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

// Load composer autoload
require __DIR__ . '/vendor/autoload.php';

// Load configuration
require_once __DIR__ . '/config.php';

try {

    // Code list
    $voteCodes = array();

    // Image list
    $imageFiles = array();

    $vision = new \Vision\Vision(
        GOOGLE_APIKEY,
        [
            // Use Google Vision API: (Text Detection, Limit)
            new \Vision\Feature(
                \Vision\Feature::DOCUMENT_TEXT_DETECTION,
                100
            ),
        ]
    );

    // Get all file name in directory
    $fileNames = scandir(IMAGE_DIR);

    // Verify image files from directory
    foreach($fileNames as $fileNameIndex => $fileName) {
        $pathFile = IMAGE_DIR."\\".$fileName;
        if(@is_array(getimagesize($pathFile) )){
            $imageFiles[$fileNameIndex] = array(
                    'fileName' => $fileName,
                    'path' => $pathFile
                );
        }
    }

    foreach ($imageFiles as $imageIndex => $imageInfo) {

        // Upload image to Google Vision
        $response = $vision->request(
            new \Vision\Request\Image\LocalImage($imageInfo['path'])
        );

        // Get result
        $texts = $response->getTextAnnotations();

        foreach($texts as $text) {

            $subject = $text->getDescription();

            $matches = array();

            preg_match(AKB48_CODE_PATTERN, $subject, $matches);

            // Retrieve matches Code to temp list
            if(count($matches) > 0) {
                foreach($matches as $match) {
                    $voteCodes[$imageIndex] = $match;
                }
            }
        }
    }
} catch (Exception $e) {
    print_r($e);
}

echo PHP_EOL;

foreach ($voteCodes as $index => $code) {
    echo $imageFiles[$index]['fileName'] . ' = ' . $code . PHP_EOL;
}