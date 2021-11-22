<div>
    <div class="space-y-4 top-0 p-4 shadow z-50">
        <ul class="flex flex-wrap sm:space-x-8 sm:items-center">
            <li class="py-2">
                <input type="checkbox" value="0" wire:model="status"/>
                <span class="text-gray-700">0 - {{__('Pending')}}</span>
            </li>
            <li class="py-2">
                <input type="checkbox" value="2" wire:model="status"/>
                <span class="text-gray-700">1 - {{__('Collecting')}}</span>
            </li>
            <li class="py-2">
                <input type="checkbox" value="3" wire:model="status"/>
                <span class="text-gray-700">2 - {{__('Confirmed')}}</span>
            </li>
            <li class="py-2">
                <input type="checkbox" value="4" wire:model="status"/>
                <span class="text-gray-700">3 - {{__('Shipping')}}</span>
            </li>
            <li class="py-2">
                <input type="checkbox" value="5" wire:model="status"/>
                <span class="text-gray-700">4 - {{__('Canceled')}}</span>
            </li>
            <li class="py-2">
                <input type="checkbox" value="6" wire:model="status"/>
                <span class="text-gray-700">5 - {{__('Completed')}}</span>
            </li>
            <li class="py-2">
                <input type="checkbox" value="7" wire:model="status"/>
                <span class="text-gray-700">6 - {{__('Returned')}}</span>
            </li>
            <li class="py-2">
                <input type="checkbox" value="8" wire:model="status"/>
                <span class="text-gray-700">7 - {{__('Paid')}}</span>
            </li>
        </ul>
        {{-- <div>
            <input type="checkbox" value="other" wire:model="showDataLabels"/>
            <span>Show data labels</span>
        </div> --}}
    </div>
    <div class="container mx-auto space-y-4 p-4 sm:p-0 mt-8 mb-4">
            <div class="shadow rounded p-4 border flex-1" style="height: 32rem;">
                <livewire:livewire-pie-chart
                key="{{ $pieChartModel->reactiveKey() }}"
                :pie-chart-model="$pieChartModel"
                />
            </div>
    </div>
    {{-- Earning --}}
    <div class="h-80 p-4 border rounded shadow my-4">
        <livewire:livewire-line-chart :line-chart-model="$earningChart" />
    </div>

    {{-- Users --}}
    <div class="h-80 p-4 border rounded shadow my-4">
        <livewire:livewire-line-chart :line-chart-model="$usersChart" />
    </div>

    {{-- Orders --}}
    <div class="h-80 p-4 border rounded shadow my-4">
        <livewire:livewire-line-chart :line-chart-model="$ordersChart" />
    </div>
</div>


