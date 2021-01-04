@unless(isset($shippingCost))

<div class="container mt-5 bg-danger text-white">
    <p>Séléctionnez le type de livraison souhaité</p>
</div>

@endif


<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12 bg-dark bg-gradient text-white text-right">
            <div class="col-md-10">
                <h3>Montant de votre commande</h3>

                <p>
                    Montant HT : {{ $total }} €<br>
                    <span class="text-muted">
                        TVA (20%): @php echo $tvaCost @endphp €<br>

                        Frais de port : {{ shippingFees($total, $shippingFees) }} €<br>

                        @if(isset($shippingCost))
    
                        Livraison : {{ $shippingCost }} €<br>

                        @endif

                    </span>
                    
                    <b>
                        @if(isset($shippingCost))
                        @php $finalTotal = $total + $tvaCost + $shippingFees + $shippingCost; @endphp
                        Montant TTC : {{ $finalTotal }} €</b>
                </p>

                <form method="GET" action="{{ route('confirm_cart.create') }}">
                    @csrf
                    <input type="hidden" value="{{ $finalTotal }}" name="order_amount">
                    <input type="hidden" value="{{ $user->id }}" name="user_id">
                    <button type="submit" class="btn btn-danger mb-3">Confirmer achat</button>
                </form>

                @endif

            </div>
        </div>
    </div>
</div>