<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manger pour les nuls</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
  
    <div class="bg-primary text-white p-3 d-flex justify-content-between align-items-center">
        <h2>Manger pour les nuls</h2>
        <div class="dropdown">
            <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Se déconnecter
                </a></li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

    <div class="container-fluid p-4">
 
        <div class="d-flex justify-content-end mb-3">
            @can('create dishes')
            <a href="{{ route('plats.create') }}" class="btn btn-primary">CRÉER</a>
            @endcan
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th></th>
                        <th>Titre</th>
                        <th>Créateur</th>
                        <th>Likes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plats as $plat)
                    <tr>
                        <td>
                            @auth
                            <form action="{{ route('plats.favorite', $plat) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 border-0">
                                    @if(auth()->user()->favoris->contains($plat->id))
                                        <i class="bi bi-heart-fill text-primary fs-4"></i>
                                    @else
                                        <i class="bi bi-heart text-muted fs-4"></i>
                                    @endif
                                </button>
                            </form>
                            @endauth
                        </td>
                        <td>{{ $plat->titre ?? 'Lorem ipsum' }}</td>
                        <td>{{ $plat->user->name }}</td>
                        <td>{{ number_format($plat->likes_count ?? 0) }}</td>
                        <td>
                        
                            <a href="{{ route('plats.show', $plat) }}" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>
                            @can('create dishes')
                            <a href="{{ route('plats.edit', $plat) }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            @endcan
                            @can('create dishes')
                            <form action="{{ route('plats.destroy', $plat) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" 
                                        onclick="return confirm('Êtes-vous sûr ?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ $plats->previousPageUrl() }}" class="btn btn-primary {{ $plats->onFirstPage() ? 'disabled' : '' }}">
                PRÉCÉDENT
            </a>
            <span>Page {{ $plats->currentPage() }}</span>
            <a href="{{ $plats->nextPageUrl() }}" class="btn btn-primary {{ !$plats->hasMorePages() ? 'disabled' : '' }}">
                SUIVANT
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>