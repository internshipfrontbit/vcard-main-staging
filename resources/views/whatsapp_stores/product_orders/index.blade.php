<div class="overflow-auto">
    <input type="hidden" id="newWhatsappStoreId" value="{{$whatsappStore->id}}">
    <div class="table-striped w-100">
            <livewire:wp-product-order-table :whatsapp-store-id="$whatsappStore->id" lazy>
    </div>
    @include('whatsapp_stores.product_orders.view_order')
</div>