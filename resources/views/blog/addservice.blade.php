@extends('blog.cssjsbase')
@section('titrepage', 'Ajouter un Service')
@section('titrepage', 'Ajouter un service')
@section('contenudelapage')

    <main id="main" class="main">

        <form method="post" class="row g-3">
            @csrf
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Your Name" name="servicename">
                    <label for="floatingName">Libelle Service</label>
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
