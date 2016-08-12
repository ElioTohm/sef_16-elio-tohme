/*created trigger that checks if start date smaller than end_date
 *i didn't need more since all the columns in the created table 
 *are unique and not null*/
 use FinanceDB;
delimiter $$
create trigger date_check before insert on FiscalYearTable
for each row
begin
if new.start_date > new.end_date then
signal sqlstate '45000' 
SET MESSAGE_TEXT = "starting date is bigger than end date please fix";
end if;
end $$
delimiter ;