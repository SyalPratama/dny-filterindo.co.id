@extends('layouts.dashboard')

@section('content')
    <div x-data="{
        openAdd: false,
        openEdit: false,
        product: {
            id: '',
            name: '',
            product_type_id: '',
            description: '',
            is_active: false
        }
    }" class="space-y-6">

        <div class="space-y-6">
            <header class="flex justify-between items-center bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                <div>
                    <h2 class="text-2xl font-extrabold text-slate-800">Manajemen Produk</h2>
                    <p class="text-slate-400 text-sm">Kelola katalog produk lengkap Anda.</p>
                </div>

                <div class="flex items-center gap-3">
                    <button @click="openAdd = true"
                        class="hidden md:flex bg-sage-500 hover:bg-sage-600 text-white px-6 py-3 rounded-2xl font-bold transition shadow-lg shadow-sage-500/20 items-center gap-2">
                        <i class="fa-solid fa-plus"></i> Tambah Produk
                    </button>

                    <button @click="open = true"
                        class="md:hidden p-3 bg-white rounded-2xl border border-slate-200 shadow-sm">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </header>

            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-50 md:hidden">
                    <button @click="openAdd = true" class="w-full bg-sage-500 text-white py-3 rounded-2xl font-bold">+
                        Tambah Produk</button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-50/50">
                            <tr class="text-slate-400 text-[10px] uppercase tracking-widest">
                                <th class="py-5 px-8 font-black">Nama Produk</th>
                                <th class="py-5 px-8 font-black">Tipe</th>
                                <th class="py-5 px-8 font-black">Dokumen</th>
                                <th class="py-5 px-8 font-black">Status</th>
                                <th class="py-5 px-8 font-black text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach ($products as $p)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-5 px-8 font-medium text-slate-700">{{ $p->name }}</td>
                                    <td class="py-5 px-8 text-sm text-slate-500">{{ $p->productType->name ?? '-' }}</td>

                                    <td class="py-5 px-8 flex gap-3">
                                        @if ($p->image)
                                            <button type="button" onclick="showImage('{{ asset($p->image) }}')"
                                                class="text-sage-500 hover:text-sage-700 transition-colors"
                                                title="Lihat Gambar">
                                                <i class="fa-solid fa-image text-lg"></i>
                                            </button>
                                        @else
                                            <span class="text-slate-200"><i class="fa-solid fa-image text-lg"></i></span>
                                        @endif

                                        @if ($p->pdf)
                                            <a href="{{ asset($p->pdf) }}" target="_blank"
                                                class="text-red-500 hover:text-red-700" title="Lihat PDF">
                                                <i class="fa-solid fa-file-pdf text-lg"></i>
                                            </a>
                                        @else
                                            <span class="text-slate-200"><i class="fa-solid fa-file-pdf text-lg"></i></span>
                                        @endif
                                    </td>

                                    <td class="py-5 px-8">
                                        <span
                                            class="px-3 py-1 rounded-full text-[10px] font-bold {{ $p->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                            {{ $p->is_active ? 'AKTIF' : 'NONAKTIF' }}
                                        </span>
                                    </td>

                                    <td class="py-5 px-8 text-right space-x-4">
                                        <button @click="openEdit = true; product = {{ json_encode($p) }}"
                                            class="text-slate-400 hover:text-sage-600 transition-colors">
                                            <i class="fa-solid fa-pen-to-square text-lg"></i>
                                        </button>
                                        <button type="button"
                                            onclick="confirmDelete('{{ route('products.destroy', $p) }}')"
                                            class="text-slate-400 hover:text-red-600 transition-colors">
                                            <i class="fa-solid fa-trash-can text-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-6 border-t border-slate-50">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>

        <div x-show="openAdd || openEdit" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-cloak>
            <div class="absolute inset-0 bg-slate-900/30 backdrop-blur-sm transition-opacity"
                @click="openAdd = false; openEdit = false"></div>

            <div
                class="bg-white rounded-[2rem] p-8 w-full max-w-lg shadow-[0_20px_50px_rgba(0,0,0,0.1)] relative z-10 max-h-[90vh] overflow-y-auto">
                <h3 class="text-2xl font-extrabold text-slate-800 mb-6" x-text="openEdit ? 'Edit Produk' : 'Tambah Produk'">
                </h3>

                <form :action="openEdit ? '/products/' + product.id : '{{ route('products.store') }}'" method="POST"
                    enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    <template x-if="openEdit">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <div>
                        <label class="text-[10px] font-black uppercase text-slate-400 ml-1 mb-1 block">Nama Produk</label>
                        <input type="text" name="name" x-model="product.name"
                            class="w-full bg-slate-50 border border-slate-100 rounded-2xl p-4 outline-none focus:ring-2 focus:ring-sage-500/20 focus:border-sage-500 transition"
                            required>
                    </div>

                    <div>
                        <label class="text-[10px] font-black uppercase text-slate-400 ml-1 mb-1 block">Tipe Produk</label>
                        <select name="product_type_id" x-model="product.product_type_id"
                            class="w-full bg-slate-50 border border-slate-100 rounded-2xl p-4 outline-none focus:ring-2 focus:ring-sage-500/20 focus:border-sage-500 transition"
                            required>
                            @foreach ($productTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-[10px] font-black uppercase text-slate-400 ml-1 mb-1 block">Deskripsi</label>
                        <textarea name="description" x-model="product.description"
                            class="w-full bg-slate-50 border border-slate-100 rounded-2xl p-4 outline-none focus:ring-2 focus:ring-sage-500/20 focus:border-sage-500 transition h-24 resize-none"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-3">
                            <label class="text-[10px] font-black uppercase text-slate-400 block mb-1">Gambar</label>
                            <input type="file" name="image"
                                class="w-full text-xs text-slate-500 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-[10px] file:font-bold file:bg-sage-100 file:text-sage-700 hover:file:bg-sage-200 cursor-pointer">
                        </div>
                        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-3">
                            <label class="text-[10px] font-black uppercase text-slate-400 block mb-1">PDF</label>
                            <input type="file" name="pdf"
                                class="w-full text-xs text-slate-500 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-[10px] file:font-bold file:bg-sage-100 file:text-sage-700 hover:file:bg-sage-200 cursor-pointer">
                        </div>
                    </div>

                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="is_active" :checked="product.is_active"
                            class="w-5 h-5 accent-sage-500">
                        <span class="text-sm font-medium text-slate-600 group-hover:text-slate-800 transition">Produk
                            Aktif</span>
                    </label>

                    <button type="submit"
                        class="w-full bg-slate-900 hover:bg-sage-500 text-white py-4 rounded-2xl font-bold transition-all transform active:scale-95">
                        Simpan Data Produk
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // 1. Fungsi Konfirmasi Hapus
        function confirmDelete(url) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    let form = document.createElement('form');
                    form.action = url;
                    form.method = 'POST';
                    form.innerHTML = `@csrf @method('DELETE')`;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }

        // 2. Notifikasi Otomatis (Toast) untuk Session
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });

        @if (session('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        @endif

        @if (session('error'))
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            });
        @endif

        // 3. Notifikasi jika ada Error Validasi
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                html: '<ul class="text-left text-sm">' +
                    '@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach' +
                    '</ul>'
            });
        @endif

        function showImage(url) {
            Swal.fire({
                imageUrl: url,
                imageAlt: 'Product Image',
                showConfirmButton: false, // Menghilangkan tombol OK
                showCloseButton: true, // Menambahkan tombol tutup (x) di pojok
                width: 'auto', // Menyesuaikan lebar dengan gambar
                padding: '10px',
                background: 'transparent',
                backdrop: `rgba(0,0,0,0.8)`
            });
        }
    </script>
@endsection
