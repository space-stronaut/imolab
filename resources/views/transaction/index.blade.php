@extends('layouts.new')

@section('content')
<style>
    .container{
        font-size: 20px;
        margin-bottom : 80px
    }
    body{
      background-color: #e0eaff;
      font-family: system-ui;
  }
</style>
    <div class="container" style="margin-top: 150px">
        <div class="card">
            <div class="card-header">
                Riwayat Pembelanjaan
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tanggal Pembelanjaan</th>
                            <th>Total</th>
                            <th>Waktu Pemeriksaan</th>
                            <th>Status</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>
                                    {{ $item->user->name }}
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                </td>
                                <td>
                                    Rp. {{format_uang($item->total)}}
                                </td>
                                <td>
                                    {{$item->waktu_pemeriksaan}}
                                </td>
                                <td class="text-uppercase">
                                    {{$item->status}}
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-outline-success me-2">Detail</a>
                                    @if ($item->status == "menunggu waktu pemeriksaan")
                                    <form action="{{ route('pemesanan.update', $item->id) }}" method="post">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="status" value="selesai">
                                        <button class="btn btn-success">Selesai Pemeriksaan</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection