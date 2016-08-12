/*first create a view which will gather 
 *and adds count while comparing with 
 *the second procedure if that 1 has the same name*/

CREATE VIEW procedures (procedure_id, compare_second_Procedure, total)
AS SELECT P1.proc_id, P2.proc_id, COUNT(*)
FROM AnestProcedures AS P1, AnestProcedures AS P2, AnestProcedures AS P3
WHERE P2.anest_name = P1.anest_name
AND P3.anest_name = P1.anest_name
AND P1.start_time <= P2.start_time
AND P2.start_time < P1.end_time
AND P3.start_time <= P2.start_time
AND P2.start_time < P3.end_time
GROUP BY P1.proc_id, P2.proc_id;

/*after creating the view i get the Max 
 *of the column total and group tham by
 *procedure_id*/
use HospitalRecords;
SELECT procedure_id AS proc_id, MAX(total) AS max_inst_count
FROM procedures
GROUP BY procedure_id;
