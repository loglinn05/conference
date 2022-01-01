<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\Members;

class PagesController
{
	public function conferenceParticipationForm()
	{
		return view("conference_participation_form");
	}

	public function membersList()
	{
		return view("members_list", ["members_list" => (new Members)->getAllMembers()]);
	}
}