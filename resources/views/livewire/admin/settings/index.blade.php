<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="save" enctype="multipart/form-data">

        <div>
            <div class="w-full flex flex-wrap">
                <div class="lg:w-1/2 sm:w-full px-2 @error('company_name') has-error @enderror">
                    <x-label for="company_name" :value=" __('Company name') "/>
                    <input type="text" wire:model="company_name"
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        id="company_name" value="{{ config('settings.company_name') }}" placeholder="{{ __('Enter your company name') }}">
                    <x-input-error for="company_name" />
                </div>

                <div class="lg:w-1/2 sm:w-full px-2 @error('site_title') has-error @enderror">
                    <x-label for="site_title" :value=" __('Website title') "/>
                    <input type="text" wire:model="site_title" id="site_title"
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        value="{{ config('settings.site_title') }}" placeholder="{{ __('Enter website title') }}">
                    <x-input-error for="site_title" />
                </div>

                <div class="lg:w-1/2 sm:w-full mt-2 px-2 @error('company_email_address') has-error @enderror">
                    <x-label for="company_email_address" :value=" __('Company email') "/>
                    <input
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        wire:model="company_email_address" type="email"
                        value="{{ config('settings.company_email_address') }}"
                        placeholder="{{ __('Enter your company email address') }}" id="company_email_address"
                        name="company_email_address" />
                    <x-input-error for="company_email_address" />
                </div>
                <div class="lg:w-1/2 sm:w-full mt-2 px-2 @error('company_phone') has-error @enderror">
                    <x-label for="company_phone" :value=" __('Company phone') "/>
                    <input
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        wire:model="company_phone" type="text"
                        value="{{ config('settings.company_phone') }}"
                        placeholder="{{ __('Enter your company phone') }}" id="company_phone"
                        name="company_phone" />
                    <x-input-error for="company_phone" />
                </div>
                <div class="w-full mt-2 px-2 @error('company_address') has-error @enderror">
                    <x-label for="company_address" :value=" __('Company address') "/>
                    <input
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        wire:model="company_address" type="text"
                        value="{{ config('settings.company_address') }}"
                        placeholder="{{ __('Enter your company address') }}" id="company_address"
                        name="company_address" />
                    <x-input-error for="company_address" />
                </div>
            </div>

            <div class="mt-5 flex flex-wrap">
                <div class="lg:w-1/2 sm:w-full px-2">
                    <div class="flex flex-col">
                        <div class="w-1/2">
                            @if ($siteImage != null)
                                <img src="{{ asset('uploads/' . $siteImage) }}" id="logoImg"
                                    style="width: 200px; height: 150px;">
                            @else
                                <img src="https://via.placeholder.com/250x150?text=Placeholder+Image" id="logoImg"
                                    style="width: 200px; height: 150px;">
                            @endif
                        </div>
                        <div class="w-3/4">
                            <div class="mb-4 @error('logoFile') has-error @enderror">
                                <x-label for="logoFile" :value=" __('Import Logo') "/>
                                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="file" wire:model="logoFile"
                                    onchange="loadFile(event,'logoImg')" />
                                <x-input-error for="logoFile" />

                                <div class="mt-5">
                                    <button type="submit" wire:click.prevent='uploadLogo()'
                                        class="btn flex rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300 pull-right">
                                        <x-heroicon-o-upload class="mr-2 h-4 w-4" />
                                        {{ __('Import') }}
                                    </button>
                                </div>
                                <small class="text-red-500">{{ __('Extensions accepted (jpeg,png,jpg,gif,svg), Max size 1048kb.') }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2 sm:w-full px-2">
                    <div class="flex flex-col">
                        <div class="w-1/2">
                            @if ($favicon != null)
                                <img src="{{ asset('uploads/' . $favicon) }}" id="logoImg"
                                    style="width: 200px; height: 150px;">
                            @else
                                <img src="https://via.placeholder.com/250x150?text=Placeholder+Image" id="logoImg"
                                    style="width: 200px; height: 150px;">
                            @endif
                        </div>
                        <div class="w-3/4">
                            <div class="mb-4 @error('iconFile') has-error @enderror">
                                <x-label for="iconFile" :value=" __('Import favicon') "/>
                                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="file" wire:model="iconFile" />
                                <x-input-error for="iconFile" />

                                <div class="mt-5">
                                    <button type="submit" wire:click.prevent='uploadFavicon()'
                                        class="btn flex rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300 pull-right">
                                        <x-heroicon-o-upload class="mr-2 h-4 w-4" />
                                        {{ __('Import') }}
                                    </button>
                                </div>
                                <small class="text-red-500">{{ __('Extensions accepted (jpeg,png,jpg,gif,svg), Max size 1048kb.') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full flex flex-wrap">
                <div class="lg:w-1/2 sm:w-full px-2 @error('social_facebook') has-error @enderror">
                    <x-label for="social_facebook" :value=" __('Facebook Link') "/>
                    <input
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        wire:model="social_facebook" type="text" value="{{ config('settings.social_facebook') }}"
                        id="social_facebook" name="social_facebook" />
                    <x-input-error for="social_facebook" />
                </div>
                <div class="lg:w-1/2 sm:w-full px-2 @error('social_twitter') has-error @enderror">
                    <x-label for="social_twitter" :value=" __('Twitter Link') "/>
                    <input
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        wire:model="social_twitter" type="text" value="{{ config('settings.social_twitter') }}"
                        id="social_twitter" name="social_twitter" />
                    <x-input-error for="social_twitter" />
                </div>
                <div class="lg:w-1/2 sm:w-full px-2 @error('social_instagram') has-error @enderror">
                    <x-label for="social_instagram" :value=" __('Instagram Link') "/>
                    <input
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        wire:model="social_instagram" type="text" value="{{ config('settings.social_instagram') }}"
                        id="social_instagram" name="social_instagram" />
                    <x-input-error for="social_instagram" />
                </div>
                <div class="lg:w-1/2 sm:w-full px-2 @error('social_linkedin') has-error @enderror">
                    <x-label for="social_linkedin" :value=" __('Linkedin Link') "/>
                    <input
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        wire:model="social_linkedin" type="text" value="{{ config('settings.social_linkedin') }}"
                        id="social_linkedin" name="social_linkedin" />
                    <x-input-error for="social_linkedin" />
                </div>
                <div class="lg:w-1/2 sm:w-full px-2 @error('social_whatsapp') has-error @enderror">
                    <x-label for="social_whatsapp" :value=" __('Whatsapp Number') "/>
                    <input
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        wire:model="social_whatsapp" type="text" value="{{ config('settings.social_whatsapp') }}"
                        id="social_whatsapp" name="social_whatsapp" />
                    <x-input-error for="social_whatsapp" />
                    <small class="text-red-500">{{ __("Use this number format 1XXXXXXXXXX Don't use this +001-(XXX)XXXXXXX") }}</small>
                </div>
            </div>
            <div class="w-full">
                <div class="mb-4 px-2">
                    <x-label for="head_tags" :value=" __('Custom Head Code') " />
                    <textarea
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        rows="4" id="head_tags"
                        name="head_tags">{!! Config::get('settings.head_tags') !!}</textarea>
                        <small class="text-red-500">{{ __('Facebook, Google Analytics or other script.') }}</small>
                </div>
                <div class="mb-4 px-2">
                    <x-label for="body_tags" :value=" __('Custom Body Code') " />
                    <textarea
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        rows="4" id="body_tags"
                        name="body_tags">{{ Config::get('settings.body_tags') }}</textarea>
                        <small class="text-red-500">{{ __('Facebook, Google Analytics or other script.') }}</small>

                </div>
            </div>
            <div class="w-full flex flex-row">
                <div class="lg:w-1/3 sm:w-1/2 mb-4 px-2">
                    <x-label for="orderTracking" :value=" __('Enable Order Tracking') " />
                    <x-checkbox name="orderTracking" id="orderTracking" wire:model="orderTracking"  />
                    <small class="">{{ __('Home Order Tracking Section') }}</small>
                </div>
                <div class="lg:w-1/3 sm:w-1/2 mb-4 px-2">
                    <x-label for="enableSMS" :value=" __('Enable SMS') " />
                    <x-checkbox name="enableSMS" id="enableSMS" wire:model="enableSMS" />
                    <small class="">{{ __('Enable Sms Notifications') }}</small>
                </div>
                <div class="lg:w-1/3 sm:w-1/2 mb-4 px-2">
                    <x-label for="enableRegistrationTerms" :value=" __('Enable Registration Terms') " />
                    <x-checkbox name="enableRegistrationTerms" id="enableRegistrationTerms" wire:model="enableRegistrationTerms" />
                    <small class="">{{ __('Terms and condition in registration page') }}</small>
                </div>
            </div>
            <div class="flex flex-wrap mb-4">
                <div class="lg:w-1/2 sm:w-full px-2">
                    <x-label for="currency_code" :value=" __('Currency code') " />
                    <input
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        wire:model="currency_code" type="text" value="{{ config('settings.currency_code') }}"
                        id="currency_code" name="currency_code" />
                    <x-input-error for="currency_code" />
                </div>
                <div class="lg:w-1/2 sm:w-full px-2">
                    <x-label for="currency_symbol" :value=" __('Currency symbol') " />
                    <input
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        wire:model="currency_symbol" type="text" value="{{ config('settings.currency_symbol') }}"
                        id="currency_symbol" name="currency_symbol" />
                    <x-input-error for="currency_symbol" />
                </div>
            </div>
            <div class="w-full">
                <div class="mb-4 px-2">
                    <x-label for="seo_meta_title" :value=" __('Seo Meta Title') " />
                    <input
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        wire:model="seo_meta_title" type="text" value="{{ config('settings.seo_meta_title') }}"
                        id="seo_meta_title" name="seo_meta_title" />
                    <x-input-error for="seo_meta_title" />
                </div>
                <div class="mb-4 px-2">
                    <x-label for="seo_meta_description" :value=" __('Seo Meta Description') " />
                    <input
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        wire:model="seo_meta_description" type="text"
                        value="{{ config('settings.seo_meta_description') }}" id="seo_meta_description"
                        name="seo_meta_description" />
                    <x-input-error for="seo_meta_description" />
                </div>
            </div>
            <div class="w-full">
                <div class="mb-4 px-2 @error('footer_copyright_text') has-error @enderror">
                    <x-label for="footer_copyright_text" :value=" __('Footer Copyright Text') " />
                    <input
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        wire:model="footer_copyright_text" type="text"
                        value="{{ config('settings.footer_copyright_text') }}"
                        id="footer_copyright_text" name="footer_copyright_text" />
                    <x-input-error for="footer_copyright_text" />
                </div>
            </div>
            <div class="float-right p-2 mb-4">
                <button type="submit"
                    class="btn rounded-md mb-4 md:text-sm sm:text-xs font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300 w-full">{{ __('Update') }}</button>
            </div>
        </div>
    </form>
</div>
