<?php
namespace Common\Model;
use Think\Model\RelationModel;
class IdeasItemModel extends RelationModel{
	protected $_link=array(
		'_user'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'User',
			'foreign_key'=>'uid',
			'as_fields' => 'username:username,id:user_id,img:avatar',
		),
		'_ideas'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'ideas',
			'foreign_key'=>'iid',
			'as_fields' => 'title:ideas',
		)
	);
}

?>