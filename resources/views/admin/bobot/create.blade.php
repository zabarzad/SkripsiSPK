<!-- Create Modal -->
<div class="modal fade" id="createBobot" tabindex="-1" role="dialog" aria-labelledby="createBobotLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBobotLabel">Tambah Bobot</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('bobot.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria 1</label>
                        <input type="text" class="form-control" name="k1" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria 2</label>
                        <input type="text" class="form-control" name="k2" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria 3</label>
                        <input type="text" class="form-control" name="k3" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria a</label>
                        <input type="text" class="form-control" name="ka" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria b</label>
                        <input type="text" class="form-control" name="kb" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria c</label>
                        <input type="text" class="form-control" name="kc" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria d</label>
                        <input type="text" class="form-control" name="kd" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria e</label>
                        <input type="text" class="form-control" name="ke" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria f</label>
                        <input type="text" class="form-control" name="kf" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria g</label>
                        <input type="text" class="form-control" name="kg" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria h</label>
                        <input type="text" class="form-control" name="kh" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria i</label>
                        <input type="text" class="form-control" name="ki" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria j</label>
                        <input type="text" class="form-control" name="kj" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria k</label>
                        <input type="text" class="form-control" name="kk" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputNama" class="form-label">Kriteria l</label>
                        <input type="text" class="form-control" name="kl" required>
                    </div>
                    @include('admin.components.button', ['submit' => 'submit', 'close' => 'close'])
                </form>
            </div>
        </div>
    </div>
</div>
