<?php
namespace KO\Cache;

class Settings implements SettingsInterface
{
	private $validity = null;

	private $file = null;

	public function setValidity($minutes){
		$this->validity = $minutes;
	}

    public function setFile($file){
    	$this->file = $file;
    }

    public function getValidity(){
    	return $this->validity;
    }

    public function getFile(){
    	return $this->file;
    }
}