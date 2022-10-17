<?php
/**
 * Block template file: parts/blocks/cta.php
 *
 * Call To Action Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'call-to-action-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-call-to-action';
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

<section id="<?php echo $block_id ?>" class="flex flex-row items-center justify-start bg-transparent relative mb-<?php echo get_field( 'bottom_spacing' ); ?>">
    <!-- <div class="absolute inset-0 bg-brand-fourth opacity-25 flex"></div> -->
    <!-- <div class="absolute overflow-hidden right-0 top-0 w-full h-full z-0">
        <div class="absolute -top-[12.5%] -right-[10%] h-[25%] w-[50%] bg-white opacity-[5%] rounded-full"></div>
        <div class="absolute top-[25%] -right-[30%] h-[25%] w-[50%] bg-white opacity-[5%] rounded-full"></div>
        <div class="absolute top-[62.5%] -right-[10%] h-[25%] w-[50%] bg-white opacity-[5%] rounded-full"></div>
    </div> -->

    <div class="w-full flex flex-col md:flex-row my-12 lg:my-20">

            <div class="w-full md:w-1/2 flex flex-col items-center justify-center bg-brand-third text-white py-16 lg:py-24 2xl:py-36 px-12 lg:pl-1/12 lg:pr-1/24">
                <div class="w-full lg:w-auto flex flex-col items-start">
                    <i class="fa-solid fa-magnifying-glass text-3xl lg:text-4xl 2xl:text-6xl mb-4 lg:mb-8"></i>
                    <h3 class="text-4xl lg:text-5xl 2xl:text-7xl w-full 2xl:leading-none font-title font-semibold theme-override"><?php the_field( 'title' ); ?></h3>
                    <?php if ( get_field( 'content_toggle' ) == 1 ) : ?>
                            <p class="text-base texlg:text-lg 2xl:text-xl w-full lg:w-[420px] xl:w-[480px] max-w-full mb-2"><?php the_field( 'content' ); ?></p>
                    <?php endif; ?>
                    <?php $button = get_field( 'button' ); ?>            
                    <?php if ( $button ) : ?>
                        <div class="flex flex-row relative mt-4">
                            <a class="theme-button dark_button" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="w-full md:w-1/2 flex flex-col items-center justify-center bg-slate-100 text-brand-black py-16 lg:py-24 2xl:py-36 px-12 lg:pr-1/12 lg:pl-1/24">

                <div class="w-full lg:w-auto flex flex-col items-start">
                    <i class="fa-regular fa-comment text-3xl lg:text-4xl 2xl:text-6xl mb-4 lg:mb-8"></i>
                    <h3 class="text-4xl lg:text-5xl 2xl:text-7xl w-full 2xl:leading-none font-title font-semibold theme-override"><?php the_field( 'title_two' ); ?></h3>
                    <?php if ( get_field( 'content_toggle_two' ) == 1 ) : ?>
                        <p class="text-base texlg:text-lg 2xl:text-xl w-full lg:w-[420px] xl:w-[480px] max-w-full mb-2"><?php the_field( 'content_two' ); ?></p>
                    <?php endif; ?>
                    <?php $button_two = get_field( 'button_two' ); ?>            
                    <?php if ( $button_two ) : ?>
                        <div class="flex flex-row relative mt-4">
                            <a class="theme-button alt" href="<?php echo esc_url( $button_two['url'] ); ?>" target="<?php echo esc_attr( $button_two['target'] ); ?>"><?php echo esc_html( $button_two['title'] ); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

    </div>

    <!-- <div class="w-full h-auto min-h-[320px] xl:min-h-[480px] my-12 lg:my-20 flex flex-wrap flex-col px-6 sm:px-12 2xl:container 2xl:mx-auto items-start justify-center relative">

        <div class="flex flex-col lg:flex-row lg:gap-x-4">

            <div class="flex flex-col w-full lg:w-1/2 relative">
                <h3 class="text-5xl lg:text-6xl xl:text-7xl 2xl:text-8xl w-full lg:w-1/2 xl:w-2/3 2xl:leading-none text-white font-title font-semibold theme-override"><?php the_field( 'title' ); ?></h3>

                <?php if ( get_field( 'content_toggle' ) == 1 ) : ?>
                    <p class="text-brand-light_grey text-base texlg:text-lg 2xl:text-xl w-full lg:w-5/6 xl:w-2/3 mb-2"><?php the_field( 'content' ); ?></p>
                <?php else : ?>
                    <?php // 'false' no content to show; ?>
                <?php endif; ?>

                <?php $button = get_field( 'button' ); ?>            
                <?php if ( $button ) : ?>
                <div class="flex flex-row relative mt-4">
                    <a class="theme-button main" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
                </div>
                <?php endif; ?>
            </div>
        
            <div class="flex flex-col w-full lg:w-1/2 relative">
                <h3 class="text-5xl lg:text-6xl xl:text-7xl 2xl:text-8xl w-full lg:w-1/2 xl:w-2/3 2xl:leading-none text-white font-title font-semibold theme-override"><?php the_field( 'title_two' ); ?></h3>

                <?php if ( get_field( 'content_two_toggle' ) == 1 ) : ?>
                    <p class="text-brand-light_grey text-base texlg:text-lg 2xl:text-xl w-full lg:w-5/6 xl:w-2/3 mb-2"><?php the_field( 'content_two' ); ?></p>
                <?php else : ?>
                    <?php // 'false' no content to show; ?>
                <?php endif; ?>

                <?php $button_two = get_field( 'button_two' ); ?>            
                <?php if ( $button_two ) : ?>
                <div class="flex flex-row relative mt-4">
                    <a class="theme-button main" href="<?php echo esc_url( $button_two['url'] ); ?>" target="<?php echo esc_attr( $button_two['target'] ); ?>"><?php echo esc_html( $button_two['title'] ); ?></a>
                </div>
                <?php endif; ?>
            </div>

        </div> -->

    </div>
</section>