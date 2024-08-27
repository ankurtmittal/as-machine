<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ReviewTable extends LivewireTableComponent
{
    protected $model = Review::class;

    protected string $tableName = 'reviews';

    // for table header button
    public $showButtonOnHeader = true;

    public $buttonComponent = 'reviews.components.add-button';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setQueryStringStatus(false);

        $this->setThAttributes(function (Column $column) {
            if ($column->isField('id') || $column->isField('unit_price')) {
                return ($column->isSortable()) ? ['class' => 'd-flex justify-content-end']
                                                   : ['class' => 'text-center'];
            }

            return [];
        });
        $this->setTdAttributes(function (Column $column) {
            if ($column->getField() === 'id') {
                return [
                    'class' => 'text-center',
                ];
            }
            if ($column->getField() === 'unit_price') {
                return [
                    'class' => 'customWidth',
                ];
            }

            return [];
        });
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.review.name'), 'image')
                // ->sortable()
                // ->searchable()
                ->view('reviews.components.image'),
            Column::make(__('messages.review.rating'), 'rating')
                // ->sortable()
                // ->searchable()
                ->view('reviews.components.rating'),
            Column::make(__('messages.review.content'), 'content')
                // ->sortable()
                // ->searchable()
                ->view('reviews.components.content'),
            Column::make(__('messages.common.action'), 'id')
                ->format(function ($value, $row, Column $column) {
                    return view('livewire.action-button')
                        ->with([
                            'editRoute' => route('review.edit', $row->id),
                            'dataId' => $row->id,
                            'deleteClass' => 'review-delete-btn',
                        ]);
                }),
        ];
    }

    public function builder(): Builder
    {
        return Review::select('reviews.*');
    }
}
