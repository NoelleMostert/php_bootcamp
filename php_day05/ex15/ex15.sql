SELECT
    REVERSE(SUBSTRING(phone_number, 2)) 'rebmunenohp'
FROM
    db_nmostert.distrib
WHERE
    phone_number LIKE "05%";