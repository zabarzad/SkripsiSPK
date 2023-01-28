<!-- Edit Modal -->
<div class="modal fade" id="editIndikator-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editIndikatorLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editIndikatorLabel">Edit Posisi</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('indikator.update', $item) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nama" value="{{ $item->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputPosisi" class="form-label">Posisi</label>
                        <select class="form-control select2-normal" aria-label="Posisi" name="posisi_id" required>
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
