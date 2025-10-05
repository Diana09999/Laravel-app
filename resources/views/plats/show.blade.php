<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $plat->titre }} - Manger pour les nuls</title>
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

    <div class="container-fluid p-4" style="border: 2px solid red;">
        <h3 class="text-danger mb-3">View dish</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="mb-3">
                    <label class="form-label text-muted">Titre</label>
                    <div class="form-control bg-light">{{ $plat->titre }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted">Recette</label>
                    <div class="form-control bg-light" style="min-height: 100px; white-space: pre-wrap;">{{ $plat->recette }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted">Likes</label>
                    <div class="form-control bg-light">{{ $plat->favoris ? number_format($plat->favoris->count()) : '0' }}</div>
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted">Créateur</label>
                    <div class="form-control bg-light">{{ $plat->user->name ?? 'Gautier DELEGLISE' }}</div>
                </div>

                <div class="d-flex justify-content-end">
                    @can('create dishes')
                        <a href="{{ route('plats.edit', $plat) }}" class="btn btn-primary">ÉDITER</a>
                    @endcan
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>