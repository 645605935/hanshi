<?php
namespace Common\Model;
use Think\Model\RelationModel;
class VoiceDemoModel extends RelationModel{
	protected $_link=array(
		'_user'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'User',
			'foreign_key'=>'uid',
			'as_fields' => 'truename:truename',
		),
		'_type_1'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
			'foreign_key'=>'type',
			'as_fields' => 'title:type',
		),
		'_type_2'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
			'foreign_key'=>'type_1',
			'as_fields' => 'title:type_1',
		),
		'_type_3'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
			'foreign_key'=>'type_2',
			'as_fields' => 'title:type_2',
		)
	);
}

?>