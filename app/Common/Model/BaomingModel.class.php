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
		),
		'_sqz'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
			'foreign_key'=>'sqz',
			'as_fields' => 'title:sqz',
		),
		'_sq'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
			'foreign_key'=>'sq',
			'as_fields' => 'title:sq',
		),
		'_bmz'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
			'foreign_key'=>'bmz',
			'as_fields' => 'title:bmz',
		)
	);
}

?>