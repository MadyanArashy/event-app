<section class="bg-white dark:bg-gray-900 sm:p-5">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @csrf memastikan bahwa request yang dikirimkan ke server berasal dari formulir yang sah --}}
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
          <div class="w-full">
              <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Pelapor <span class="text-red-500" aria-disabled="true">*</span></label>
              <input type="text" name="pelapor" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tuliskan nama" required="">
          </div>
          <div class="w-full">
              <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Terlapor <span class="text-red-500" aria-disabled="true">*</span></label>
              <input type="text" name="terlapor" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" placeholder="Foo" required="">
          </div>
          <div class="w-full">
              <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Kelas <span class="text-red-500" aria-disabled="true">*</span></label>
              <input type="text" name="kelas" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" placeholder="Bar" required="">
          </div>
          <div>
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image"> Bukti <span class="text-red-500" aria-disabled="true">*</span></label>
              <input type="file" name="foto" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
              file:py-2 file:px-4
              file:rounded-lg file:border-0
              file:text-sm file:font-semibold file:text-gray-100
              file:bg-red-800 file:text-white-700
              hover:file:bg-red-900 hover:file:bg-opacity-80" id="image">
          </div>
          <div class="sm:col-span-2">
              <label for="laporan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Laporan <span class="text-red-500" aria-disabled="true">*</span> </label>
              <textarea name="laporan" id="laporan" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan deskripsi Anda disini"></textarea>
          </div>
        </div>
        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Laporkan
        </button>
      </form>
    </div>
  </section>
