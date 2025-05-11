<?php

namespace App\Http\Controllers;

use App\Models\Statistik;
use App\Models\KategoriStatistik;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    /**
     * Menampilkan halaman statistik
     */
    public function index(Request $request)
    {
        $query = Statistik::orderBy('tahun', 'desc')
            ->orderBy('judul', 'asc');

        // Filter berdasarkan pencarian
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $statistik = $query->paginate(10);
        $kategori = KategoriStatistik::orderBy('urutan', 'asc')->get();

        // Data untuk grafik
        $pendudukData = Statistik::where('judul', 'like', '%Penduduk%')
            ->where('tahun', 2023)
            ->get();

        $pendidikanData = Statistik::where('judul', 'like', '%Berpendidikan%')
            ->where('tahun', 2023)
            ->get();

        $chartData = [
            'gender' => [
                'labels' => ['Laki-laki', 'Perempuan'],
                'data' => [
                    $pendudukData->where('judul', 'Jumlah Penduduk Laki-laki')->first()->nilai ?? 0,
                    $pendudukData->where('judul', 'Jumlah Penduduk Perempuan')->first()->nilai ?? 0,
                ],
            ],
            'pendidikan' => [
                'labels' => ['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2/S3'],
                'data' => [
                    $pendidikanData->where('judul', 'Penduduk Berpendidikan SD')->first()->nilai ?? 0,
                    $pendidikanData->where('judul', 'Penduduk Berpendidikan SMP')->first()->nilai ?? 0,
                    $pendidikanData->where('judul', 'Penduduk Berpendidikan SMA')->first()->nilai ?? 0,
                    $pendidikanData->where('judul', 'Penduduk Berpendidikan D3')->first()->nilai ?? 0,
                    $pendidikanData->where('judul', 'Penduduk Berpendidikan S1')->first()->nilai ?? 0,
                    $pendidikanData->where('judul', 'Penduduk Berpendidikan S2/S3')->first()->nilai ?? 0,
                ],
            ],
        ];

        if ($request->ajax()) {
            return response()->json([
                'html' => view('statistik.partials.statistik-list', compact('statistik'))->render(),
                'pagination' => view('statistik.partials.pagination', compact('statistik'))->render(),
            ]);
        }

        return view('statistik.index', compact('statistik', 'kategori', 'chartData'));
    }

    /**
     * Menampilkan statistik berdasarkan kategori
     */
    public function kategori(Request $request, $kategori)
    {
        $kategori_data = KategoriStatistik::where('slug', $kategori)->firstOrFail();

        $query = Statistik::where('kategori_statistik_id', $kategori_data->id)
            ->orderBy('tahun', 'desc')
            ->orderBy('judul', 'asc');

        // Filter berdasarkan pencarian
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $statistik = $query->paginate(10);
        $semua_kategori = KategoriStatistik::orderBy('urutan', 'asc')->get();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('statistik.partials.statistik-list', compact('statistik'))->render(),
                'pagination' => view('statistik.partials.pagination', compact('statistik'))->render(),
            ]);
        }

        return view('statistik.kategori', compact('statistik', 'kategori_data', 'semua_kategori'));
    }
}
