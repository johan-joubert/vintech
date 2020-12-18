<div class="row">
    <div class="col-md-12 text-center">


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-red mt-2 mb-2 text-center" style="width: 12rem" data-bs-toggle="modal" data-bs-target="#editBillingAddress">
            Modifier
        </button>

        <!-- Modal -->
        <div class="modal fade" id="editBillingAddress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editBillingAddress" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editBillingAddressLabel">Edition de l'adresse de facturation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <form method="POST" action="{{ route('billing-address.update', $user->billingAddress) }}" name="editBillingAddress">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <label for="address">
                                    Rue, Voie, Allée, ...
                                </label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ $user->billingAddress->address }}" required>

                                @error('address')
                                <p>{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="zip_code">
                                    Code postal
                                </label>
                                <input type="text" name="zip_code" id="zip_code" class="form-control" value="{{ $user->billingAddress->zip_code }}" required>

                                @error('zip_code')
                                <p>{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="city">
                                    Ville
                                </label>
                                <input type="text" name="city" id="city" class="form-control" value="{{ $user->billingAddress->city }}" required>

                                @error('city')
                                <p>{{ $message }}</p>
                                @enderror

                            </div>


                            <div class="form-group">

                                <label for="password" class="mt-5">
                                    Tapez votre mot de passe pour valider
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
    </div>
</div>