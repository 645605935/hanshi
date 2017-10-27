<?php
namespace Common\Model;
use Think\Model\RelationModel;
class IdeasModel extends RelationModel{
	protected $_link=array(
		'_user'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'User',
			'foreign_key'=>'uid',
			// 'as_fields' => 'username:username',
		),
		'_type'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
			'foreign_key'=>'type',
			'as_fields' => 'title:type, id:type_id',
		),
	);
}

?>