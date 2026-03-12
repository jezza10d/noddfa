<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<main>
    <section class="relative h-[400px] w-full overflow-hidden">
        <div class="absolute inset-0 bg-black/50 z-10"></div>
        <img alt="<?php the_title(); ?>" class="absolute inset-0 w-full h-full object-cover" src="<?php echo get_the_post_thumbnail_url(); ?>">
        
        <div class="relative z-20 h-full flex items-center justify-center px-4">
            <h1 class="text-white text-4xl md:text-6xl font-black text-center uppercase tracking-wider">
                <?php the_title(); ?>
            </h1>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <div class="lg:col-span-2 space-y-8">
                <div>
                    <h2 class="text-3xl font-bold text-forest mb-4">Event Details</h2>
                    <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed">
                        <?php the_content(); ?>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-slate-100">
                        <span class="material-symbols-outlined text-primary text-3xl">calendar_today</span>
                        <div>
                            <p class="text-sm font-bold text-slate-500 uppercase">Date & Time</p>
                            <p class="text-slate-900 font-semibold"><?php the_field('event_date'); ?></p>
                            <p class="text-slate-600"><?php the_field('start_time'); ?> - <?php the_field('end_time'); ?></p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-slate-100">
                        <span class="material-symbols-outlined text-primary text-3xl">location_on</span>
                        <div>
                            <p class="text-sm font-bold text-slate-500 uppercase">Location</p>
                            <p class="text-slate-900 font-semibold"><?php the_field('location_name'); ?></p>
                            <p class="text-slate-600">Noddfa Community Centre</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-slate-100">
                        <span class="material-symbols-outlined text-primary text-3xl">confirmation_number</span>
                        <div>
                            <p class="text-sm font-bold text-slate-500 uppercase">Entry Fee</p>
                            <p class="text-slate-900 font-semibold"><?php the_field('price'); ?></p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-slate-100">
                        <span class="material-symbols-outlined text-primary text-3xl">info</span>
                        <div>
                            <p class="text-sm font-bold text-slate-500 uppercase">Requirements</p>
                            <p class="text-slate-900 font-semibold"><?php the_field('requirements'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-28 bg-white p-8 rounded-xl shadow-lg border border-slate-100">
                    <h3 class="text-2xl font-bold text-forest mb-2">Reserve Your Spot</h3>
                    <p class="text-slate-500 mb-6 text-sm">Fill in the form below to book.</p>
                    
                    <?php echo do_shortcode('[contact-form-7 id="YOUR-FORM-ID" title="Event Booking"]'); ?>

                    <div class="mt-8 pt-8 border-t border-slate-100">
                        <h4 class="font-bold text-forest mb-3">Organiser Contact</h4>
                        <div class="flex items-center gap-3 text-slate-600 mb-2">
                            <span class="material-symbols-outlined text-primary text-xl">mail</span>
                            <span class="text-sm">events@nccg.org.uk</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php endwhile; endif; ?>

<?php get_footer(); ?>