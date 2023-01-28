<!-- Edit Modal -->
<div class="modal fade" id="showKemampuan-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="showKemampuanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showKemampuanLabel">Penilaian Kemampuan</h5>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-6 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-6">
                            {{-- boostrap select --}}
                            <input class="form-control" disabled value="{{ $item->karyawan->nama }}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-6 col-form-label">Kualitas Pekerjaan</label>
                        @include('admin.components.show-grade-kemampuan', [
                            'nilai' => $item->kualitas_pekerjaan,
                        ])
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-6 col-form-label">Kuantitas Pekerjaan</label>
                        @include('admin.components.show-grade-kemampuan', [
                            'nilai' => $item->kuantitas_pekerjaan,
                        ])
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-6 col-form-label">Tangung Jawab</label>
                        @include('admin.components.show-grade-kemampuan', [
                            'nilai' => $item->tanggung_jawab,
                        ])
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-6 col-form-label">Sikap & Perilaku</label>
                        @include('admin.components.show-grade-kemampuan', [
                            'nilai' => $item->sikap_perilaku,
                        ])
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-6 col-form-label">Kerja Sama</label>
                        @include('admin.components.show-grade-kemampuan', [
                            'nilai' => $item->kerja_sama,
                        ])
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-6 col-form-label">Semangat Kerja</label>
                        @include('admin.components.show-grade-kemampuan', [
                            'nilai' => $item->semangat_kerja,
                        ])
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-6 col-form-label">Integritas</label>
                        @include('admin.components.show-grade-kemampuan', [
                            'nilai' => $item->integritas,
                        ])
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-6 col-form-label">Komunikasi</label>
                        @include('admin.components.show-grade-kemampuan', [
                            'nilai' => $item->komunikasi,
                        ])
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-6 col-form-label">Analisa & Solusi</label>
                        @include('admin.components.show-grade-kemampuan', [
                            'nilai' => $item->analisa_solusi,
                        ])
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-6 col-form-label">Tindak Lanjut</label>
                        @include('admin.components.show-grade-kemampuan', [
                            'nilai' => $item->tindak_lanjut,
                        ])
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-6 col-form-label">Rasa Memiliki</label>
                        @include('admin.components.show-grade-kemampuan', [
                            'nilai' => $item->rasa_memiliki,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
