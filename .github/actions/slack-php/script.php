<?php

require_once 'vendor/autoload.php';
Requests::register_autoloader();

// Define the path to your JSON file
$jsonFile = 'data.json';

// Read the JSON file
$jsonData = file_get_contents($jsonFile);

// Decode the JSON data into an associative array
$data = json_decode($jsonData, true);

// var_dump($argv)
// var_dump($_ENV)

$response = Requests::post(
  "https://hooks.slack.com/services/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",
  array(
    'Content-Type' => 'application/json'
  ),
  json_encode(array (
    'blocks' => 
        array (
            array (
                "type" => "section",
                "text" => array (
                    "type" => "mrkdwn",
                    "text" => $_ENV['INPUT_MESSAGE'],
                ),
            ),
            array (
                "type" => "section",
                "fields" => array (
                    array (
                        "type" => "mrkdwn",
                        "text" => "*Repository:*\n{$_ENV['GITHUB_REPOSITORY']}",
                    ),
                    array (
                        "type" => "mrkdwn",
                        "text" => "*Event:*\n{$_ENV['GITHUB_EVENT_NAME']}",
                    ),
                    array (
                        "type" => "mrkdwn",
                        "text" => "*Ref:*\n{$_ENV['GITHUB_REF']}",
                    ),
                    array (
                        "type" => "mrkdwn",
                        "text" => "*SHA:*\n{$_ENV['GITHUB_SHA']}",
                    ),
                ),
            ),
        ),
  ))
  // json_encode(array(
  //   'text' => 'some message'
  // ))
  // json_encode(array($jsonData))
);

echo "::group::Slack Response\n"
var_dump($response);
echo "::endgroup::\n"

if(!$resopnse->success) {
  // echo 'error'
  echo $response->body;
}

?>