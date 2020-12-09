<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPassword">
    Modifier le mot de passe
</button>

<!-- Modal -->
<div class="modal fade" id="editPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editPasswordLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPasswordLabel">Edition du mot de passe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form method="POST" action="{{ route('update_password', $user) }}" name="editPassword">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">

                        <label for="oldPassword">
                            Ancien mot de passe
                        </label>
                        <input type="password" name="oldPassword" id="oldPassword" class="form-control" required>

                        @error('oldPassword')
                        <p>{{ $message }}</p>
                        @enderror

                        <div class="form-group">

                            <label for="password">
                                Nouveau mot de passe
                            </label>
                            <input type="password" name="password" id="password" class="form-control" required>

                            @error('password')
                            <p>{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label for="password_confirmation">
                                Confirmation nouveau mot de passe
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>

                            @error('password_confirmation')
                            <p>{{ $message }}</p>
                            @enderror

                        </div>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                        <button type="submit" class="btn btn-primary">
                            Modifier
                        </button>

                </form>

            </div>

        </div>
    </div>
</div>