<?php
	defined('BASEPATH') or die('No direct access script allowed!');

    require_once(APPPATH.'core/BaseModel.php');

	class Ingredient_model extends BaseModel
	{
		var $table = 'ingredient';
	}