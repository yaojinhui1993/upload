<?php

use Yaojinhui1993\Upload\FileAPI;
use Yaojinhui1993\Upload\Dropzone;
use Yaojinhui1993\Upload\Plupload;
use Yaojinhui1993\Upload\Receiver;
use Yaojinhui1993\Upload\FineUploader;

include __DIR__.'/vendor/autoload.php';

$config = [
    'chunks' => 'temp/chunks',
    'storage' => 'temp',
    'domain' => 'http://app.dev/',
    'path' => 'temp',
];

$inputName = 'file';
$api = isset($_GET['api']) ? $_GET['api'] : null;

switch ($api) {
    case 'plupload':
        $receiver = new Receiver(new Plupload($config));
        break;

    case 'fine-uploader':
        $receiver = new Receiver(new FineUploader($config));
        break;

    case 'dropzone':
        $receiver = new Receiver(new Dropzone($config));
        break;

    default:
        $receiver = new Receiver(new FileAPI($config));
        break;
}

$receiver->receive($inputName)->send();
