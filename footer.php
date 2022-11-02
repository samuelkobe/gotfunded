			<!-- footer -->
			<footer class="footer bg-black text-white" role="contentinfo">

				<div class="contained">


					<div class="flex w-full justify-center lg:justify-end">
						<div class="w-full flex flex-col items-center lg:items-end">
							<h3 class="w-full lg:w-auto text-center lg:text-left font-title font-medium text-lg lg:text-xl mb-2 lg:mb-4 text-white">Stay up-to-date with GotFunded.</h3>
							<div id="form-overrides" class="w-full flex justify-center lg:justify-end transform -translate-x-3">

							<script src="https://f.convertkit.com/ckjs/ck.5.js"></script>
      							<form 	action="https://app.convertkit.com/forms/3700994/subscriptions"
										class="seva-form formkit-form"
										method="post"
										data-sv-form="3700994"
										data-uid="ef400146f4"
										data-format="inline"
										data-version="5"
										data-options="{&quot;settings&quot;:{&quot;after_subscribe&quot;:{&quot;action&quot;:&quot;message&quot;,&quot;success_message&quot;:&quot;Success! Now check your email to confirm your subscription.&quot;,&quot;redirect_url&quot;:&quot;&quot;},&quot;analytics&quot;:{&quot;google&quot;:null,&quot;fathom&quot;:null,&quot;facebook&quot;:null,&quot;segment&quot;:null,&quot;pinterest&quot;:null,&quot;sparkloop&quot;:null,&quot;googletagmanager&quot;:null},&quot;modal&quot;:{&quot;trigger&quot;:&quot;timer&quot;,&quot;scroll_percentage&quot;:null,&quot;timer&quot;:5,&quot;devices&quot;:&quot;all&quot;,&quot;show_once_every&quot;:15},&quot;powered_by&quot;:{&quot;show&quot;:true,&quot;url&quot;:&quot;https://convertkit.com/features/forms?utm_campaign=poweredby&amp;utm_content=form&amp;utm_medium=referral&amp;utm_source=dynamic&quot;},&quot;recaptcha&quot;:{&quot;enabled&quot;:true},&quot;return_visitor&quot;:{&quot;action&quot;:&quot;show&quot;,&quot;custom_content&quot;:&quot;&quot;},&quot;slide_in&quot;:{&quot;display_in&quot;:&quot;bottom_right&quot;,&quot;trigger&quot;:&quot;timer&quot;,&quot;scroll_percentage&quot;:null,&quot;timer&quot;:5,&quot;devices&quot;:&quot;all&quot;,&quot;show_once_every&quot;:15},&quot;sticky_bar&quot;:{&quot;display_in&quot;:&quot;top&quot;,&quot;trigger&quot;:&quot;timer&quot;,&quot;scroll_percentage&quot;:null,&quot;timer&quot;:5,&quot;devices&quot;:&quot;all&quot;,&quot;show_once_every&quot;:15}},&quot;version&quot;:&quot;5&quot;}"
										min-width="400 500 600 700 800">
										
										<div data-style="clean">
											<ul class="formkit-alert formkit-alert-error" data-element="errors" data-group="alert"></ul>
											<div data-element="fields" data-stacked="false" class="seva-fields formkit-fields">
											<div class="formkit-field">
												<input 	class="formkit-input" 
														name="email_address"
														aria-label="example@email.com"
														placeholder="example@email.com"
														required=""
														type="email"
														style="color: rgb(45, 45, 45); border-color: rgb(177, 177, 177); font-weight: 400;">
											</div>
										
										<button data-element="submit" class="formkit-submit formkit-submit" style="color: rgb(255, 255, 255); background-color: rgb(226, 45, 87); border-radius: 9999px; font-weight: 400;">
											<span class="flex w-full h-full items-center justify-center pt-2">→</span>
										</button>
    							</form>
							</div>
						</div>
					</div>

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


