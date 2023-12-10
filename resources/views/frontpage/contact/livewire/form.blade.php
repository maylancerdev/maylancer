<div
    class="flex flex-col p-8 border border-gray-secondary-400/60 bg-gray-secondary-50 lg:py-10 lg:px-12"
>
    @if($display_contact_form)
    <div class="flex-1">
        <div class="flex w-full pb-6 lg:justify-end lg:pb-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12 lg:h-16 lg:w-16">
                <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
            </svg>

        </div>
        <h2 class="text-2xl font-semibold text-slate-900 lg:text-3xl">
            Time to talk?
        </h2>
        <p class="text-gray-400">
            Required fields are marked <span class="text-red-600">*</span>
        </p>
        <div class="max-w-lg mt-10 leading-relaxed text-slate-600">


<form wire:submit.prevent="submitForm" class="mb-4 w-full">
    <!-- Form fields -->
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="company_name">
            Company name
        </label>
        <input wire:model="company_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="company_name" type="text" placeholder="Company name">
        @error('company_name') <span class="text-red-600 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
            First name<span class="text-red-600">*</span>
        </label>
        <input wire:model="first_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="first_name" type="text" placeholder="First name">
        @error('first_name') <span class="text-red-600 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
            Last name<span class="text-red-600">*</span>
        </label>
        <input wire:model="last_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="last_name" type="text" placeholder="Last name">
        @error('last_name') <span class="text-red-600 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Email<span class="text-red-600">*</span>
        </label>
        <input wire:model="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email">
        @error('email') <span class="text-red-600 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="what_can_do">
            What can {{ config()->get('app.name') }} do for you?<span class="text-red-600">*</span>
        </label>
        <div class="flex items-center mb-2">
            <input wire:model="how_can_we_help" value="Create an amazing new product" type="radio" class="mr-2">
            <span class="text-gray-700">Create an amazing new product 🚀</span>
        </div>
        <div class="flex items-center mb-2">
            <input wire:model="how_can_we_help" value="Make my great product even greater" type="radio" class="mr-2">
            <span class="text-gray-700">Make my great product even greater 💪</span>
        </div>
        <div class="flex items-center mb-2">
            <input wire:model="how_can_we_help" value="Something else" type="radio" class="mr-2">
            <span class="text-gray-700">Something else</span>
        </div>
        @error('how_can_we_help') <span class="text-red-600 text-xs italic">{{ $message }}</span> @enderror
    </div>


    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="tell_more">
            Can you tell us a little more about that?<span class="text-red-600">*</span>
        </label>
        <textarea wire:model="tell_us_more" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tell_us_more" placeholder="Tell us more"></textarea>
        @error('tell_us_more') <span class="text-red-600 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="budget">
            What is your budget?<span class="text-red-600">*</span>
        </label>
        <div class="flex items-center mb-2">
            <input wire:model="budget" value="Less than $50,000" type="radio" class="mr-2">
            <span class="text-gray-700">Less than $50,000</span>
        </div>
        <div class="flex items-center mb-2">
            <input wire:model="budget" value="$50,000 - $150,000" type="radio" class="mr-2">
            <span class="text-gray-700">$50,000 - $150,000</span>
        </div>
        <div class="flex items-center mb-2">
            <input wire:model="budget" value="$150,000 - $350,000" type="radio" class="mr-2">
            <span class="text-gray-700">$150,000 - $350,000</span>
        </div>
        <div class="flex items-center mb-2">
            <input wire:model="budget" value="$350,000 - $500,000" type="radio" class="mr-2">
            <span class="text-gray-700">$350,000 - $500,000</span>
        </div>
        <div class="flex items-center mb-2">
            <input wire:model="budget" value="$500,000 or more" type="radio" class="mr-2">
            <span class="text-gray-700">$500,000 or more</span>
        </div>
        @error('budget') <span class="text-red-600 text-xs italic">{{ $message }}</span> @enderror
    </div>


        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="hear_about">
                How did you hear about {{ config()->get('app.name') }}?<span class="text-red-600">*</span>
            </label>
            <input wire:model="how_did_you_hear_about_us" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="how_did_you_hear_about_us" name="how_did_you_hear_about_us" type="text" placeholder="">
            @error('how_did_you_hear_about_us') <span class="text-red-600 text-xs italic">{{ $message }}</span> @enderror
        </div>
        @error('hear_about') <span class="text-red-600 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <!-- Submit button -->
    <div class="flex items-center justify-between mt-12">
        <button type="submit"
                wire:click="submitForm"
                class="group mt-8 inline-flex w-full items-center justify-center border border-slate-800 px-5 py-2.5 text-base font-medium text-slate-800 duration-150 ease-in-out hover:bg-slate-800 hover:text-white lg:w-auto">
            Submit
        </button>
    </div>
</form>




        </div>
    </div>
@else

    <div class="mt-4 flex flex-col items-center">
        <img src="{{ asset('images/sent.png') }}" class="h-40 mt-2 w-fit" alt="Success Image">
        <p class="text-green-500">Message Sent Successfully!</p>
        <p>Your inquiry is important to us, and we appreciate your patience. Thank you for reaching out, and we look forward to connecting with you soon</p>

    </div>
    @endif

</div>
