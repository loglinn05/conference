<?php

namespace App\Models;

use App\Core\App;

class Members
{
	public function insertMember($parameters)
	{
		return App::get("connection")->insert("members", $parameters);
	}

	public function updateMember($parameters, $id)
	{
		return App::get("connection")->update("members", $parameters, $id);
	}

	public function getAllMembers()
	{
		return App::get("connection")->selectAll("members");
	}

	public function getMemberByCondition($condition) {
		return App::get("connection")->selectWhere("members", $condition);
	}

	public function countAllMembers()
	{
		return App::get("connection")->countAllItems("members");
	}
}