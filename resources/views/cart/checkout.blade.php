@extends('layouts.new')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/form-validation.css') }}">
@endpush
@section('content')
<style>
  .container{
      font-size: 20px
  }
  body{
    background-color: #e0eaff;
    font-family: system-ui;
}
</style>
{{-- <div class="container">
    @php
        $ttl = 0;
    @endphp
    <div class="card">
        <div class="card-header">
            Saatnya Checkout
        </div>
        <div class="card-body d-flex align-items-center">
            @foreach ($id as $i)
                @php
                    $cart = App\Models\Cart::find($i)
                @endphp
                <div class="card">
                    <div class="card-header">
                        {{  $cart->product->nama_produk }}
                    </div>
                    <div class="card-body d-flex">
                        <div>
                            <img width="200" src="{{ Storage::url($cart->product->foto) }}" alt="">
                        </div>
                        <div class="ms-3">
                            <table style="width: 100%">
                                <tr>
                                    <th>
                                        Produk
                                    </th>
                                    <td>:</td>
                                    <td>
                                        {{  $cart->product->nama_produk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Quantity
                                    </th>
                                    <td>:</td>
                                    <td>
                                        {{  $cart->qty }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Harga
                                    </th>
                                    <td>:</td>
                                    <td>
                                        @php
                                            $ttl += $cart->total_semua
                                        @endphp
                                        {{  $cart->total_semua }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <h4>
                Total : {{$ttl}}
            </h4>
        </div>
        <div class="card-footer d-flex align-items-center">
            <a href="{{ route('cart.index') }}" class="btn btn-outline-primary">Batal</a>
            <form action="{{ route('transaction.store') }}" method="post">
                @csrf
                @foreach ($id as $item)
                <input type="hidden" name="id[]" value="{{ $item }}">
                @endforeach
                <button type="submit" class="btn btn-primary ms-2">Checkout</button>
            </form>
        </div>
    </div>
</div> --}}
<div class="container" style="margin-top: 200px">
    @php
        $ttl = 0;
    @endphp
    <main>
      <div class="py-2 text-center">
        {{-- <img class="d-block mx-auto mb-4" src="/docs/{{< param docs_version >}}/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
        <h2>Saatnya Checkout</h2>
      </div>
  
      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your cart</span>
            <span class="badge bg-primary rounded-pill">{{ count($id) }}</span>
          </h4>
          <ul class="list-group mb-3">
              @foreach ($id as $i)
                @php
                    $cart = App\Models\Cart::find($i)
                @endphp
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                      <h6 class="my-0">{{ $cart->product->nama_produk }}</h6>
                      <small class="text-muted">{{ $cart->qty }}x</small>
                    </div>
                    @php
                        $ttl += $cart->total_semua
                    @endphp
                    <span class="text-muted">Rp.{{ $cart->total_semua }}</span>
                  </li>
              @endforeach
            <li class="list-group-item d-flex justify-content-between">
              <span>Total</span>
              <strong>Rp.{{ format_uang($ttl) }}</strong>
            </li>
          </ul>
  
        </div>
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" action="{{ route('transaction.store') }}" method="POST">
            @csrf
            <hr class="my-4">

            <h4 class="mb-3">Payment</h4>
            <input type="hidden" name="status" value="menunggu konfirmasi">
  
            <div class="my-3">
              <div class="form-check">
                <input id="credit" name="payment" value="cod" onclick="hilang()" type="radio" class="form-check-input" checked required>
                <label class="form-check-label" for="credit">Bayar di Tempat</label>
              </div>
              <div class="form-check">
                <input id="credit" name="payment" onclick="ada()" value="credit card" type="radio" class="form-check-input" checked required>
                <label class="form-check-label" for="credit">Credit card</label>
              </div>
              <div class="form-check">
                <input id="debit" type="radio" onclick="ada()" name="payment" value="debit card" class="form-check-input" required>
                <label class="form-check-label" for="debit">Debit card</label>
              </div>
              <div class="form-check">
                <input id="paypal" type="radio" onclick="ada()" name="payment" value="paypal" class="form-check-input" required>
                <label class="form-check-label" for="paypal">PayPal</label>
              </div>
              <div class="col-md-6">
                <label for="cc-number" class="form-label">Waktu Pemeriksaan</label>
                <input type="date" name="waktu_pemeriksaan" class="form-control" id="cc-number" placeholder="">
                <div class="invalid-feedback">
                  Waktu Pemeriksaan is required
                </div>
              </div>
            </div>
  
            <div class="row gy-3" id="creditcard">
  
              <div class="col-md-6">
                <label for="cc-number" class="form-label">Credit card number</label>
                <input type="number" name="no_credit" class="form-control" id="cc-number" placeholder="">
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            @foreach ($id as $item)
                <input type="hidden" name="id[]" value="{{ $item }}">
            @endforeach
  
            <hr class="my-4">
  
            <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>
    </main>
  
  </div>
  
@endsection

@push('scripts')
    <script src="{{ asset('js/form-validation.js') }}"></script>
    <script>
      function adain(){
        document.getElementById("alamat").classList.remove("d-none")
      }

      function ilangin(){
        document.getElementById("alamat").classList.add("d-none")
      }

      function hilang(){
        document.getElementById("creditcard").classList.add("d-none")
      }

      function ada(){
        document.getElementById("creditcard").classList.remove("d-none")
      }
    </script>
@endpush