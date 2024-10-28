<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12 max-w-screen-xl mx-auto">
        <div class="w-full md:w-1/2">
            <form action="{{ route('dashboard') }}" method="GET" class="flex items-center">
                <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
                </div>
                    <input type="text" name="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Cari event..." value="{{ request('search') }}">
                </div>
                <x-primary-button type="submit">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 2a1 1 0 0 1 .932.638l7 18a1 1 0 0 1-1.326 1.281L13 19.517V13a1 1 0 1 0-2 0v6.517l-5.606 2.402a1 1 0 0 1-1.326-1.281l7-18A1 1 0 0 1 12 2Z" clip-rule="evenodd"/>
                    </svg>
                </x-primary-button>
            </form>
            @if(count($events) > 0)
            <p class="text-gray-600 dark:text-gray-200">Menampilkan <span class="text-primary-700 dark:text-primary-400">{{count($events)}}</span> dari <span class="text-primary-700 dark:text-primary-400">{{$total}}</span> event.</p>
            @endif
        </div>
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
          <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            @forelse($events as $data)
            <!-- Card 1 -->
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
              <div class="hidden sm:block h-56 w-full">
                <a href="{{ route('events.show', $data->id) }}">
                  <img class="mx-auto h-full w-full object-scale-down" src="{{ url('storage/'.$data->image) }}" alt="" />
                </a>
              </div>
              <div class="pt-6">

                <a href="{{ route('events.show', $data->id) }}" class="text-lg font-semibold leading-tight text-gray-900 hover:underline decoration-current dark:text-white break-words line-clamp-2">{{ $data->name }}</a>

                <ul class="mt-2 flex-col items-center gap-4">
                  <li class="flex items-center gap-2">
                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400 min-w-6 min-h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                    </svg>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 text-ellipsis overflow-hidden whitespace-nowrap max-w-full">
                        {{ $data->location }}
                    </p>

                  </li>

                  <li class="flex items-center gap-2">
                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400 min-w-6 min-h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                    </svg>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        @php
                        $date = date_create($data->date)
                        @endphp
                        {{ date_format($date, 'd M Y') }}
                    </p>
                  </li>
                  <li class="items-center gap-2">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 break-words line-clamp-4">
                        {{ $data->desc }}
                    </p>
                  </li>
                </ul>
              </div>
            </div>
            {{-- End of Card --}}
            @empty
            <p class="text-red-400">
                Tidak Ada Event yang Ditemukan
            </p>
            @endforelse
        </div>
            </div>
          </div>
        </form>
      </section>
</x-app-layout>
