<div>
    <section class="text-gray-600 body-font relative px-4 py-10 mx-auto bg-indigo-100" id="contact">
        <div class="flex flex-col text-center w-4/5 mx-auto">
            <h1
                class="text-3xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-5xl tracking-tighter font-extrabold text-center text-gray-700 ">
                {{ __('Order Tracking') }}</h1>
            <p class="leading-relaxed text-base pt-10">
                {{ __('To track your order please enter your Order Code in the box below and press the "Track Order" button. This was given
              to you on your receipt and in the confirmation email you should have received') }}.
            </p>

            <form class="flex flex-col justify-center my-5 py-5" wire:submit.prevent="submit">
                <div class="">
                    <input type="text" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" px-10" placeholder="{{ __('Enter your tracking number') }}"
                        wire:model="code" name="tracking_number">
                </div>
                <div class="pt-5">
                    <button
                        class="px-4 py-3 rounded-md uppercase font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300"
                        type="submit">
                        {{ __('Track Order') }}
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
