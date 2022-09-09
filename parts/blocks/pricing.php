<section class="bg-transparent relative min-h-[480px] xl:min-h-[640px] mb-<?php echo get_field( 'bottom_spacing' ); ?>">
    <div class="absolute overflow-hidden right-0 top-12 w-full h-full flex items-center z-0">
        <div class="absolute top-[000px] -right-[45%] xl:-right-[40%] 2xl:-right-[25%] h-[25%] max-h-[160px] w-full xl:w-[50%] bg-white opacity-[5%] lg:opacity-[8%] rounded-full"></div>
        <div class="absolute top-[235px] -right-[20%] xl:-right-[30%] 2xl:-right-[15%] h-[25%] max-h-[160px] w-full xl:w-[50%] bg-white opacity-[5%] lg:opacity-[8%] rounded-full"></div>
        <div class="absolute top-[470px] -right-[45%] xl:-right-[40%] 2xl:-right-[25%] h-[25%] max-h-[160px] w-full xl:w-[50%] bg-white opacity-[5%] lg:opacity-[8%] rounded-full"></div>
    </div>
    
    <div class="container relative mx-auto flex flex-col items-center px-6 lg:px-0 py-8 lg:py-16 2xl:py-32">
        <h2 class="w-full text-center text-white text-4xl xl:text-5xl 2xl:text-[64px] 2xl:leading-[72px] font-title font-semibold theme-override"><?php the_field( 'block_header' ); ?></h2>
        <div class="flex flex-row justify-around items-center mt-8 lg:mt-16 relative">
            <span class="whitespace-nowrap flex items-center z-20 justify-center absolute p-2 lg:p-4 pt-[12px] lg:pt-5 text-sans text-xs lg:text-base font-bold -right-16 lg:-right-20 -top-[10px] lg:-top-5 w-auto h-5 lg:h-10 text-white bg-brand-third rounded-full shadow-custom shadow-brand-black"><?php the_field( 'discount_text' ); ?></span>
            <button class="pricing-button rounded-tl-full rounded-bl-full active"><?php the_field( 'left_button_text' ); ?></button>
            <button class="pricing-button rounded-tr-full rounded-br-full"><?php the_field( 'right_button_text' ); ?></button>
        </div>

        <div class="w-full mt-12 lg:mt-24 flex flex-col md:flex-row items-start justify-around gap-y-8 md:gap-y-0 md:gap-x-8 px-1/12 md:px-0 lg:px-1/12 xl:px-1/8 2xl:px-1/6">
            <?php if ( have_rows( 'subscription_types' ) ): ?>

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

                            <span class="z-20 absolute rounded-tl-lg rounded-tr-lg top-0 w-full h-6 <?php echo 'bg-brand-' . $tag_color; ?>"></span>
                            <div class="mt-6 py-8">
                                <h3 class="font-semibold font-title text-2xl text-brand-dark_grey uppercase w-full text-center"><?php the_sub_field( 'name' ); ?></h3>

                                <div class="sub_price monthly flex items-center justify-center relative w-full my-8 text-[80px] leading-none text-brand-black font-sans font-semibold" title="Price">
                                    <p class="relative ml-16">
                                        $<?php the_sub_field( 'monthly_price' ); ?>
                                        <span class="text-brand-light_grey text-xl -ml-4">/month</span>
                                    </p>
                                </div>

                                <div class="sub_price annual hidden items-center justify-center relative w-full my-8 text-[80px] leading-none text-brand-black font-sans font-semibold" title="Price">
                                    <p class="relative ml-16">
                                        $<?php the_sub_field( 'annual_price' ); ?>
                                        <span class="text-brand-light_grey text-xl -ml-4">/year</span>
                                    </p>
                                </div>

                                <?php if (get_sub_field( 'tag' ) != null || get_sub_field( 'tag' ) != '') { ?>
                                    <p class="w-full text-center text-sans text-lg text-brand-dark_grey font-semibold -mt-6 pb-6"><?php the_sub_field( 'tag' ); ?></p>
                                <?php } ?>


                                <div class="flex justify-center">
                                    <?php $monthly_button = get_sub_field( 'monthly_button' ); ?>
                                    <?php if ( $monthly_button ) : ?>
                                        <div class="flex flex-row relative">
                                            <a class="theme-button <?php echo $button_color; ?>" href="<?php echo esc_url( $monthly_button['url'] ); ?>" target="<?php echo esc_attr( $monthly_button['target'] ); ?>"><?php echo esc_html( $monthly_button['title'] ); ?></a>
                                        </div>
                                    <?php endif; ?>

                                    <?php $annual_button = get_sub_field( 'annual_button' ); ?>
                                    <?php if ( $annual_button ) : ?>
                                        <div class="hidden flex-row relative">
                                            <a class="theme-button <?php echo $button_color; ?>" href="<?php echo esc_url( $annual_button['url'] ); ?>" target="<?php echo esc_attr( $annual_button['target'] ); ?>"><?php echo esc_html( $annual_button['title'] ); ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="flex flex-col my-12 mb-6 md:mb-12 px-9 text-brand-dark_grey">
                                    <?php $points_title = get_sub_field( 'value_added_pointed_title' ); ?>
                                    <?php if ( have_rows( 'value_point' ) ) : ?>
                                        <h4 class="font-title font-semibold text-brand-black text-2xl mb-4"><?php echo $points_title; ?></h4>
                                        <ul class="flex flex-col gap-y-4">
                                            <?php while ( have_rows( 'value_point' ) ) : the_row(); ?>
                                                <li class="flex flex-row">
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
                <?php endwhile; ?>
                
            <?php else: ?>
                <?php // No layouts found ?>
            <?php endif; ?>
        </div>

    </div>
</section>