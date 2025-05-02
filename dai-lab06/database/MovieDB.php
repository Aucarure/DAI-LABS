<?php
require_once(__DIR__ . '/../model/Movie.php');

class MovieDB {
    public function listar($bd) {
        $sql = "SELECT
        movies.id, movies.title, movies.rating, movies.awards,
        movies.release_year, genres.name as genre_name
        FROM movies, genres
        WHERE movies.genre_id = genres.genre_id";
        $query = $bd->prepare($sql);
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $peliculas;
    }

    public function detalle($bd, $id) {
        $sql = "SELECT
        movies.id, movies.title, movies.rating, movies.awards,
        movies.release_year, movies.length, movies.genre_id,
        genres.name as genre_name
        FROM movies, genres
        WHERE movies.genre_id = genres.genre_id
        AND movies.id = $id";
        $query = $bd->prepare($sql);
        $query->execute();
        $vector = $query->fetch(PDO::FETCH_ASSOC);
        $pelicula = new Movie($vector['id'], $vector['title'], $vector['rating'],
        $vector['awards'], $vector['release_year'], $vector['length'],
        $vector['genre_id']);
        return $pelicula;
    }

    public function agregar($bd, $pelicula) {
        $sql = "INSERT INTO movies(title, rating, awards, release_year, length, genre_id)
        VALUES (:title, :rating, :awards, :releaseYear, :length, :genreId)";
        $query = $bd->prepare($sql);
        $query->bindValue(':title', $pelicula->getTitle());
        $query->bindValue(':rating', $pelicula->getRating());
        $query->bindValue(':awards', $pelicula->getAwards());
        $query->bindValue(':releaseYear', $pelicula->getReleaseYear());
        $query->bindValue(':length', $pelicula->getLength());
        $query->bindValue(':genreId', $pelicula->getGenreId());
        $query->execute();
    }

    public function eliminar($bd, $id) {
        $sql = "DELETE FROM movies WHERE id = :id";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
    
    public function actualizar($bd, $pelicula) {
        $sql = "UPDATE movies SET 
                    title = :title,
                    rating = :rating,
                    awards = :awards,
                    release_year = :release_year,
                    length = :length,
                    genre_id = :genre_id
                WHERE id = :id";
    
        $query = $bd->prepare($sql);
        $query->bindValue(':title', $pelicula->getTitle());
        $query->bindValue(':rating', $pelicula->getRating());
        $query->bindValue(':awards', $pelicula->getAwards());
        $query->bindValue(':release_year', $pelicula->getReleaseYear());
        $query->bindValue(':length', $pelicula->getLength());
        $query->bindValue(':genre_id', $pelicula->getGenreId());
        $query->bindValue(':id', $pelicula->getId());
        $query->execute();
    }
    
} 
?>
