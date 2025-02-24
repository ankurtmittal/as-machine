<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CategoryTable extends LivewireTableComponent
{
    protected $model = Category::class;

    protected string $tableName = 'categories';

    // for table header button
    public $showButtonOnHeader = true;

    public $buttonComponent = 'category.components.add-button';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setQueryStringStatus(false);

        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if (in_array($column->getField(), ['name'])) {
                return [
                    'class' => 'w-35',
                ];
            }

            return [];
        });
        $this->setThAttributes(function (Column $column) {
            return [
                'class' => 'w-50',
            ];
        });
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.category.category'), 'name')
                // ->sortable()
                // ->searchable()
                ,
            Column::make(__('messages.product.product'), 'id')
                // ->sortable()
                // ->searchable()
                ->format(function ($value, $row, Column $column) {
                    return $row->products_count;
                }),
            Column::make(__('messages.common.action'), 'id')
                ->format(function ($value, $row, Column $column) {
                    return view('livewire.modal-action-button')
                        ->with([
                            'dataId' => $row->id,
                            'editClass' => 'category-edit-btn',
                            'deleteClass' => 'category-delete-btn',
                        ]);
                }),
        ];
    }

    public function builder(): Builder
    {
        return Category::withCount('products');
    }
}
