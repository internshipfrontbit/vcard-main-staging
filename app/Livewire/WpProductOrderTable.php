<?php

namespace App\Livewire;

use App\Models\WpOrder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class WpProductOrderTable extends LivewireTableComponent
{
    protected $model = WpOrder::class;
    protected $listeners = ['refresh' => '$refresh'];

    public $whatsappStoreId;    
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPageName('wp-product-order-table');
        $this->setDefaultSort('created_at', 'desc');
        $this->setQueryStringStatus(false);
        $this->setColumnSelectStatus(false);
        $this->resetPage('wp-product-order-table');
        $this->setThAttributes(function (Column $column) {
            if ($column->isField('id')) {
                return [
                    'class' => 'd-flex justify-content-center',
                ];
            }

            return [];
        });
    }

    public function columns(): array
    {
            return [
                Column::make(__("messages.whatsapp_stores.order_id"), "order_id")
                    ->view('whatsapp_stores.product_orders.columns.order_id')
                    ->searchable()
                    ->sortable(),
                Column::make(__("messages.common.name"), "name")
                    ->searchable()
                    ->sortable(),
                Column::make(__("messages.common.phone"), "phone")
                    ->view('whatsapp_stores.product_orders.columns.phone')
                    ->searchable(),
                Column::make("Region code", "region_code")->hideIf(1),
                Column::make(__('messages.common.status'), "status")
                    ->view('whatsapp_stores.product_orders.columns.status'),
                Column::make('Payment status', "payment_status")
                    ->view('whatsapp_stores.product_orders.columns.payment_status'),
                Column::make(__('messages.whatsapp_stores.order_date'), "created_at")
                    ->view('whatsapp_stores.product_orders.columns.created_at')
                    ->sortable(),
                Column::make(__('messages.common.action'), "id")
                    ->view('whatsapp_stores.product_orders.columns.action'),
            ];
    }
    
    public function filters(): array
    {
        return [
            SelectFilter::make('Status')
                ->options([
                    '' => __('All'),
                    WpOrder::PENDING => __('Pending'),
                    WpOrder::CONFIRMED => __('Confirmed'),
                    WpOrder::DISPATCHED => __('Dispatched'),
                    WpOrder::DELIVERED => __('Delivered'),
                    WpOrder::CANCELLED => __('Cancelled'),
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value !== '') {
                        $builder->where('status', $value);
                    }
                }),
        ];
    }

    public function builder(): Builder
    {
        return WpOrder::with('wpStore')->where('wp_store_id', $this->whatsappStoreId)->select('wp_orders.*');
    }

    public function placeholder()
    {
        return view('lazy_loading.without-filter-skelecton');
    }
}
