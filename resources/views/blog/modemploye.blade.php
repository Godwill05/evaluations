@extends('blog.cssjsbase')
@section('titrepage', 'Modifier un employer')
@section('contenudelapage')

    <main id="main" class="main">

        <form method="post" class="row g-3">
            @csrf
            
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="Nom" name="names" value="{{$employeamodif->nom}}">
                        <label for="floatingName">Nom</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="Prénom" name="surname" value="{{$employeamodif->prenom}}">
                        <label for="floatingName">Prénom</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingEmail" placeholder="Email" name="mail" value="{{$employeamodif->mail_employe}}">
                        <label for="floatingEmail">Your Email</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Service" name="idservice">
                            <option value="{{ $service->id_service }}" selected>
                                {{ $service->libelle_service }}
                            </option>
                                @foreach ($allservice as $result)
                                    @if ($result->libelle_service != $service->libelle_service)
                                        <option value="{{ $result->id_service }}">
                                            {{ $result->libelle_service }} 
                                        
                                        </option>
                                    @endif
                                @endforeach
                        </select>
                        <label for="floatingSelect">Service</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
        </form><!-- End floating Labels Form -->
        

        <div class="container">
            @if (session('success'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
        </div>
    </main>
@endsection()

