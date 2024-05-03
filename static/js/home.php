<?php
/*
Template Name: home
*/
get_header();
?>
<div class="page main" id="page">
    <section class="section hero">
        <div class="bg-section">
            <img src="<?php echo get_field('bg_hero');?>" alt="bg_hero">
        </div>
        <div class="container">
            <div class="hero-desc">
                <div class="hero-title"><?php echo get_field('title_hero');?></div>
                <div class="hero-text"><?php echo get_field('text_hero');?></div>
                <div class="hero-link">
                    <a href="#" class="btn-primary" data-index="3"><?php echo get_field('text_hero_link');?></a>
                </div>
            </div>
        </div>
        <div class="hero-media layer" data-offset="50">
            <img src="<?php echo get_field('media_hero');?>" alt="hero-media">
        </div>
        <div class="hero-parallax">
            <span class="layer" data-offset="50"><img src="<?php echo get_field('parallax_image_1');?>" alt="parallax"></span>
            <span class="layer" data-offset="60"><img src="<?php echo get_field('parallax_image_2');?>" alt="parallax"></span>
            <span class="layer" data-offset="70"><img src="<?php echo get_field('parallax_image_3');?>" alt="parallax"></span>
            <span class="layer" data-offset="80"><img src="<?php echo get_field('parallax_image_4');?>" alt="parallax"></span>
            <span class="layer" data-offset="90"><img src="<?php echo get_field('parallax_image_5');?>" alt="parallax"></span>
            <span class="layer" data-offset="100"><img src="<?php echo get_field('parallax_image_6');?>" alt="parallax"></span>
            <span class="layer" data-offset="110"><img src="<?php echo get_field('parallax_image_7');?>" alt="parallax"></span>
            <span class="layer" data-offset="80"><img src="<?php echo get_field('parallax_about_7');?>" alt="parallax"></span>
        </div>
    </section>
    <section class="section about">
        <div class="bg-section">
            <img src="<?php echo get_field('about_bg');?>" alt="about_bg">
        </div>
        <div class="container">
            <?php if( have_rows('about_item') ):
                $i = 1;?>
            <div class="about-desc">
                <?php while ( have_rows('about_item') ) : the_row(); ?>
                <div class="about-item <?php if($i=== 2){ echo 'active';} ?>" data-tab="tab<?php echo $i;?>">
                    <div class="about-item__title">
                        <?php echo get_sub_field('about_item_title'); ?>
                    </div>
                    <div class="about-item__text">
                        <?php echo get_sub_field('about_item_text'); ?>
                    </div>
                </div>
                <?php $i++; endwhile; ?>
            </div>
            <?php endif; ?>
            <?php if( have_rows('about_item') ):
                $i = 1; ?>
            <div class="about-nav">
                <?php while ( have_rows('about_item') ) : the_row(); ?>
                <a href="#" data-nav="tab<?php echo $i;?>" class="<?php if($i=== 2){ echo 'active';} ?>"><?php echo get_sub_field('about_item_text_button'); ?></a>
                <?php $i++; endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
        <div class="about-parallax">
            <span class="layer" data-offset="20"><img src="<?php echo get_field('parallax_about_1');?>" alt="parallax"></span>
            <span class="layer" data-offset="50"><img src="<?php echo get_field('parallax_about_2');?>" alt="parallax"></span>
            <span class="layer" data-offset="30"><img src="<?php echo get_field('parallax_about_3');?>" alt="parallax"></span>
            <span class="layer" data-offset="40"><img src="<?php echo get_field('parallax_about_4');?>" alt="parallax"></span>
            <span class="layer" data-offset="50"><img src="<?php echo get_field('parallax_about_5');?>" alt="parallax"></span>
            <span class="layer" data-offset="50"><img src="<?php echo get_field('parallax_about_6');?>" alt="parallax"></span>
            <span class="layer" data-offset="80"><img src="<?php echo get_field('parallax_about_7');?>" alt="parallax"></span>
            <span class="layer" data-offset="80"><img src="<?php echo get_field('parallax_about_8');?>" alt="parallax"></span>
            <span class="layer" data-offset="80"><img src="<?php echo get_field('parallax_about_9');?>" alt="parallax"></span>
        </div>
    </section>
    <section class="section product">
        <div class="bg-section">
            <img src="<?php echo get_field('product_bg');?>" alt="about_bg">
        </div>
        <div class="container">
            <div class="title-section">
                <?php echo get_field('title_product');?>
            </div>
            <?php if( have_rows('product_hero') ):?>
            <div class="product-wrap">
                <?php while( have_rows('product_hero') ): the_row(); ?>
                <?php $post_object = get_sub_field('product'); ?>
                <?php if( $post_object ): ?>
                    <?php
                    $post = $post_object;
                    setup_postdata( $post ); ?>
                        <div class="product-item <?php the_field('disabled'); ?> ">
                            <div class="product-item__media">
                                <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="product-item__title">
                                <?php if( get_field('disabled') ): ?>
                                    Coming soon...
                                    <?php else: ?>
                                    <?php the_title(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="product-item__text">
                                <?php echo get_field('product_item_text');?>
                            </div>
                            <div class="product-item__price">
                                <?php echo get_field('product_item_price');?>
                            </div>
                            <div class="product-item__link">
                                <a href="<?php the_permalink(); ?>" class="btn-primary"><?php echo get_field('product_item_text_link');?></a>
                            </div>
                        </div>
                    <?php endif; wp_reset_postdata(); ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="section reviews">
        <div class="bg-section">
            <img src="<?php echo get_field('reviews_bg');?>" alt="reviews_bg">
        </div>
        <div class="container">
            <div class="title-section">
                <?php echo get_field('title_reviews');?>
            </div>
            <?php if( have_rows('reviews_wrap') ): ?>
            <div class="reviews-slider">
                <?php while ( have_rows('reviews_wrap') ) : the_row(); ?>
                    <div class="slide"><img src="<?php echo get_sub_field('reviews_img'); ?>" alt="reviews"></div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <div class="slider-prev slider-arrow">
                <img src="http://madcatlab.lt/wp-content/uploads/2022/07/arrow-left.svg" alt="arrow-left">
            </div>
            <div class="slider-next slider-arrow">
                <img src="http://madcatlab.lt/wp-content/uploads/2022/07/arrow-right.svg" alt="arrow-right">
            </div>
        </div>
    </section>
    <section class="section contact">
        <div class="bg-section">
            <img src="<?php echo get_field('contact_bg');?>" alt="about_bg">
        </div>
        <div class="container">
            <div class="title-section">
                <?php echo get_field('title_contact');?>
            </div>
            <div class="contact-wrap">
                <div class="contact-item">
                    <div class="contact-item__media">
                        <img src="<?php echo get_field('contact_address_icon');?>" alt="">
                    </div>
                    <div class="contact-item__title">
                        <?php echo get_field('address_title');?>
                    </div>
                    <div class="contact-item__text">
                        <?php echo get_field('address_text');?>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-item__media">
                        <img src="<?php echo get_field('phone_icon');?>" alt="">
                    </div>
                    <div class="contact-item__title">
                        <?php echo get_field('phone_title');?>
                    </div>
                    <div class="contact-item__contact">
                        <a href="tel:<?php echo get_field('phone_text');?>"><?php echo get_field('phone_text');?></a>
                        <a href="mailto:<?php echo get_field('address_email');?>"><?php echo get_field('address_email');?></a>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-item__media">
                        <img src="<?php echo get_field('contact_soc_icon');?>" alt="">
                    </div>
                    <div class="contact-item__title">
                        <?php echo get_field('address_social_icon');?>
                    </div>
                    <?php if( have_rows('social_items') ): ?>
                    <div class="contact-item__social">
                        <?php while ( have_rows('social_items') ) : the_row(); ?>
                        <a href="<?php echo get_sub_field('link'); ?>" target="_blank" style="background-color: <?php echo get_sub_field('color'); ?>;"><img src="<?php echo get_sub_field('icon'); ?>" alt=""></a>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="contact-footer">
                <div class="footer-logo">
                    <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo get_field('logo_footer', 'option');?>" alt="">
                    </a>
                    <div class="footer-copy">
                        <?php echo get_field('copy', 'option');?>
                    </div>
                </div>
                <div class="footer-item">
                    <div class="footer-title"><?php pll_e('product'); ?></div>
                    <div class="footer-list">
                        <?php if( have_rows('footer_item', 'option') ): ?>
                            <ul>
                                <?php while ( have_rows('footer_item', 'option') ) : the_row(); ?>
                                    <li>
                                        <?php if (get_sub_field('footer_item_link')) : ?>
                                        <?php $procedure_links_items =  get_sub_field( 'footer_item_link', false, false); ?>
                                        <a href="<?php echo get_the_permalink($procedure_links_items); ?>">
                                            <?php echo get_the_title($procedure_links_items); ?>
                                        </a>
                                    </li>
                                <?php endif; endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="footer-item">
                    <div class="footer-title"><?php pll_e('page'); ?></div>
                    <div class="footer-list">
                        <?php if( have_rows('footer_item_2', 'option') ): ?>
                            <ul>
                                <?php while ( have_rows('footer_item_2', 'option') ) : the_row(); ?>
                                    <li>
                                    <?php if (get_sub_field('footer_item_link')) : ?>
                                        <?php $procedure_links_items =  get_sub_field( 'footer_item_link', false, false); ?>
                                        <a href="<?php echo get_the_permalink($procedure_links_items); ?>">
                                            <?php echo get_the_title($procedure_links_items); ?>
                                        </a>
                                        </li>
                                    <?php endif; endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="footer-item">
                    <div class="footer-title"><?php pll_e('info'); ?></div>
                    <div class="footer-list">
                        <?php if( have_rows('footer_item_3', 'option') ): ?>
                            <ul>
                                <?php while ( have_rows('footer_item_3', 'option') ) : the_row(); ?>
                                    <li>
                                    <?php if (get_sub_field('footer_item_link')) : ?>
                                        <?php $procedure_links_items =  get_sub_field( 'footer_item_link', false, false); ?>
                                        <a href="<?php echo get_the_permalink($procedure_links_items); ?>">
                                            <?php echo get_the_title($procedure_links_items); ?>
                                        </a>
                                        </li>
                                    <?php endif; endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="footer-Design">
                    <?php pll_e('design'); ?>
                    <a href="http://www.sparta-design.com/" target="_blank">Sparta Design</a>
                </div>
            </div>
        </div>
    </section>
</div>
<?php wp_footer(); ?>
<div class="hidden">

</div>
</html>
