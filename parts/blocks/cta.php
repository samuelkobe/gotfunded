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
    <div class="absolute inset-0 bg-brand-fourth opacity-25 flex"></div>
    <div class="absolute overflow-hidden right-0 top-0 w-full h-full z-0">
        <div class="absolute -top-[12.5%] -right-[10%] h-[25%] w-[50%] bg-white opacity-[5%] rounded-full"></div>
        <div class="absolute top-[25%] -right-[30%] h-[25%] w-[50%] bg-white opacity-[5%] rounded-full"></div>
        <div class="absolute top-[62.5%] -right-[10%] h-[25%] w-[50%] bg-white opacity-[5%] rounded-full"></div>
    </div>

    <div class="w-full h-auto min-h-[320px] xl:min-h-[480px] my-12 lg:my-20 flex flex-wrap flex-col px-6 sm:px-12 2xl:container 2xl:mx-auto items-start justify-center relative">
       
        <h3 class="text-5xl lg:text-7xl xl:text-8xl 2xl:text-[108px] w-full lg:w-1/2 xl:w-3/8 2xl:w-1/3 2xl:leading-none text-white font-title font-semibold theme-override"><?php the_field( 'title' ); ?></h3>

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
</section>