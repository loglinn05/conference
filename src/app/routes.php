<?php

$router->get(
	"",
	"PagesController@conferenceParticipationForm"
);

$router->get(
	"all_members",
	"PagesController@membersList"
);

$router->post(
	"is_email_unique",
	"FormController@isEmailUnique"
);

$router->post(
	"add_member",
	"FormController@addMember"
);

$router->post(
	"modify_member",
	"FormController@modifyMember"
);

$router->post(
	"count_all_members",
	"FormController@countAllMembers"
);