-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 12:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmsbasic`
--

-- --------------------------------------------------------

--
-- Table structure for table `pcsindex`
--

CREATE TABLE `pcsindex` (
  `id` varchar(4) NOT NULL Primary KEY,
  `op_procedure` varchar(44) DEFAULT NULL,
  `description` varchar(167) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pcsindex`
--

INSERT INTO `pcsindex` (`id`, `op_procedure`, `description`) VALUES
('AAA', 'Abdominal aortic aneurysm repair', 'Resection of abdominal aorta with anastomosis or replacement'),
('AMP', 'Limb amputation', 'Total or partial amputation or disarticulation of the upper or lower limbs, including digits'),
('APPY', 'Appendix surgery', 'Operation of appendix'),
('AVSD', 'AV shunt for dialysis ', 'Arteriovenostomy for renal dialysis'),
('BILI', 'Bile duct, liver or pancreatic surgery', 'Excision of bile ducts or operative procedures on the biliary tract, liver or pancreas (does not include operations on gallbladder only)'),
('BRST', 'Breast surgery', 'Excision of lesion or tissue of breast including radical, modified, or quadrant resection, lumpectomy, incisional biopsy, or mammoplasty'),
('CARD', 'Cardiac surgery', 'Procedures on the heart; includes valves or septum; does not include coronary artery bypass graft, surgery on vessels, heart transplantation, or pacemaker implantation'),
('CBGB', 'Coronary bypass with chest & donor incisions', 'Chest procedure to perform direct revascularization of the heart; includes obtaining suitable vein from donor site for grafting'),
('CBGC', 'Coronary bypass graft with chest incision', 'Chest procedures to perform direct vascularization of the internal mammary (thoracic) artery'),
('CEA', 'Carotid endarterectomy', 'Endarterectomy on vessels of head and neck (includes carotid artery and jugular vein)'),
('CHOL', 'Gallbladder surgery', 'Cholecystectomy and cholecystotomy'),
('COLO', 'Colon surgery', 'Incision, resection, or anastomosis of the large intestine; includes large-to-small and small-to-large bowel anastomosis; see REC for rectal operations'),
('CRAN', 'Craniotomy', 'Excision, repair or exploration of the brain or meninges; does not include taps or punctures'),
('CSEC', 'Cesarean section', 'Obstetrical delivery by cesarean section'),
('FUSN', 'Spinal fusion', 'Immobilization of spinal column'),
('FX', 'Open reduction of fracture', 'Open reduction of fracture or dislocation of long bones with our without internal or external fixation; does not include placement of joint prosthesis'),
('GAST', 'Gastric surgery', 'Incision or excision of stomach; includes subtotal or total gastrectomy; does not include vagotomy and fundoplication'),
('HER', 'Herniorrhaphy', 'Repair of inguinal, femoral, umbilical, or  anterior abdominal wall hernia; does not include repair of diaphragmatic or hiatal hernia or hernias at other body sites '),
('HPRO', 'Hip prosthesis', 'Arthroplasty of hip'),
('HTP', 'Heart transplant', 'Transplantation of heart'),
('HYST', 'Abdominal hysterectomy', 'Abdominal hysterectomy; includes that by laparoscope'),
('KPRO', 'Knee prosthesis', 'Arthroplasty of knee'),
('KTP', 'Kidney transplant', 'Transplantation of kidney'),
('LAM', 'Laminectomy', 'Exploration or decompression of spinal cord through excision or incision into vertebral structures'),
('LTP', 'Liver transplant', 'Transplantation of liver'),
('NECK', 'Neck surgery', 'Major excision or incision of the larynx and radical neck dissection; does not include thyroid and parathyroid operations'),
('NEPH', 'Kidney surgery', 'Resection or manipulation of the kidney with or without removal of related structures'),
('OVRY', 'Ovarian surgery', 'Operations on ovary and related structures'),
('PACE', 'Pacemaker surgery', 'Insertion, manipulation or replacement of pacemaker'),
('PRST', 'Prostate surgery', 'Suprapubic, retropubic, radical, or perineal excision of the prostate; does not include transurethral resection of the prostate'),
('PVBY', 'Peripheral vascular bypass surgery', 'Bypass operations on peripheral arteries and veins'),
('REC', 'Rectal surgery ', 'Operations on rectum'),
('SB', 'Small bowel surgery', 'Incision or resection of the small intestine; does not include small-to-large bowel anastomosis'),
('SPLE', 'Spleen surgery', 'Resection or manipulation of spleen'),
('THOR', 'Thoracic surgery ', 'Noncardiac, nonvascular thoracic surgery; includes pneumonectomy and hiatal hernia repair or diaphragmatic hernia repair (except through abdominal approach)'),
('THYR', 'Thyroid and/or parathyroid surgery', 'Resection or manipulation of thyroid and/or parathyroid'),
('VHYS', 'Vaginal hysterectomy', 'Vaginal hysterectomy; excludes the use of laparoscope'),
('VSHN', 'Ventricular shunt', 'Ventricular shunt operations, including revision and removal of shunt'),
('XLAP', 'Exploratory laparotomy', 'Abdominal operations not involving the gastrointestinal tract or biliary system; includes diaphragmatic hernia repair through abdominal approach');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
