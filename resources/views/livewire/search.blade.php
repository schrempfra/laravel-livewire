<div>
    <div class="bg-white search-header">
        <div class="container mx-auto px-4 md:px-8 pt-12 md:pt-24 pb-12 md:pb-24 w-full relative">
            <div class="text-center mb-8 md:mb-10">
                <h1
                    class="text-white mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight sm:text-4xl">
                    Lorem ipsum dolor sit!
                </h1>
            </div>
            <div class="max-w-xl w-full mx-auto">
                <label for="search" class="sr-only">Lorem ipsum dolor sit.</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input wire:model="search" id="search"
                        class="block w-full pl-10 pr-3 py-4 border border-gray-300 leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
                        placeholder="Lorem ipsum dolor sit." type="search">
                </div>
            </div>
        </div>
    </div>

    <div class="w-full">
        <div class="container mx-auto px-4 md:px-8 pt-12 md:pt-16 pb-12 md:pb-16 w-full relative">
            <div class="flex flex-col md:flex-row mb-16 md:mb-24">
                <div class="w-full">
                    <x-sort-drop-down />
                    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach ($companies as $company)
                            <li wire:click="setModal({{ $company->id }})" :wire:key="$loop->index"
                                class="col-span-1 flex flex-col text-center bg-white shadow cursor-pointer divide-y divide-gray-200">
                                <div class="flex-1 flex flex-col p-8">
                                    @if ($company->logo)
                                        <img src="{{ asset($company->logo) }}"
                                            class="rounded-full w-28 h-28 mx-auto object-cover bg-white shadow-xs border border-gray-100"
                                            alt="{{ $company->name }} logo" title="logo">
                                    @else
                                        (empty)
                                    @endif
                                    <h3 class="mt-6 text-gray-900 text-sm font-medium">{{ $company->name }}</h3>
                                    <dl class="mt-1 flex-grow flex flex-col justify-between">
                                        <dt class="sr-only">Type</dt>
                                        <dd class="text-gray-500 text-sm">
                                            <span class="px-2 py-1 text-indigo-800 text-xs font-medium bg-indigo-100 rounded-full">
                                                {{ $company->type }}
                                            </span>
                                        </dd>
                                        <dt class="sr-only"></dt>
                                        <dd class="mt-3">

                                            <livewire:open-hours :company="$company"
                                                :wire:key="'open-hours-'.$company->id" />

                                        </dd>
                                    </dl>
                                    <div class="mt-2">
                                        <livewire:closing :company="$company" :wire:key="'closing-'.$company->id">
                                    </div>
                                </div>
                                <div>
                                    <div class="-mt-px flex divide-x divide-gray-200">
                                        <div class="w-0 flex-1 flex">                                           
                                            <a href="tel:{{ $company->phone_number }}" x-data x-on:click.stop=""
                                                class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                                <!-- Heroicon name: solid/phone -->
                                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                                </svg>
                                                <span class="ml-3">Anrufen</span>
                                            </a>
                                        </div>
                                        <div class="-ml-px w-0 flex-1 flex">
                                            <a href="{{ $company->google_maps }}" x-data x-on:click.stop=""
                                                class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-red-500"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Maps
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <livewire:search-modal :company="$company" :wire:key="'search-modal-'.$company->id" />
                        @endforeach
                    </ul>
                    <div class="mt-8">
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

