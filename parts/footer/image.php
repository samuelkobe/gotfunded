<div class="flex flex-row justify-start w-full md:w-1/4 lg:w-1/8 order-0 mb-8 md:mb-0">
    <div class="w-full h-full lg:h-auto flex justify-center lg:justify-start items-center py-12 md:py-0">
        <?php $footer_image = get_field( 'footer_image', 'option' ); ?>
        <?php if ( $footer_image ) : ?>
            <img class="max-w-full w-[208px] md:w-[64px] h-auto relative" src="<?php echo esc_url( $footer_image['url'] ); ?>" alt="<?php echo esc_attr( $footer_image['alt'] ); ?>" />
        <?php endif; ?>
    </div>
</div>