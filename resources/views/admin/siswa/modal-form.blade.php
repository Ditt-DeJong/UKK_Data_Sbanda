<div 
    x-data="siswaModal()" 
    x-show="open" 
    x-cloak 
    class="fixed inset-0 bg-black  flex justify-center items-center z-[50] p-4"
>
    <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl p-6">

        <h2 class="text-xl font-semibold mb-4" x-text="mode === 'create' ? 'Tambah Data Siswa' : 'Edit Data Siswa'"></h2>

        <!-- FORM -->
        <form :action="mode === 'create' ? '{{ route('admin.datasiswa.store') }}' : '/admin/data-siswa/update/' + form.id"
              method="POST">
            @csrf
            <template x-if="mode === 'edit'">
                @method('PUT')
            </template>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- NIK Siswa -->
                <div>
                    <label class="font-medium">NIK Siswa</label>
                    <input type="text" name="nik_siswa" x-model="form.nik_siswa"
                        class="w-full border rounded-lg p-2" required>
                </div>

                <!-- Nama -->
                <div>
                    <label class="font-medium">Nama Lengkap</label>
                    <input type="text" name="name" x-model="form.name"
                        class="w-full border rounded-lg p-2" required>
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <label class="font-medium">Jenis Kelamin</label>
                    <select name="jenis_kelamin" x-model="form.jenis_kelamin"
                        class="w-full border rounded-lg p-2">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Umur -->
                <div>
                    <label class="font-medium">Umur</label>
                    <input type="number" name="umur" x-model="form.umur"
                        class="w-full border rounded-lg p-2" required>
                </div>

                <!-- Kelas -->
                <div>
                    <label class="font-medium">Kelas</label>
                    <input type="text" name="kelas" x-model="form.kelas"
                        class="w-full border rounded-lg p-2">
                </div>

                <!-- Status -->
                <div>
                    <label class="font-medium">Status</label>
                    <select name="status" x-model="form.status"
                        class="w-full border rounded-lg p-2">
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>

                <!-- Nama Orang Tua -->
                <div>
                    <label class="font-medium">Nama Orang Tua</label>
                    <input type="text" name="nama_ortu" x-model="form.nama_ortu"
                        class="w-full border rounded-lg p-2">
                </div>

                <!-- Telepon -->
                <div>
                    <label class="font-medium">Telepon</label>
                    <input type="text" name="telepon" x-model="form.telepon"
                        class="w-full border rounded-lg p-2">
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end mt-6 gap-3">
                <button type="button" @click="closeModal"
                    class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                    Batal
                </button>

                <button 
                    type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                    x-text="mode === 'create' ? 'Tambah' : 'Update'"
                ></button>
            </div>
        </form>

    </div>
</div>

<script>
function siswaModal() {
    return {
        open: false,
        mode: 'create',
        form: {
            id: null,
            nik_siswa: '',
            name: '',
            jenis_kelamin: 'Laki-laki',
            umur: '',
            kelas: '',
            status: 'Aktif',
            nama_ortu: '',
            telepon: '',
        },

        openModal(data) {
            this.open = true;

            if (this.mode === 'edit' && data) {
                this.form = {
                    id: data.id,
                    nik_siswa: data.nik_siswa,
                    name: data.user.name,
                    jenis_kelamin: data.jenis_kelamin,
                    umur: data.umur,
                    kelas: data.kelas,
                    status: data.status,
                    nama_ortu: data.orang_tua?.nama_ortu ?? '',
                    telepon: data.orang_tua?.telepon ?? '',
                };
            } else {
                this.resetForm();
            }
        },

        resetForm() {
            this.form = {
                id: null,
                nik_siswa: '',
                name: '',
                jenis_kelamin: 'Laki-laki',
                umur: '',
                kelas: '',
                status: 'Aktif',
                nama_ortu: '',
                telepon: '',
            };
        },

        closeModal() {
            this.open = false;
        },

        init() {
            window.addEventListener('open-siswa-modal', e => {
                this.mode = e.detail.mode;
                this.openModal(e.detail.siswa ?? null);
            });
        }
    }
}
</script>
