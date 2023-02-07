<!-- Create Modal -->
{{-- !! INI MASIH BELUM BENAR --}}
<div class="modal fade" id="sinkron-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="sinkronLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sinkronLabel">Hapus Penilaian WP</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('wp.destroy', $item) }}" method="post">
                    @method('sinkron')
                    @csrf
                    <p>Anda yakin ingin menghapus karyawan bernama <strong>{{ $item->karyawan->nama }}</strong>?</p>
                    @include('admin.components.button', ['submit' => 'yakin', 'close' => 'tutup'])
                </form>
            </div>
        </div>
    </div>
</div>
