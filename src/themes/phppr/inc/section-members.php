<section class="section section--featured">
    <div class="container">
        <?php $members = get_users(); ?>
        <h2 class="section__title"><?php echo count($members); ?> Membros</h2>

        <ul class="member-list list-unstyled">
            <?php foreach($members as $member):
                $github_username = get_user_meta( $member->ID, 'github_username', true);
                $github_avatar = "https://github.com/{$github_username}.png?size=200";
                $github_url = get_user_meta( $member->ID, 'github_url', true);
                $member_url = ($github_url) ? $github_url : $member->user_url;
            ?>
                <li class="member-list__item">
                    <a href="<?php echo $member_url ?>" target="_blank">
                        <img src="<?php echo get_avatar_url($member->user_email, array('size' => 140, 'default' => $github_avatar)) ?>" alt="Foto do perfil de <?php echo $member->display_name ?>" class="img-circle">
                    </a>

                    <?php if($github_username): ?>
                        <span class="member-list__meta">
                            <i class="icon icon-github"></i>
                            <a href="https://github.com/<?php echo $github_username ?>" target="_blank">
                                /<?php echo $github_username ?>
                            </a>
                        </span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="clearfix"></div>

        <?php if (!is_user_logged_in()): ?>
            <div class="col-md-12 text-center">
                <div class="sp"></div>
                <a href="<?php echo site_url('/wp-admin/admin-ajax.php?action=github_oauth_redirect'); ?>" class="btn btn-primary btn-lg btn-round btn-ghost">
                    <i class="icon icon-github"></i> Quero participar
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
