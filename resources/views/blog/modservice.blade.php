@extends('blog.cssjsbase')
@section('titrepage', 'Modifier un service')
@section('contenudelapage')

    <main id="main" class="main">

        <form method="post" class="row g-3">
            @csrf
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Service" name="servicename" value="{{ $service->libelle_service }}">
                    <label for="floatingName">Libelle Service</label>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Enregistrer</button>
                <button type="reset" class="btn btn-danger">Reprendre</button>
            </div>
        </form><!-- End floating Labels Form -->
        
    </main>
