@extends('blog.cssjsbase')
@section('titrepage', 'Liste de Employés')
@section('contenudelapage')
    <main id="main" class="main">
        <section class="section">
            <div class="container">
                @if (session('employermodifier'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                        {{ session('servicemodifier') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @elseif (session('supprimer'))
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close">
                    </button>
                </div>
                @endif
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Lise des employé</h5>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>
                                            <b>Id</b>
                                        </th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Mail</th>
                                        <th>Service</th>
                                        <th>Créé le </th>
                                        <th>Modifié dernièrement le </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $result)
                                        <tr>
                                            <td>{{ $result->id_employe }}</td>
                                            <td>{{ $result->nom }}</td>
                                            <td>{{ $result->prenom }}</td>
                                            <td>{{ $result->mail_employe }}</td>
                                            <td>{{ $result->service->libelle_service }}</td>
                                            <td>{{ $result->created_at }}</td>
                                            <td>{{ $result->updated_at }}</td>
                                            <td>
                                                
                                                    <a href="{{route('blogmodifieremployer', ['id'=>$result->id_employe, 'idemploye'=>$result->service->id_service])}}">
                                                        <button type="submit" class="btn btn-outline-success heigh-5">Modifier</button>&nbsp;<br><br>
                                                    </a>
                                                    <a href="{{ route('blogsuppresiondemployer', $result->id_employe) }}">
                                                        <button type="reset" class="btn btn-outline-danger">Supprimer</button>
                                                    </a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    @endsection
</main>
