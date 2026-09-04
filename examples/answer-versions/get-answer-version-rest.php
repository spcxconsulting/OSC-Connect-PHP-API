<?php

$site = rtrim((string)getenv('OSC_SITE'), '/');
$username = (string)getenv('OSC_USERNAME');
$password = (string)getenv('OSC_PASSWORD');
$answerVersionId = 123;

if (!$site || !$username || !$password) {
    throw new RuntimeException('Set OSC_SITE, OSC_USERNAME and OSC_PASSWORD.');
}

$url = $site . '/services/rest/connect/v1.4/answerVersions/' . $answerVersionId;

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
    CURLOPT_USERPWD => $username . ':' . $password,
    CURLOPT_HTTPHEADER => ['Accept: application/json'],
]);

$body = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($body === false) {
    throw new RuntimeException(curl_error($ch));
}

curl_close($ch);

if ($status < 200 || $status >= 300) {
    throw new RuntimeException('Oracle REST returned HTTP ' . $status . ': ' . $body);
}

$data = json_decode($body, true, 512, JSON_THROW_ON_ERROR);

printf(
    "Version %s | Answer %s | %s\n",
    $data['id'] ?? '?',
    $data['answer']['id'] ?? '?',
    $data['summary'] ?? ''
);
