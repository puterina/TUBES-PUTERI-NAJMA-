<?php

namespace App\Http\Controllers;

use App\Models\Housekeeper;
use Illuminate\Http\Request;

class HousekeeperController extends Controller
{
    private function rules(): array
    {
        return [
            'nama'            => 'required|string|max:100',
            'no_hp'           => ['required', 'regex:/^[0-9]{10,15}$/'],
            'alamat'          => 'nullable|string',
            'shift'           => 'required|in:pagi,siang,malam',
            'tugas_harian'    => 'required|string',
            'area_penanganan' => 'required|string|max:100',
            'status'          => 'required|in:aktif,nonaktif',
        ];
    }

    public function index(Request $request)
{
    $housekeepers = Housekeeper::query()
        ->when($request->search, function ($q, $search) {
            $q->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('area_penanganan', 'like', "%{$search}%");
            });
        })
        ->when($request->shift, fn ($q, $shift) => $q->where('shift', $shift))
        ->latest()
        ->paginate(10)
        ->withQueryString();

    $stats = [
        'total'    => Housekeeper::count(),
        'aktif'    => Housekeeper::where('status', 'aktif')->count(),
        'nonaktif' => Housekeeper::where('status', 'nonaktif')->count(),
    ];

    return view('housekeepers.index', compact('housekeepers', 'stats'));
}
    public function create()
    {
        return view('housekeepers.create');
    }

    public function store(Request $request)
    {
        Housekeeper::create($request->validate($this->rules()));

        return redirect()->route('housekeepers.index')
            ->with('success', 'Data housekeeper berhasil ditambahkan.');
    }

    public function edit(Housekeeper $housekeeper)
    {
        return view('housekeepers.edit', compact('housekeeper'));
    }   

    public function update(Request $request, Housekeeper $housekeeper)
    {
        $housekeeper->update($request->validate($this->rules()));

        return redirect()->route('housekeepers.index')
            ->with('success', 'Data housekeeper berhasil diubah.');
    }

    public function destroy(Housekeeper $housekeeper)
    {
        $housekeeper->delete();

        return redirect()->route('housekeepers.index')
            ->with('success', 'Data housekeeper berhasil dihapus.');
    }
}