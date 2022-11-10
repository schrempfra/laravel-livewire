<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;

class SearchModal extends Component
{   
    public $company;

    public function mount($company) 
    {   
        $this->company = Company::where('id', $company->id)->first();
    }

    public function render()
    {
        return view('livewire.search-modal');
    }
}