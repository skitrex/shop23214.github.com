{{-- Layout and design by WhileD0S <https://vk.com/whiled0s>  --}}
<div class="product-block z-depth-1">
    <p class="product-name full-w">{{ $product->name }}</p>
    @if(is_file('img/items/' . $product->image) && file_exists('img/items/' . $product->image))
        <img src="{{ asset('img/items/' . $product->image) }}" alt="prod" class="product-image image-fluid">
    @else
        <img src="{{ asset('img/empty.png') }}" alt="prod" class="product-image image-fluid">
    @endif

    <p class="product-price"><span class="catalog-price-span">{{ $product->price }}</span> {!! s_get('shop.currency_html', 'руб.') !!}</p>
    <p class="product-count">
        @if(!($product->type == 'permgroup' and $product->stack === 0))
            @lang('content.shop.catalog.item.for')
        @endif
        <span class="number">
            @if($product->type == 'item')
                {{ $product->stack }}
            @elseif($product->type == 'permgroup')
                @if($product->stack === 0)
                    @lang('content.shop.catalog.item.forever')
                @else
                    {{ $product->stack }}
                @endif
            @endif
        </span>
        @if($product->type == 'item')
                @lang('content.shop.catalog.item.items')
        @else
            @if($product->stack !== 0)
                @lang('content.shop.catalog.item.duration')
            @endif
        @endif
    </p>

    @if($cart->has($product->id))
        <button class="btn btn-info btn-block btn-sm catalog-to-cart disabled" disabled="disabled" data-url="{{ route('cart.put', ['server' => $currentServer->id, 'product' => $product->id ]) }}">
            <i class="fa fa-cart-arrow-down fa-left"></i>
            <span>
                @lang('content.shop.catalog.item.already_in_cart')
            </span>
        </button>
    @else
        <button class="btn btn-info btn-block btn-sm catalog-to-cart"
                data-url="{{ route('cart.put', ['server' => $currentServer->id, 'product' => $product->id ]) }}">
            <i class="fa fa-cart-arrow-down fa-left"></i>
            <span>
                @lang('content.shop.catalog.item.put_in_cart')
            </span>
        </button>
    @endif

    <button class="btn btn-warning btn-block btn-sm catalog-to-buy"
                data-url="{{ route('catalog.buy', ['server' => $currentServer->id, 'product' => $product->id]) }}">
        <i class="fa fa-money fa-left"></i>
        @lang('content.shop.catalog.item.fast_buy')
    </button>
</div>
