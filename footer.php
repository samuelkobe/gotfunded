
			<!-- footer -->
			<footer class="footer bg-black text-white" role="contentinfo">

				<div class="contained">

					<div class="w-full flex flex-col md:flex-row md:justify-between md:flex-wrap py-4 md:py-8">

						<?php // footer image part ?>
						<?php get_template_part('parts/footer/image') ?>

						<?php get_template_part('parts/footer/copyright') ?>

						<?php // Footer Social Media part ?>
						<?php if ( get_field( 'social_media_toggle', 'option' ) == 1 ) : ?>
							<?php get_template_part('parts/footer/social') ?>
						<?php else : ?>
								<?php // Social Media turned off ?>
						<?php endif; ?>

					</div>

				</div>

				<?php // footer copyright bottom part ?>
				<?php get_template_part('parts/footer/developer') ?>
					
			</footer>
			<!-- /footer -->



		</div>
		<!-- /wrapper -->

		<?php if(is_front_page()): ?>
			<script type="module" async>
				// init homeSwiper:
				const homeSwiper = new Swiper(".swiper", {
				allowTouchMove: true,
				simulateTouch: true,
				slidesPerView: 1.5,
				spaceBetween: 16,
				centeredSlides: true,
				// initialSlide: 2,
				loop: true,
				autoplay: false,
				speed: 1000,
				grabCursor: true,
				pagination: {
					el: ".swiper-pagination",
					type: "bullets",
					clickable: true,
				},
				breakpoints: {
					320: {
					slidesPerView: 1.5,
					spaceBetween: 16,
					},
					// when window width is >= 640px
					640: {
					slidesPerView: 2.5,
					spaceBetween: 24,
					},
					// when window width is >= 1440px
					1440: {
					slidesPerView: 3.5,
					spaceBetween: 32,
					},
					// when window width is >= 1680px
					1680: {
					slidesPerView: 4.5,
					spaceBetween: 32,
					}	
				},
				});
			</script>
		<?php endif; ?>

		<?php wp_footer(); ?>

	</body>
</html>


