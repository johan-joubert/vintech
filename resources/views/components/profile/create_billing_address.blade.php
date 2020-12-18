<div class="row">
    <div class="col-md-12 text-center">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-red mt-2 mb-2 text-center" style="width: 12rem" data-bs-toggle="modal" data-bs-target="#createBillingAddress">
            Enregistrer une adresse
        </button>

        <!-- Modal -->
        <div class="modal fade" id="createBillingAddress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createBillingAddress" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createBillingAddressLabel">Enregistrez votre adresse de facturation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <form method="POST" action="{{ route('billing-address.store') }}" name="createBillingAddress">
                            @csrf

                            <div class="form-group">

                                <label for="address">
                                    Rue, Voie, Allée, ...
                                </label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="01 Rue de l'Exemple" required>

                                @error('address')
                                <p>{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="zip_code">
                                    Code postal
                                </label>
                                <input type="text" name="zip_code" id="zip_code" class="form-control" placeholder="00000" required>

                                @error('zip_code')
                                <p>{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="city">
                                    Ville, commune
                                </label>
                                <input type="text" name="city" id="city" class="form-control" placeholder="Paris" required>

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
    </div>
</div>