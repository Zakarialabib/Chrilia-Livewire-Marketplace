<form wire:submit.prevent="submit" class="pt-3">

    <div class="mb-4 {{ $errors->has('permission.title') ? 'is-invalid' : '' }}">
        <x-label required for="title" :value=" __('Title')" />
        <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="text" name="title" id="title" required wire:model.defer="permission.title">
        <x-input-error for="permission.title" />
    </div>

    <div class="float-right p-2 mb-4">
        <button class="btn mr-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300" type="submit">
            {{ __('Save') }}
        </button>
        <a href="{{ route('admin.permissions.index') }}" class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-purple-800 hover:bg-purple-200 active:bg-purple-200 focus:ring-purple-300">
            {{ __('Cancel') }}
        </a>
    </div>
</form>
