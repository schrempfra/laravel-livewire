@props([
    'eventToOpenModal' => null,
    'livewireEventToOpenModal' => null,
    'modalTitle',
    'company',
])

<div x-cloak x-data="{ isOpen: false }" x-show="isOpen" @keydown.escape.window="isOpen = false"
    @if ($eventToOpenModal) {{ '@' . $eventToOpenModal }}.window="
                isOpen = true
                $nextTick(() => $refs.confirmButton.focus())
            " @endif
    x-init="@if ($livewireEventToOpenModal) Livewire.on('{{ $livewireEventToOpenModal }}', () => {
                    isOpen = true
                }) @endif" class="fixed z-20 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true" class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class=" items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center block sm:p-0">
        <div x-show.transition.opacity.duration.300ms="isOpen"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="sm:inline-block align-middle min-h-screen" aria-hidden="true">&#8203;</span>

        <div x-show.transition.opacity.duration.300ms="isOpen"
            class="relative inline-block bg-white px-4 pt-5 pb-4 text-left overflow-x-auto shadow-xl transform transition-all my-8 align-middle max-w-lg w-full p-6">
            <div>
                <div class="mx-auto flex items-center justify-center h-20 w-20">
                    <img src="{{ asset($company->logo) }}"
                        class="rounded-full object-cover w-full h-full bg-white shadow-xs border border-gray-100"
                        alt=" logo" title=" logo">
                </div>
                <div class="mt-3 sm:mt-5">
                    <h3 class="text-xl text-center leading-6 font-extrabold text-gray-900" id="modal-title">
                        {{ $modalTitle }}</h3>
                    <div class="mt-4 max-w-sm text-center mx-auto">
                        {!! $company->description !!}
                    </div>
                </div>
                <div
                    class="flex flex-row mt-4 md:whitespace-nowrap relative justify-center items-center text-gray-500 space-x-4">
                    <div>
                        @if ($company->website)
                            <a href="{{ $company->website }}"
                                class="p-2 flex items-center text-sm text-gray-500 sm:mt-0" x-data x-on:click.stop="">
                                <svg class="flex-shrink-0 flex-shrink-0 h-6 w-6 text-gray-400" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="3.6" y1="9" x2="20.4" y2="9" />
                                    <line x1="3.6" y1="15" x2="20.4" y2="15" />
                                    <path d="M11.5 3a17 17 0 0 0 0 18" />
                                    <path d="M12.5 3a17 17 0 0 1 0 18" />
                                </svg>
                            </a>
                        @endif
                    </div>
                    <div>
                        @if ($company->facebook)
                            <a href="{{ $company->facebook }}"
                                class="p-2 flex items-center text-sm text-gray-500 sm:mt-0" x-data x-on:click.stop="">
                                <svg class="flex-shrink-0 h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                    <div>
                        @if ($company->twitter)
                            <a href="{{ $company->twitter }}"
                                class="p-2 flex items-center text-sm text-gray-500 sm:mt-0" x-data x-on:click.stop="">
                                <svg class="flex-shrink-0 h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                    <div>
                        @if ($company->instagram)
                            <a href="{{ $company->instagram }}"
                                class="p-2 flex items-center text-sm text-gray-500 sm:mt-0" x-data x-on:click.stop="">
                                <svg class="flex-shrink-0 h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                                </svg>
                            </a>
                        @endif
                    </div>
                    <div>
                        @if ($company->phone_number)
                            <a href="tel:{{ $company->phone_number }}"
                                class="p-2 flex items-center text-sm text-gray-500 sm:mt-0" x-data x-on:click.stop="">
                                <svg class="flex-shrink-0 h-6 w-6" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                    <path d="M15 6h6m-3 -3v6" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-5 flex justify-end">
                <button @click="isOpen = false" type="button"
                    class="mt-3 w-full border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Schließen
                </button>
            </div>
        </div>
    </div>
</div>
