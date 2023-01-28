<!-- Create Modal -->
<div class="modal fade" id="createDisiplin" tabindex="-1" role="dialog" aria-labelledby="createPosisiLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPosisiLabel">Tambah Penilaian Disiplin</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('disiplin.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-6 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-6">
                          {{-- boostrap select --}}
                          <select class="form-control" name="karyawan_id">
                            @foreach ($karyawan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <hr>
                        <p class="text-center text-bold">1. KEHADIRAN</p>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-6 col-form-label">Jumlah Kehadiran</label>
                            <div class="col-sm-6">
                              <input type="number" class="form-control" required name="jumlah_kehadiran">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Sakit</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" required name="sakit">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Ijin</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" required name="ijin">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Mangkir</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" required name="mangkir">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Cuti</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" required name="cuti">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Terlambat</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" required name="terlambat">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Total Hari Kerja 1 Periode</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" required name="total_hari_kerja">
                            </div>
                          </div>
                        <p class="text-center text-bold">2. SERAGAM/PENAMPILAN</p>
                        <hr>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Kebersihan Diri</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" required name="kebersihan_diri">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Kerapihan Penampilan</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" required name="kerapihan_penampilan">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Kelengkapan Seragam</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" required name="kelengkapan_seragam">
                            </div>
                          </div>
                          <p class="text-center text-bold">3. KEBERSIHAN RUANG KERJA</p>
                        <hr>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Kebersihan Ruang Kerja</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" required name="kebersihan_ruang_kerja">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Kerapihan Ruang Kerja</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" required name="kerapihan_ruang_kerja">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Merawat Sarana Kerja</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" required name="merawat_sarana_kerja">
                            </div>
                          </div>
                    </div>
                    @include('admin.components.button', ['submit' => 'submit', 'close' => 'close'])
                </form>
            </div>
        </div>
    </div>
</div>
