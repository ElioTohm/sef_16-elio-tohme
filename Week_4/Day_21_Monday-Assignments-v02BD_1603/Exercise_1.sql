-- create tables

USE `MedicalInstitution`;

CREATE TABLE IF NOT EXISTS `Claims` (
    `claim_id` int(11) NOT NULL,
    `patient_name` varchar(45) NOT NULL,
    PRIMARY KEY (`claim_id`)
)  ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `ClaimStatusCodes` (
    `claim_status` varchar(2) NOT NULL,
    `claim_status_desc` varchar(45) NOT NULL,
    `claim_seq` int(11) NOT NULL,
    PRIMARY KEY (`claim_seq`)
)  ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Defendants` (
    `claim_id` int(11) NOT NULL,
    `defendant_name` varchar(45) NOT NULL,
    PRIMARY KEY (`claim_id` , `defendant_name`),
    KEY `claim_id_idx` (`claim_id`),
    CONSTRAINT `claim_id` FOREIGN KEY (`claim_id`)
        REFERENCES `Claims` (`claim_id`)
        ON DELETE CASCADE ON UPDATE CASCADE
)  ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `LegalEvents` (
    `claim_id` int(11) NOT NULL,
    `defendant_name` varchar(45) NOT NULL,
    `claim_status` varchar(2) NOT NULL,
    `change_date` date DEFAULT NULL,
    PRIMARY KEY (`claim_id` , `defendant_name` , `claim_status`)
)  ENGINE=InnoDB DEFAULT CHARSET=latin1;

Insert into Claims Values (1, 'Bassem Dghaidi');
Insert into Claims Values (2, 'Omar Breidi');
Insert into Claims Values (3, 'Marwan Sawan');

Insert into Defendants Values (1, 'Jean Skaff');
Insert into Defendants Values (1, 'Elie Meouchi');
Insert into Defendants Values (1, 'Radwan Sameh');
Insert into Defendants Values (2, 'Joseph Eid');
Insert into Defendants Values (2, 'Paul Syoufi');
Insert into Defendants Values (2, 'Radwan Sameh');
Insert into Defendants Values (3, 'Issam Awwad');

Insert into LegalEvents Values (1, 'Jean Skaff', 'OR', '2016-02-02');
Insert into LegalEvents Values (1, 'Jean Skaff', 'SF', '2016-03-01');
Insert into LegalEvents Values (1, 'Jean Skaff', 'CL', '2016-04-01');
Insert into LegalEvents Values (1, 'Radwan Sameh', 'AP', '2016-01-01');
Insert into LegalEvents Values (1, 'Radwan Sameh', 'OR', '2016-02-02');
Insert into LegalEvents Values (1, 'Radwan Sameh', 'SF', '2016-03-01');
Insert into LegalEvents Values (1, 'Elie Meouchi', 'AP', '2016-01-01');
Insert into LegalEvents Values (1, 'Elie Meouchi', 'OR', '2016-02-02');
Insert into LegalEvents Values (2, 'Radwan Sameh', 'AP', '2016-01-01');
Insert into LegalEvents Values (2, 'Radwan Sameh', 'OR', '2016-02-02');
Insert into LegalEvents Values (2, 'Paul Syoufi', 'AP', '2016-01-01');
Insert into LegalEvents Values (3, 'Issam Awwad', 'AP', '2016-01-01');



select 
    claim_id, patient_name, claim_status
from
    (select 
        maxclaimtable.claim_id,
            maxclaimtable.defendant_name,
            Claims.patient_name,
            ClaimStatusCodes.claim_status,
            min(maxclaimtable.maxclaimID)
    from
        (select 
        LegalEvents.claim_id,
            LegalEvents.defendant_name,
            max(ClaimStatusCodes.claim_seq) as maxclaimID
    from
        LegalEvents
    inner join ClaimStatusCodes ON ClaimStatusCodes.claim_status = LegalEvents.claim_status
    group by LegalEvents.defendant_name , LegalEvents.claim_id) as maxclaimtable
    inner join ClaimStatusCodes ON ClaimStatusCodes.claim_seq = maxclaimtable.maxclaimID
    inner join Claims ON Claims.claim_id = maxclaimtable.claim_id
    group by Claims.claim_id) as result