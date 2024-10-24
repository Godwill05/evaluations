@extends('blog.cssjsbase')
@section('titrepage', 'Liste des Services')
@section('contenudelapage')

    <main id="main" class="main">
        <section class="section">
            <div class="container">
                @if (session('servicemodifier'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                        {{ session('servicemodifier') }}
                        
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @elseif (session('success'))
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close">
                    </button>
                </div>
                @endif
            </div>
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
                                        <th>Libellé</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($service as $result)
                                    <tr>
                                        <td>{{ $result->id_service }}</td>
                                        <td>{{ $result->libelle_service }}</td>
                                        <td>
                                            <a href="{{ route('blogmodierservice', ['id'=>$result->id_service]) }}">
                                                <button type="submit" class="btn btn-outline-success heigh-5">Modifier</button></a>    
                                            &nbsp;<br><br>
                                            <a href="{{ route('blogblogsuppresionservice', $result->id_service) }}">
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
