<?php
    $title = get_sub_field('title');
    $logo = get_sub_field('logo');
    $copy = get_sub_field('copy');
    $cta = get_sub_field('hero_cta');
?>

<section class="hero">
    <div class="hero__container container">
        <?php if ($logo) : ?>
            <img class="hero__img" src="<?php echo esc_url($logo['url']); ?>" alt="Logo">
        <?php endif; ?>
            
        <div class="hero__text">
            <h1 class="hero__text-title"><?php echo esc_html($title); ?></h1>
            <p class="hero__text-copy"><?php echo esc_html($copy); ?></p>
            <a class="hero__text-cta button" href="<?php echo esc_url($cta['url']); ?>"><?php echo esc_html($cta['title']); ?></a>
        </div>

    </div>
</section>