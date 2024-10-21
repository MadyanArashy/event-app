<x-app-layout>
    <x-events-table>
        <tr class="border-b dark:border-gray-700">
    <td class="px-4 py-3">Lorem.</td>
    <td class="px-4 py-3 text-nowrap">Lorem.</td>
    <td class="px-4 py-3 text-nowrap">Lorem.</td>
    <td class="px-4 py-3 text-nowrap">Lorem.</td>
    <td class="px-4 py-3">Lorem.</td>
    <td class="px-4 py-3">
        <img src="storage/{{ __('Image') }}" alt="Tidak ditemukan" width="150">
    </td>
    <td class="px-4 py-3">
        <span class="badge text-gray-50 px-4 py-2 rounded-full select-none text-nowrap mr-5
        @ts-ignore
            @if ('Belum Di Baca' == 'Belum Di Baca') bg-red-900
            @elseif ('Belum Di Baca' == 'Tinjauan Berlangsung') bg-yellow-600
            @elseif ('Belum Di Baca' == 'Selesai Di Tinjau') bg-green-900
            @else bg-gray-400 @endif">
            {{ 'Belum Di Baca' }}
        </span>
    </td>
    </tr>
    </x-events-table>
</x-app-layout>
