@props(['sortDir', 'sortField', 'campo'])

@if ($sortField == $campo)
  @if ($sortDir == 'asc')
    >
    {{-- <ion-icon src="{{ asset('ion-icon/caret-up-outline.svg') }}"></ion-icon> --}}
    {{-- <ion-icon name="chevron-up-outline"></ion-icon> --}}
    {{-- <i class="fa-solid fa-sort-up ml-2"></i> --}}
    {{-- <i class="icon chevron-up-outline ml-2"></i> --}}
  @elseif ($sortDir == 'desc')
    < {{-- <ion-icon src="{{ asset('ion-icon/caret-down-outline.svg') }}"></ion-icon> --}} {{-- <ion-icon name=" chevron-down-outline"></ion-icon> --}} {{-- <i class="fa-solid fa-sort-down ml-2"></i> --}} {{-- <i class="icon chevron-down-outline ml-2"></i> --}} @endif
  @endif
