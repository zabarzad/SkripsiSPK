<!-- Edit Modal -->
<div class="modal fade" id="editObj-{{ $item->posisi->id }}" tabindex="-1" role="dialog" aria-labelledby="editObjLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editObjLabel">Penilaian Objektivitas</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('objektivitas.update', $item) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-10 col-form-label">Indikator</label>
                        <label class="col-sm-2 col-form-label">Poin</label>
                    </div>
                    @foreach ($indikator as $i)
                        @if ($item->posisi->id == $i->posisi_id)
                            <div class="form-group row">
                                <label for="inputObj" class="col-sm-10 col-form-label">{{ $i->nama }}</label>
                                <input type="hidden" name="indikator_kerja_id[]" value="{{ $i->id }}">
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="poin[]" min="1"
                                        max="10" required>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @include('admin.components.button', ['submit' => 'submit', 'close' => 'close'])
                </form>
            </div>
        </div>
    </div>
</div>
