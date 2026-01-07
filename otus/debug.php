<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Diag\Logger;

$dateTimeNow = date_create();
$dateString = date_format($dateTimeNow, 'Y-m-d H:i:s');
$date = date('Y-m-d H:i:s');
$logDir = $_SERVER["DOCUMENT_ROOT"] . '/local/logs/';
$logFile = "debug.txt";
if (!is_dir($logDir)) {
  mkdir($logDir, 0777, true);
}
try{
  file_put_contents($logDir . "/" . $logFile, $dateString . PHP_EOL, FILE_APPEND);
} catch(Throwable $e) {
  new Bitrix\Main\SystemException("Не удалось записать в логфайл {$logDir}{$logFile} Ошибка {$e}"); 
}

//$logFileBitrix = Bitrix\Main\Config\Configuration::getValue('exception_handling')['log']['settings']['file'];
// Logger::myDump($dateString);
// Logger::log2file($logFileBitrix);
// Logger::writeToLog($dateString, 'Date: ');
// Logger::bitrixDumpToFile($dateString, 'Date: ');
