
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h4>Choisissez votre type de livraison</h4>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12 text-center">
            <form method="POST" name="deliveryChoice" action="{{ route('delivery.choice') }}">
                @csrf


                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="standardDelivery">
                    <label class="form-check-label" for="inlineRadio1">
                        Livraison standard : Gratuit
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="expressDelivery">
                    <label class="form-check-label" for="inlineRadio2">
                        Livraison express (sous 48h) : 9.99 €
                    </label>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-secondary">
                        Choisir
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>