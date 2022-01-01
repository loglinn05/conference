<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\Members;

class FormController
{
	private function filterProps(&$key, &$value)
	{
		if (
			($key == "first_name") ||
			($key == "last_name") ||
			($key == "report_subject") ||
			($key == "company") ||
			($key == "position") ||
			($key == "about")
		) {
			$value = strip_tags($value);
		}
		if (
			($key == "first_name") ||
			($key == "last_name")
		) {
			$value = htmlspecialchars($value);
		}
		if ($key == "phone") {
			$value = preg_replace("/[\s\-]/", "", $value);
		}
	}
	public function isEmailUnique()
	{
		$member = new Members;
		$just_inserted_user_email = $_POST["just_inserted_user_email"];
		$entered_email = $_POST["entered_email"];
		$smth = $member->getMemberByCondition("email = '$entered_email'");
		if (count($smth) > 0) {
			if ($just_inserted_user_email) {
				if ($just_inserted_user_email == $smth[0]->email) {
					echo true;
				} else {
					echo false;
				}
			} else {
				echo false;
			}
		} else {
			echo true;
		}
	}

	public function addMember()
	{
		$member = new Members;
		$form_data = [];
		$form_data_object = json_decode($_POST["formData"]);
		foreach ($form_data_object as $key => $value) {
			$this->filterProps($key, $value);
			$form_data[$key] = $value;
		}
		echo json_encode($member->insertMember($form_data));
	}

	public function modifyMember()
	{
		$member = new Members;
		$form_data = [];
		$form_data_object = json_decode($_POST["formData"]);
		foreach ($form_data_object as $key => $value) {
			$this->filterProps($key, $value);
			$form_data[$key] = $value;
		}
		echo json_encode($member->updateMember($form_data, $_POST["id"]));
	}

	public function countAllMembers()
	{
		$member = new Members;
		echo get_object_vars($member->countAllMembers()[0])["COUNT(*)"];
	}
}