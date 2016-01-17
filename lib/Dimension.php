<?php
require_once 'Entity.php';

/**
* Dimension
* subclass of Entity
* 
* Used attributes
* 1st point (required)
* 2nd point (required)
* offset units
* 
*/

class DxfDimension extends DxfEntity{

	/*
	* Constructor
	* It is recommended that sublasses calls parent::__construct($attributes)
	* after setting default attributes 
	*
	* @param  Array	$attributes	array of attributes
	*/
	function __construct($attributes = array()){
		$defaults = array();
		parent::__construct(array_merge($defaults, $attributes));
	}

	/*
	* __toString
	* Returns a string representation of entity
	* Calles common of parent to output common attributes
	* @return 	string	the string representation of this entity
	*/
	function __toString(){
		// TODO all are string values, maybee som should be decimal
		//$x=$this->attributes['fp'][0]+$this->attributes['offset'];
		//$y=$this->attributes['fp'][0]-$this->attributes['offset'];

		$x=$this->attributes['fp'][0]+$this->attributes['offset'];
		$y=$this->attributes['fp'][1]-$this->attributes['offset'];
		$defaults['lineweight']=1;
				
		return sprintf("0\nDIMENSION\n70\n1\n10\n%d\n20\n%d\n13\n%d\n23\n%d\n14\n%d\n24\n%d\n370\n%d\n",
									$x,$y,
									$this->attributes['fp'][0],
									$this->attributes['fp'][1],
									$this->attributes['sp'][0],
									$this->attributes['sp'][1],
									$this->attributes['lineweight']
									);
	}
}
?>
