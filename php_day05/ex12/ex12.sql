SELECT
    last_name,
    first_name
FROM
    db_nmostert.user_card
WHERE
    user_card.last_name LIKE "%-%" OR user_card.first_name LIKE "%-%"
ORDER BY
    last_name,
    first_name ASC;