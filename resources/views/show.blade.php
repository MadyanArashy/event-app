<x-app-layout>
    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
          <button class="px-3 py-2 rounded bg-gray-950 dark:bg-gray-50 bg-opacity-10"  onclick="history.back()">
            &laquo; Kembali
          </button>
          <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
            <div class="sm:min-w-full max-w-md lg:max-w-xl mx-auto">
              <img src="{{ url('storage/'.$event->image) }}" alt="Foto Tidak Ditemukan" class="w-[50%] lg:w-[75%] mx-auto max-h-64 md:max-h-96 lg:max-h-128 object-contain">
            </div>

            <div class="mt-6 sm:mt-8 lg:mt-0">
              <h1
                class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white mb-1"
              >
                {{ $event->name }}
              </h1>

                <x-status-button :available="($event->date > date('Y-m-d'))"/>

              <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                {{-- <button
                  data-modal-target="edit-table" data-modal-toggle="edit-table"
                  class="flex items-center justify-center py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                  type="button"
                >
                <svg class="w-6 h-6 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z"/>
                </svg>
                Edit Event
                </button> --}}

                <x-primary-button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'edit-event')"
                >
                <svg class="w-6 h-6 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z"/>
                </svg>
                {{ __('Edit Event') }}
                </x-primary-button>

                <x-danger-button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'delete-event')"
                >
                <svg class="w-6 h-6 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                </svg>
                {{ __('Hapus Event') }}
                </x-danger-button>
              </div>

              <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

              <p class="mb-6 text-gray-500 dark:text-gray-400">
              📍Tanggal: {{ $event->date }}
              </p>
              <p class="mb-6 text-gray-500 dark:text-gray-400">
              📍Lokasi: {{ $event->location }}
              </p>
              <p class="text-gray-500 dark:text-gray-400">
               {{ $event->desc }}
              </p>
          </div>
        </div>
        </div>
      </section>
      <x-modal name="edit-event" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <section class="bg-white dark:bg-gray-900 sm:p-5 rounded-2xl">
            <button type="button" class="text-gray-200 rounded-full text-3xl w-4" data-modal-hide="edit-table">
              x
              <span class="sr-only">Tutup Modal</span>
            </button>
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
              <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                {{-- @csrf memastikan bahwa request yang dikirimkan ke server berasal dari formulir yang sah --}}
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                  <div class="w-full">
                      <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Nama <span class="text-red-500" aria-disabled="true">*</span></label>
                      <input type="text" name="name" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tuliskan nama" required="" value="{{ $event->name }}">
                  </div>
                  <div class="w-full">
                      <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Lokasi <span class="text-red-500" aria-disabled="true">*</span></label>
                      <input type="text" name="location" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" placeholder="Jl. Poras no. 19" required="" value="{{ $event->location }}">
                  </div>
                  <div class="w-full">
                      <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Tanggal <span class="text-red-500" aria-disabled="true">*</span></label>
                      <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" placeholder="Bar" required="" value="{{ $event->date }}">
                  </div>
                  <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image"> Foto <span class="text-red-500" aria-disabled="true">*</span></label>
                      <input type="file" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                      file:py-2 file:px-4
                      file:rounded-lg file:border-0
                      file:text-sm file:font-semibold file:text-gray-100
                      file:bg-green-800 file:text-white-700
                      hover:file:bg-green-900 hover:file:bg-opacity-80" id="image">
                  </div>
                  <div class="sm:col-span-2">
                      <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Deskripsi <span class="text-red-500" aria-disabled="true">*</span> </label>
                      <textarea name="desc" id="desc" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan deskripsi Anda disini">{{$event->desc}}</textarea>
                  </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Update
                </button>
              </form>
            </div>
          </section>
      </x-modal>
      <x-modal name="delete-event" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('events.destroy', $event) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Apakah Anda yakin ingin menghapus event ini?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Saat event dihapus, semua data dan foto akan dihapus dan tidak bisa dikembalikan lagi.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Hapus') }}
                </x-danger-button>
            </div>
        </form>
      </x-modal>

</x-app-layout>
