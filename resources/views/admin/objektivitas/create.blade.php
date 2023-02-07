<!-- Create Modal -->
<div class="modal fade" id="createObjektivitas" tabindex="-1" role="dialog" aria-labelledby="createPosisiLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPosisiLabel">Tambah Penilaian Objektivitas</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('objektivitas.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <div class="form-group row">
                            <label for="inputKaryawan" class="col-sm-6 col-form-label">Nama Karyawan</label>
                            <div class="col-sm-6">
                                <select class="custom-select" aria-label="Karyawan select" name="karyawan_id"
                                    id="karyawan">
                                    <option disabled selected>Pilih karyawan</option>
                                    @foreach ($karyawan as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPosisi" class="col-sm-6 col-form-label">Posisi</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="" required disabled
                                    id="posisi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPosisi" class="col-sm-6 col-form-label">Tahun</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="tahun" required>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="" id="posisi_id" name="posisi_id">
                    </div>
                    @include('admin.components.button', ['submit' => 'submit', 'close' => 'close'])
                </form>
            </div>
        </div>
    </div>
</div>
