<?php 
    $productCard = get_sub_field('products');

?>

<section class="products">
    <div class="products__container container">
        <?php if (have_rows($productCard)) : ?>
            <?php while (have_rows($productCard)) : the_row(); ?>
                <?php 
                    $image = get_sub_field('product_img');
                    $name = get_sub_field('product_name');
                    $description = get_sub_field('product_description');
                    $price = get_sub_field('product_price');
                    $cta = get_sub_field('product_button');                    
                ?>

                <div class="products__card">
                    <?php if($image) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="Product Image" class="products__card-img">
                    <?php endif; ?>

                    <?php if($name) : ?>
                        <p class="products__card-name"><?php echo esc_html($name); ?></p>
                    <?php endif; ?>

                    <?php if($description) : ?>
                        <p class="products__card-description"><?php echo esc_html($description); ?></p>
                    <?php endif; ?>

                    <?php if($price) : ?>
                        <p class="products__card-price"><?php echo esc_html($price); ?></p>
                    <?php endif; ?>

                    <?php if($cta) : ?>
                        <a href="<?php echo esc_url($cta['url']); ?>" class="products__card-cta button"><?php echo esc_html($cta['title']); ?></a>                    
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>    
    </div> 
</section>