<?php
/**
 * Block template file: parts/blocks/side-by-side.php
 *
 * Side By Side Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'side-by-side-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-side-by-side';
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

    <?php if ( have_rows( 'image_settings' ) ) : ?>
        <?php while ( have_rows( 'image_settings' ) ) : the_row(); ?>

            <?php if ( get_sub_field( 'media_toggle' ) == 0 ) : ?>
                <button @click="toggleVideo" :class="[videoOpen ? 'z-[1000] opacity-100 delay-200 duration-200 transition-opacity' : 'z-[-1000] opacity-0 delay-0 duration-0 transition-opacity']" class="video-admin fixed flex justify-center items-center w-[100vw] h-[100vh] max-h-full max-w-full focus:outline-none focus:border-0 cursor-close">
                    <span class="absolute inset-0 h-full w-full opacity-80 bg-black -z-1"></span>
                    <span class="video-embed">
                        <?php the_sub_field( 'video_embed', false, false ); ?>
                    </span>
                </button>

            <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>

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

<section id="<?php echo $block_id ?>" class="w-full pt-[96px] lg:pt-<?php echo get_field( 'top_spacing' ); ?> pb-<?php echo get_field( 'bottom_spacing' ); ?> lg:px-8">

	<?php if ( get_field( 'image_orientation_side_by_side' ) == 1 ) :
		$image_order = 'lg:order-1';
		$content_order = 'lg:order-3';
	else :
		$image_order = 'lg:order-3';
		$content_order = 'lg:order-1';

    endif; ?>

    <div class="container mx-auto flex flex-col lg:flex-row px-6 lg:px-0 py-8 lg:py-16">

        <div class="w-full lg:w-1/2 <?php echo $image_order; ?> mb-6 lg:mb-0">
            <?php if ( have_rows( 'image_settings' ) ) : ?>
                <?php while ( have_rows( 'image_settings' ) ) : the_row(); ?>

                    <?php if ( get_sub_field( 'media_toggle' ) == 1 ) : ?>

                        <?php 
                            $image = get_sub_field( 'image' );
                            $rounding = get_sub_field( 'image_rounding' );
                        ?>

                        <div class="h-full flex items-center">
                            <?php if ( $image ) : ?>
                                <img class="max-w-full <?php echo $rounding ?>" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                            <?php endif; ?>
                        </div>

                        <?php else : ?>

                        <?php $video_preview = get_sub_field( 'video_preview' ); ?>
                         <div class="h-full flex justify-center items-center relative">
                            <div class="flex justify-center items-center absolute w-24 h-24 z-20 text-white fill-white pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="transform rotate-[-30deg] relative -top-1 -left-1"><path d="M23.677 18.52c.914 1.523-.183 3.472-1.967 3.472h-19.414c-1.784 0-2.881-1.949-1.967-3.472l9.709-16.18c.891-1.483 3.041-1.48 3.93 0l9.709 16.18z"/></svg>
                            </div>
                            <div class="absolute w-24 h-24 z-10 bg-brand-fourth rounded-full pointer-events-none shadow-md shadow-black"></div>
                            <button  @click="toggleVideo" class="absolute w-36 h-36 z-1 bg-black opacity-[15%] rounded-full cursor-pointer hover:scale-125 transition-transform duration-500 shadow-md shadow-blackt"></button>
                            <?php if ( $video_preview ) : ?>
                                <img class="rounded-lg z-0 relative shadow-lg shadow-black" src="<?php echo esc_url( $video_preview['url'] ); ?>" alt="<?php echo esc_attr( $video_preview['alt'] ); ?>" />
                            <?php endif; ?>
                        </div>

                    <?php endif; ?>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <div class="w-0 lg:w-1/12 lg:order-2 h-10"></div>

        <div class="w-full lg:w-5/12 flex flex-col justify-start pt-0 lg:pt-8 <?php echo $content_order; ?>">
            <?php if ( have_rows( 'content' ) ) : ?>
                <?php while ( have_rows( 'content' ) ) : the_row(); ?>
                    <h2 class="mb-3 font-title font-semibold text-brand-main text-3xl lg:text-4xl 2xl:text-[44px] 2xl:leading-tight"><?php the_sub_field( 'header' ); ?></h2>
                    <p class="text-brand-light_grey text-base texlg:text-lg 2xl:text-xl w-full lg:w-5/6 xl:w-2/3"><?php the_sub_field( 'content' ); ?></p>

                    <div class="flex flex-col lg:flex-row lg:items-center space-y-4 lg:space-y-0 lg:space-x-4 mt-4 lg:mt-6">
                        <?php if ( get_sub_field( 'button_toggle' ) == 1 ) : ?>
                            <?php $button_link = get_sub_field( 'button_link' ); ?>            

                            <?php if ( $button_link ) : ?>
                                <div class="flex flex-row relative">
                                    <a class="theme-button main" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if ( get_sub_field( 'link_toggle' ) == 1 ) : ?>
                            <?php $link = get_sub_field( 'link' ); ?>

                            <?php if ( $link ) : ?>
                                <div class="flex flex-row items-center h-full relative">
                                    <a class="underline font-sans text-white hover:text-brand-light_grey transition-colors duration-500" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <div class="w-full lg:w-5/6 text-brand-light_grey text-[18px] mt-12 lg:mt-20">
                        <?php if ( get_sub_field( 'reference_toggle' ) == 1 ) : ?>
                            <div>
                                <div><?php the_sub_field( 'reference' ); ?></div>
                                <div class="mt-4">
                                    <span class="text-white text-xl">&#9733;&nbsp;&#9733;&nbsp;&#9733;&nbsp;&#9733;&nbsp;&#9733;&nbsp;</span>
                                    <span class="text-sm"><?php the_sub_field( 'reference_author' ); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

</section>