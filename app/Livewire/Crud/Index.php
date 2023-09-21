<?php

namespace App\Livewire\Crud;

use App\Models\Alumno;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    protected $paginationTheme = 'bootstrap';
    use WithPagination;
    
    public $search ;

    public function render()
{
    $data = Alumno::where(function($search) {
        $search->where('primer_nombre', 'like', '%' . $this->search . '%')
               ->orWhere('segundo_nombre', 'like', '%' . $this->search . '%');
    })->paginate(3);


    return view('livewire.crud.index', compact('data'));
}

}
