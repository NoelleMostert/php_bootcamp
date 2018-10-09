SELECT
    COUNT(*) AS 'nb_short-films'
FROM
    db_nmostert.film
WHERE
    duration <= 42;