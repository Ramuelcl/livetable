<div>
  <div class="m-auto flex h-auto flex-grow justify-between overflow-hidden border px-4 align-middle shadow">
    @isset($regs)
      @include('livewire.backend.selectXPage')
      @endif

      {{-- {{ $search }} --}}
      @if ($bSearch)
        @livewire('backend.live-search')
      @endif

      {{-- {{ $activo }} --}}
      @if ($bActive)
        <x-forms.input-checkbox idName="activeAll" label="Actives" class="mr-2" />
      @endif
      @if ($bSearch || $bActive)
        <button wire:click="fncClear()" class="btn btn-green justify-between text-xs"><i
            class="fa-solid fa-eraser">C</i>{{ __($display['clear']) }}</button>
      @endif
    </div>

    <x-forms.table caption="Usuarios">
      <x-slot name="titles">
        <tr class="px-6 py-3 text-left text-xs font-medium tracking-wider">
          @foreach ($fields as $field)
            @if ($field['table']['display'])
              @php
                // valida el campo a ordenar; si existe le pone cursor-pointer
                $orden = in_array($field['name'], $fieldsOrden) ? $field['name'] : null;
                $uppercase = $field['name'] == $sortField ? 'uppercase font-bold' : 'capitalize';
              @endphp

              @if ($field['name'] == 'is_active')
                @if (!$activeAll)
                  <th scope="col">
                    {{ __($field['table']['titre']) }}
                  </th>
                @else
                  <th scope="col">
                  </th>
                @endif
              @else
                <th wire:click="fncOrden('{{ $orden }}')" scope="col"
                  class="{{ $orden ? 'cursor-pointer' : '' }} {{ $uppercase }}">
                  {{ __($field['table']['titre']) }}
                  <x-sort-icon campo="{{ $field['name'] }}" :sortDir="$sortDir" :sortField="$sortField" />
                </th>
              @endif
            @endif
          @endforeach
          <th class="mx-4 flex justify-between py-2" colspan="2" scope="colgroup">
            {{ __('actions') }}
            {{-- @hasanyrole('admin') --}}
            <button wire:click="fncNewEdit(0)" class="btn btn-blue w-min-7 justify-between"><i
                class="fa-solid fa-plus">+</i>
              <div class="">
                {{ __($display['new']) }}
              </div>
            </button>
            {{-- @endhasanyrole --}}
          </th>
        </tr>
      </x-slot>
      @foreach ($regs as $key => $reg)
        @php
          $cl = ($key + 1) % 2 === 0 ? '50' : '400';
        @endphp
        <tr>
          @foreach ($fields as $field)
            @if ($field['table']['display'])
              <td class="whitespace-nowrap px-2 py-4 text-sm">
                @switch($field['name'])
                  @case('id')
                    <!-- // relleno de ceros -->
                    {{ sprintf('%04d', $reg->id) }}
                    <!-- // formato con decimales -->
                    {{-- -{{ number_format($key + 1, 0, ',', '.') }} --}}
                  @break

                  @case('profile_photo_path')
                    @if (substr($reg->profile_photo_path, 0, 8) == 'https://')
                      <img class="h-10 w-10 rounded-full" src="{{ $reg->profile_photo_path }}" alt="img">
                    @else
                      <img class="h-10 w-10 rounded-full" src="{{ asset($reg->profile_photo_path) }}" alt="img">
                    @endif
                  @break

                  @case('name')
                    {{ $reg->name }}
                  @break

                  @case('email')
                    {{ $reg->email }}
                  @break

                  @case('is_active')
                    @if (!$activeAll)
                      <x-comp-estado valor="{{ $reg->is_active }}" tipo="si-no" />
                    @endif
                  @break

                  @default
                    Default case...
                @endswitch
              </td>
            @endif
          @endforeach
          <td colspan="2" scope="colgroup" class="whitespace-nowrap px-6 py-4">
            {{-- @hasanyrole('admin') --}}
            <button wire:click="fncNewEdit({{ $reg->id }})" class="btn btn-green justify-between text-xs"><i
                class="fa-solid fa-pen">E</i>
              {{ __($display['edit']) }}
            </button>
            {{-- @endhasanyrole --}}
            {{-- @hasanyrole('admin') --}}
            <button wire:click="fncDeleteConfirm({{ $reg->id }})" wire:loading.attr="disabled"
              class="btn btn-red justify-between text-xs"><i class="fa-solid fa-minus">-</i>
              {{ __($display['delete']) }}
            </button>
            {{-- @endhasanyrole --}}
          </td>

        </tr>
      @endforeach
      <x-slot name="foot">
        <td class="whitespace-nowrap px-2 py-4 text-sm text-gray-500">Regs</td>
        <td class="whitespace-nowrap px-2 py-4 text-sm text-gray-500"></td>
        <td class="whitespace-nowrap px-2 py-4 text-sm text-gray-500"></td>
        <td class="whitespace-nowrap px-2 py-4 text-sm text-gray-500">{{ $TotalRegs }}</td>
      </x-slot>
    </x-forms.table>
    @isset($regs)
      <div
        class="flex items-center justify-between px-2 py-2 align-middle text-xs text-gray-800 dark:text-gray-500 sm:px-2">
        @include('livewire.backend.selectXPage')
        {{ $regs->links() }}
      </div>
    @endisset
  </div>
