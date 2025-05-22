@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 via-yellow-50 to-white py-8">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Detail -->
        <div class="bg-gradient-to-r from-green-600 to-green-800 text-white p-5 rounded-xl shadow-lg mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold">Detail Sanksi</h2>
        </div>

        <!-- Detail Sanksi -->
        <div class="bg-white rounded-xl shadow-lg border-l-4 border-green-600 p-6 mb-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm sm:text-base">
                <div>
                    <h4 class="text-xl font-bold text-green-800">{{ $sanksi->nama_siswa }}</h4>
                    <p class="text-gray-600 mt-1"><span class="font-medium">Nama:</span> {{ $sanksi->user->name }}</p>
                </div>
                <div>
                    <p class="text-gray-600"><span class="font-medium">Pelanggaran:</span> {{ $sanksi->pelanggaran->nama_pelanggaran }}</p>
                    <p class="text-gray-600 mt-1"><span class="font-medium">Poin:</span> 
                        <span class="inline-block bg-yellow-100 text-green-800 px-2 py-1 rounded font-semibold">{{ $sanksi->poin }}</span>
                    </p>
                </div>
                <div>
                    <p class="text-gray-600"><span class="font-medium">Guru:</span> {{ $sanksi->guru->nama }}</p>
                    <p class="text-gray-600 mt-1"><span class="font-medium">Kategori Sanksi:</span> {{ $sanksi->kategoriSanksi->nama_kategori }}</p>
                </div>
                <div>
                    <p class="text-gray-600"><span class="font-medium">Tanggal Kejadian:</span> 
                        {{ \Carbon\Carbon::parse($sanksi->tanggal_kejadian)->format('d/m/Y') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Riwayat Sanksi -->
        <div class="bg-gradient-to-r from-green-600 to-green-800 text-white p-5 rounded-xl shadow-lg mb-6">
            <h3 class="text-xl sm:text-2xl font-bold">Riwayat Sanksi Sebelumnya</h3>
        </div>

        @if ($sanksiSebelumnya->isEmpty())
            <div class="bg-white border border-green-200 rounded-xl shadow text-center p-6 text-gray-500">
                Tidak ada sanksi sebelumnya untuk siswa ini.
            </div>
        @else
            @foreach ($sanksiSebelumnya as $sanksiOld)
            <div class="bg-white border-l-4 border-yellow-400 hover:border-green-600 transition rounded-xl shadow-lg p-6 mb-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm sm:text-base">
                    <div>
                        <p class="text-gray-600"><span class="font-medium">Nama Siswa:</span> {{ $sanksiOld->nama_siswa }}</p>
                        <p class="text-gray-600 mt-1"><span class="font-medium">Kelas:</span> {{ $sanksiOld->kelas }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600"><span class="font-medium">Pelanggaran:</span> {{ $sanksiOld->pelanggaran->nama_pelanggaran }}</p>
                        <p class="text-gray-600 mt-1"><span class="font-medium">Poin:</span> 
                            <span class="inline-block bg-yellow-100 text-green-800 px-2 py-1 rounded font-semibold">{{ $sanksiOld->poin }}</span>
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-600"><span class="font-medium">Guru:</span> {{ $sanksiOld->guru->nama }}</p>
                        <p class="text-gray-600 mt-1"><span class="font-medium">Kategori Sanksi:</span> {{ $sanksiOld->kategoriSanksi->nama_kategori }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600"><span class="font-medium">Tanggal Kejadian:</span> 
                            {{ \Carbon\Carbon::parse($sanksiOld->tanggal_kejadian)->format('d/m/Y') }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        @endif

        <!-- Tombol Kembali -->
        <div class="mt-8 text-center">
            <a href="{{ route('sanksi.index') }}" 
               class="inline-block px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-lg transition duration-200">
                Kembali ke Data Sanksi
            </a>
        </div>
    </div>
</div>
@endsection