<?php
/**
 * Block template file: parts/blocks/how.php
 *
 * How Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'how-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-how';
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


<section class="flex bg-black text-white relative mb-<?php echo get_field( 'bottom_spacing' ); ?>">
    <div class="contained">

        <div class="flex w-full justify-center text-center">
            <h3 class="text-base lg:text-lg tracking-widest font-title font-semibold mb-6 lg:mb-10 flex justify-center w-32 mx-auto uppercase relative after:absolute after:h-[5px] after:w-20 after:bg-brand-third after:-bottom-2 after:rounded-xl theme-override"><?php the_field( 'block_title' ); ?></h3>
        </div>
        <div class="flex flex-col w-full justify-center items-center text-center">
            <h2 class="font-title font-normal mb-4 lg:mb-6 text-3xl lg:text-4xl 2xl:text-[44px] 2xl:leading-[48px] w-full md:w-2/3 lg:w-1/2 xl:w-[40%] 2xl:w-[45%] md:mx-auto theme-override"><?php the_field( 'block_header' ); ?><h2>
            <p class="font-sans font-normal text-brand-light_grey text-lg lg:text-xl w-5/6 lg:w-2/3 mx-auto"><?php the_field( 'block_content' ); ?></p>
        </div>

        <?php if ( have_rows( 'steps' ) ) : ?>

            <div class="w-full h-auto mt-4 md:mt-8 mb-12 md:mb-20 px-6 grid grid-flow-row-dense grid-cols-1 grid-rows-3 md:grid-cols-3 md:grid-rows-1 gap-y-4 md:gap-0 relative">
                <?php while ( have_rows( 'steps' ) ) : the_row(); ?>
                    <div class="flex flex-col items-center w-auto">
                        <?php $step_icon_image = get_sub_field( 'step_icon_image' ); ?>
                        <?php if ( $step_icon_image ) : ?>
                            <img class="w-40 h-40 lg:w-56 lg:h-56 object-contain" src="<?php echo esc_url( $step_icon_image['url'] ); ?>" alt="<?php echo esc_attr( $step_icon_image['alt'] ); ?>" />
                        <?php endif; ?>
                        <div class="flex flex-col justify-start items-center -mt-4">
                            <h4 class="mb-2 font-title font-normal text-2xl lg:text-3xl theme-override"><?php the_sub_field( 'title' ); ?></h4>
                            <p class="font-sans font-normal text-brand-light_grey text-base leading-normal text-center w-3/4"><?php the_sub_field( 'content' ); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>