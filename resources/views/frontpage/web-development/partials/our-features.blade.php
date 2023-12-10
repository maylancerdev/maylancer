
<section class="pb-64 overflow-hidden bg-vanilla md:pt-24 md:pb-32">
    <!-- Container -->
    <div class="relative max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
        <img
                src=" {{ asset('images/stock/tech-robot.jpeg') }}"
                class="absolute left-0 right-0 h-80 w-full object-cover object-center md:right-6 md:left-[unset] md:h-auto md:w-1/2 lg:right-8"
        />
        <div
                class="relative z-10 translate-y-48 md:w-4/5 md:translate-y-12 lg:w-2/3"
        >
            <div
                    class="px-8 py-12 border border-gray-secondary-400/60 bg-gray-secondary-50 sm:py-16 sm:px-12 lg:px-16 lg:py-20"
            >
                <h2
                        class="text-4xl font-semibold leading-tight text-slate-900 sm:text-5xl sm:leading-tight"
                >
                    Not just another software development agency.
                </h2>
                <p class="mt-5 text-lg leading-relaxed text-slate-700 sm:mt-6">
                    At {{ config('app.name') }}, we are passionate about the art of turning ideas into tangible, market-ready products that make an impact. As a leading consultancy specializing in product strategy, design, and development, we possess the expertise and experience to guide your vision from conceptualization to reality.
                </p>
                <p class="mt-5 text-lg leading-relaxed text-slate-700 sm:mt-6">
                    Our dedicated team excels at taking your ideas and transforming them into well-crafted, functional products that meet your business objectives. We believe in the power of collaboration and work closely with our clients to ensure that their goals are understood and translated into actionable tasks.
                </p>
                <p class="mt-5 text-lg leading-relaxed text-slate-700 sm:mt-6">
                    Drawing upon our extensive knowledge and industry insights, we formulate effective strategies that align with your unique requirements. We take into account market trends, user preferences, and competitive analysis to create a roadmap that guides the development process.
                </p>
                <p class="mt-5 text-lg leading-relaxed text-slate-700 sm:mt-6">
                    But our work doesn't stop at strategy and planning. We have a talented pool of individual experts who possess diverse skill sets and a wealth of experience. Through effective communication and fostering a collaborative environment, we transform these individual experts into a cohesive team. By leveraging the strengths of each team member, we maximize productivity, creativity, and innovation.
                </p>
                <p class="mt-5 text-lg leading-relaxed text-slate-700 sm:mt-6">
                    We believe that success lies in continuous improvement. We constantly refine our internal processes, incorporating feedback and embracing emerging technologies, to ensure that our products excel in achieving every objective. We stay up to date with the latest industry trends and best practices, allowing us to deliver solutions that are innovative, scalable, and future-proof.
                </p>
                <p class="mt-5 text-lg leading-relaxed text-slate-700 sm:mt-6">
                    When you partner with Maylancer, you gain a trusted ally committed to your success. We work hand in hand with you, providing guidance, support, and technical expertise at every stage of the product development lifecycle. Our mission is to empower you to reach new heights and make a lasting impact in your industry.
                </p>
                <p class="mt-5 text-lg leading-relaxed text-slate-700 sm:mt-6">
                    Experience the {{ config('app.name') }} difference and let us help you transform your ideas into reality. Together, we can create products that not only meet but exceed expectations, setting you on the path to success in the ever-evolving digital landscape.
                </p>

                <div class="mt-8 sm:mt-12">
                    <a
                            href="{{ route('about-us') }}"
                            class="group mt-3.5 inline-flex w-full items-center justify-center border border-slate-800 px-6 py-3 text-base font-medium text-slate-800 duration-150 ease-in-out hover:bg-slate-800 hover:text-white sm:mt-0 sm:w-auto xl:px-7 xl:py-4 xl:text-lg"
                    >
                        About us

                    </a>
                </div>


            </div>
        </div>
    </div>
</section>
