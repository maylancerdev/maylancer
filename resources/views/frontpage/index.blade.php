<x-app-layout>
    <!-- Home Hero -->
    <x-home-hero />

    <!-- Featured -->
    <x-home-featured />

    <!-- Product Showcase -->
    <x-home-about-blocks />

    <!-- Features products -->
    <x-home-selection :$products />

    <!-- Hire  Team -->
    <x-home-hire />

    <!-- Testimonials -->
    <x-home-testimonials :$groupedTestimonies />

    <!-- Newsletter-->
    <x-home-newsletter />

</x-app-layout>
