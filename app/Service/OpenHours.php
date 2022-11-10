<?php

namespace App\Service;

use Carbon\Carbon;
use Spatie\OpeningHours\OpeningHours;

class OpenHours
{
    public function createOpenHours($company) 
    {   
        return OpeningHours::create([
                'monday'     => [Carbon::createFromFormat('H:i:s', $company->openingHours->monday_first_start)->format('H:i') . '-' . Carbon::createFromFormat('H:i:s', $company->openingHours->monday_first_end)->format('H:i'), Carbon::createFromFormat('H:i:s', $company->openingHours->monday_second_start)->format('H:i') . '-' . Carbon::createFromFormat('H:i:s', $company->openingHours->monday_second_end)->format('H:i')],
                'tuesday'    => [Carbon::createFromFormat('H:i:s', $company->openingHours->tuesday_first_start)->format('H:i') . '-' . Carbon::createFromFormat('H:i:s', $company->openingHours->tuesday_first_end)->format('H:i'), Carbon::createFromFormat('H:i:s', $company->openingHours->tuesday_second_start)->format('H:i') . '-' . Carbon::createFromFormat('H:i:s', $company->openingHours->tuesday_second_end)->format('H:i')],
                'wednesday'  => [Carbon::createFromFormat('H:i:s', $company->openingHours->wednesday_first_start)->format('H:i') . '-' . Carbon::createFromFormat('H:i:s', $company->openingHours->wednesday_first_end)->format('H:i'), Carbon::createFromFormat('H:i:s', $company->openingHours->wednesday_second_start)->format('H:i') . '-' . Carbon::createFromFormat('H:i:s', $company->openingHours->wednesday_second_end)->format('H:i')],
                'thursday'   => [Carbon::createFromFormat('H:i:s', $company->openingHours->thursday_first_start)->format('H:i') . '-' . Carbon::createFromFormat('H:i:s', $company->openingHours->thursday_first_end)->format('H:i'), Carbon::createFromFormat('H:i:s', $company->openingHours->thursday_second_start)->format('H:i') . '-' . Carbon::createFromFormat('H:i:s', $company->openingHours->thursday_second_end)->format('H:i')],
                'friday'     => [Carbon::createFromFormat('H:i:s', $company->openingHours->friday_first_start)->format('H:i') . '-' . Carbon::createFromFormat('H:i:s', $company->openingHours->friday_first_end)->format('H:i'), Carbon::createFromFormat('H:i:s', $company->openingHours->friday_second_start)->format('H:i') . '-' . Carbon::createFromFormat('H:i:s', $company->openingHours->friday_second_end)->format('H:i')],
                'saturday'   => [Carbon::createFromFormat('H:i:s', $company->openingHours->saturday_first_start)->format('H:i') . '-' . Carbon::createFromFormat('H:i:s', $company->openingHours->saturday_first_end)->format('H:i'), Carbon::createFromFormat('H:i:s', $company->openingHours->saturday_second_start)->format('H:i') . '-' . Carbon::createFromFormat('H:i:s', $company->openingHours->saturday_second_end)->format('H:i')],
                'sunday'     => [Carbon::createFromFormat('H:i:s', $company->openingHours->sunday_first_start)->format('H:i') . '-' . Carbon::createFromFormat('H:i:s', $company->openingHours->sunday_first_end)->format('H:i'), Carbon::createFromFormat('H:i:s', $company->openingHours->sunday_second_start)->format('H:i') . '-' . Carbon::createFromFormat('H:i:s', $company->openingHours->sunday_second_end)->format('H:i')],
                'exceptions' => [],
            ]);
    }    
}
