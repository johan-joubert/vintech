<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editDeliveryAddress">
    Modifier
</button>

<!-- Modal -->
<div class="modal fade" id="editDeliveryAddress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDeliveryAddress" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDeliveryAddressLabel">Edition de l'adresse de livraison</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form method="POST" action="{{ route('update_delivery_address' }}" name="editDeliveryAddress">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">

                        <label for="address">
                            Email
                        </label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ $user->deliveryAdresses->address }}" required>

                        @error('address')
                        <p>{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="zip_code">
                            Prénom
                        </label>
                        <input type="text" name="zip_code" id="zip_code" class="form-control" value="{{ $user->deliveryAddresses->zip_code }}" required>

                        @error('zip_code')
                        <p>{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="city">
                            Prénom
                        </label>
                        <input type="text" name="city" id="city" class="form-control" value="{{ $user->deliveryAddresses->city }}" required>

                        @error('city')
                        <p>{{ $message }}</p>
                        @enderror

                    </div>


                    <div class="form-group">

                        <label for="password">
                            Mot de passe
                        </label>
                        <input type="password" name="password" id="password" class="form-control" required>

                        @error('password')
                        <p>{{ $message }}</p>
                        @enderror

                    </div>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Modifier</button>

                </form>

            </div>

        </div>
    </div>
</div>