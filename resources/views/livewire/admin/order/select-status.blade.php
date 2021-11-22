<div class="mr-2 align-middle select-none transition duration-200 ease-in"  >
    <select name="status" id="status"  wire:model="status" class="select2 p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" >
        <option class="bg-green-500 text-white " value='{{App\Models\ORDER::STATUS_PENDING}}'>{{ __('Pending') }}</option>
        <option class="bg-blue-500 text-white " value='{{App\Models\ORDER::STATUS_PROCESSING}}'>{{ __('Processing') }}</option>
    
        <option class="bg-indigo-500 text-white " value='{{App\Models\ORDER::STATUS_COLLECTING}}'>{{ __('Collecting') }}</option>
    
        <option class="bg-blue-300 text-black " value='{{App\Models\ORDER::STATUS_CONFIRMED}}'>{{ __('Confirmed') }}</option>
        <option class="bg-orange-500 text-white " value='{{App\Models\ORDER::STATUS_SHIPPING}}'>{{ __('Shipping') }}</option>
    
        <option class="bg-red-500 text-white " value='{{App\Models\ORDER::STATUS_CANCELED}}'>{{ __('Canceled') }}</option>
    
        <option class="bg-green-700 text-white " value='{{App\Models\ORDER::STATUS_COMPLETED}}'>{{ __('Completed') }}</option>
        <option class="bg-red-700 text-white " value='{{App\Models\ORDER::STATUS_RETURNED}}'>{{ __('Returned') }}</option>
        <option class="bg-blue-700 text-white " value='{{App\Models\ORDER::STATUS_PAID}}'>{{ __('PAID') }}</option>   
    </select>
    <x-input-error for="status" />
</div>