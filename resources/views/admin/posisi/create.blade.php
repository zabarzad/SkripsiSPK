<!-- Create Modal -->
<div class="modal fade" id="createPosisi" tabindex="-1" role="dialog" aria-labelledby="createPosisiLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPosisiLabel">Tambah Posisi</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('posisi.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    @include('admin.components.button', ['submit' => 'submit', 'close' => 'close'])
                </form>
            </div>
        </div>
    </div>
</div>
