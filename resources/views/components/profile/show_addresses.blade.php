<div class="container">
    <div class="row mt-5">

        <div class="col-md-12">

            <h2>Vos adresses</h2>

            <div class="row mt-3">

                <div class="col-md-6">

                    <h4>Facturation</h4>


                    @if($user->billingAddress)

                    <p>
                        {{ $user->billingAddress->address }}<br>
                        {{ $user->billingAddress->zip_code }}<br>
                        {{ $user->billingAddress->city }}
                    </p>

                    @if (auth()->user()->is($user))
                    @include('components.profile.edit_billing_address')
                    @endif

                    @endif


                    @unless($user->billingAddress)

                    <p>Vous n'avez aucune adresse de facturation d'enregistré</p>

                    @include('components.profile.create_billing_address')

                    @endif

                </div>

                <div class="col-md-6">

                    <h4>Livraison</h4>


                    @if($user->deliveryAddress)

                    <p>
                        {{ $user->deliveryAddress->address }}<br>
                        {{ $user->deliveryAddress->zip_code }}<br>
                        {{ $user->deliveryAddress->city }}
                    </p>

                    @if (auth()->user()->is($user))
                    @include('components.profile.edit_delivery_address')
                    @endif

                    @endif


                    @unless($user->deliveryAddress)

                    <p>Vous n'avez aucune adresse de livraison d'enregistré</p>

                    @include('components.profile.create_delivery_address')
                    @endif

                </div>

            </div>

        </div>
    </div>
</div>