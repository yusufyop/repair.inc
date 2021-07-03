@extends('app')

@section('title')
Order History | Repair.Inc
@endsection

@section('content')
<div class="page-section section mt-90 mb-90">
    <div class="container mb10">
        <div class="row">
            <div class="col-12">

                <div class="cart-table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Jasa</th>
                                <th class="pro-quantity">Mitra</th>
                                <th class="pro-subtotal">Harga</th>
                                <th class="pro-remove" style="width: 50px">Pembayaran</th>
                                <th class="pro-remove" style="width: 50px">Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pesanan as $ps)
                            <tr>
                                <td class="pro-title">
                                    <div>
                                        {{ App\Kategori::where('id', App\Jasa::where('id', $ps->id_jasa)->value('id_kategori'))->value('nama') }}
                                    </div>
                                    <div>
                                        {{ App\Jasa::where('id', $ps->id_jasa)->value('nama') }}
                                    </div>
                                </td>
                                <td class="pro-price">
                                    <span>
                                        {{ App\Mitra::where('id', App\Jasa::where('id', $ps->id_jasa)->value('id_mitra'))->value('nama') }}
                                    </span>
                                </td>
                                <td class="pro-price">
                                    <span>Rp {{ number_format(App\Jasa::where('id', $ps->id_jasa)->value('harga')) }}</span>
                                </td>
                                <td>
                                    @php
                                    $status = App\Pembayaran::where('id_pesanan', $ps->id)->value('status');
                                    @endphp

                                    @if( $status == "Belum dibayar" )
                                    <a href="{{ route('customer.pembayaran', $ps->id) }}" class="btn btn-danger text-white">
                                        {{ App\Pembayaran::where('id_pesanan', $ps->id)->value('status') }}
                                    </a>

                                    @elseif($status == "Proses Verifikasi")
                                    <a href="{{ route('customer.pembayaran', $ps->id) }}" class="btn btn-warning text-white">
                                        {{ App\Pembayaran::where('id_pesanan', $ps->id)->value('status') }}
                                    </a>

                                    @elseif($status == "Terbayar")
                                    <a href="{{ route('customer.pembayaran', $ps->id) }}" class="btn btn-success text-white">
                                        {{ App\Pembayaran::where('id_pesanan', $ps->id)->value('status') }}
                                    </a>

                                    @endif
                                </td>
                                <td>
                                    @php
                                    $progres = $ps->status;
                                    @endphp

                                    @if( $progres == "Belum diproses" )
                                    <button type="button" class="btn btn-danger text-white">{{ $ps->status }}</button>

                                    @elseif($progres == "Sedang diproses")
                                    <a href="{{ route('customer.proses', $ps->id) }}" class="btn btn-warning text-white">Lihat progress</a>

                                    @elseif($progres == "Selesai")
                                    <a href="{{ route('customer.proses', $ps->id) }}" class="btn btn-success text-white">lihat progress</a>

                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection