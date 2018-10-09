SELECT NAME
FROM
    db_nmostert.distrib
WHERE
    id_distrib = 42 OR(
        id_distrib >= 62 AND id_distrib < 70
    ) OR id_distrib = 71 OR(
        id_distrib >= 88 AND id_distrib < 91
    ) OR LENGTH(LOWER(NAME)) - LENGTH(
REPLACE
    (LOWER(NAME),'y','')) = 2
LIMIT 2, 5;