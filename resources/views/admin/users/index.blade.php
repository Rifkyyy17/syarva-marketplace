<x-layouts.admin>
    <x-slot:title>Kelola User</x-slot:title>
    <x-slot:pageTitle>Kelola User</x-slot:pageTitle>

    <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
        <form method="GET" action="{{ request()->url() }}" class="flex flex-wrap items-center gap-2">
            <label class="relative">
                <x-icon name="search" class="pointer-events-none absolute left-3 top-1/2 size-4 -translate-y-1/2 text-slate-400"/>
                <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari nama, email, HP..." class="input w-56! pl-9! py-2! text-sm">
            </label>
            <select name="role" class="input w-auto! py-2! text-sm" aria-label="Filter role">
                <option value="">Semua Role</option>
                <option value="admin" @selected(request('role') === 'admin')>Admin</option>
                <option value="user" @selected(request('role') === 'user')">Pembeli</option>
            </select>
            <select name="status" class="input w-auto! py-2! text-sm" aria-label="Filter status">
                <option value="">Semua Status</option>
                <option value="active" @selected(request('status') === 'active')>Aktif</option>
                <option value="suspended" @selected(request('status') === 'suspended')>Ditangguhkan</option>
            </select>
            <button type="submit" class="btn-outline btn-sm">Filter</button>
        </form>
        <a href="{{ route('admin.users.create') }}" class="btn-primary btn-sm">
            <x-icon name="plus" class="size-4"/> Tambah User
        </a>
    </div>

    @if ($users->isNotEmpty())
        <div class="card overflow-hidden">
            <div class="table-wrap">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="th">User</th>
                            <th class="th hidden md:table-cell">Kontak</th>
                            <th class="th">Role</th>
                            <th class="th">Status</th>
                            <th class="th hidden sm:table-cell">Listing</th>
                            <th class="th hidden lg:table-cell">Bergabung</th>
                            <th class="th text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($users as $user)
                            <tr class="hover:bg-slate-50/60">
                                <td class="td">
                                    <div class="flex items-center gap-3">
                                        <span class="grid size-10 shrink-0 place-items-center overflow-hidden rounded-full bg-primary-700 text-sm font-bold text-white">
                                            @if ($user->avatar)
                                                <img src="{{ Storage::disk('public')->url($user->avatar) }}" alt="" class="size-full object-cover">
                                            @else
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            @endif
                                        </span>
                                        <div class="min-w-0">
                                            <p class="truncate text-sm font-semibold text-slate-800">{{ $user->name }}</p>
                                            <p class="truncate text-xs text-slate-400">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="td hidden whitespace-nowrap md:table-cell">{{ $user->phone ?? '-' }}</td>
                                <td class="td"><x-badge :status="$user->role"/></td>
                                <td class="td"><x-badge :status="$user->status"/></td>
                                <td class="td hidden whitespace-nowrap sm:table-cell">{{ $user->listings_count }}</td>
                                <td class="td hidden whitespace-nowrap lg:table-cell">{{ $user->created_at->translatedFormat('d M Y') }}</td>
                                <td class="td text-right" x-data="{ open: false }">
                                    <div class="relative inline-block text-left" @click.outside="open = false">
                                        <button type="button" class="btn-outline btn-sm" @click="open = !open">
                                            Aksi <x-icon name="chevron-down" class="size-3.5"/>
                                        </button>
                                        <div x-show="open" x-transition class="absolute right-0 z-20 mt-1 w-48 overflow-hidden rounded-xl border border-slate-200 bg-white py-1 text-left shadow-lg" x-cloak>
                                            <a href="{{ route('admin.users.edit', $user) }}" class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">
                                                <x-icon name="pencil" class="mr-1.5 inline size-4"/> Edit
                                            </a>
                                            @if ($user->id !== auth()->id())
                                                <form method="POST" action="{{ route('admin.users.toggle-status', $user) }}" class="border-t border-slate-100">
                                                    @csrf
                                                    <button type="submit" class="block w-full px-4 py-2 text-left text-sm {{ $user->status === 'active' ? 'text-red-600 hover:bg-red-50' : 'text-emerald-700 hover:bg-emerald-50' }}">
                                                        <x-icon :name="$user->status === 'active' ? 'ban' : 'check-circle'" class="mr-1.5 inline size-4"/>
                                                        {{ $user->status === 'active' ? 'Tangguhkan' : 'Aktifkan' }}
                                                    </button>
                                                </form>
                                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50" @click.prevent="$dispatch('confirm-action', { form: $el.closest('form'), message: 'Hapus user ini beserta seluruh datanya?' })">
                                                        <x-icon name="trash" class="mr-1.5 inline size-4"/> Hapus
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    @else
        <x-empty-state title="User tidak ditemukan" message="Tidak ada user yang cocok dengan filter Anda." icon="users"/>
    @endif
</x-layouts.admin>