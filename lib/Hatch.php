<?php
require_once 'Entity.php';

/**
* PolyLine
* This is a LWPOLYLINE. I have no idea how it differs from a normal PolyLine
* I am not sure if the class works, but i doesn't break things...
*
* TODO: Finish polyline (now implemented as a series of lines)
*
* subclass of Entity
* 
* Used attributes
* points (required) default none
* flag default 0
* width (optional)
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
		$defaults['pattern'] = 'ANSI38';
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
		$result = sprintf(
"0\nHATCH\n2\n%s\n91\n1\n92\n2\n72\n1\n72\n0\n73\n1\n"
						,$this->attributes['pattern']);
						
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
