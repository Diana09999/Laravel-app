<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le plat - {{ $plat->titre }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Modifier le plat</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('plats.update', $plat) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="titre" class="form-label">Titre:</label>
                <input type="text" name="titre" id="titre" class="form-control" 
                       value="{{ old('titre', $plat->titre) }}" required>
            </div>

            <div class="mb-3">
                <label for="recette" class="form-label">Recette:</label>
                <textarea name="recette" id="recette" class="form-control" rows="5" required>{{ old('recette', $plat->recette) }}</textarea>
            </div>
            
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="{{ route('plats.show', $plat) }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>