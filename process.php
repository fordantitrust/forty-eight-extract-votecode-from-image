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
 * @package    akb48-election-ocr
 * @author     Ford AntiTrust
 * @since      Version 2018
 * @license    GNU LGPL 2.1 http://creativecommons.org/licenses/LGPL/2.1
 */

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

// Load composer autoload
require __DIR__ . '/vendor/autoload.php';

// Load configuration
require_once __DIR__ . '/config.php';

// Round Vote
$round = 'round-1';
$outputFileName = 'result.csv';

// Default value
$statsOk = 0;
$statsFailed = 0;
$outputCodesNum = 0;
$outputCodes = array();

// Reset CSV file
file_put_contents($outputFileName, '');

try {

    // Code list
    $voteCodes = array();

    // Image list
    $imageFiles = array();

    $vision = new \Vision\Vision(
        GOOGLE_VISION_APIKEY,
        [
            // Use Google Vision API: (Text Detection, Limit)
            new \Vision\Feature(
                \Vision\Feature::TEXT_DETECTION,
                1000
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

        $countMatches = 0;
        
        foreach($texts as $text) {

            $subject = $text->getDescription();

            $matches = array();

            preg_match(AKB48_CODE_PATTERN, $subject, $matches);

            // Retrieve matches Code to temp list
            if(count($matches) > 0) {
                foreach($matches as $match) {

                    $outputCodesNum++;

                    $voteCodes[$imageIndex] = $match;

                    echo $outputCodesNum." - ".$imageFiles[$imageIndex]['fileName'] . ' = ' . $match . PHP_EOL;

                    $dataMatch = explode(" ", $match);

                    $code = strtolower($dataMatch[0].','.$dataMatch[1]);

                    $outputCodes[$imageIndex] = array('code' => $code, 'fileName' => $imageFiles[$imageIndex]['fileName']);

                    file_put_contents($outputFileName, $code.',"'.$imageFiles[$imageIndex]['fileName'] .'","New",NULL,'. $round . ''. PHP_EOL, FILE_APPEND);

                    $countMatches++;

                    $statsOk++;
                    
                }
            }
        }

        if($countMatches == 0) {

            $outputCodesNum++;

            $outputCodes[$imageIndex] = array('code' => 'failed', 'fileName' => $imageFiles[$imageIndex]['fileName']);

            echo $outputCodesNum." - ".$imageFiles[$imageIndex]['fileName'] . ' = OCR-Failed' . PHP_EOL;

            file_put_contents($outputFileName, 'failed,failed,"'.$imageFiles[$imageIndex]['fileName'] .'","OCR-Failed",NULL,'.$round.''. PHP_EOL, FILE_APPEND);

            $statsFailed++;

        }
    }
} catch (Exception $e) {
    print_r($e);
}

echo PHP_EOL;

echo "OK:" . $statsOk . PHP_EOL;
echo "Failed:" . $statsFailed . PHP_EOL;
echo "Total:" . ($statsOk + $statsFailed) . PHP_EOL;