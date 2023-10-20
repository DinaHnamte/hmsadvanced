
create table `auth_role`
(
   `id` int(11) NOT NULL Primary KEY AUTO_INCREMENT,
   `name`                 varchar(64) not null,
   `app_id`               varchar(10) not null,
   `description`          text,
   `created_at`           integer,
   `updated_at`           integer,
   INDEX (`name`, `app_id`)
) engine InnoDB;

create table `auth_assignment`
(
   `id` int(11) NOT NULL Primary KEY AUTO_INCREMENT,
   `role_id`            varchar(64) not null,
   `tenant_id`               char(13) not null,
   `user_id`              varchar(11) not null,
   `created_at`           integer,
   INDEX (`role_id`, `user_id`, `tenant_id`)
) engine InnoDB;

create table `app`
(
   `id` int(11) NOT NULL Primary KEY AUTO_INCREMENT,
   `name`            varchar(10) not null
) engine InnoDB;

CREATE TABLE `tenantapp` (
  `id` int(11) NOT NULL UNIQUE KEY AUTO_INCREMENT,
  `app_id` char(10) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  primary key (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `tenants` (
  `id` char(13) NOT NULL,
  `app_id` char(10) NOT NULL,
  `regby_id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `mobno` varchar(10) NOT NULL DEFAULT '0',
  `add1` varchar(50) NOT NULL DEFAULT '',
  `dist` varchar(50) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  primary key (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `hsp` (
  `id` char(13) NOT NULL,
  `regby_id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `mobno` varchar(10) NOT NULL DEFAULT '0',
  `add1` varchar(50) NOT NULL DEFAULT '',
  `dist` varchar(50) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  primary key (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hsp_id` char(13) NOT NULL,
  `name` varchar(100) NOT NULL,
  primary key (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `employee` (
  `id` int(11) NOT NULL UNIQUE KEY AUTO_INCREMENT,
  `hsp_id` char(13) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  primary key (`id`),
  INDEX (hsp_id, user_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci AUTO_INCREMENT=10000000;

CREATE TABLE `reguser` (
  `id` int(11) NOT NULL,
  `pwd` bit(1) NOT NULL DEFAULT b'0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `fname` varchar(50) NOT NULL DEFAULT '',
  `dob` date NOT NULL DEFAULT '0001-01-01',
  `sex` varchar(10) NOT NULL DEFAULT '',
  `tribe` varchar(10) NOT NULL DEFAULT '',
  `commu` varchar(20) NOT NULL DEFAULT '',
  `religion` varchar(20) NOT NULL DEFAULT '',
  `bg` varchar(10) NOT NULL DEFAULT '',
  `mobno` varchar(10) NOT NULL DEFAULT '0',
  `add1` varchar(50) NOT NULL DEFAULT '',
  `dist` varchar(50) NOT NULL DEFAULT '',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  primary key (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci AUTO_INCREMENT=1000000;

--
-- Table structure for table `opdreg`
--

CREATE TABLE `opdreg` (
  `id` int(11) NOT NULL UNIQUE KEY AUTO_INCREMENT,
  `idpat` int(11) NOT NULL DEFAULT 0,
  `idHsp` int(11) NOT NULL DEFAULT 0,
  `cplaint` varchar(250) NOT NULL DEFAULT '',
  `refdept` varchar(100) NOT NULL DEFAULT '',
  `dr` varchar(100) NOT NULL DEFAULT '',
  `admit` bit(1) NOT NULL DEFAULT b'0',
  `created_at` datetime DEFAULT NULL,
   primary key (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Table structure for table `opddiag`
--

CREATE TABLE `opddiag` (
  `id` int(11) NOT NULL,
  `idpat` int(11) NOT NULL DEFAULT 0,
  `idopd` int(11) NOT NULL DEFAULT 0,
  `diag` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `idopd` int(11) NOT NULL DEFAULT 0,
  `idmyicd10` int(11) NOT NULL DEFAULT 0,
  `icd_code` varchar(6) NOT NULL DEFAULT '0',
  `diag` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `myicd10` (
  `id` int(11) NOT NULL UNIQUE KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `chapterid` char(2) NOT NULL DEFAULT 0,
  `blockid` char(3) NOT NULL DEFAULT 0,
  `icd10id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL DEFAULT '',
  primary key (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ;

CREATE TABLE `prescript` (
  `id` char(13) NOT NULL PRIMARY Key,
  `prescript_dt` date NOT NULL DEFAULT '0001-01-01',         
  `encounter_id` int(11) NOT NULL DEFAULT 0,
  `med_id` int(11) NOT NULL DEFAULT 0,
  `medi` varchar(100) NOT NULL DEFAULT '',
  `dose` varchar(100) NOT NULL DEFAULT '',
  INDEX (`encounter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `encounter` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `encounter_type` varchar(20) NOT NULL DEFAULT '',   
  `pat_id` int(11) NOT NULL DEFAULT 0,
  `hsp_id` char(13) NOT NULL DEFAULT 0,
  `chief_complaint` varchar(250) NOT NULL DEFAULT '',
  `ref_dept` varchar(100) NOT NULL DEFAULT '',
  `dr_id` varchar(100) NOT NULL DEFAULT '',
  `admit` bit(1) NOT NULL DEFAULT b'0',
  `reg_fee` int(4) NOT NULL DEFAULT 0,
  `registered_at` int(11) DEFAULT 0,                
  `counter_at` int(11) DEFAULT 0,                   
  `session_start_at` int(11) DEFAULT 0,             
  `session_end_at` int(11) DEFAULT 0,               
   INDEX (`pat_id`, `hsp_id`,`ref_dept`,`dr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `myicd10` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `icd10id` int(11) NOT NULL DEFAULT '0',
  `icd_code` char(6) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `idsp_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;