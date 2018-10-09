SELECT
    COUNT(DATE) 'movies'
FROM
    db_nmostert.member_history
WHERE
    DATE(DATE) >= '2006-10-30' AND DATE(DATE) <= '2007-07-27' OR MONTH(DATE) = 12 AND DAY(DATE) = 24;