<?php
  
namespace App\Http\Livewire;
   
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
  
class UserDatatables extends LivewireDatatable
{
    public $model = User::class;

    public function builder()
    {
        return User::query();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->sortBy('id'),
  
            Column::name('name')
                ->label('Name'),
  
            Column::name('email'),
  
            DateColumn::name('created_at')
                ->label('Creation Date'),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('components.action-datatable', ['user' => $id, 'name' => $name]);
            })->label('Acciones'),
        ];
    }
}