<div>

@if(!$isSubscribed)
    <form wire:submit="subscribe">
       <div class="mt-5 sm:flex sm:items-center">
           <div class="w-full sm:max-w-xs">
               <input type="email" name="email" wire:model="email" id="email" class="block focus:ring-2 focus:ring-indigo-600 focus:ring-inset placeholder:text-gray-400 py-1.5 py-2.4 ring-1 ring-gray-300 ring-inset rounded-md shadow-sm sm:leading-6 sm:text-sm text-gray-900 w-full" placeholder="Your email">
           </div>
           <button type="submit" class="bg-slate-700 duration-150 ease-in-out font-medium group hover:bg-slate-900 inline-flex items-center justify-center px-6 py-2 sm:w-auto text-base text-white w-full xl:text-lg">Subscribe</button>

       </div>
        @error('email')
            <span class="error text-[15px] text-red-600">
                {{ $message }}
            </span>
        @enderror
    </form>

@else

    <div class="border border-slate-800 duration-150 ease-in-out font-medium group inline-flex items-center justify-center mt-3 px-6 py-3 text-base text-slate-800 xl:px-7 xl:py-4 xl:text-lg">
        <p class="mt-2 text-sm">You have successfully subscribed to our newsletter. <br>
            Thank you for joining us!</p>
    </div>

@endif
</div>
