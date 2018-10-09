SELECT
    title,
    summary
FROM
    db_nmostert.film
WHERE
    LOWER(summary) LIKE '%vincent%'
ORDER BY
    id_film ASC;