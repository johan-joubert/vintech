<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfile">
    Modifier le profil
</button>

<!-- Modal -->
<div class="modal fade" id="editProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileLabel">Edition du profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form method="POST" action="{{ route('update.profile') }}" name="edit">
                    @csrf
                    @method('PUT')

                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>

                        @error('email')
                        <p>{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="firstName">
                            Prénom
                        </label>
                        <input type="text" name="firstName" id="firstName" class="form-control" value="{{ $user->first_name }}" required>

                        @error('firstName')
                        <p>{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="lastName">
                            Prénom
                        </label>
                        <input type="text" name="lastName" id="lastName" class="form-control" value="{{ $user->last_name }}" required>

                        @error('lastName')
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