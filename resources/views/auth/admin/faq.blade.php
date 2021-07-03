@extends('app-dashboard')

@section('title')
FAQ | Repair.Inc
@endsection

@section('content')
<div class="page-title mb2">
    <h3>FAQ</h3>
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="#" class="btn icon icon-left btn-primary" data-toggle="modal" data-target="#add-new">
                <i data-feather="plus"></i> FAQ Baru
            </a>
        </div>
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faq as $js)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $js->questions }}</td>
                        <td>{{ $js->answer }}</td>
                        <td class="text-right">
                            <button type="button" class="btn icon btn-warning" data-toggle="modal" data-target="#edit-{{ $js->id }}"><i data-feather="edit"></i></button>

                            <button type="button" class="btn icon btn-danger" data-toggle="modal" data-target="#hapus-{{ $js->id }}"><i data-feather="delete"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@foreach($faq as $cs)
<div class="modal fade text-left" id="hapus-{{ $cs->id }}" tabindex="-1" role="dialog">
    <form action="{{ route('admin.faq.delete', $cs->id) }}" method="POST">
        @csrf
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel19">Hapus FAQ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                   '{{$cs->questions}}', kamu yakin ngga sama aku?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary btn-sm" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-sm-block d-none">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1 btn-sm">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-sm-block d-none">Hapus</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="edit-{{ $cs->id }}" tabindex="-1" role="dialog">
    <form action="{{ route('admin.faq.edit', $cs->id) }}" method="POST">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit FAQ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Question</label>
                        <input type="text" class="form-control" id="nama" placeholder="question here" name="questions" value="{{ $cs->questions }}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Answer</label>
                        <textarea type="text" class="form-control" id="harga" placeholder="answer here" name="answer">{{ $cs->answer }}</textarea>
                    </div>
                    <input type="hidden" name="id_mitra" value="{{ $cs->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>

                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endforeach

<div class="modal fade" id="add-new" tabindex="-1" role="dialog">
  <form action="{{ route('admin.faq.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add New Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Question</label>
            <input type="text" class="form-control" id="nama" placeholder="Nama" name="questions">
          </div>
          <div class="form-group">
            <label for="nama">Answer</label>
            <textarea type="text" class="form-control" id="nama" name="answer" placeholder="masukkan jawaban"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Close</span>
          </button>

          <button type="submit" class="btn btn-primary ml-1">
            <i class="bx bx-check d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Simpan</span>
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection