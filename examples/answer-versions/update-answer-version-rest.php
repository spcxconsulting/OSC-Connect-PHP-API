<?php

$site = rtrim((string)getenv('OSC_SITE'), '/');
$username = (string)getenv('OSC_USERNAME');
$password = (string)getenv('OSC_PASSWORD');
$answerVersionId = 123;

if (!$site || !$username || !$password) {
    throw new RuntimeException('Set OSC_SITE, OSC_USERNAME and OSC_PASSWORD.');
}

$payload = [
    'summary' => 'Resetting access to the SPCX client portal',
    'question' => 'How do I regain access to the client portal?',
    'solution' => '<p>Use the password reset link on the sign-in page. If the email does not arrive, contact support so the account details can be checked.</p>',
    'keywords' => 'portal login password reset account access',
];

$url = $site . '/services/rest/connect/v1.4/answerVersions/' . $answerVersionId;

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'PATCH',
    CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
    CURLOPT_USERPWD => $username . ':' . $password,
    CURLOPT_HTTPHEADER => [
        'Accept: application/json',
        'Content-Type: application/json',
    ],
    CURLOPT_POSTFIELDS => json_encode($payload, JSON_THROW_ON_ERROR),
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

echo 'Updated AnswerVersion ' . $answerVersionId . PHP_EOL;
