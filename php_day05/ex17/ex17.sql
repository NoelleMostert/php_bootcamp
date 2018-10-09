SELECT
    COUNT(*) 'nb_susc',
    FLOOR(AVG(price)) 'av_susc',
    (SUM(duration_sub) % 42) 'ft'
FROM
    db_nmostert.subscription;