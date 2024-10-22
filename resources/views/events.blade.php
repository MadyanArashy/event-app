<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tabel Event') }}
        </h2>
    </x-slot>
<x-events-table>
    @foreach($events as $data)
    <tr class="border-b dark:border-gray-700 cursor-pointer hover:text-gray-700 dark:hover:text-gray-100" onclick="window.location.href='{{ route('events.show', $data->id) }}';">
        <td class="px-4 py-3">{{ $loop->iteration }}</td>
        <td class="px-4 py-3">{{ $data->name }}</td>
        <td class="px-4 py-3 text-nowrap">
            @php
                $date = date_create($data->date)
            @endphp
            {{ date_format($date, 'D-M-Y') }}
        </td>
        <td class="px-4 py-3">{{ $data->location }}</td>
        <td class="px-4 py-3 max-w-lg">
            <img src="storage/{{ $data->image }}" alt="Tidak ditemukan" class="min-w-24 lg:w-[75%]">
        </td>
        @php
            if ($data->date > date("Y-m-d")) {
                $available = 'Tersedia';
            } else {
                $available = 'Habis';
            }
        @endphp
        <td class="px-4 py-3">
            <span class="badge text-gray-50 px-4 py-2 rounded-full select-none text-nowrap mr-5
                @if ($available == 'Tersedia') bg-green-900
                @elseif ($available == 'Habis') bg-red-900
                @else bg-gray-400 @endif">
                {{ $available }}
            </span>
        </td>
    </tr>
    @endforeach
</x-events-table>
</x-app-layout>
