<?php
namespace KO\Cache;

interface SettingsInterface
{
    public function setValidity($minutes);
    public function getValidity();
    public function setFile($file);
    public function getFile();
}