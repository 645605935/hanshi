<?php
namespace Common\Model;
use Think\Model\RelationModel;
class BaomingModel extends RelationModel{
	protected $_link=array(
		'_user'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'User',
			'foreign_key'=>'uid',
			'as_fields' => 'username:username',
		),
		'_type'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
			'foreign_key'=>'type',
			'as_fields' => 'title:type',
		),
		'_match'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'match',
			'foreign_key'=>'mid',
			'as_fields' => 'title:match',
		)
	);
}

?>