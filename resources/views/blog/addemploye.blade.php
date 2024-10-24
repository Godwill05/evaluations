@extends('blog.cssjsbase')
@section('titrepage', 'Ajouter un employer')
@section('contenudelapage')

    <main id="main" class="main">

        <form method="POST" class="row g-3">
            @csrf
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Nom" name="names">
                    <label for="floatingName">Nom</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Prénom" name="surname">
                    <label for="floatingName">Prénom</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingEmail" placeholder="Email" name="mail">
                    <label for="floatingEmail">Email</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="State" name="idservice">
                        @foreach ($service as $result)
                            <option value="{{ $result->id_service }}">{{ $result->libelle_service }}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">State</label>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Enregistrer</button>
                <button type="reset" class="btn btn-danger">Reprendre</button>
            </div>
        </form><!-- End floating Labels Form -->

        <div class="container">
            @if (session('success'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close">
                    </button>
                </div>
            @endif
        </div>
    </main>
