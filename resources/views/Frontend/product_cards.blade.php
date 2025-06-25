<div class="grid-layout-3 gap-30-20">
    @forelse ($products as $value)
        <div class="card-product style-2 wow fadeInUp" data-wow-delay="0s">
            <div class="image">
                <img src="{{ asset($value->image_1 ?? '') }}" alt="" class="lazyload">
            </div>
            <a href="{{ route('prod_detail') }}" class="name-product font-worksans hover-text-4">
                {{ $value->name ?? '' }}
            </a>
            <div class="pricing-star">
                <div class="price-wrap">
                    <span class="price-2">₹ {{ $value->mrp ?? '' }}</span>
                </div>
                <div class="wg-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>
        </div>
    @empty
        <p>No products found in this category.</p>
    @endforelse
</div>