<?php
namespace KO\Cache;

/**
* The Cache Class provides all the necessary methods needed to handle caching of data in a json file.
*
* @since   0.0.1
* @author  Deac Karns <peledies@gmail.com> 
**/
class Cache
{
	private $settings = null;

	private $cacheTime = null;

	private $data = null;

  /**
  * Cache Constructor
  *
  * @param \KO\Cache\Settings A fully configured Cache object
  *
  * @return void
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function __construct(Settings $settings)
	{
		$this->settings = $settings;
		$this->data = $this->getCache();
		$this->cacheTime = $this->data->updated;
		$this->valid = $this->isStale();
	}

  /**
  * Get the populated settings object.
  *
  * @return \KO\Cache\Settings
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function getSettings(){
		return $this->settings;
	}

  /**
  * Get the stored cache data, if none exists return null.
  *
  * @return Array
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	private function getCache(){
    if(file_exists($this->settings->getFile())){
      $cache = json_decode(file_get_contents($this->settings->getFile()));
    }else{
      $cache = null;
    }
		return $cache;
	}

  /**
  * Check the timestamp on the cached data and determine if it is valid.
  *
  * @return boolean
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function isStale(){
		return (time() >= $this->cacheTime + $this->settings->getValidity() * 60);
	}

  /**
  * Get the cached data
  *
  * @return array
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function getData(){
		return $this->data->data;
	}

  /**
  * write data to the specified cache file.
  *
  * @return void
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function writeToCache($data){
  		// write the data to the cache json file
 		$cache = ['updated' => time(), 'data' => $data];
  		file_put_contents(
  			  $this->settings->getFile()
  			, json_encode($cache, JSON_PRETTY_PRINT)
  		);
	}
}
