<!-- Create Modal -->
<div class="modal fade" id="deleteKemampuan-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteKemampuanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteKemampuanLabel">Hapus Kemampuan</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('kemampuan.destroy', $item) }}" method="post">
                    @method('delete')
                    @csrf
                    <p>Anda yakin ingin menghapus penilaian kemampuan <strong>{{ $item->nama }}</strong>?</p>
                    @include('admin.components.button', ['submit' => 'yakin', 'close' => 'tutup'])
                </form>
            </div>
        </div>
    </div>
</div>
