@extends('layouts.main')
@section('content')
    <h1>LARAVEL ELOQUENT</h1>
    <h2>Eine Übersicht über die nötigen Konsolen-Befehle</h2><hr>
    <h3><code>php artisan make:model User</code></h3>
    <p>Ein neues Model erzeugen</p>
    <h3><code>php artisan make:model User --migration</code></h3>
    <p>-- die Migrations-Datei (Schema der Tabelle, nicht die Tabelle selbst)</p>
    <h3><code>php artisan migrate</code></h3>
    <p>Eine neue Tabelle wird erzeugt.</p>
    <h3><code>php artisan migrate:rollback</code></h3>
    <p>Die letzte Veränderung durch 'migrate' wird rückgängig gemacht</p>
    <h3><code>npm install   /   npm run dev</code></h3>
    <p>Javascript und CSS werden generiert</p>
    <h3><code>php artisan make:controller PagesController</code></h3>
    <p>Einen neuen Controller erzeugen</p>
@endsection
