<!-- Create Modal -->
<div class="modal fade" id="deleteIndikator-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteIndikatorLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteIndikatorLabel">Hapus Indikator</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('indikator.destroy', $item) }}" method="post">
                    @method('delete')
                    @csrf
                    <p>Anda yakin ingin menghapus indikator <strong>{{ $item->nama }}</strong>?</p>
                    @include('admin.components.button', ['submit' => 'yakin', 'close' => 'tutup'])
                </form>
            </div>
        </div>
    </div>
</div>
