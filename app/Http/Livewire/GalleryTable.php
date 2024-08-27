<?php

namespace App\Http\Livewire;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class GalleryTable extends LivewireTableComponent
{
    protected $model = Gallery::class;

    protected string $tableName = 'galleries';

    // for table header button
    public $showButtonOnHeader = true;

    public $buttonComponent = 'gallery.components.add-button';

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
            Column::make(__('messages.gallery.gallery_name'), 'image')
                // ->sortable()
                // ->searchable()
                ->view('gallery.components.gallery-name'),
            Column::make(__('messages.common.action'), 'id')
                ->format(function ($value, $row, Column $column) {
                    return view('livewire.action-button')
                        ->with([
                            'editRoute' => route('gallery.edit', $row->id),
                            'dataId' => $row->id,
                            'deleteClass' => 'gallery-delete-btn',
                        ]);
                }),
        ];
    }

    public function builder(): Builder
    {
        return Gallery::select('galleries.*');
    }
}
