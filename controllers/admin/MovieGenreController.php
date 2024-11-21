<?php

class MovieGenreController
{
    private $movieGenres;

    private $movies;

    private $genres;

    public function __construct()
    {
        $this->movieGenres = new MovieGenre();
        $this->movies = new Movie();
        $this->genres = new Genre();
    }

    public function create()
    {
        $view = 'movie-genres/create';
        $title = 'Thêm ràng buộc cho Movie và Genre';

        $movies = $this->movies->select();
        $moviePluck = array_column($movies, 'name', 'id');

        $genres = $this->genres->select();
        $genrePluck = array_column($genres, 'name', 'id');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !", 99);
            }

            $data = $_POST;

            $rowCount = $this->movieGenres->insert($data);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thêm ràng buộc thành công!';
                unset($_SESSION['data']);
            } else {
                throw new Exception("Thêm ràng buộc không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=movie-genres-creat');
        exit();
    }
}
