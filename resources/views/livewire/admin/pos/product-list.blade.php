<div
    class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-grey-light shadow-sm mt-3">
    <div class="flex-auto p-6">
        <livewire:admin.pos.filter :categories="$categories" />
        <div class="flex flex-wrap relative">
            <div wire:loading.flex class="w-1/62 absolute justify-content-center align-items-center"
                style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                <div class="spinner-border text-blue" role="status">
                    <span class="">Loading...</span>
                </div>
            </div>
            @forelse($products as $product)
                <div wire:click.prevent="selectProduct({{ $product }})" class="lg:w-1/3 px-4 md:w-1/2 "
                    style="cursor: pointer;">
                    <div class="card border-0 shadow h-full">
                        <div class="position-relative">
                            <img height="200" src="{{ $product->getFirstMediaUrl('images') }}"
                                class="w-full rounded rounded-t" alt="Product Image">
                            <div class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded text-teal-darker bg-teal-light mb-3 position-absolute"
                                style="left:10px;top: 10px;">Stock: {{ $product->quantity }}</div>
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <h6 style="font-size: 13px;" class="mb-3 ">{{ $product->name }}</h6>
                                <span class="badge text-green-darker bg-green-light">
                                    {{ $product->code }}
                                </span>
                            </div>
                            <p class="mb-0 font-bold">{{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="w-full">
                    <div
                        class="relative px-3 py-3 mb-4 border rounded text-yellow-darker border-yellow-dark bg-yellow-lighter ">
                        Products Not Found...
                    </div>
                </div>
            @endforelse
        </div>
        <div @class(['mt-3' => $products->hasPages()])>
            {{ $products->links() }}
        </div>
    </div>
</div>
