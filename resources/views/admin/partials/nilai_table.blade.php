@if($nilai->isEmpty())
    <div class="h-full flex flex-col items-center justify-center text-gray-400 p-8">
        <i class="fa-solid fa-file-excel text-5xl mb-4 opacity-50"></i>
        <p class="font-medium text-gray-500">Belum ada nilai akademik</p>
        <p class="text-sm mt-1">Input nilai melalui panel di sebelah kiri.</p>
    </div>
@else
    <table class="min-w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-200 sticky top-0">
            <tr>
                <th class="px-4 py-3 text-left font-bold text-gray-600 uppercase">Aksi</th>
                <th class="px-4 py-3 text-left font-bold text-gray-600 uppercase">Mata Pelajaran</th>
                <th class="px-4 py-3 text-left font-bold text-gray-600 uppercase">Jenis</th>
                <th class="px-4 py-3 text-left font-bold text-gray-600 uppercase">Skor</th>
                <th class="px-4 py-3 text-left font-bold text-gray-600 uppercase">Keterangan</th>
                <th class="px-4 py-3 text-left font-bold text-gray-600 uppercase">Tgl Input</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            @foreach($nilai as $n)
            <tr class="hover:bg-fuchsia-50/50 transition-colors">
                <td class="px-4 py-3 whitespace-nowrap">
                    <form action="{{ route('admin.nilai.destroy', $n->id) }}" method="POST" class="form-confirm" data-confirm-title="Hapus Nilai" data-confirm-message="Data nilai ini akan dihapus secara permanen. Lanjutkan?" data-confirm-danger="true">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-7 h-7 flex items-center justify-center rounded bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-all shadow-sm">
                            <i class="fa-solid fa-trash text-xs"></i>
                        </button>
                    </form>
                </td>
                <td class="px-4 py-3 font-semibold text-gray-800">{{ $n->mata_pelajaran }}</td>
                <td class="px-4 py-3 text-gray-600">
                    <span class="bg-gray-100 px-2 py-1 rounded text-xs font-medium">{{ $n->jenis_nilai }}</span>
                </td>
                <td class="px-4 py-3">
                    <span class="inline-flex items-center justify-center w-9 h-9 rounded-full font-bold
                    {{ $n->nilai_angka >= 75 ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }}">
                        {{ $n->nilai_angka }}
                    </span>
                </td>
                <td class="px-4 py-3 text-gray-500 max-w-[150px] truncate">{{ $n->keterangan ?: '-' }}</td>
                <td class="px-4 py-3 text-gray-400 text-xs">{{ $n->created_at->format('d M y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
