<?php
// test code for DFXwriter

require 'DXFwriter.php';

$d = new DxfWriter();

$dw=$_POST['dw'];
$dh=$_POST['dh'];

////////////How to insert text//////////////
$txt['text'] = $_POST['text'] ;
$txt['point'] = array($dw/2,$dh/2,0);
$txt['height'] = $_POST['text_height'];
$txt_str=new DxfText($txt);
$d->append($txt_str);


/////////////How to draw polyline///////////

$poly['points']=array	(
							array(0,0),
							array($dw,0), 
							array($dw,$dh), 
							array(0,$dh),
							array(0,0)
						);
$door_str=new DxfPolyLine($poly);
$d->append($door_str);

//$dw=$_POST['dw']-5;
//$dh=$_POST['dh']-5;

$poly['points']=array	(
							array(0+3,0+3),
							array($dw-3,0+3), 
							array($dw-3,$dh-3), 
							array(0+3,$dh-3),
							array(0+3,0+3)
						);
$door_str=new DxfPolyLine($poly);
$d->append($door_str);
///////////How to download file/////////////
$d->saveDownload('test.dxf');
/////////////////////////////////////////////

/*
$b = new DxfBlock(array('name' => 'test'));
$b->append(
			new DxfSolid(array('points' => array(array(0, 0),
											array(1, 0), 
											array(1, 1), 
											array(0, 1)),
            				'color' => 1)
));

$b->append(new DxfArc( array('center'=>array(1,0), 'color' => 2) ));
$d->appendBlock($b);

$d->appendStyle(new DxfStyle());
$d->appendView(new DxfView(array('name' =>'Normal')));
$d->appendView(DxfViewByWindow('Window', array(1,0), array(2,1)));

$d->appendLineType(new DxfLineType(array(
		'name' => 'DASHED',
		'description' => '- - -',
		'elements' => array(
			array('length' => 0.8),
			array('length' => -0.2)
		)
)));

$d->append(new DxfCircle(array('center' => array(1, 1), 'color'=>3)));
$d->append(new DxfFace(array('points'=>array(array(0, 0), 
										array(1, 0), 
										array(1, 1), 
										array(0, 1)),
							'color'=>4)
));


$d->append(new DxfInsert(array('name'=>'test', 
							'point'=>array(3, 3), 
							'cols'=>5, 
							'colspacing'=>2)));

$d->append(new DxfLine(array('lineType'=>'DASHED',
							'points'=>array(array(0, 0), 
										array(5, 5))
)));

$d->append(new DxfLwPolyLine(array('points'=>array(array(0, 0),
										array(1, 0), 
										array(1, 1), 
										array(0, 1)),
            				'flag'=>129,
            				'layer' => "DXFWRITER",
            				'color'=>7,
            				'width'=>1,
            				'lineType'=>'CONTINUOUS',
            				'lineWeight' => 0)
));


$d->append(new DxfPolyLine(array('points'=>array(array(1, 1),
										array(20, 10), 
										array(20, 20), 
										array(1, 15)),
            				'lineType'=>'DASHED',
//            				'layer' => 'DXFWRITER',
            				'flag' => 0
            				//'width' => 1,
            				//'color'=>1
            				)
));


$d->append(new DxfPoint(array('point' => array(1, 1), 'color'=>1)));
$d->append(new DxfSolid(array('points' => array(array(4, 4),
										array(5, 4),
										array(7, 8),
										array(9, 9)),
							'color' => 3)
));
*/


?>
