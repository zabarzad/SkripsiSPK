<!-- Edit Modal -->
<div class="modal fade" id="editPosisi-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editPosisiLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPosisiLabel">Edit Posisi</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('posisi.update', $item) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nama" value="{{ $item->nama }}" required>
                    </div>
                    @include('admin.components.button', ['submit' => 'submit', 'close' => 'close'])
                </form>
            </div>
        </div>
    </div>
</div>
