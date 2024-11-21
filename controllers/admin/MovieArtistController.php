<?php

class MovieArtistController
{
    private $movieArtist;
    private $movie;
    private $artist;
    public function __construct()
    {
        $this->movieArtist = new MovieArtist();
        $this->movie = new Movie();
        $this->artist = new Artist();
    }
    public function create()
    {
        $view = 'movie-artists/create';
        $title = 'Thêm ràng buộc cho Movie và Artist';

        $movie = $this->movie->select();
        $moviePluck = array_column($movie, 'name', 'id');

        $artist = $this->artist->select();
        $artistPluck = array_column($artist, 'name', 'id');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !", 99);
            }

            $data = $_POST;

            $rowCount = $this->movieArtist->insert($data);

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

        header('Location: ' . BASE_URL_ADMIN . '&action=movie-artists-create');
        exit();
    }
}