<!-- Edit Modal -->
<div class="modal fade" id="showObj-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editObjLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editObjLabel">Penilaian Objektivitas</h5>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-10 col-form-label ">INDIKATOR</label>
                    <label class="col-sm-2 col-form-label ">POIN</label>
                </div>
                <hr>
                @foreach ($objDetail as $i)
                    @if ($i->objektivitas_id == $item->id)
                        <div class="form-group row">
                            <label for="inputObj" class="col-sm-10 col-form-label">{{ $i->indikator_kerja->nama }}</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" disabled value="{{ $i->poin }}">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
