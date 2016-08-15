-- create tables
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


