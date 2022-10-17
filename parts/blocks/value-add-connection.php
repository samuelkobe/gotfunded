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

<section id="<?php echo $block_id ?>" class="flex flex-row items-start justify-start bg-transparent relative text-white bg-black pt-0 lg:pt-16 mb-<?php echo get_field( 'bottom_spacing' ); ?>"> 
    <div class="w-full flex flex-col lg:flex-row relative">

        <div class="w-full lg:w-1/3">
            <div class="w-full flex items-end sm:items-center relative pr-1/6 lg:pr-1/12">


            <?php if ( have_rows( 'messages' ) ) : ?>
                <div class="flex justify-center flex-col absolute right-[12.5%] lg:-right-24 2xl:right-[0.5%] transform scale-75 md:scale-100 lg:scale-90 2xl:scale-100 origin-top-right">

                    <?php $timestamp_style = ''; ?>

                    <?php while ( have_rows( 'messages' ) ) : the_row(); ?>

                        <?php $timestamp_selected_option = get_sub_field( 'timestamp' ); ?>

                        <?php if ( $timestamp_selected_option ) : ?>
                            <?php
                                $timestamp_order = $timestamp_selected_option['value']; 

                                if ($timestamp_order == 1) {
                                    $timestamp_style = ''; // change nothing;
                                } else {
                                    $timestamp_style = 'transform scale-75 origin-top-right';
                                }
                            ?>

                        <?php endif; ?>

                        <div class="w-auto h-28 flex items-center relative mb-2 rounded-xl shadow-2xl order-<?php echo $timestamp_order . ' ' . $timestamp_style; ?>">
                            <div class="w-full h-full absolute top-0 bottom-0 right-0 z-0 bg-white opacity-[86%] rounded-xl"></div>
                            
                            <p class="min-w-[384px] max-w-[540px] text-brand-black text-lg leading-none px-4 pt-8 z-1"><?php the_sub_field( 'message_content' ); ?></p>

                            <?php $brand_icon = get_sub_field( 'brand_icon' ); ?>
                            <?php if ( $brand_icon ) : ?>
                                <img class="rounded-lg w-8 h-8 aspect-square object-cover absolute top-4 left-4" src="<?php echo esc_url( $brand_icon['url'] ); ?>" alt="<?php echo esc_attr( $brand_icon['alt'] ); ?>" />
                            <?php endif; ?>

                            
                            <?php if ( $timestamp_selected_option ) : ?>
                                <span class="absolute top-4 right-4 text-brand-black text-sm">
                                    <?php echo esc_html( $timestamp_selected_option['label'] ); ?>
                                </span>
                            <?php endif; ?>

                        </div>

                    <?php endwhile; ?>

                </div>
            <?php endif; ?>

            <?php if ( have_rows( 'block_media' ) ) : ?>
                <?php while ( have_rows( 'block_media' ) ) : the_row(); ?>

                    <?php if ( get_sub_field( 'block_preview_image' ) ) : ?>
                        <?php $block_poster = get_sub_field( 'block_preview_image' ); ?>
                    <?php endif ?>

                    <?php if ( get_sub_field( 'block_webm_video_file' ) ) : ?>
                        <?php $block_webm = get_sub_field( 'block_webm_video_file' ); ?>
                    <?php endif; ?>

                    <?php if ( get_sub_field( 'block_mp4_video_file' ) ) : ?>
                        <?php $block_mp4 = get_sub_field( 'block_mp4_video_file' ); ?>
                    <?php endif; ?>

                    <video aria-hidden="true" poster="<?php echo $block_poster; ?>" prefix="none" loop playsinline autoplay class="rounded-tr-xl rounded-br-xl aspect-square object-cover w-11/12 sm:w-3/4 lg:w-[640px] max-w-full" width="789" height="625">
                        <source type="video/webm" src="<?php echo $block_webm; ?>">
                        <source type="video/mp4" src="<?php echo $block_mp4; ?>">
                    </video>

                <?php endwhile; ?>
            <?php endif; ?>


            </div>
        </div>

        <div class="w-0 lg:w-1/6 2xl:w-1/12"></div>

        <div class="w-full mt-16 lg:mt-8 2xl:mt-12 px-6 lg:px-0 lg:w-1/2 2xl:w-7/12">
            <h2 class="w-full sm:w-11/12 xl:w-2/3 2xl:w-7/12 text-white text-4xl xl:text-5xl 2xl:text-[64px] 2xl:leading-[72px] font-title font-semibold theme-override"><?php the_field( 'block_header' ); ?></h2>
            <p class="w-full sm:w-11/12 xl:w-2/3 2xl:w-7/12 font-sans font-normal text-brand-light_grey text-xl 2xl:text-2xl mt-4 lg:mt-6 mb-6 lg:mb-8"><?php the_field( 'block_content' ); ?></p>
            <?php if ( get_field( 'button_toggle' ) == 1 ) : ?>
                <?php $button_link = get_field( 'button_link' ); ?>            

                <?php if ( $button_link ) : ?>
                    <div class="flex flex-row relative">
                        <?php $data_title = formatAnchor($button_link['url']); ?>
                        <a class="theme-button main menu-anchor" data-title="<?php echo $data_title; ?>" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

    </div>
</section>