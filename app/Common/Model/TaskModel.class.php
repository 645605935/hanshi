<?php
namespace Common\Model;
use Think\Model\RelationModel;
class TaskModel extends RelationModel{
	protected $_link=array(
		'user'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'User',
			'foreign_key'=>'uid',
			'as_fields' => 'truename:_truename',
		),
		'type'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
			'foreign_key'=>'type',
			'as_fields' => 'title:type',
		),
		'type_1'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
			'foreign_key'=>'type_1',
			'as_fields' => 'title:type_1',
		),
		'type_2'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
			'foreign_key'=>'type_2',
			'as_fields' => 'title:type_2',
		),
		'type_3'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
			'foreign_key'=>'type_3',
			'as_fields' => 'title:type_3',
		),
		'type_4'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
			'foreign_key'=>'type_4',
			'as_fields' => 'title:type_4',
		)
	);
}

?>