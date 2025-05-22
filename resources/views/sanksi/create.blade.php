@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 via-yellow-50 to-white py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-6 flex items-center justify-between">
            <h2 class="text-2xl sm:text-3xl font-bold text-green-800">Tambah Sanksi Baru</h2>
            <a href="{{ route('sanksi.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-lg transition-all duration-300 hover:shadow-md">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-xl shadow-xl p-6 sm:p-8">
            <form action="{{ route('sanksi.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Autocomplete Nama Siswa -->
                    <div class="space-y-2 relative">
                          <label for="search" class="block text-sm font-medium text-green-800">Nama Siswa</label>
                          <input type="text" id="search" autocomplete="off"
                          placeholder="Cari nama siswa..." 
                          class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200">
                          <input type="hidden" name="user_id" id="user_id">
                          <div id="search_list" 
                          class="absolute z-10 bg-white w-full border border-gray-200 rounded shadow-md max-h-48 overflow-y-auto">
                         </div>
                         @error('user_id')
                         <p class="text-red-500 text-xs italic">{{ $message }}</p>
                         @enderror
                        </div>
                    
                    <!-- Pelanggaran -->
                    <div class="space-y-2">
                        <label for="pelanggaran_id" class="block text-sm font-medium text-green-800">Jenis Pelanggaran</label>
                        <select id="pelanggaran_id" name="pelanggaran_id" required 
                                class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200">
                            <option value="">Pilih Pelanggaran</option>
                            @foreach($pelanggaran as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_pelanggaran }} ({{ $p->poin }} poin)</option>
                            @endforeach
                        </select>
                        @error('pelanggaran_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Guru -->
                    <div class="space-y-2">
                        <label for="guru_id" class="block text-sm font-medium text-green-800">Guru Pelapor</label>
                        <select id="guru_id" name="guru_id" required 
                                class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200">
                            <option value="">Pilih Guru</option>
                            @foreach($guru as $g)
                                <option value="{{ $g->id }}">{{ $g->nama }}</option>
                            @endforeach
                        </select>
                        @error('guru_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori Sanksi -->
                    <div class="space-y-2">
                        <label for="kategori_sanksi_id" class="block text-sm font-medium text-green-800">Kategori Sanksi</label>
                        <select id="kategori_sanksi_id" name="kategori_sanksi_id" required 
                                class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200">
                            <option value="">Pilih Kategori</option>
                            @foreach($kategoriSanksi as $ks)
                                <option value="{{ $ks->id }}">{{ $ks->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_sanksi_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Kejadian -->
                    <div class="space-y-2">
                        <label for="tanggal_kejadian" class="block text-sm font-medium text-green-800">Tanggal Kejadian</label>
                        <input type="date" id="tanggal_kejadian" name="tanggal_kejadian" required 
                               class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200">
                        @error('tanggal_kejadian')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="flex justify-end mt-8">
                    <button type="submit" 
                            class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Sanksi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script Autocomplete -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#search').on('keyup', function () {
        let query = $(this).val();
        if (query.length > 0) {
            $.ajax({
                url: "{{ route('user.search') }}",
                type: "GET",
                data: { search: query },
                success: function (data) {
                    let listItems = data.map(item =>
                        `<li class="px-4 py-2 hover:bg-green-100 cursor-pointer list-item" data-id="${item.id}" data-name="${item.name}">
                            ${item.name} (${item.email})
                        </li>`
                    ).join('');
                    $('#search_list').fadeIn().html('<ul class="divide-y divide-gray-200">' + listItems + '</ul>');
                }
            });
        } else {
            $('#search_list').fadeOut();
        }
    });

    $(document).on('click', '.list-item', function () {
        $('#search').val($(this).data('name'));
        $('#user_id').val($(this).data('id'));
        $('#search_list').fadeOut();
    });
});
</script>
@endsection