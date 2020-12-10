<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createDeliveryAddress">
    Enregistrer une adresse
</button>

<!-- Modal -->
<div class="modal fade" id="createDeliveryAddress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createDeliveryAddress" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDeliveryAddressLabel">Enregistrez votre adresse de livraison</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form method="POST" action="{{ route('delivery-address.store') }}" name="createDeliveryAddress">
                    @csrf

                    <div class="form-group">

                        <label for="address">
                            Rue, Voie, Allée, ...
                        </label>
                        <input type="text" name="address" id="address" class="form-control" 
                        placeholder="01 Rue de l'Exemple" 
                        required>

                        @error('address')
                        <p>{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="zip_code">
                            Code postal
                        </label>
                        <input type="text" name="zip_code" id="zip_code" class="form-control" 
                        placeholder="00000" 
                        required>

                        @error('zip_code')
                        <p>{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="city">
                            Ville, commune
                        </label>
                        <input type="text" name="city" id="city" class="form-control" 
                        placeholder="Paris" 
                        required>

                        @error('city')
                        <p>{{ $message }}</p>
                        @enderror

                    </div>


                    <div class="form-group">

                        <label for="password" class="mt-5">
                            Tapez votre mot de passe pour valider :
                        </label>
                        <input type="password" name="password" id="password" class="form-control" required>

                        @error('password')
                        <p>{{ $message }}</p>
                        @enderror

                    </div>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>

            </div>

        </div>
    </div>
</div>