<div>
    <div class="flex flex-wrap -mr-1 -ml-1">
        <div class="md:w-3/5 px-4">
            <div class="mb-4">
                <label>Product Category</label>
                <select wire:model="category" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded">
                    <option value="">All Products</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="md:w-2/5 px-4">
            <div class="form-group">
                <label>Product Count</label>
                <select wire:model="showCount" class="form-control">
                    <option value="9">9 Products</option>
                    <option value="15">15 Products</option>
                    <option value="21">21 Products</option>
                    <option value="30">30 Products</option>
                    <option value="">All Products</option>
                </select>
            </div>
        </div>
    </div>
</div>