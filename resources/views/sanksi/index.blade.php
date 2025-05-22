@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 via-yellow-50 to-white">  
    <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">  

        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-4">  
            <h2 class="text-2xl sm:text-3xl font-bold text-green-800">Data Sanksi Siswa</h2>  

            <div class="flex flex-col sm:flex-row gap-3">  
                <!-- Pencarian Nama -->
                <form action="{{ route('sanksi.index') }}" method="GET" class="relative flex">
                    <input type="text" name="search" placeholder="Cari nama siswa..." value="{{ request('search') }}"
                        class="w-full md:w-64 px-4 py-2 rounded-l-lg border border-green-300 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                        required>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-r-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                    <input type="hidden" name="search_by" value="nama_siswa">
                </form>

                <!-- Tombol Tambah -->
                <a href="{{ route('sanksi.create') }}"
                    class="inline-flex items-center px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Sanksi
                </a>
            </div>
        </div>

        <!-- Notifikasi Pencarian -->
        @if(request('search'))
        <div class="mb-4 bg-yellow-50 border border-yellow-200 p-3 rounded-lg flex items-center justify-between">
            <div class="flex items-center text-sm text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 mr-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Hasil pencarian nama siswa: <span class="font-medium text-green-800 ml-1">"{{ request('search') }}"</span>
            </div>
            <a href="{{ route('sanksi.index') }}"
                class="text-sm text-green-600 hover:text-green-800 font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
                Reset Pencarian
            </a>
        </div>
        @endif

        <!-- Alert Sukses -->
        @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 p-4 rounded-lg mb-6 shadow-sm">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ session('success') }}
            </div>
        </div>
        @endif

        <!-- Konten Tabel -->
        <div class="bg-white rounded-xl shadow-xl overflow-hidden">
            <!-- Mobile Card View -->
            <div class="block lg:hidden">
                @forelse($sanksi as $s)
                <div class="p-4 border-b border-yellow-100 hover:bg-green-50 transition">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-medium text-green-900 text-lg">{{ $s->nama_siswa }}</span>
                        <span class="px-2 py-1 bg-yellow-100 text-green-800 rounded-full text-sm">{{ $s->poin ?? 0 }} poin</span>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-sm mb-3">
                      <tr>
                         <th class="px-4 py-3 text-left text-sm font-medium ">Nama Siswa:</th>
                         </tr>
                         <tr>
                        <td class="px-4 py-3 text-sm text-gray-800 font-bold">{{ $s->user->name }}
                        </td>
                        </tr>
                        <div><span class="text-gray-500">Tanggal:</span> <span class="font-medium">{{ \Carbon\Carbon::parse($s->tanggal_kejadian)->format('d/m/Y') }}</span></div>
                        <div><span class="text-gray-500">Pelanggaran:</span> <span class="font-medium">{{ optional($s->pelanggaran)->nama_pelanggaran ?? '-' }}</span></div>
                        <div><span class="text-gray-500">Kategori:</span> <span class="font-medium">{{ optional($s->kategoriSanksi)->nama_kategori ?? '-' }}</span></div>
                        <div><span class="text-gray-500">Guru:</span> <span class="font-medium">{{ optional($s->guru)->nama ?? '-' }}</span></div>
                    </div>
                    <div class="flex items-center justify-end space-x-2">
                        <a href="{{ route('sanksi.show', $s->id) }}"
                            class="inline-flex items-center px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white text-sm rounded-md">
                            Info
                        </a>
                        <form action="{{ route('sanksi.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-3 py-1.5 bg-yellow-600 hover:bg-yellow-700 text-white text-sm rounded-md">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="px-4 py-8 text-center text-gray-500">
                    <p>{{ request('search') ? 'Tidak ada siswa dengan nama "'.request('search').'"' : 'Tidak ada data sanksi.' }}</p>
                </div>
                @endforelse
            </div>

            <!-- Desktop Table View -->
            <div class="hidden lg:block">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-yellow-100 border-b border-yellow-200">
                            <th class="px-3 py-3 text-left text-xs font-semibold text-green-900">No</th>
                            <th class="px-3 py-3 text-left text-xs font-semibold text-green-900">Nama Siswa</th>
                            <th class="px-3 py-3 text-left text-xs font-semibold text-green-900">Kelas</th>
                            <th class="px-3 py-3 text-left text-xs font-semibold text-green-900">Pelanggaran</th>
                            <th class="px-3 py-3 text-center text-xs font-semibold text-green-900">Poin</th>
                            <th class="px-3 py-3 text-left text-xs font-semibold text-green-900">Guru</th>
                            <th class="px-3 py-3 text-left text-xs font-semibold text-green-900">Kategori</th>
                            <th class="px-3 py-3 text-center text-xs font-semibold text-green-900">Tanggal</th>
                            <th class="px-3 py-3 text-center text-xs font-semibold text-green-900">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-yellow-100">
                        @forelse($sanksi as $index => $s)
                        <tr class="hover:bg-green-50 transition">
                            <td class="px-3 py-2 text-xs">{{ $index + 1 }}</td>
                            <td class="px-3 py-2 text-xs font-medium text-green-900">{{ $s->nama_siswa }}</td>
                            <td class="px-3 py-2 text-xs">{{ $s->kelas }}</td>
                            <td class="px-3 py-2 text-xs truncate">{{ optional($s->pelanggaran)->nama_pelanggaran ?? '-' }}</td>
                            <td class="px-3 py-2 text-xs text-center">
                                <span class="px-2 py-1 bg-yellow-100 text-green-800 rounded-full">{{ $s->poin ?? 0 }}</span>
                            </td>
                            <td class="px-3 py-2 text-xs truncate">{{ optional($s->guru)->nama ?? '-' }}</td>
                            <td class="px-3 py-2 text-xs truncate">{{ optional($s->kategoriSanksi)->nama_kategori ?? '-' }}</td>
                            <td class="px-3 py-2 text-xs text-center">{{ \Carbon\Carbon::parse($s->tanggal_kejadian)->format('d/m/Y') }}</td>
                            <td class="px-3 py-2 text-xs text-center">
                                <div class="flex justify-center items-center space-x-1">
                                    <a href="{{ route('sanksi.show', $s->id) }}"
                                        class="inline-flex items-center px-2 py-1 bg-green-600 hover:bg-green-700 text-white text-xs rounded">
                                        Info
                                    </a>
                                    <form action="{{ route('sanksi.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-2 py-1 bg-yellow-600 hover:bg-yellow-700 text-white text-xs rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="px-4 py-8 text-center text-gray-500">
                                <p>{{ request('search') ? 'Tidak ada siswa dengan nama "'.request('search').'"' : 'Tidak ada data sanksi.' }}</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($sanksi instanceof \Illuminate\Pagination\LengthAwarePaginator && $sanksi->hasPages())
            <div class="px-4 py-3 border-t border-yellow-100">
                {{ $sanksi->appends(request()->query())->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.querySelector('input[name="search"]');
        if (searchInput) {
            searchInput.addEventListener('focus', function () {
                this.setAttribute('autocomplete', 'off');
            });
        }
    });
</script>
@endsection