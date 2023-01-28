<!-- Create Modal -->
<div class="modal fade" id="deleteKaryawan-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteKaryawanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteKaryawanLabel">Hapus Karyawan</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('karyawan.destroy', $item) }}" method="post">
                    @method('delete')
                    @csrf
                    <p>Anda yakin ingin menghapus <strong>{{ $item->nama }}</strong> dengan posisi
                        <strong>{{ $item->posisi->nama }}</strong>?
                    </p>
                    @include('admin.components.button', ['submit' => 'yakin', 'close' => 'tutup'])
                </form>
            </div>
        </div>
    </div>
</div>
