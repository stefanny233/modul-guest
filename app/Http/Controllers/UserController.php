<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $q       = $request->input('q');
        $from    = $request->input('from');
        $to      = $request->input('to');
        $perPage = (int) $request->input('per_page', 12);

        // pastikan perPage memiliki nilai wajar
        $allowed = [6, 12, 24, 48];
        if (! in_array($perPage, $allowed)) {
            $perPage = 12;
        }

        $query = User::query();

        if ($q) {
            $query->where(function ($qb) use ($q) {
                $qb->where('name', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            });
        }

        if ($from) {
            $query->whereDate('created_at', '>=', $from);
        }
        if ($to) {
            $query->whereDate('created_at', '<=', $to);
        }

        $query->orderBy('created_at', 'desc');

        $users = $query->paginate($perPage)->withQueryString();

        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('pages.users.create'); // pastikan file view ini ada
    }

    public function show()
    {
//
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // BALIK KE INDEX DENGAN PESAN SUKSES
        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    // TAMPILKAN FORM EDIT
    public function edit(User $user)
    {
        return view('pages.users.edit', compact('user'));
    }

    // PERBARUI DATA → KEMBALI KE INDEX
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        // BALIK KE INDEX DENGAN PESAN SUKSES
        return redirect()
            ->route('users.index')
            ->with('success', 'Data user berhasil diperbarui.');
    }

    // HAPUS DATA → TETAP DI INDEX
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil dihapus.');
    }
}
