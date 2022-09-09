<?php get_header(); ?>

	<main role="main">

		<section class="">
			<div class="w-full px-6 xl:px-6 lg:container lg:mx-auto py-36 lg:py-48 relative">
				<div class="flex flex-row items-center justify-center h-auto">
					<div class="w-full">
						<div class="flex flex-col mb-6 lg:mb-16 lg:flex-row justify-between">
							<h1 class="lg:w-1/2 text-3xl lg:text-5xl font-title text-brand-black order-2 lg:order-1"><?php _e( 'Blog Posts', 'html5blank' ); ?></h1>
							<div class="lg:w-1/2 order-1 lg:order-2 mb-6 lg:mb-0">
								<?php get_template_part('searchform'); ?>
							</div>
						</div>
						<div class="mt-6 lg:mt-12">
							<?php get_template_part('loop'); ?>
							<?php get_template_part('pagination'); ?>
						</div>
					</div>
				</div>
			</div>
		</section>

	</main>

<?php get_footer(); ?>