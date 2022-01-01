<?php view("partials/header"); ?>
<main>
    <div id = "members_list">
        <?php if(isset($members_list) && $members_list): ?>
                        <?php foreach($members_list as $key => $member): ?>
                            <div class = "card card-cascade wider">
                                <div class = "view view-cascade overlay">
                                    <?php if(isset($member->photo) && $member->photo): ?>
                                        <img class = "card-img-top avatar" src = "<?= $member->photo ?>">
                                    <?php else: ?>
                                        <img class = "card-img-top avatar" src = "../../public/images/stub_avatar.png">
                                    <?php endif; ?>
                                    <a href = "#!">
                                        <div class = "mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <div class = "card-body card-body-cascade text-center">
                                    <h4 class = "card-title"><strong><?= trim($member->first_name) ?> <?= trim($member->last_name) ?></strong></h4>
                                    <h5 class = "card-subtitle pb-2"><?= $member->report_subject ?></h5>
                                    <p class = "card-text"><a href = "mailto:<?= $member->email ?>"><?= $member->email ?></a></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
        <?php else: ?>
            <h1 class = "h1-responsive text-center m-auto">There are no participants yet.</h1>
        <?php endif; ?>
    </div>
</main>
<?php view("partials/footer"); ?>