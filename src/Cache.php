<?php
namespace KO\Cache;

class Cache
{
	private $settings = null;

	private $cacheTime = null;

	private $data = null;

	public function __construct(Settings $settings)
	{
		$this->settings = $settings;
		$this->data = $this->getCache();
		$this->cacheTime = $this->data->updated;
		$this->valid = $this->isStale();
	}

	public function getSettings(){
		return $this->settings;
	}

	private function getCache(){
		return json_decode(file_get_contents($this->settings->getFile()));
	}

	public function isStale(){
		return (time() >= $this->cacheTime + $this->settings->getValidity() * 60);
	}

	public function getData(){
		return $this->data->data;
	}

	public function writeToCache($data){
  		// write the data to the cache json file
 		$cache = ['updated' => time(), 'data' => $data];
  		file_put_contents(
  			  $this->settings->getFile()
  			, json_encode($cache, JSON_PRETTY_PRINT)
  		);
	}
}
