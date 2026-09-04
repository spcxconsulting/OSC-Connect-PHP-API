<?php

use RightNow\Connect\v1_4 as RNCPHP;

$incidentId = 67890;

$incident = RNCPHP\Incident::fetch($incidentId);

if (!$incident->FileAttachments) {
    $incident->FileAttachments = new RNCPHP\FileAttachmentIncidentArray();
}

$attachment = new RNCPHP\FileAttachmentIncident();
$attachment->ContentType = 'text/plain';
$attachment->FileName = 'spcx-incident-note.txt';
$attachment->Name = 'SPCX incident note';
$attachment->Description = 'Example generated attachment for an Incident.';
$attachment->Private = true;

$file = $attachment->makeFile();
fwrite($file, "SPCX example attachment\nIncident: {$incidentId}\n");
fclose($file);

$incident->FileAttachments[] = $attachment;
$incident->save();

echo "Attachment added\n";
