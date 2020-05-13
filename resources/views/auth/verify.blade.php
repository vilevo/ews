@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Etape - 2 {{ __('Verification de votre adresse mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Nous vous avons envoyé un lien de vérification.') }}
                    </div>
                    @endif

                    {{ __('Avant de continuer, veuillez s\'il vous plait confirmer votre adresse mail via le lien de vérification.') }}
                    {{ __('Si vous n\'avez pas de reçu le mail') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('cliquez ici pour envoyer un nouveau mail') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection