<x-modal-confirm
    livewire-event-to-open-modal="searchModalOpen{{ $company->id }}"
    modal-title="{{ $company->name }}"
    :company="$company"
/>