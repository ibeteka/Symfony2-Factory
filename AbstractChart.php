<?php

namespace XandrieBundle\Tools\Charts;

use Zend\Json\Json;

abstract class AbstractChart implements ChartInterface{
	
	private $type;
	private $renderto;
	private $optionplot = array();
	private $credits = array('enabled' => false);
	private $title;
	private $name;
	
	
	public function getType(){
		return $this->type;
	}
	public function setType($type){
		$this->type = $type;
		return $this;
	}
	public function getRenderto(){
		return $this->renderto;
	}
	public function setRenderto($renderto){
		$this->renderto = $renderto;
		return $this;
	}
	public function getTitle(){
		return $this->title;
	}
	public function setTitle($title){
		$this->title = $title;
		return $this;
	}
	public function getName(){
		return $this->name;
	}
	public function setName($name){
		$this->name = $name;
		return $this;
	}
	
	
	
	
	protected function getOptionplot() {
		return $this->optionplot;
	}
	protected function setOptionplot($optionplot) {
		$this->optionplot = $optionplot;
	}
	
	

	
	
	
	
	/**
	 * Add one or multiple options to the plotoptions array
	 * 
	 * @param array (array of options)
	 * @return void
	 */
	public function addPlotOptions($options) {
		array_merge($this->optionplot, $options);
	}
	
	
	
	/**
	 * Build a Chart object Type depending to the given parameters
	 * 
	 * @param array $array        	
	 * @return JsonArray
	 */
	abstract public function build(array $array);
	
	

	
	
	
}
