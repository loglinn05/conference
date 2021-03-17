<?php view("partials/header"); ?>
<main>
	<div id = "members_list">
		<?php if(isset($members_list) && $members_list): ?>
			<div class = "table-responsive">
				<table class = "table">
					<thead>
						<th scope = "col">Photo</th>
						<th scope = "col">Full Name</th>
						<th scope = "col">Report Subject</th>
						<th scope = "col">E-mail</th>
					</thead>
					<tbody>
						<?php foreach($members_list as $member): ?>
							<tr>
								<td>
									<?php if(isset($member->photo) && $member->photo): ?>
										<div class = "avatar"><img class = "img-fluid" src = "<?= $member->photo ?>"></div>
									<?php else: ?>
									<div class = "avatar"><img class = "img-fluid sunny-morning-gradient" src = "../../public/	images/stub_avatar.png"></div>
									<?php endif; ?>
								</td>
								<td><?= trim($member->first_name) ?> <?= trim($member->last_name) ?></td>
								<td><?= $member->report_subject ?></td>
								<td><a href = "mailto:<?= $member->email ?>"><?= $member->email ?></a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php else: ?>
			<h1 class = "h1-responsive text-center m-auto">There are no participants yet.</h1>
		<?php endif; ?>
	</div>
</main>
<?php view("partials/footer"); ?>