<form wire:submit.prevent="submit" class="pt-3">

    <div class="mb-4 {{ $errors->has('userAlert.message') ? 'is-invalid' : '' }}">
        <x-label for="message" :value="__('Message')" required />
        <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="text" name="message" id="message" required wire:model.defer="userAlert.message">
        <div class="validation-message">
            {{ $errors->first('userAlert.message') }}
        </div>
        <x-input-error for="userAlert.message" />
    </div>
    <div class="mb-4 {{ $errors->has('users') ? 'is-invalid' : '' }}">
        <x-label for="users" :value="__('Users')" required />
        <x-select-list class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" required id="users" name="users" wire:model="users" :options="$this->listsForFields['users']" multiple />
        <x-input-error for="userAlert.users" />
    </div>

    <div class="float-right p-2 mb-4">
        <button class="btn mr-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300" type="submit">
            {{ __('Save') }}
        </button>
        <a href="{{ route('admin.user-alerts.index') }}" class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-purple-800 hover:bg-purple-200 active:bg-purple-200 focus:ring-purple-300">
            {{ __('Cancel') }}
        </a>
    </div>
</form>