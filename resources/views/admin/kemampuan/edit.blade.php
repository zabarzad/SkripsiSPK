<!-- Edit Modal -->
<div class="modal fade" id="editKemampuan-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editKemampuanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKemampuanLabel">Edit Penilaian Kemampuan</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('kemampuan.update', $item) }}" method="post">
                    @method('put')
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
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-6 col-form-label">Kualitas Pekerjaan</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" required name="kualitas_pekerjaan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Kuantitas Pekerjaan</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" required name="kuantitas_pekerjaan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Tangung Jawab</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" required name="tangung_jawab">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Sikap & Perilaku</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" required name="sikap_perilaku">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Kerja Sama</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" required name="kerja_sama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Semangat Kerja</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" required name="semangat_kerja">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Integritas</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" required name="integritas">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Komunikasi</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" required name="komunikasi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Analisa & Solusi</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" required name="analisa_solusi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Tindak Lanjut</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" required name="tindak_lanjut">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-6 col-form-label">Rasa Memiliki</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" required name="rasa_memiliki">
                            </div>
                        </div>
                    </div>
                    @include('admin.components.button', ['submit' => 'submit', 'close' => 'close'])
                </form>
            </div>
        </div>
    </div>
</div>
