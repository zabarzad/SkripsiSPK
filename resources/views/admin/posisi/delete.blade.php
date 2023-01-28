<!-- Create Modal -->
<div class="modal fade" id="deletePosisi-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deletePosisiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePosisiLabel">Hapus Posisi</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('posisi.destroy', $item) }}" method="post">
                    @method('delete')
                    @csrf
                    <p>Anda yakin ingin menghapus posisi <strong>{{ $item->nama }}</strong>?</p>
                    @include('admin.components.button', ['submit' => 'yakin', 'close' => 'tutup'])
                </form>
            </div>
        </div>
    </div>
</div>
