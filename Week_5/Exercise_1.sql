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
select * from (SELECT category.name,category.category_id, count(*) as number FROM film_category
inner join category on category.category_id = film_category.category_id
group by category_id) as result 
where number between 55 and 65
order by result.number desc

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

