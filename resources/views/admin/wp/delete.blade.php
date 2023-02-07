<!-- Create Modal -->
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Hapus Penilaian WP</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('wp.destroy', $item) }}" method="post">
                    @method('delete')
                    @csrf
                    <p>Anda yakin ingin menghapus karyawan bernama <strong>{{ $item->karyawan->nama }}</strong>?</p>
                    @include('admin.components.button', ['submit' => 'yakin', 'close' => 'tutup'])
                </form>
            </div>
        </div>
    </div>
</div>
