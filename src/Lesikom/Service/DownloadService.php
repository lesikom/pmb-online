<?php
namespace Lesikom\Service;
use Lesikom\Model\DownloadBerkas;

class DownloadService
{
    
public function __construct()
{
    
}

public function getDataFromDownloadBerkas(DownloadBerkas $class)
{
    return $class->displayDownloadButton();
}

}