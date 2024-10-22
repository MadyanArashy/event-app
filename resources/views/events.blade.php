<x-app-layout>
    <h1 class="font-black text-4xl text-center dark:text-gray-100 mb-3 mono mt-9">Daftar Event</h1>
<x-events-table>
    @foreach($events as $data)
    <tr class="border-b dark:border-gray-700 cursor-pointer hover:text-gray-700 dark:hover:text-gray-100" onclick="window.location.href='{{ route('events.show', $data->id) }}';">
        <td class="px-4 py-3">{{ $loop->iteration }}</td>
        <td class="px-4 py-3 truncate ">{{ $data->name }}</td>
        <td class="px-4 py-3 text-nowrap">{{ $data->date }}</td>
        <td class="px-4 py-3">{{ $data->location }}</td>
        <td class="px-4 py-3">
            <img src="storage/{{ $data->image }}" alt="Tidak ditemukan" width="150">
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
