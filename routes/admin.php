<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'                 => (new DashboardController)->index(),

    // CRUD Genres
    'genres-list'       => (new GenreController)->list(),
    'genres-create'     => (new GenreController)->create(),
    'genres-store'      => (new GenreController)->store(),
    'genres-show'       => (new GenreController)->show(),
    'genres-updatePage' => (new GenreController)->updatePage(),
    'genres-update'     => (new GenreController)->update(),
    'genres-delete'     => (new GenreController)->delete(),

    // CRUD Artists
    'artists-list'       => (new ArtistController)->list(),
    'artists-create'     => (new ArtistController)->create(),
    'artists-store'      => (new ArtistController)->store(),
    'artists-show'       => (new ArtistController)->show(),
    'artists-updatePage' => (new ArtistController)->updatePage(),
    'artists-update'     => (new ArtistController)->update(),
    'artists-delete'     => (new ArtistController)->delete(),
};
