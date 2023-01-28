<!-- Edit Modal -->
<div class="modal fade" id="editDisiplin-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editDisiplinLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDisiplinLabel">Edit Penilaian Disiplin</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('disiplin.update', $item) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-6 col-form-label">Nama Karyawan </label>
                            <div class="col-sm-6">
                                <select class="form-control" name="karyawan_id">
                                    @foreach ($karyawan as $p)
                                        <option value="{{ $p->id }}" {{ $p }}>{{ $p->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <p class="text-center text-bold">1. KEHADIRAN</p>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-6 col-form-label">Jumlah Kehadiran</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" required name="jumlah_kehadiran"
                                    value="{{ $item->jumlah_kehadiran }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Sakit</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" required name="sakit"
                                    value="{{ $item->sakit }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Ijin</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" required name="ijin"
                                    value="{{ $item->ijin }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Mangkir</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" required name="mangkir"
                                    value="{{ $item->mangkir }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Cuti</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" required name="cuti"
                                    value="{{ $item->cuti }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Terlambat</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" required name="terlambat"
                                    value="{{ $item->terlambat }}">
                            </div>
                        </div>
                        <p class="text-center text-bold">2. SERAGAM/PENAMPILAN</p>
                        <hr>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Kebersihan Diri</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" required name="kebersihan_diri"
                                    value="{{ $item->kebersihan_diri }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Kerapihan Penampilan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" required name="kerapihan_penampilan"
                                    value="{{ $item->kerapihan_penampilan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Kelengkapan Seragam</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" required name="kelengkapan_seragam"
                                    value="{{ $item->kelengkapan_seragam }}">
                            </div>
                        </div>
                        <p class="text-center text-bold">3. KEBERSIHAN RUANG KERJA</p>
                        <hr>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Kebersihan Ruang Kerja</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" required name="kebersihan_ruang_kerja"
                                    value="{{ $item->kebersihan_ruang_kerja }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Kerapihan Ruang Kerja</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" required name="kerapihan_ruang_kerja"
                                    value="{{ $item->kerapihan_ruang_kerja }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Merawat Sarana Kerja</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" required name="merawat_sarana_kerja"
                                    value="{{ $item->merawat_sarana_kerja }}">
                            </div>
                        </div>
                    </div>
                    @include('admin.components.button', ['submit' => 'submit', 'close' => 'close'])
                </form>
            </div>
        </div>
    </div>
</div>
