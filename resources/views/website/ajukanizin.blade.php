@extends('layout.master')

@section('title', 'Buat Surat Izin Baru')

@section('content')
  <div class="w-full px-4 sm:px-8 xl:px-12">
    
    @if (session('success'))
      <div class="mb-8 card-friendly border-4 border-emerald-100 bg-emerald-50 py-5 px-6 flex items-center gap-4">
        <div class="w-12 h-12 rounded-full bg-emerald-200 text-emerald-800 flex items-center justify-center shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
        </div>
        <p class="text-xl font-black text-emerald-900">{{ session('success') }}</p>
      </div>
    @endif

    @if (session('error'))
      <div class="mb-8 card-friendly border-4 border-rose-100 bg-rose-50 py-5 px-6 flex items-center gap-4">
        <div class="w-12 h-12 rounded-full bg-rose-200 text-rose-800 flex items-center justify-center shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <p class="text-xl font-black text-rose-900">{{ session('error') }}</p>
      </div>
    @endif
    
    <div class="card-friendly mb-10 bg-white relative overflow-hidden py-8 px-6 sm:px-10 border border-blue-100 shadow-md">
       <h1 class="text-2xl sm:text-3xl font-bold text-slate-800 mb-3 text-center sm:text-left">Kirim Surat Izin Online</h1>
       <p class="text-base text-slate-600 mb-8 max-w-2xl text-center sm:text-left leading-relaxed">
           Bapak & Ibu silakan mengisi formulir di bawah ini jika anak sedang berhalangan. Data akan langsung terkirim ke Guru Kelas.
       </p>

      <form action="{{ route('izin.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="bg-blue-50 border-2 border-blue-100 rounded-[2rem] p-6">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
              <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2 px-1">Nama Lengkap Anak</label>
                <input type="text" value="{{ Auth::user()->dataSiswa->nama_siswa ?? Auth::user()->name }}" class="input-friendly bg-slate-100 text-slate-600 border-slate-300 opacity-90 cursor-not-allowed" readonly>
              </div>

              <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2 px-1">Kapan Mulai Izin?</label>
                <input type="date" name="tanggal_izin" value="{{ date('Y-m-d') }}" class="input-friendly text-base bg-white text-slate-800" required>
              </div>
            </div>
        </div>

        <div class="bg-blue-50 border-2 border-blue-100 rounded-[2rem] p-6">
          <label class="block text-sm font-semibold text-slate-700 mb-2 px-1">Apa Alasan Tidak Masuk?</label>
          <div class="relative">
            <select name="alasan" class="input-friendly text-base bg-white text-slate-800 appearance-none pr-12 cursor-pointer" required>
              <option value="">-- Ketuk Di Sini Untuk Memilih Alasan --</option>
              <option value="S (Sakit)">Anak Sedang Sakit</option>
              <option value="I (Izin)">Ada Acara Keluarga / Kepentingan Mendadak</option>
              <option value="Lainnya">Alasan Lain-lain</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-5 flex items-center text-slate-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
            </div>
          </div>
        </div>

        <div class="bg-blue-50 border-2 border-blue-100 rounded-[2rem] p-6">
          <label class="block text-sm font-semibold text-slate-700 mb-2 px-1">Tuliskan Penjelasan Tambahan</label>
          <textarea name="keterangan" rows="4" class="input-friendly rounded-[1.25rem] text-base bg-white text-slate-800 resize-none" placeholder="Tulis bagaimana keadaan anak atau nama acaranya di sini..." required></textarea>
        </div>

        <div class="bg-blue-50 border-2 border-blue-200 rounded-[2rem] p-6 py-8 text-center border-dashed">
           <label class="flex items-center justify-center gap-2 text-base font-bold text-slate-800 mb-4"><svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Lampirkan Bukti Foto/Dokter (Tidak Wajib)</label>
           <input type="file" name="lampiran" class="w-full max-w-sm mx-auto flex text-sm bg-white rounded-full p-1.5 border border-blue-200 text-slate-600 file:cursor-pointer file:py-2 file:px-4 file:rounded-full file:border-none file:text-xs file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition" accept="image/*,.pdf">
           <p class="text-xs font-semibold text-slate-500 mt-4">Pilih dan unggah foto dari galeri HP Anda.</p>
        </div>

        <div class="pt-4">
          <button type="submit" class="btn-friendly w-full py-3.5 text-base shadow-[0_8px_15px_rgba(37,99,235,0.2)]">
            Kirimkan Surat Izin Sekarang
          </button>
        </div>
      </form>
    </div>
    
  </div>
@endsection
