<?php /* Template Name: Events List Template */ ?>
<?php get_header(); ?>

<main class="flex-1 w-full">
    <div class="relative w-full h-[300px] md:h-[500px] flex items-center justify-center text-center px-6 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 max-w-3xl mx-auto">
            <span class="bg-primary text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-6 inline-block">What's On</span>
            <h1 class="text-white text-4xl md:text-6xl font-extrabold leading-tight mb-4"><?php the_title(); ?></h1>
            <p class="text-slate-200 text-lg md:text-xl font-medium"><?php echo get_the_excerpt(); ?></p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto w-full px-6 md:px-20 py-12">
        
        <section class="mb-20">
            <h2 class="text-3xl font-bold tracking-tight mb-8">Weekly Activities</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $weekly = new WP_Query(['post_type' => 'event', 'posts_per_page' => -1, 'meta_key' => 'event_type', 'meta_value' => 'Weekly']);
                if ($weekly->have_posts()) : while ($weekly->have_posts()) : $weekly->the_post(); ?>
                <div class="bg-white border border-slate-100 rounded-2xl overflow-hidden hover:shadow-xl transition-all group">
                    <div class="h-52 overflow-hidden">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3"><?php the_title(); ?></h3>
                        <div class="flex items-center gap-2 text-slate-500 text-sm mb-4">
                            <span class="material-symbols-outlined text-primary">calendar_today</span>
                            <span><?php the_field('event_date'); ?></span>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="w-full bg-primary text-white font-bold py-3 rounded-xl hover:bg-primary/90 transition-colors flex items-center justify-center gap-2">
                            View Details <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </section>

        <section>
            <h2 class="text-3xl font-bold tracking-tight mb-8 uppercase">Special Events</h2>
            <div class="space-y-6">
                <?php
                $special = new WP_Query(['post_type' => 'event', 'posts_per_page' => -1, 'meta_key' => 'event_type', 'meta_value' => 'Special']);
                if ($special->have_posts()) : while ($special->have_posts()) : $special->the_post(); ?>
                <div class="bg-white border border-slate-100 rounded-2xl p-5 flex flex-col md:flex-row gap-8 items-center hover:shadow-lg transition-all">
                    <div class="w-full md:w-64 h-48 rounded-xl overflow-hidden shrink-0">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold mb-3"><?php the_title(); ?></h3>
                        <div class="flex flex-wrap gap-6 text-slate-500 text-sm mb-4">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary text-sm">calendar_month</span>
                                <span><?php the_field('event_date'); ?></span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary text-sm">location_on</span>
                                <span><?php the_field('location_name'); ?></span>
                            </div>
                        </div>
                        <p class="text-slate-600 text-sm line-clamp-2"><?php echo get_the_excerpt(); ?></p>
                    </div>
                    <div class="shrink-0 w-full md:w-auto">
                        <a href="<?php the_permalink(); ?>" class="px-10 py-4 bg-primary text-white font-bold rounded-xl hover:bg-primary/90 transition-all inline-block text-center w-full md:w-auto">
                            Book Now
                        </a>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>