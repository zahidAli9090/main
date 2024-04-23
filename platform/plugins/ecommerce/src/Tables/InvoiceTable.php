<?php

namespace Botble\Ecommerce\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\Html;
use Botble\Ecommerce\Models\Invoice;
use Botble\Ecommerce\Tables\Formatters\PriceFormatter;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\Columns\Column;
use Botble\Table\Columns\CreatedAtColumn;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\LinkableColumn;
use Botble\Table\Columns\StatusColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;

class InvoiceTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(Invoice::class)
            ->addActions([
                EditAction::make()->route('ecommerce.invoice.edit'),
                DeleteAction::make()->route('ecommerce.invoice.destroy'),
            ]);
    }

    public function ajax(): JsonResponse
    {
        $data = $this->table
            ->eloquent($this->query())
            ->formatColumn('amount', PriceFormatter::class)
            ->editColumn('reference_id', function (Invoice $item) {
                if (! $item->reference || ! $item->reference->id) {
                    return '&mdash;';
                }

                return Html::link(route('orders.edit', $item->reference->id), $item->reference->code)->toHtml();
            });

        return $this->toJson($data);
    }

    public function query(): Relation|Builder|QueryBuilder
    {
        $query = $this
            ->getModel()
            ->query()
            ->select([
                'id',
                'customer_name',
                'code',
                'reference_id',
                'reference_type',
                'amount',
                'created_at',
                'updated_at',
                'status',
            ]);

        return $this->applyScopes($query);
    }

    public function columns(): array
    {
        return [
            IdColumn::make(),
            Column::make('customer_name')
                ->title(trans('core/base::tables.name'))
                ->alignLeft(),
            Column::make('reference_id')
                ->title(trans('plugins/ecommerce::invoice.order'))
                ->alignLeft(),
            LinkableColumn::make('code')
                ->title(trans('plugins/ecommerce::invoice.table.code'))
                ->route('ecommerce.invoice.edit')
                ->alignLeft(),
            Column::formatted('amount')
                ->title(trans('plugins/ecommerce::invoice.table.amount'))
                ->alignLeft(),
            CreatedAtColumn::make(),
            StatusColumn::make(),
        ];
    }

    public function buttons(): array
    {
        $buttons = [];

        if ($this->hasPermission('ecommerce.invoice.edit')) {
            $buttons['generate-invoices'] = [
                'link' => route('ecommerce.invoice.generate-invoices'),
                'text' => '<i class="fas fa-file-export"></i> ' . trans('plugins/ecommerce::invoice.generate_invoices'),
                'class' => 'btn-info',
            ];
        }

        return $buttons;
    }

    public function bulkActions(): array
    {
        return [
            DeleteBulkAction::make()->permission('ecommerce.invoice.destroy'),
        ];
    }

    public function getFilters(): array
    {
        return $this->getBulkChanges();
    }

    public function getBulkChanges(): array
    {
        return [
            'name' => [
                'title' => trans('core/base::tables.name'),
                'type' => 'text',
                'validate' => 'required|max:120',
            ],
            'status' => [
                'title' => trans('core/base::tables.status'),
                'type' => 'select',
                'choices' => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type' => 'datePicker',
            ],
        ];
    }
}
