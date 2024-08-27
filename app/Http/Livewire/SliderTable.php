<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SliderTable extends LivewireTableComponent
{
    protected $model = Slider::class;

    protected string $tableName = 'sliders';

    // for table header button
    public $showButtonOnHeader = true;

    public $buttonComponent = 'slider.components.add-button';

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
            Column::make(__('messages.slider.image'), 'image')
                // ->sortable()
                // ->searchable()
                ->view('slider.components.image'),
            Column::make(__('messages.slider.title'), 'title')
                // ->sortable()
                // ->searchable()
                ->view('slider.components.title'),
            Column::make(__('messages.slider.sub_title'), 'subtitle')
                // ->sortable()
                // ->searchable()
                ->view('slider.components.subtitle'),
            Column::make(__('messages.common.action'), 'id')
                ->format(function ($value, $row, Column $column) {
                    return view('livewire.action-button')
                        ->with([
                            'editRoute' => route('slider.edit', $row->id),
                            'dataId' => $row->id,
                            'deleteClass' => 'slider-delete-btn',
                        ]);
                }),
        ];
    }

    public function builder(): Builder
    {
        return Slider::select('sliders.*');
    }
}
