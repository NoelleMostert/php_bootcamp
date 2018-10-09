SELECT
    title,
    summary
FROM
    db_nmostert.film
WHERE
    title LIKE '%42%' OR summary LIKE '%42%'
ORDER BY
    duration ASC;