SELECT
    UPPER(user_card.last_name) AS 'NAME',
    user_card.first_name,
    subscription.price
FROM
    db_nmostert.member
INNER JOIN db_nmostert.user_card ON user_card.id_user = member.id_user_card
INNER JOIN db_nmostert.subscription ON subscription.id_sub = member.id_sub
WHERE
    subscription.price > 42
ORDER BY
    user_card.first_name,
    user_card.last_name ASC;