<div>
    <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-grey-light shadow-sm">
        <div class="flex-auto p-6">
            <div>
                @if (session()->has('message'))
                    <div class="relative px-3 py-3 mb-4 border rounded text-yellow-darker border-yellow-dark bg-yellow-lighter  block" role="alert">
                        <div class="alert-body">
                            <span>{{ session('message') }}</span>
                            <button type="button" class="absolute pin-t pin-b pin-r px-4 py-3" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                @endif

                <div class="mb-4">
                    <label for="customer_id">Customer <span class="text-red">*</span></label>
                    <div class="relative flex items-stretch w-full">
                        <div class="input-group-prepend">
                            <a href="" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-blue-lightest bg-blue hover:bg-blue-light">
                                <i class="bi bi-person-plus"></i>
                            </a>
                        </div>
                        <select wire:model="customer_id" id="customer_id" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded">
                            <option value="" selected>Select Customer</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="block w-full overflow-auto scrolling-touch">
                    <table class="w-full max-w-full mb-4 bg-transparent">
                        <thead>
                        <tr class="text-center">
                            <th class="align-middle">Product</th>
                            <th class="align-middle">Price</th>
                            <th class="align-middle">Quantity</th>
                            <th class="align-middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($cart_items->isNotEmpty())
                            @foreach($cart_items as $cart_item)
                                <tr>
                                    <td class="align-middle">
                                        {{ $cart_item->name }} <br>
                                        <span class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded text-green-darker bg-green-light">
                                        {{ $cart_item->options->code }}
                                    </span>
                                        @include('livewire.includes.product-cart-modal')
                                    </td>

                                    <td class="align-middle">
                                        {{ $cart_item->price }}
                                    </td>

                                    <td class="align-middle">
                                        @include('livewire.includes.product-cart-quantity')
                                    </td>

                                    <td class="align-middle text-center">
                                        <a href="#" wire:click.prevent="removeItem('{{ $cart_item->rowId }}')">
                                            <i class="bi bi-x-circle font-2xl text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center">
                        <span class="text-danger">
                            Please search & select products!
                        </span>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="md:w-1/6 pr-4 pl-42">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Order Tax ({{ $global_tax }}%)</th>
                                <td>(+) {{ Cart::instance($cart_instance)->tax() }}</td>
                            </tr>
                            <tr>
                                <th>Discount ({{ $global_discount }}%)</th>
                                <td>(-) {{ Cart::instance($cart_instance)->discount() }}</td>
                            </tr>
                            <tr>
                                <th>Shipping</th>
                                <input type="hidden" value="{{ $shipping }}" name="shipping_amount">
                                <td>(+) {{ $shipping }}</td>
                            </tr>
                            <tr class="text-blue">
                                <th>Grand Total</th>
                                @php
                                    $total_with_shipping = Cart::instance($cart_instance)->total() + (float) $shipping
                                @endphp
                                <th>
                                    (=) {{ $total_with_shipping }}
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap -mr-1 -ml-1">
                <div class="lg:w-1/3 pr-4 pl-4">
                    <div class="form-group">
                        <label for="tax_percentage">Order Tax (%)</label>
                        <input wire:model.lazy="global_tax" type="number" class="form-control" min="0" max="100" value="{{ $global_tax }}" required>
                    </div>
                </div>
                <div class=":flex-growlg-4">
                    <div class="form-group">
                        <label for="discount_percentage">Discount (%)</label>
                        <input wire:model.lazy="global_discount" type="number" class="form-control" min="0" max="100" value="{{ $global_discount }}" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="shipping_amount">Shipping</label>
                        <input wire:model.lazy="shipping" type="number" class="form-control" min="0" value="0" required step="0.01">
                    </div>
                </div>
            </div>

            <div class="form-group flex justify-content-center flex-wrap mb-0">
                <button wire:click="resetCart" type="button" class="btn btn-pill text-red-lightest bg-red hover:bg-red-light mr-3"><i class="bi bi-x"></i> Reset</button>
                <button wire:loading.attr="disabled" wire:click="proceed" type="button" class="btn btn-pill btn-primary" {{  $total_amount == 0 ? 'opacity-75' : '' }}><i class="bi bi-check"></i> Proceed</button>
            </div>
        </div>
    </div>

    {{--Checkout Modal--}}
    @include('livewire.admin.pos.includes.checkout-modal')

</div>