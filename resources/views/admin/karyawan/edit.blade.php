<!-- Edit Modal -->
<div class="modal fade" id="editKaryawan-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editKaryawanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKaryawanLabel">Edit Karyawan</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('karyawan.update', $item) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $item->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputPosisi" class="form-label">Posisi</label>
                        <select class="custom-select" aria-label="Posisi select" name="posisi">
                            <option disabled selected>Pilih posisi</option>
                            @foreach ($posisi as $p)
                                <option value="{{ $p->id }}" {{ $item->posisi_id == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    @include('admin.components.button', ['submit' => 'submit', 'close' => 'close'])
                </form>
            </div>
        </div>
    </div>
</div>
