SELECT
    film.title AS 'Title',
    film.summary AS 'Summary',
    film.prod_year
FROM
    db_nmostert.film
INNER JOIN db_nmostert.genre ON film.id_genre = genre.id_genre
WHERE
    genre.name = 'erotic'
ORDER BY
    film.prod_year
DESC;