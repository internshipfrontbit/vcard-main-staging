<div class="justify-content-center d-flex">
    <a title="{{ __('messages.common.view') }}" class="btn px-1 text-info wp-product-order-view-btn-new fs-3" type="button" data-id="{{ $row->id }} }}">
        <i class="fa-solid fa-eye"></i>
    </a>
    <button class="wp-product-order-view-btn" style="display:none;"></button>
    <a href="{{ route('whatsapp.orders.invoice.download', $row->id) }}" title="Print Invoice" class="btn px-1 text-info wp-product-order-print-btn fs-3" type="button" data-id="{{ $row->id }} }}">
        <i class="fa-solid fa-print"></i>
    </a>
</div>
