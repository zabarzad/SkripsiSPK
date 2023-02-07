<!-- Edit Modal -->
<div class="modal fade" id="editBobot-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editBobotLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBobotLabel">Edit Bobot</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('bobot.update', $item) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria 1</label>
                        <input type="text" class="form-control" name="k1" value="{{ $item->k1 }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria 2</label>
                        <input type="text" class="form-control" name="k2" value="{{ $item->k2 }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria 3</label>
                        <input type="text" class="form-control" name="k3" value="{{ $item->k3 }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria a</label>
                        <input type="text" class="form-control" name="ka" value="{{ $item->ka }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria b</label>
                        <input type="text" class="form-control" name="kb" value="{{ $item->kb }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria c</label>
                        <input type="text" class="form-control" name="kc" value="{{ $item->kc }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria d</label>
                        <input type="text" class="form-control" name="kd" value="{{ $item->kd }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria e</label>
                        <input type="text" class="form-control" name="ke" value="{{ $item->ke }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria f</label>
                        <input type="text" class="form-control" name="kf" value="{{ $item->kf }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria g</label>
                        <input type="text" class="form-control" name="kg" value="{{ $item->kg }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria h</label>
                        <input type="text" class="form-control" name="kh" value="{{ $item->kh }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria i</label>
                        <input type="text" class="form-control" name="ki" value="{{ $item->ki }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria j</label>
                        <input type="text" class="form-control" name="kj" value="{{ $item->kj }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria k</label>
                        <input type="text" class="form-control" name="kk" value="{{ $item->kk }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria l</label>
                        <input type="text" class="form-control" name="kl" value="{{ $item->kl }}"
                            required>
                    </div>
                    @include('admin.components.button', ['submit' => 'submit', 'close' => 'close'])
                </form>
            </div>
        </div>
    </div>
</div>
