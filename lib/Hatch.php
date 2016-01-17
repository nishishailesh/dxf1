<?php
require_once 'Entity.php';

/**
* HatchPolyLine
* subclass of Polyline
* Can not hatch if it is not a polyline
* 
* Used attributes
* points (required) default=none, required by its parent
* pattern default=ANSI38
* 
*/


/*
0
HATCH
  2
ANSI38
 91
1
 92
2
 72
1
72
0
73
1
93
4
10
1
20
1
10
5
20
5
10
50
20
4
10
1
20
1
*/

class DxfHatchPolyLine extends DxfPolyLine{

	/*
	* Constructor
	* It is recommended that sublasses calls parent::__construct($attributes)
	* after setting default attributes 
	*
	* @param  Array	$attributes	array of attributes
	*/
	function __construct($attributes = array()){
		$defaults = array();
		$defaults['Scale']=10;
		$defaults['pattern'] = 'ANSI38';
		$defaults['color']=255;
		$defaults['lineweight']=1;
		parent::__construct(array_merge($defaults, $attributes));
	}

	/*
	* __toString
	* Returns a string representation of entity
	* Calles common of parent to output common attributes
	* @return 	string	the string representation of this entity
	*/
	function __toString(){
		
		//parent::__toString();
		
		// TODO all are string values, maybee som should be decimal
		//not scale
		//$result = sprintf("0\nHATCH\n2\n%s\n91\n1\n92\n2\n72\n1\n72\n0\n73\n1\n41\n10\n",$this->attributes['pattern']);

		//with scale
		$result = sprintf("0\nHATCH\n2\n%s\n91\n1\n92\n2\n72\n1\n72\n0\n73\n1\n41\n%d\n62\n%d\n370\n%d\n",
				$this->attributes['pattern'],$this->attributes['scale'],$this->attributes['color'],$this->attributes['lineweight']);

		//$result = sprintf("0\nHATCH\n  2\nANSI34\n91\n1\n92\n2\n72\n1\n72\n0\n73\n1\n");						
		$num_vertices=count($this->attributes['points']);
		$result .=sprintf("93\n%s\n",$num_vertices);

		foreach ($this->attributes['points'] as $p){
			$result .= sprintf("10\n%d\n20\n%d\n", 
									$p[0],$p[1]);
		}
		//$result .= "0\nSEQEND\n";
		return $result;
	}
}
?>
