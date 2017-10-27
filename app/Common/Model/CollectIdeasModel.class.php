<?php
namespace Common\Model;
use Think\Model\RelationModel;
class CollectIdeasModel extends RelationModel{
	protected $_link=array(
		'_user'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'User',
			'foreign_key'=>'uid',
			// 'as_fields' => 'username:username',
		),
		'_ideas'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Ideas',
			'foreign_key'=>'iid',
			// 'as_fields' => 'title:type, id:type_id',
		),
	);
}

?>