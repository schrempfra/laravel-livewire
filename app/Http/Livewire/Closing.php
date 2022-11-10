<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Service\OpenHours as ServiceOpenHours;
use Livewire\Component;

class Closing extends Component
{   
    public $company;
    protected $serviceOpenHours;

    public function mount(ServiceOpenHours $serviceOpenHours, $company) 
    {   
        $this->company = Company::where('id', $company->id)->first();
        $this->serviceOpenHours = $serviceOpenHours;
    }

    public function render()
    {   
        $openingHours = $this->serviceOpenHours->createOpenHours($this->company);

        return view('livewire.closing', ['openingHours' => $openingHours]);
    }
}
