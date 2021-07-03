@extends('app')

@section('title')
@foreach($pesanan as $ps)
{{ App\Kategori::where('id', App\Jasa::where('id', $ps->id_jasa)->value('id_kategori'))->value('nama') }}, {{ App\Jasa::where('id', $ps->id_jasa)->value('nama') }} | Repair-Inc
@endforeach
@endsection

@section('css-plus')
<style type="text/css">
    .star-rating__stars {
      position: relative;
      height: 5rem;
      width: 25rem;
      background: url({{asset('assets/off.svg')}});
      background-size: 5rem 5rem;
  }

  .star-rating__label {
      position: absolute;
      height: 100%;
      background-size: 5rem 5rem;
  }

  .star-rating__input {
      margin: 0;
      position: absolute;
      height: 1px; width: 1px;
      overflow: hidden;
      clip: rect(1px, 1px, 1px, 1px);
  }

  .star-rating__stars .star-rating__label:nth-of-type(1) {
      z-index: 5;
      width: 20%;
  }

  .star-rating__stars .star-rating__label:nth-of-type(2) {
      z-index: 4;
      width: 40%;
  }

  .star-rating__stars .star-rating__label:nth-of-type(3) {
      z-index: 3;
      width: 60%;
  }

  .star-rating__stars .star-rating__label:nth-of-type(4) {
      z-index: 2;
      width: 80%;
  }

  .star-rating__stars .star-rating__label:nth-of-type(5) {
      z-index: 1;
      width: 100%;
  }

  .star-rating__input:checked + .star-rating__label,
  .star-rating__input:focus + .star-rating__label,
  .star-rating__label:hover {
    background-image: url({{asset('assets/on.svg')}});
}

.star-rating__label:hover ~ .star-rating__label {
  background-image: url({{asset('assets/off.svg')}});
}

.star-rating__input:focus ~ .star-rating__focus {
  position: absolute;
  top: -.25em;
  right: -.25em;
  bottom: -.25em;
  left: -.25em;
  outline: 0.25rem solid lightblue;
}
</style>
@endsection

@section('content')
@foreach($pesanan as $ps)
<div class="page-section section mt-90 mb-90">
    <div class="container mb10">
        <div class="row">

            <div class="col-12 col-md-6">
                <table class="table table-striped mb3">
                    <tbody>
                        <tr>
                            <th>Kode Invoice</th>
                            <td class="text-left">{{ App\Pembayaran::where('id_pesanan', $ps->id)->value('kode_invoice') }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td class="text-left">{{ App\Kategori::where('id', App\Jasa::where('id', $ps->id_jasa)->value('id_kategori'))->value('nama') }}</td>
                        </tr>
                        <tr>
                            <th>Jasa</th>
                            <td class="text-left">{{ App\Jasa::where('id', $ps->id_jasa)->value('nama') }}</td>
                        </tr>
                        <tr>
                            <th>Mitra</th>
                            <td class="text-left">{{ App\Mitra::where('id', App\Jasa::where('id', $ps->id_jasa)->value('id_mitra'))->value('nama') }}</td>
                        </tr>
                        <tr>
                            <th>Biaya</th>
                            <td class="text-left">Rp {{ number_format(App\Jasa::where('id', $ps->id_jasa)->value('harga')) }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-12">
                      

                        <button 
                        type="button" 
                        class="btn btn-primary" 
                        data-toggle="modal" 
                        data-target="#modal-feedback">Kirim Feedback</button>

                        <button 
                        type="button" 
                        class="btn btn-primary" 
                        data-toggle="modal" 
                        data-target="#modal-ratting">Kirim Ratting</button>

                        <button 
                        type="button" 
                        class="btn btn-primary" 
                        data-toggle="modal" 
                        data-target="#modal-garansi">Ajukan Garansi</button>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">

                    @foreach($tracking as $tr)
                    @if($tr->status == "Order")
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div> 
                            <span class="vertical-timeline-element-icon bounce-in"> 
                                <i class="badge badge-dot badge-dot-xl badge-success"> </i> 
                            </span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <h4 class="timeline-title">Order</h4>
                                <p>diorder pada <span class="text-success">{{ \Carbon\Carbon::parse($tr->created_at)->isoFormat('dddd, D MMMM Y') }}</span></p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                    @foreach($tracking as $tr)
                    @if($tr->status == "Pembayaran")
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div> 
                            <span class="vertical-timeline-element-icon bounce-in"> 
                                <i class="badge badge-dot badge-dot-xl badge-success"> </i> 
                            </span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <h4 class="timeline-title">Pembayaran</h4>
                                <p>dibayar pada <span class="text-success">{{ \Carbon\Carbon::parse($tr->created_at)->isoFormat('dddd, D MMMM Y') }}</span></p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                    @foreach($tracking as $tr)
                    @if($tr->status == "Proses")
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div> 
                            <span class="vertical-timeline-element-icon bounce-in"> 
                                @if($selesai_tes == 0)
                                <i class="badge badge-dot badge-dot-xl badge-warning"> </i>
                                @else
                                <i class="badge badge-dot badge-dot-xl badge-success"> </i>
                                @endif 
                            </span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <h4 class="timeline-title">Proses</h4>
                                <p>Masih dalam pemrosesan,<br>
                                    mulai diproses pada <span class="text-success">{{ \Carbon\Carbon::parse($tr->created_at)->isoFormat('dddd, D MMMM Y') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                    @if($selesai_tes == 0)
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div> 
                            <span class="vertical-timeline-element-icon bounce-in"> 
                                <i class="badge badge-dot badge-dot-xl badge-secondary"> </i> 
                            </span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <h4 class="timeline-title">Selesai</h4>
                                <p>Belum selesai</p>
                            </div>
                        </div>
                    </div>

                    @else
                    @foreach($tracking as $tr)
                    @if($tr->status == "Selesai")
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div> 
                            <span class="vertical-timeline-element-icon bounce-in"> 
                                <i class="badge badge-dot badge-dot-xl badge-success"> </i> 
                            </span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <h4 class="timeline-title">Selesai</h4>
                                <p>selesai pada <span class="text-success">{{ \Carbon\Carbon::parse($tr->created_at)->isoFormat('dddd, D MMMM Y') }}</span></p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal-garansi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @if($garansi_tes == 0)
    <form action="{{ route('customer.garansi.store') }}" method="POST">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Klaim Garansi</h5>
                    <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <textarea class="tiny" name="garansi"></textarea>
                    <input type="hidden" name="id_pesanan" value="{{ $ps->id }}">

                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                
                </div>
            </div>
        </div>
    </form>
    @else

    @foreach($garansi as $gr)
    <form action="{{ route('customer.garansi.edit', $gr->id) }}" method="POST">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Klaim Garansi</h5>
                    <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <textarea class="tiny" name="garansi">{!! $gr->garansi !!}</textarea>
                    <input type="hidden" name="id_pesanan" value="{{ $gr->id_pesanan }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </form>
    @endforeach

    @endif
</div>

<div class="modal fade" id="modal-feedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @if($feedback_tes == 0)
    <form action="{{ route('customer.feedback.store') }}" method="POST">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim Feedback</h5>
                    <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <textarea class="tiny" name="feedback"></textarea>
                    <input type="hidden" name="id_pesanan" value="{{ $ps->id }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </form>
    @else

    @foreach($feedback as $fd)
    <form action="{{ route('customer.feedback.edit', $fd->id) }}" method="POST">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim Feedback</h5>
                    <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <textarea class="tiny" name="feedback">{!! $fd->feedback !!}</textarea>
                    <input type="hidden" name="id_pesanan" value="{{ $fd->id_pesanan }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </form>
    @endforeach

    @endif
</div>

<div class="modal fade" id="modal-ratting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('customer.order.ratting.post') }}" method="POST">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Beri Ratting</h5>
                    <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_jasa" value="{{ $ps->id_jasa }}">
                    <input type="hidden" name="id_customer" value="{{ $ps->id_customer }}">
                    <input type="hidden" name="id_pesanan" value="{{ $ps->id }}">

                    <fieldset class="star-rating">
                        <div class="star-rating__stars">
                            <input class="star-rating__input" type="radio" name="ratting" value="1" id="rating-1" />
                            <label class="star-rating__label" for="rating-1" aria-label="One"></label>

                            <input class="star-rating__input" type="radio" name="ratting" value="2" id="rating-2" />
                            <label class="star-rating__label" for="rating-2" aria-label="Two"></label>

                            <input class="star-rating__input" type="radio" name="ratting" value="3" id="rating-3" />
                            <label class="star-rating__label" for="rating-3" aria-label="Three"></label>

                            <input class="star-rating__input" type="radio" name="ratting" value="4" id="rating-4" />
                            <label class="star-rating__label" for="rating-4" aria-label="Four"></label>

                            <input class="star-rating__input" type="radio" name="ratting" value="5" id="rating-5" />
                            <label class="star-rating__label" for="rating-5" aria-label="Five"></label>
                            <div class="star-rating__focus"></div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endforeach
@endsection

@section('js-plus')
<script src="https://cdn.tiny.cloud/1/naiean50arcvcg7c4k08y4vbuuu0sg1n4s3q5jyab04r7rhi/tinymce/5/tinymce.min.js" referrerpolicy="origin">
</script>

<script>
    tinymce.init({
        selector: "textarea.tiny",
        menubar: false,
        plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table paste",
        "autoresize"
        ],

        image_title: true,
        automatic_uploads: true,
        file_picker_types: 'image',

        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",

        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');


            input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {

                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        }
    });

    $.extend(M.Modal.prototype, {
        _handleFocus(e) {
            if (!this.el.contains(e.target) && this._nthModalOpened === M.Modal._modalsOpen && document.defaultView.getComputedStyle(e.target, null).zIndex < 1002) {
                this.el.focus();
            }
        }
    });
</script>
@endsection