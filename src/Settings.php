<?php
namespace KO\Cache;

/**
* Settings class for instantiating the primary Cache class
*
* @since   0.0.1
* @author  Deac Karns <peledies@gmail.com> 
**/
class Settings implements SettingsInterface
{
	private $validity = null;

	private $file = null;

  /**
  * Set the cache validity duration
  *
  * @param integer
  *
  * @example
  * <code>
  *   $KOCacheSettings = new \KO\Cache\Settings();
  *   $KOCacheSettings->setValidity( integer );
  * </code>
  *
  * @return void
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function setValidity($minutes){
		$this->validity = $minutes;
	}

  /**
  * Set the cache file relative to the apps entry point
  *
  * @param string
  *
  * @example
  * <code>
  *   $KOCacheSettings = new \KO\Cache\Settings();
  *   $KOCacheSettings->setFile( string );
  * </code>
  *
  * @return void
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
  public function setFile($file){
  	$this->file = $file;
  }

  /**
  * Get the specified cache validity
  *
  * @example
  * <code>
  *   $AWSettings = new \KO\Cache\Settings();
  *   $AWSettings->getValidity();
  * </code>
  *
  * @return string
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
  public function getValidity(){
  	return $this->validity;
  }
  /**
  * Get the specified cache file
  *
  * @example
  * <code>
  *   $AWSettings = new \KO\Cache\Settings();
  *   $AWSettings->getFile();
  * </code>
  *
  * @return string
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
  public function getFile(){
  	return $this->file;
  }
}