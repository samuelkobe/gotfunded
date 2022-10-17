<?php
/**
 * Block template file: parts/blocks/pricing.php
 *
 * Pricing Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'pricing-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-pricing';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		/* Add styles that use ACF values here */
	}
</style>

<?php 
$block_id = '';
if ( have_rows( 'id' ) ) : ?>
    <?php while ( have_rows( 'id' ) ) : the_row(); ?>
        <?php if ( get_sub_field( 'block_id_toggle' ) == 1 ) : ?>
            <?php
                $block_anchor = formatAnchor(get_sub_field( 'block_id' ));
                $block_id = $block_anchor;
            ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<section id="<?php echo $block_id ?>" class="bg-transparent relative min-h-[480px] xl:min-h-[640px] mb-<?php echo get_field( 'bottom_spacing' ); ?>">
    <div class="absolute overflow-hidden right-0 top-12 w-full h-full flex items-center z-0">
        <div class="absolute top-[000px] -right-[45%] xl:-right-[40%] 2xl:-right-[25%] h-[25%] max-h-[160px] w-full xl:w-[50%] bg-white opacity-[5%] lg:opacity-[8%] rounded-full"></div>
        <div class="absolute top-[235px] -right-[20%] xl:-right-[30%] 2xl:-right-[15%] h-[25%] max-h-[160px] w-full xl:w-[50%] bg-white opacity-[5%] lg:opacity-[8%] rounded-full"></div>
        <div class="absolute top-[470px] -right-[45%] xl:-right-[40%] 2xl:-right-[25%] h-[25%] max-h-[160px] w-full xl:w-[50%] bg-white opacity-[5%] lg:opacity-[8%] rounded-full"></div>
    </div>
    
    <div class="container relative mx-auto flex flex-col items-center px-6 lg:px-0 py-8 lg:py-16 2xl:py-24">
        <h2 id="welcome" class="w-full text-center text-white text-3xl xl:text-4xl 2xl:text-5xl font-title font-semibold theme-override"><?php the_field( 'block_header' ); ?></h2>

        <div class="w-full mt-8 lg:mt-16 flex flex-col md:flex-row items-start justify-around gap-y-8 md:gap-y-0 md:gap-x-8 px-1/12 sm:px-1/8 md:px-0 lg:px-1/12 xl:px-1/6 2xl:px-1/4">
            <?php if ( have_rows( 'subscription_types' ) ): ?>
                <?php $sub_count = 1; ?>
                <?php while ( have_rows( 'subscription_types' ) ) : the_row(); ?>
                    <div class="relative bg-white w-full rounded-xl">

                        <?php if ( get_row_layout() == 'subscription_type' ) : ?>
                            
                            <?php $tag_color = get_sub_field( 'colors' ); ?>

                            <?php
                                if ($tag_color == 'fourth') {
                                    $button_color = 'main';
                                } elseif ($tag_color == 'third') {
                                    $button_color = 'alt';
                                } else {
                                    $button_color = 'tertiary';
                                }            
                            ?>

                            <?php if($sub_count == 1) { ?>
                                <span class="z-20 flex items-center justify-center rounded-tl-lg rounded-tr-lg w-full h-8 text-white font-bold <?php echo 'bg-brand-' . $tag_color; ?>">
                                    <span class="pt-1">Most popular</span>
                                </span>
                            <?php } else { ?>
                                <span class="z-20 flex rounded-tl-lg rounded-tr-lg w-full h-8 <?php echo 'bg-brand-' . $tag_color; ?>"></span>
                            <?php } ?>
                            <div class="mt-6 py-4">
                                <h3 class="font-semibold font-title text-lg lg:text-xl text-brand-dark_grey uppercase w-full text-center"><?php the_sub_field( 'name' ); ?></h3>

                                <div class="flex flex-row items-center justify-center sub_price monthly relative w-full my-4 text-5xl leading-none text-brand-black font-sans font-semibold" title="$<?php the_sub_field( 'monthly_price' ); ?>">
                                    <p class="relative ml-16">
                                        $<?php the_sub_field( 'monthly_price' ); ?>
                                        <span class="text-brand-light_grey text-lg lg:text-xl -ml-2">/month</span>
                                    </p>
                                </div>

                                <?php if (get_sub_field( 'tag' ) != null || get_sub_field( 'tag' ) != '') { ?>
                                    <p class="w-full text-center text-sans text-sm lg:text-base text-brand-dark_grey font-semibold -mt-4 pb-4"><?php the_sub_field( 'tag' ); ?></p>
                                <?php } ?>


                                <div class="flex justify-center">
                                    <?php $monthly_button = get_sub_field( 'monthly_button' ); ?>
                                    <?php if ( $monthly_button ) : ?>
                                        <div class="flex flex-row relative">
                                            <a class="theme-button small <?php echo $button_color; ?>" href="<?php echo esc_url( $monthly_button['url'] ); ?>" target="<?php echo esc_attr( $monthly_button['target'] ); ?>"><?php echo esc_html( $monthly_button['title'] ); ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="flex flex-col my-6 mb-4 md:mb-6 px-4 lg:px-9 text-brand-dark_grey">
                                    <?php $points_title = get_sub_field( 'value_added_pointed_title' ); ?>
                                    <?php if ( have_rows( 'value_point' ) ) : ?>
                                        <h4 class="font-title font-semibold text-brand-black text-lg lg:text-xl mb-1 lg:mb-2"><?php echo $points_title; ?></h4>
                                        <ul class="flex flex-col gap-y-2 lg:gap-y-4 leading-5 lg:leading-6">
                                            <?php while ( have_rows( 'value_point' ) ) : the_row(); ?>
                                                <li class="flex flex-row =">
                                                    <div class="h-[3px] w-2 min-w-[8px] bg-brand-black mt-2 mr-2"></div>
                                                    <div class="w-auto"><?php the_sub_field( 'point' ); ?></div>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php else : ?>
                                        <?php // No rows found ?>
                                    <?php endif; ?>
                                </div>



                            </div>
                        <?php endif; ?>

                    </div>

                <?php $sub_count++; endwhile; ?>
                
            <?php else: ?>
                <?php // No layouts found ?>
            <?php endif; ?>
        </div>

    </div>
</section>