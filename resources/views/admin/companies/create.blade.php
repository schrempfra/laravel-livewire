<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 md:px-8 pt-12 pb-12 w-full relative">

        @if (Session::has('success'))
            <div class="bg-green-50 p-4 my-5">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <!-- Heroicon name: solid/check-circle -->
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ Session::get('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Firmenname</label>
                    <input type="text" name="name" id="name" autocomplete="given-name"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
                    @if ($errors->has('name'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <label class="block text-sm font-medium text-gray-700">
                        Firmen Logo
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="logo"
                                    class="relative cursor-pointer bg-white font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="logo" name="logo" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, GIF up to 10MB
                            </p>
                        </div>
                    </div>
                    @if ($errors->has('logo'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('logo') }}</span>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Typ</label>
                    <select id="type" name="type"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Restaurant</option>
                        <option>Bar</option>
                        <option>Hotel</option>
                    </select>
                    @if ($errors->has('type'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('type') }}</span>
                    @endif
                </div>


                <div class="col-span-6 sm:col-span-3">
                    <label for="city" class="block text-sm font-medium text-gray-700">Stadt</label>
                    <select id="city" name="city"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach ($cities as $city)
                            <option value="{{ $city->city }}">{{ $city->city }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('city'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('city') }}</span>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="zip_code" class="block text-sm font-medium text-gray-700">PLZ</label>
                    <input type="text" name="zip_code" id="zip_code"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
                    @if ($errors->has('zip_code'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('zip_code') }}</span>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="street" class="block text-sm font-medium text-gray-700">Straße</label>
                    <input type="text" name="street" id="street"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
                    @if ($errors->has('street'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('street') }}</span>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="street_number" class="block text-sm font-medium text-gray-700">Nummer</label>
                    <input type="text" name="street_number" id="street_number"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
                    @if ($errors->has('street_number'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('street_number') }}</span>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Telefonnummer</label>
                    <input type="text" name="phone_number" id="phone_number"
                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                    @if ($errors->has('phone_number'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('phone_number') }}</span>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                    @if ($errors->has('email'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-6">
                    <label for="description" class="block text-sm font-medium text-gray-700">
                        Beschreibung
                    </label>
                    <div class="mt-1">
                        <textarea id="myeditorinstance" name="description" rows="6"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300"
                            placeholder="you@example.com"></textarea>
                    </div>
                    @if ($errors->has('description'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-6">
                    <label for="lat" class="block text-sm font-medium text-gray-700">Latitude</label>
                    <input type="text" name="lat" id="lat"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
                    @if ($errors->has('lat'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('lat') }}</span>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-6">
                    <label for="lng" class="block text-sm font-medium text-gray-700">Longtitude</label>
                    <input type="text" name="lng" id="lng"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
                    @if ($errors->has('lng'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('lng') }}</span>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-6">
                    <label for="google_maps" class="block text-sm font-medium text-gray-700">Google Maps Link</label>
                    <input type="text" name="google_maps" id="google_maps"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
                    @if ($errors->has('google_maps'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('google_maps') }}</span>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-6">
                    <label for="website" class="block text-sm font-medium text-gray-700">Webseite</label>
                    <input type="text" name="website" id="website"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
                    @if ($errors->has('website'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('website') }}</span>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-6">
                    <label for="facebook" class="block text-sm font-medium text-gray-700">Facebook</label>
                    <input type="text" name="facebook" id="facebook"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
                    @if ($errors->has('facebook'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('facebook') }}</span>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-6">
                    <label for="twitter" class="block text-sm font-medium text-gray-700">Twitter</label>
                    <input type="text" name="twitter" id="twitter"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
                    @if ($errors->has('twitter'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('twitter') }}</span>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-6">
                    <label for="instagram" class="block text-sm font-medium text-gray-700">Instragram</label>
                    <input type="text" name="instagram" id="instagram"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
                    @if ($errors->has('instagram'))
                        <span
                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $errors->first('instagram') }}</span>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-6 border-t py-5">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Öffnungszeiten
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Tragen Sie die Öffnungszeiten des jeweiligen Betriebes bitte hier ein.
                        </p>
                    </div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-8 timepicker">
                        <div class="sm:col-span-2">
                            <label for="monday_first_start" class="block text-sm font-medium text-gray-700">
                                Montag Vm Beginn
                            </label>
                            <div class="mt-1">
                                <input type="text" name="monday_first_start" id="monday_first_start" autocomplete="given-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="monday_first_end" class="block text-sm font-medium text-gray-700">
                                Montag Vm Ende
                            </label>
                            <div class="mt-1">
                                <input type="text" name="monday_first_end" id="monday_first_end" autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="monday_second_start" class="block text-sm font-medium text-gray-700">
                                Montag Nm Beginn
                            </label>
                            <div class="mt-1">
                                <input type="text" name="monday_second_start" id="monday_second_start" autocomplete="given-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="monday_second_end" class="block text-sm font-medium text-gray-700">
                                Montag Nm Ende
                            </label>
                            <div class="mt-1">
                                <input type="text" name="monday_second_end" id="monday_second_end" autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="tuesday_first_start" class="block text-sm font-medium text-gray-700">
                                Dienstag Vm Beginn
                            </label>
                            <div class="mt-1">
                                <input type="text" name="tuesday_first_start" id="tuesday_first_start" autocomplete="given-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="tuesday_first_end" class="block text-sm font-medium text-gray-700">
                                Dienstag Vm Ende
                            </label>
                            <div class="mt-1">
                                <input type="text" name="tuesday_first_end" id="tuesday_first_end" autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="tuesday_second_start" class="block text-sm font-medium text-gray-700">
                                Dienstag Nm Beginn
                            </label>
                            <div class="mt-1">
                                <input type="text" name="tuesday_second_start" id="tuesday_second_start" autocomplete="given-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="tuesday_second_end" class="block text-sm font-medium text-gray-700">
                                Dienstag Nm Ende
                            </label>
                            <div class="mt-1">
                                <input type="text" name="tuesday_second_end" id="tuesday_second_end" autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="wednesday_first_start" class="block text-sm font-medium text-gray-700">
                                Mittwoch Vm Beginn
                            </label>
                            <div class="mt-1">
                                <input type="text" name="wednesday_first_start" id="wednesday_first_start" autocomplete="given-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="wednesday_first_end" class="block text-sm font-medium text-gray-700">
                                Mittwoch Vm Ende
                            </label>
                            <div class="mt-1">
                                <input type="text" name="wednesday_first_end" id="wednesday_first_end" autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="wednesday_second_start" class="block text-sm font-medium text-gray-700">
                                Mittwoch Nm Beginn
                            </label>
                            <div class="mt-1">
                                <input type="text" name="wednesday_second_start" id="wednesday_second_start" autocomplete="given-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="wednesday_second_end" class="block text-sm font-medium text-gray-700">
                                Mittwoch Nm Ende
                            </label>
                            <div class="mt-1">
                                <input type="text" name="wednesday_second_end" id="wednesday_second_end" autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="thursday_first_start" class="block text-sm font-medium text-gray-700">
                                Donnerstag Vm Beginn
                            </label>
                            <div class="mt-1">
                                <input type="text" name="thursday_first_start" id="thursday_first_start" autocomplete="given-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="thursday_first_end" class="block text-sm font-medium text-gray-700">
                                Donnerstag Vm Ende
                            </label>
                            <div class="mt-1">
                                <input type="text" name="thursday_first_end" id="thursday_first_end" autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="thursday_second_start" class="block text-sm font-medium text-gray-700">
                                Donnerstag Nm Beginn
                            </label>
                            <div class="mt-1">
                                <input type="text" name="thursday_second_start" id="thursday_second_start" autocomplete="given-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="thursday_second_end" class="block text-sm font-medium text-gray-700">
                                Donnerstag Nm Ende
                            </label>
                            <div class="mt-1">
                                <input type="text" name="thursday_second_end" id="thursday_second_end" autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="friday_first_start" class="block text-sm font-medium text-gray-700">
                                Freitag Vm Beginn
                            </label>
                            <div class="mt-1">
                                <input type="text" name="friday_first_start" id="friday_first_start" autocomplete="given-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="friday_first_end" class="block text-sm font-medium text-gray-700">
                                Freitag Vm Ende
                            </label>
                            <div class="mt-1">
                                <input type="text" name="friday_first_end" id="friday_first_end" autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="friday_second_start" class="block text-sm font-medium text-gray-700">
                                Freitag Nm Beginn
                            </label>
                            <div class="mt-1">
                                <input type="text" name="friday_second_start" id="friday_second_start" autocomplete="given-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="friday_second_end" class="block text-sm font-medium text-gray-700">
                                Freitag Nm Ende
                            </label>
                            <div class="mt-1">
                                <input type="text" name="friday_second_end" id="friday_second_end" autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="saturday_first_start" class="block text-sm font-medium text-gray-700">
                                Samstag Vm Beginn
                            </label>
                            <div class="mt-1">
                                <input type="text" name="saturday_first_start" id="saturday_first_start" autocomplete="given-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="saturday_first_end" class="block text-sm font-medium text-gray-700">
                                Samstag Vm Ende
                            </label>
                            <div class="mt-1">
                                <input type="text" name="saturday_first_end" id="saturday_first_end" autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="saturday_second_start" class="block text-sm font-medium text-gray-700">
                                Samstag Nm Beginn
                            </label>
                            <div class="mt-1">
                                <input type="text" name="saturday_second_start" id="saturday_second_start" autocomplete="given-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="saturday_second_end" class="block text-sm font-medium text-gray-700">
                                Samstag Nm Ende
                            </label>
                            <div class="mt-1">
                                <input type="text" name="saturday_second_end" id="saturday_second_end" autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="sunday_first_start" class="block text-sm font-medium text-gray-700">
                                Sonntag Vm Beginn
                            </label>
                            <div class="mt-1">
                                <input type="text" name="sunday_first_start" id="sunday_first_start" autocomplete="given-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="sunday_first_end" class="block text-sm font-medium text-gray-700">
                                Sonntag Vm Ende
                            </label>
                            <div class="mt-1">
                                <input type="text" name="sunday_first_end" id="sunday_first_end" autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="sunday_second_start" class="block text-sm font-medium text-gray-700">
                                Sonntag Nm Beginn
                            </label>
                            <div class="mt-1">
                                <input type="text" name="sunday_second_start" id="sunday_second_start" autocomplete="given-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="sunday_second_end" class="block text-sm font-medium text-gray-700">
                                Sonntag Nm Ende
                            </label>
                            <div class="mt-1">
                                <input type="text" name="sunday_second_end" id="sunday_second_end" autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Speichern
                </button>
            </div>
        </form>
    </div>
    @push('before-scripts')
        <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
                integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    @endpush

    @push('after-scripts')
        <script>
            //tinymce init
            tinymce.init({
                selector: '#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
                plugins: 'code table lists',
                toolbar: 'numlist bullist',
                branding: false,
                statusbar: false,
                menubar: true
            });

            //timepicker init
            $(document).ready(function() {
                $('.timepicker input').timepicker({
                    timeFormat: 'h:mm',
                    interval: 60,
                    minTime: '8:00',
                    maxTime: '12:00pm',
                    defaultTime: '10',
                    startTime: '8:00',
                    dynamic: false,
                    dropdown: true,
                    scrollbar: true
                });
            });
        </script>
    @endpush
</x-app-layout>
