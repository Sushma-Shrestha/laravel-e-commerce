<x-app-layout>
    <div x-data="productItem({{ json_encode([
                    'id' => $product->id,
                    'slug' => $product->slug,
                    'image' => $product->image,
                    'title' => $product->title,
                    'price' => $product->price,
                    'addToCartUrl' => route('cart.add', $product)
                ]) }})" class="container mx-auto">
        <div class="grid gap-6 grid-cols-1 lg:grid-cols-5">
            <div class="lg:col-span-3">
                <div class="aspect-w-3 aspect-h-2">
                    <img src="http://127.0.0.1:8000/{{$product->image}}" alt="" class="object-cover rounded-lg" />
                </div>
            </div>
            <div class="lg:col-span-2">
                <h1 class="text-lg font-semibold">
                    {{$product->title}}
                </h1>
                <div class="text-xl font-bold mb-6">${{$product->price}}</div>
                <div class="flex items-center justify-between mb-5">
                    <label for="quantity" class="block font-bold mr-4">
                        Quantity
                    </label>
                    <input type="number" name="quantity" x-ref="quantityEl" value="1" min="1" class="w-32 focus:border-purple-500 focus:outline-none rounded" />
                </div>
                <button @click="addToCart($refs.quantityEl.value)" class="btn-primary py-4 text-lg flex justify-center min-w-0 w-full mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Add to Cart
                </button>
                <div class="mb-6" x-data="{expanded: false}">
                    <div x-show="expanded" x-collapse.min.120px class="text-gray-500 wysiwyg-content">
                        {{ $product->description }}
                    </div>
                    <p class="text-right">
                        <a @click="expanded = !expanded" href="javascript:void(0)" class="text-purple-500 hover:text-purple-700" x-text="expanded ? 'Read Less' : 'Read More'"></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>