<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\OpeningHours as ModelsOpeningHours;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\OpeningHours\OpeningHours;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create', ['cities' => City::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $request->validated();

        $filePath = $this->uploadFile($request->file('logo'));

        DB::beginTransaction();
        $company = new Company();
        $company->user_id = auth()->id();
        $company->name = $request->get('name');
        $company->logo = $filePath;
        $company->email = $request->get('email');
        $company->type = $request->get('type');
        $company->city = $request->get('city');
        $company->zip_code = $request->get('zip_code');
        $company->street = $request->get('street');
        $company->street_number = $request->get('street_number');
        $company->phone_number = $request->get('phone_number');
        $company->description = $request->get('description');
        $company->lat = $request->get('lat');
        $company->lng = $request->get('lng');
        $company->google_maps = $request->get('google_maps');
        $company->website = $request->get('website');
        $company->facebook = $request->get('facebook');
        $company->twitter = $request->get('twitter');
        $company->instagram = $request->get('instagram');
        $company->save();


        $openingHours = new ModelsOpeningHours();
        $openingHours->company_id = $company->id;
        $openingHours->monday_first_start = $request->monday_first_start;
        $openingHours->monday_first_end = $request->monday_first_end;
        $openingHours->monday_second_start = $request->monday_second_start;
        $openingHours->monday_second_end = $request->monday_second_end;

        $openingHours->tuesday_first_start = $request->tuesday_first_start;
        $openingHours->tuesday_first_end = $request->tuesday_first_end;
        $openingHours->tuesday_second_start = $request->tuesday_second_start;
        $openingHours->tuesday_second_end = $request->tuesday_second_end;

        $openingHours->wednesday_first_start = $request->wednesday_first_start;
        $openingHours->wednesday_first_end = $request->wednesday_first_end;
        $openingHours->wednesday_second_start = $request->wednesday_second_start;
        $openingHours->wednesday_second_end = $request->wednesday_second_end;

        $openingHours->thursday_first_start = $request->thursday_first_start;
        $openingHours->thursday_first_end = $request->thursday_first_end;
        $openingHours->thursday_second_start = $request->thursday_second_start;
        $openingHours->thursday_second_end = $request->thursday_second_end;

        $openingHours->friday_first_start = $request->friday_first_start;
        $openingHours->friday_first_end = $request->friday_first_end;
        $openingHours->friday_second_start = $request->friday_second_start;
        $openingHours->friday_second_end = $request->friday_second_end;

        $openingHours->saturday_first_start = $request->saturday_first_start;
        $openingHours->saturday_first_end = $request->saturday_first_end;
        $openingHours->saturday_second_start = $request->saturday_second_start;
        $openingHours->saturday_second_end = $request->saturday_second_end;

        $openingHours->sunday_first_start = $request->sunday_first_start;
        $openingHours->sunday_first_end = $request->sunday_first_end;
        $openingHours->sunday_second_start = $request->sunday_second_start;
        $openingHours->sunday_second_end = $request->sunday_second_end;
        $openingHours->enabled = 1;
        $openingHours->save();
        DB::commit();

        return redirect()->route('companies.create')->with('success', 'Die Firma wurde erfolgreich erstellt.');

    }

    protected function uploadFile(UploadedFile|File $logo): ?String
    {
        return Storage::putFile('company/logos', $logo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
