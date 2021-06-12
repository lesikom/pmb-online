<?php

require 'src/main.php';

use Lesikom\Service\DownloadService as DownloadService;
use Lesikom\Model\DownloadBerkas as DownloadBerkas;

$berkas_service = new DownloadService();
echo $berkas_service->getDataFromDownloadBerkas(new DownloadBerkas());

