<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
          <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            @forelse($events as $data)
            <!-- Card 1 -->
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
              <div class="h-56 w-full">
                <a href="{{ route('events.show', $data->id) }}">
                  <img class="mx-auto h-full w-full object-scale-down" src="{{ url('storage/'.$data->image) }}" alt="" />
                </a>
              </div>
              <div class="pt-6">

                <a href="{{ route('events.show', $data->id) }}" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white break-words line-clamp-2">{{ $data->name }}</a>

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
                        {{ date_format($date, 'D-M-Y') }}
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
            <p class="text-red">
                Event Tidak Ditemukan
            </p>
            @endforelse
        </div>
            </div>
          </div>
        </form>
      </section>
</x-app-layout>
