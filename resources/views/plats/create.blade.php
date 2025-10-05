<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un plat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Créer un nouveau plat</h1>

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

        <form action="{{ route('plats.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="titre" class="form-label">Titre:</label>
                <input type="text" name="titre" id="titre" class="form-control" 
                       value="{{ old('titre') }}" required>
            </div>

            <div class="mb-3">
                <label for="recette" class="form-label">Recette:</label>
                <textarea name="recette" id="recette" class="form-control" rows="5" required>{{ old('recette') }}</textarea>
            </div>
            
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Créer</button>
                <a href="{{ route('plats.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>