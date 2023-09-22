<?php

namespace App\Livewire\Crud;

use App\Models\Alumno;
use Livewire\Component;
use Livewire\WithPagination;

class AlumnoIndex extends Component
{
    protected $paginationTheme = 'bootstrap';
    use WithPagination;

    public $search;
    public $pagination = 5;
    public $user ;


    public function render()
    {
        $this->user = Alumno::all();

        if($this->pagination == 'all'){
        $numero = Alumno::all()->count();
        }else{
            $numero = $this->pagination;
        }

        $data = Alumno::where(function($query) {
            $query->where('primer_nombre', 'like', '%' . $this->search . '%')
                ->orWhere('segundo_nombre', 'like', '%' . $this->search . '%')
                ->orWhere('primer_apellido', 'like', '%' . $this->search . '%')
                ->orWhere('segundo_apellido', 'like', '%' . $this->search . '%');
                })->paginate($numero);

        return view('livewire.crud.AlumnoIndex', ['data' => $data]);
    }


}
