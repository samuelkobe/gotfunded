<div class="flex flex-row justify-start w-full md:w-1/4 lg:w-1/8 order-0 mb-8 md:mb-0">
    <div class="w-full h-full lg:h-auto flex justify-center lg:justify-start items-center py-12 md:py-0">
        <?php $brand_image = get_field( 'brand_image', 'option' ); ?>
        <?php if ( $brand_image ) : ?>
            <img class="max-w-full w-24 md:w-[96px] h-auto relative aspect-square" src="<?php echo esc_url( $brand_image['url'] ); ?>" alt="<?php echo esc_attr( $brand_image['alt'] ); ?>" />
        <?php endif; ?>
    </div>
</div>