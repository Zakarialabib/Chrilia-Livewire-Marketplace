<div class="relative  inline-block w-full mr-2 align-middle select-none transition duration-200 ease-in">
    <select name="client-id" class="select2 p-3 w-fullleading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" id="{{$uniqueId}}" wire:model="vendor_id">
        @if (!$vendor_id)
        <option>N/A</option>
        @endif
        @foreach ($clients as $client)    
        <option value="{{$client->id}}">{{ $client->name }}</option>
        @endforeach
    </select>
    <x-input-error for="vendor_id" />
</div>

