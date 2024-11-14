<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'                 => (new DashboardController)->index(),

    // CRUD Genres
    'genres-list'       => (new GenreController)->list(),
    'genres-create'     => (new GenreController)->create(),
    'genres-store'      => (new GenreController)->store(),
    'genres-show'       => (new GenreController)->show(),
    'genres-toUpdate'   => (new GenreController)->toUpdate(),
    'genres-update'     => (new GenreController)->update(),
    'genres-delete'     => (new GenreController)->delete(),
};
