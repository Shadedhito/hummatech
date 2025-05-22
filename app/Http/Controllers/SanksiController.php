<?php

namespace App\Http\Controllers;

use App\Models\Sanksi;
use App\Models\Pelanggaran;
use App\Models\Guru;
use App\Models\KategoriSanksi;
use App\Models\User;
use Illuminate\Http\Request;

class SanksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Sanksi::with(['user', 'pelanggaran', 'guru', 'kategoriSanksi']);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        $sanksi = $query->orderBy('created_at', 'desc')->paginate(15);
        return view('sanksi.index', compact('sanksi'));
    }

    public function create()
    {
        $pelanggaran = Pelanggaran::all();
        $guru = Guru::all();
        $kategoriSanksi = KategoriSanksi::all();
        return view('sanksi.create', compact('pelanggaran', 'guru', 'kategoriSanksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'pelanggaran_id' => 'required|exists:pelanggaran,id',
            'guru_id' => 'required|exists:guru,id',
            'kategori_sanksi_id' => 'required|exists:kategori_sanksi,id',
            'tanggal_kejadian' => 'required|date',
        ]);

        $pelanggaran = Pelanggaran::findOrFail($request->pelanggaran_id);
        $poinBaru = $pelanggaran->poin;

        $totalSebelumnya = Sanksi::where('user_id', $request->user_id)->sum('poin');
        $totalPoin = $totalSebelumnya + $poinBaru;

        Sanksi::create([
            'user_id' => $request->user_id,
            'pelanggaran_id' => $request->pelanggaran_id,
            'guru_id' => $request->guru_id,
            'kategori_sanksi_id' => $request->kategori_sanksi_id,
            'tanggal_kejadian' => $request->tanggal_kejadian,
            'poin' => $totalPoin,
        ]);

        return redirect()->route('sanksi.index')->with('success', 'Data sanksi berhasil ditambahkan.');
    }
    

    public function destroy(Sanksi $sanksi)
    {
        $sanksi->delete();
        return redirect()->route('sanksi.index')->with('success', 'Data sanksi berhasil dihapus.');
    }

    public function show(Sanksi $sanksi)
    {
        $sanksi->load(['user', 'pelanggaran', 'guru', 'kategoriSanksi']);

        $sanksiSebelumnya = Sanksi::where('user_id', $sanksi->user_id)
                                  ->where('id', '!=', $sanksi->id)
                                  ->orderBy('tanggal_kejadian', 'desc')
                                  ->get();

        return view('sanksi.show', compact('sanksi', 'sanksiSebelumnya'));
    }

    public function autocomplete(Request $request)
    {
        $query = $request->query('search');

        $data = User::where('name', 'like', "%{$query}%")
                    ->select('id', 'name', 'email')
                    ->limit(10)
                    ->get();

        return response()->json($data);
    }
}