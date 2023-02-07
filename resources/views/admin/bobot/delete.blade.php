<!-- Create Modal -->
<div class="modal fade" id="deleteBobot-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteBobotLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteBobotLabel">Hapus Bobot</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('bobot.destroy', $item) }}" method="post">
                    @method('delete')
                    @csrf
                    <p>Anda yakin ingin menghapus data ini?
                    </p>
                    @include('admin.components.button', ['submit' => 'yakin', 'close' => 'tutup'])
                </form>
            </div>
        </div>
    </div>
</div>
