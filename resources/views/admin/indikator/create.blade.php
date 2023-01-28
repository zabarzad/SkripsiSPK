<!-- Create Modal -->
<div class="modal fade" id="createIndikator" tabindex="-1" role="dialog" aria-labelledby="createIndikatorLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createIndikatorLabel">Tambah Indikator</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('indikator.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputPosisi" class="form-label">Posisi</label>
                        <select class="form-control select2-normal" aria-label="Posisi" name="posisi_id" required>
                            <option disabled selected>Pilih posisi</option>
                            @foreach ($posisi as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    @include('admin.components.button', ['submit' => 'submit', 'close' => 'close'])
                </form>
            </div>
        </div>
    </div>
</div>
