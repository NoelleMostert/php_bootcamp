INSERT INTO db_nmostert.ft_table(`login`, `group`, `creation_date`)
SELECT
    last_name,
    'other',
    birthdate
FROM
    db_nmostert.user_card
WHERE
    LENGTH(last_name) < 9 AND last_name LIKE '%a%'
ORDER BY
    last_name
LIMIT 10;