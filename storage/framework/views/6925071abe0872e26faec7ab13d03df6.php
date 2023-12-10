<?php use Illuminate\Support\Facades\Storage; ?>
<section
        class="relative overflow-hidden bg-vanilla pt-16 pb-[532px] sm:pb-[500px] sm:pt-24 md:pb-64"
>
    <!-- Container -->
    <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex flex-col sm:items-center">
            <p
                    class="flex items-center space-x-3.5 text-xl font-medium text-amber-900/70"
            >
                <svg
                        class=""
                        xmlns="http://www.w3.org/2000/svg"
                        width="28"
                        height="3"
                        viewBox="0 0 28 3"
                        fill="none"
                >
                    <line
                            y1="1.5"
                            x2="28"
                            y2="1.5"
                            stroke="currentColor"
                            strokeOpacity="0.65"
                            strokeWidth="3"
                    />
                </svg>

                <span>Our story</span>
            </p>
            <h1
                    class="mt-5 text-4xl font-semibold leading-snug text-slate-900 sm:max-w-xl sm:text-center sm:text-5xl sm:leading-snug md:mx-auto xl:mx-0"
            >
                Streamlining Website Development Since 2016
            </h1>
        </div>

        <!-- Content -->
        <div
                class="flex flex-col mt-12 md:mt-8 md:flex-row md:divide-x md:divide-gray-secondary-400/60"
        >
            <div class="md:w-1/2 md:py-8 md:pr-6 lg:pr-16">
                <p class="text-lg leading-relaxed text-slate-700">
                    We are a Nigeria-based website development company established in 2016. With a diverse clientele spanning both domestic and international markets, we have gained valuable experience in delivering top-notch websites.
                <p class="mt-8 text-lg leading-relaxed text-slate-700">
                    At the forefront of technology, we leverage the latest computer programming and server technologies to create cutting-edge websites. Our skilled team of developers stays up-to-date with emerging trends, ensuring that our websites are visually appealing, user-friendly, and compatible across various devices and platforms.                </p>



            </div>
            <div class="mt-8 sm:mt-0 md:w-1/2 md:py-8 md:pl-6 lg:pl-16">
                <p class="text-lg leading-relaxed text-slate-700">
                    Driven by a commitment to excellence, we approach each project with meticulous attention to detail and a focus on customer satisfaction. Our primary objective is to provide businesses and individuals with impactful online solutions that enhance their digital presence.
                </p>
                <p class="mt-8 text-lg leading-relaxed text-slate-700">
                Through our expertise in website development, we empower our clients to establish a strong online presence, engage their target audience, and achieve their goals. We take pride in our ability to simplify the complexities of website development and deliver remarkable results that exceed expectations.
                </p>
            </div>
        </div>

        <!-- Image With Stats -->
        <div class="relative mt-16 sm:mt-20">
            <!-- Image -->
            <div class="aspect-w-2 aspect-h-1">
                <img
                        class="object-cover object-center"
                        src="<?php echo e(asset('images/about/hero.png')); ?>"
                        alt="featured"
                />
            </div>

            <!-- Stats -->
            <div
                    class="absolute top-full left-6 right-6 flex max-w-4xl -translate-y-12 flex-col divide-y divide-gray-secondary-400/60 bg-amber-100 px-10 py-10 md:left-[unset] md:top-[unset] md:right-0 md:-bottom-1/4 md:w-full md:flex-row md:divide-y-0 md:divide-x md:px-8 lg:p-12"
            >
                <div class="pb-10 md:w-1/3 md:pb-0 md:pr-10 lg:pr-12">
                    <p
                            class="text-4xl font-semibold text-center text-slate-900 lg:text-5xl"
                    >
                        <?php echo e((date('Y') - 2016)); ?>+
                    </p>
                    <p class="mt-4 leading-snug text-center text-md text-slate-600">
                        Years Empowering Businesses with Website Development
                    </p>
                </div>
                <div class="py-10 md:w-1/3 md:py-0 md:px-10 lg:px-12">
                    <p
                            class="text-4xl font-semibold text-center text-slate-900 lg:text-5xl"
                    >
                        1M+
                    </p>
                    <p class="mt-4 leading-snug text-center text-md text-slate-600">
                        Open source packages downloads                    </p>
                </div>
                <div class="pt-10 md:w-1/3 md:pt-0 md:pl-10 lg:pl-12">
                    <p
                            class="text-4xl font-semibold text-center text-slate-900 lg:text-5xl"
                    >
                        10+
                    </p>
                    <p class="mt-4 leading-snug text-center text-md text-slate-600">
                        Team Members Dedicated to Excellence
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\maylancer-nova\resources\views/frontpage/about/partials/story.blade.php ENDPATH**/ ?>