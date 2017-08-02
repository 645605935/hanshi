<?php
namespace Common\Model;
use Think\Model\RelationModel;
class VideoModel extends RelationModel{
	protected $_link=array(
		'_user'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'User',
			'foreign_key'=>'uid',
			'as_fields' => 'truename:truename',
		),
		'_special'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Special',
			'foreign_key'=>'special',
			'as_fields' => 'title:special',
		),
		'_type'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
			'foreign_key'=>'type',
			'as_fields' => 'title:type',
		)
	);
}

?>