<?php

namespace App\Http\Livewire;

use App\Models\City;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{   
    use WithPagination;

    public $search;
    public $sortField;
    public $sort = "";
    protected $queryString = ['search', 'sort' => ['except' => '']];

    public function setModal($companyId)
    {   
        $this->emit('searchModalOpen' . $companyId);
    }

    public function sortAsc()
    {
        $this->sort = "asc";
    }

    public function sortDesc()
    {
        $this->sort = "desc";
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {   
        $query =  DB::table('companies')->where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('zip_code', 'like', '%' . $this->search . '%')
                ->orWhere('type', 'like', '%' . $this->search . '%')
                ->orWhere('city', 'like', '%' . $this->search . '%');
        });
        
        if($this->sort != '') {            
            $query->orderBy('name', $this->sort);
        }

        $companies = $query->paginate(20);

        return view('livewire.search', ['cities' => City::all(), 'companies' => $companies]);
    }
}
