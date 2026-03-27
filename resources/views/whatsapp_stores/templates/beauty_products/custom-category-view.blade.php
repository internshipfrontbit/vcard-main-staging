<style>
.custom-category-wrapper {
    display: flex;
    justify-content: center;   /* center the row */
    gap: 25px;
    overflow-x: auto;
    padding: 10px 0;
    scroll-snap-type: x mandatory;
}

/* Hide default scrollbar but keep scroll functionality */
.custom-category-wrapper::-webkit-scrollbar {
    display: none;
}
.custom-category-wrapper {
    -ms-overflow-style: none;  /* IE + Edge */
    scrollbar-width: none;     /* Firefox */
    margin-bottom: 20px;
}

/* Image styling */
.category-img {
    flex: 0 0 auto;
    max-width: 252px;
    height: auto;
    border-radius: 10px;
    scroll-snap-align: start;
    transition: transform 0.2s ease-in-out;
}

/* Small hover zoom on desktop */
@media (hover: hover) {
    .category-img:hover {
        transform: scale(1.05);
    }
}

/* Mobile: 2-column centered grid */
@media (max-width: 767px) {
    .custom-category-wrapper {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 10px;
        justify-items: center;   /* center inside each grid cell */
        overflow: visible;
    }

    .category-img {
        width: 100%;
        max-width: 150px;  /* keeps balance in grid */
    }
}

</style>



@php
    $categories = json_decode($whatsappStore->custom_category, true);
@endphp

@if(!empty($categories))
    <div class="custom-category-wrapper">
        @foreach($categories as $category)
            <a href="{{ route('whatsapp.store.products', $whatsappStore->url_alias) }}?minPrice={{ $category['start_range'] }}&maxPrice={{ $category['end_range'] }}">
                <img src="{{ $category['image_url'] }}" alt="Category" class="category-img" />
            </a>
        @endforeach
    </div>
@endif

