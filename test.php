<?php
// test code for DFXwriter

require 'DXFwriter.php';

$d = new DxfWriter();

$dw=$_POST['dw'];
$dh=$_POST['dh'];

////////////How to insert text//////////////
/*
$txt['text'] = $_POST['text'] ;
$txt['point'] = array($dw/2,$dh/2,0);
$txt['height'] = $_POST['text_height'];
$txt_str=new DxfText($txt);
$d->append($txt_str);
*/
/////////////How to draw polyline///////////

$poly['points']=array	(
							array(0,0),
							array($dw,0), 
							array($dw,$dh), 
							array(0,$dh),
							array(0,0)
						);
						

$dt['lineWidth']=0;
$dt['name']='jj';
$dt['thickness']=0;

$ll=new DxfLayer($dt);

$poly['layer']='jj';

$door_str=new DxfPolyLine($poly);
$d->append($door_str);

$poly['points']=array	(
							array(0+3,0+3),
							array($dw-3,0+3), 
							array($dw-3,$dh-3), 
							array(0+3,$dh-3),
							array(0+3,0+3)
						);



$door_str=new DxfPolyLine($poly);
$d->append($door_str);

////////Howto draw Hatch in polyline///////
///////Added by SMP at lib/Hatch.php///////

if($_POST['hatch']=='yes')
{
	$poly['scale']=2;
	$poly['color']=200;	
	$poly['pattern']=$_POST['pattern'];
	$poly['lineweight']=1;											
	$door_str=new DxfHatchPolyLine($poly);
	$d->append($door_str);
}

////////How to write dimension/////////////
///////Added by SMP at lib/dimension.php///////

$poly['fp']=$poly['points'][0];
$poly['sp']=$poly['points'][1];
$poly['offset']=2;

$door_dim=new DxfDimension($poly);
$d->append($door_dim);

///////////How to download file/////////////
///////////Function created by SMP in DXFwriter.php/////
$d->saveDownload('test.dxf');

/////////////////////////////////////////////

//$d->saveDownload('test.dxf');

?>
