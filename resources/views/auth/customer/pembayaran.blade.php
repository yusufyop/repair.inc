@extends('app')

@section('title')
Pembayaran | Repair.Inc
@endsection

@section('content')
@foreach($pesanan as $ps)
<div class="page-section section mt-90 mb-90">
    <div class="container mb10">

        @if($ps->status == "Ditolak")
        <h4>Pesanan anda Ditolak</h4>
        @elseif($ps->status == "Belum disetujui")
        <div class="row">
            <div class="col-12 text-center">
                <h4>Tunggu Persetujuan</h4>
            </div>
        </div>
        @else
        <div class="row">

            <div class="col-12 col-md-8">
                <table class="table table-striped">
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
                        <tr>
                            <th>Rekening</th>
                            <td class="text-left"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-12 col-md-4">
                @php
                $status = App\Pembayaran::where('id_pesanan', $ps->id)->value('status');
                @endphp

                @if( $status == "Belum dibayar" )
                <div class="alert alert-danger" role="alert">
                    {{ App\Pembayaran::where('id_pesanan', $ps->id)->value('status') }}
                </div>

                @elseif($status == "Proses Verifikasi")
                <div class="alert alert-warning" role="alert">
                    {{ App\Pembayaran::where('id_pesanan', $ps->id)->value('status') }}
                </div>

                @elseif($status == "Terbayar")
                <div class="alert alert-success" role="alert">
                    {{ App\Pembayaran::where('id_pesanan', $ps->id)->value('status') }}
                </div>

                @endif

                <div class="dropdown-divider" style="margin-bottom: 2rem"></div>
                <div class="ee-account-image">
                    <h3>Unggah Bukti Pembayaran</h3>

                    <form action="{{ route('customer.order.bukti.post', App\Pembayaran::where('id_pesanan', $ps->id)->value('id')) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="account-image-upload">
                            <input type="file" id="account-image-upload" name="gambar" required="">
                            <label class="account-image-label" for="account-image-upload">Pilih gambar</label>
                        </div>

                        <br>
                        <button type="submit" class="btn-submit">Kirim</button>
                    </form>

                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endforeach
@endsection