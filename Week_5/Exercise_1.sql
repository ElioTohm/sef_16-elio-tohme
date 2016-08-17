-- SBQ_1
SELECT 
    first_name, last_name, count(*)
FROM
    film_actor
        inner join
    actor ON actor.actor_id = film_actor.actor_id
group by film_actor.actor_id;

-- SBQ_2
select 
    name
from
    (select 
        language_id, count(*) as countmovie
    from
        film
    group by release_year
    order by countmovie desc
    limit 3) as toplanguage
        inner join
    language ON language.language_id = toplanguage.language_id

-- SBQ_3
select 
    ctr.country, count(c.customer_id) as co
from
    customer as c
        inner join
    address as a
        inner join
    city as ci
        inner join
    country as ctr
where
    c.address_id = a.address_id
        and a.city_id = ci.city_id
        and ctr.country_id = ci.country_id
group by ctr.country
order by co desc
limit 3;

-- SBQ_4
select 
    *
from
    address
where
    address2 is not null and address2 <> ''

-- SBQ_5
select 
    actor.first_name, actor.last_name, films.release_year
from
    (select 
        film_id, release_year
    from
        film
    where
        description like '%Shark%'
            and description like '%Crocodile%') as films
        inner join
    film_actor ON film_actor.film_id = films.film_id
        inner join
    actor ON actor.actor_id = film_actor.actor_id

-- SBQ_6
select SQL_CALC_FOUND_ROWS
    *
from
    (select 
        firstTable.category as category, firstTable.count as count
    from
        (select 
        c.name as category, count(*) as count
    from
        category as c, film_category as fc, film as f
    where
        c.category_id = fc.category_id
            and fc.film_id = f.film_id
    group by c.category_id) as firstTable
    where
        firstTable.count between 55 and 66
    order by firstTable.count desc
    limit 3) as t 
UNION SELECT 
    *
FROM
    (select 
         secondTable.category,  secondTable.count
    from
        (select 
        c.name as category, count(*) as count
    from
        category as c, film_category as fc, film as f
    where
        c.category_id = fc.category_id
            and fc.film_id = f.film_id
    group by c.category_id) as  secondTable
    where
         secondTable.count < 55
            or  secondTable.count > 66
    order by  secondTable.count desc
    limit 3) as t2
where
    FOUND_ROWS() = 0
;

--SBQ_7
select 
    actor.first_name, actor.last_name, 'actor' as type
from
    (select 
        first_name
    from
        actor
    where
        actor_id = 8) as NAME
        inner join
    actor ON actor.first_name = NAME.first_name 
union select 
    customer.first_name, customer.last_name, 'customer' as type
from
    (select 
        first_name
    from
        actor
    where
        actor_id = 8) as NAME
        inner join
    customer ON customer.first_name = NAME.first_name

--SBQ_8
select 
    staff.store_id,
    month(payment_date),
    year(payment_date),
    sum(amount),
    avg(amount)
from
    payment
        inner join
    staff ON staff.staff_id = payment.staff_id
group by month(payment_date) , year(payment_date) , staff.store_id

--SBQ_9
SELECT 
    *, count(*) as numRental
FROM
    payment
where
    year(payment_date) = 2005
group by customer_id
order by numRental desc
limit 3