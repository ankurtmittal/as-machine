<?php

namespace App\Http\Livewire;

use App\Models\MyClient;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class MyClientTable extends LivewireTableComponent
{
    protected $model = MyClient::class;

    protected string $tableName = 'my_clients';

    // for table header button
    public $showButtonOnHeader = true;

    public $buttonComponent = 'myClient.components.add-button';

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
            Column::make(__('messages.myClients.logo'), 'image')
                // ->sortable()
                // ->searchable()
                ->view('myClient.components.image'),
            Column::make(__('messages.myClients.url'), 'url')
                // ->sortable()
                // ->searchable()
                ->view('myClient.components.url'),
            Column::make(__('messages.common.action'), 'id')
                ->format(function ($value, $row, Column $column) {
                    return view('livewire.action-button')
                        ->with([
                            'editRoute' => route('myClients.edit', $row->id),
                            'dataId' => $row->id,
                            'deleteClass' => 'myClients-delete-btn',
                        ]);
                }),
        ];
    }

    public function builder(): Builder
    {
        return MyClient::select('my_clients.*');
    }
}
