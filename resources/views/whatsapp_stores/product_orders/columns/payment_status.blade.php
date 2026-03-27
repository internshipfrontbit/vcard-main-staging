@if ($row->payment_status == 'UNPAID')
    <div wire:ignore>
        {{ Form::select('payment_status', ['PAID' => 'Paid', 'UNPAID' => 'Unpaid'], $row->payment_status, ['class' => 'form-control form-select product-order-payment-status', 'data-id' => $row->id]) }}
    </div>
@elseif($row->payment_status == 'PAID')
    <span class="text-success">Paid</span>
@endif
