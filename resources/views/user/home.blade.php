@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if($msg==1)
                    <div class="alert alert-danger">Veuillez mettre à jour votre profil</div>
                    <div class="profil_update">
                        <form role="form" method="POST" action="{{ url('user/first-informations-update') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="profession" class="col-md-4 col-form-label text-md-right">{{ __('Profession') }}</label>

                                <div class="col-md-6">
                                    <input id="profession" type="text" placeholder="votre profession" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" required autocomplete="profession" autofocus>

                                    @error('profession')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>

                                <div class="col-md-6">
                                    <input id="telephone" type="text" placeholder="ex: +228 00000000" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone">

                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ville" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>

                                <div class="col-md-6">
                                    <input id="ville" type="text" placeholder="votre ville de residence" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="ville">

                                    @error('ville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>

                                <div class="col-md-6">
                                    <input id="adresse" type="text" placeholder="adresse complete" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse">

                                    @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="competences" class="col-md-4 col-form-label text-md-right">Vos competences</label>
                                <div class="col-md-6">
                                    <div class="form-control @error('competences') is-invalid @enderror">
                                        <input type="checkbox" id="html" name="competences[]" value="html">
                                        <label for="html">HTML</label>
                                        <input type="checkbox" id="css" name="competences[]" value="css">
                                        <label for="css">css</label>
                                        <input type="checkbox" id="js" name="competences[]" value="js">
                                        <label for="js">js</label>
                                        <input type="checkbox" id="php" name="competences[]" value="php">
                                        <label for="php">php</label>
                                    </div>
                                    @error('competences')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Parlez nous de votre parcours') }}</label>
                                <div class="col-md-6">
                                    <div class="@error('description') is-invalid @enderror"></div>
                                    <textarea class="form-control" id="editor1" name="description" rows="10" cols="80">
                                                  Exemple:
                                                  je suis fort en PHP, je vous developperez un site web pro en juste 3 jours
                                        </textarea>

                                    <!-- <input id="description" type="text" placeholder="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus> -->

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                                        <option value="AL">Alabama</option>
                                        <option value="WY">Wyoming</option>
                                        <option value="WB">Wyomingb</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Mettre à jour') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection