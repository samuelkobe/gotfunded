<?php
/**
 * Block template file: parts/blocks/value-add-points.php
 *
 * Value Add Points Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'value-add-points-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-value-add-points';
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


<section class="bg-transparent relative min-h-[480px] xl:min-h-[640px] mb-<?php echo get_field( 'bottom_spacing' ); ?>">
    <div class="absolute overflow-hidden left-0 top-12 w-full h-full flex items-center z-0">
        <div class="absolute top-[000px] -left-[45%] xl:-left-[40%] 2xl:-left-[25%] h-[25%] max-h-[160px] w-full xl:w-[50%] bg-white opacity-[5%] lg:opacity-[8%] rounded-full"></div>
        <div class="absolute top-[235px] -left-[20%] xl:-left-[30%] 2xl:-left-[15%] h-[25%] max-h-[160px] w-full xl:w-[50%] bg-white opacity-[5%] lg:opacity-[8%] rounded-full"></div>
        <div class="absolute top-[470px] -left-[45%] xl:-left-[40%] 2xl:-left-[25%] h-[25%] max-h-[160px] w-full xl:w-[50%] bg-white opacity-[5%] lg:opacity-[8%] rounded-full"></div>
    </div>
    
    <div class="contained">
        <div class="w-full flex flex-col xl:flex-row relative">
            <div class="w-full md:w-2/3 2xl:w-1/4">
                <h3 class="text-base text-white lg:text-lg tracking-widest font-title font-semibold mb-8 lg:mb-10 uppercase relative after:absolute after:h-[5px] after:w-20 after:bg-brand-third after:-bottom-2 after:left-0 after:rounded-xl theme-override"><?php the_field( 'block_title' ); ?></h3>
                <h2 class="w-full text-white text-2xl lg:text-4xl lg:leading-[48px] font-title font-semibold theme-override"><?php the_field( 'block_header' ); ?></h2>
                <p class="font-sans font-normal text-brand-light_grey text-lg lg:text-xl mt-4 lg:mt-6"><?php the_field( 'block_content' ); ?></p>
            </div>
            <div class="w-full 2xl:w-3/4 text-white">
                <?php if ( have_rows( 'points' ) ) : ?>
                    <div class="w-full mt-16 xl:mt-0 xl:pl-1/8 grid grid-rows-3 grid-cols-2 lg:grid-rows-2 lg:grid-cols-3 gap-x-8 lg:gap-x-8 gap-y-4 lg:gap-y-24">
                        <?php while ( have_rows( 'points' ) ) : the_row(); ?>
                            <div class="flex flex-col">
                                <h4 class="font-title font-normal text-2xl lg:text-3xl relative mb-8 lg:mb-10 after:absolute after:h-[5px] after:w-[30px] after:bg-brand-fourth after:-bottom-2 after:left-0 after:rounded-xl theme-override"><?php the_sub_field( 'header' ); ?></h4>
                                <p class="font-sans font-normal text-brand-light_grey text-lg lg:text-xl"><?php the_sub_field( 'content' ); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>