create database DBMS_Project;
use DBMS_Project;

create database DBMS_Project1;
use DBMS_Project1;

create database DBMS_Project2;
use DBMS_Project2;
CREATE TABLE Patient_personal_info(Pat_ID INT PRIMARY KEY,
								   Pat_fname varchar(20) NOT NULL,
								   Pat_mname varchar(20),
								   Pat_lname varchar(20) NOT NULL,
								   Pat_gender varchar(2) NOT NULL,
                                   Pat_DOB DATE NOT NULL,
								   Pat_contactno BIGINT NOT NULL,
                                   Pat_emailID  varchar(50) unique check(pat_emailID=lower(pat_emailID)),
                                   Pat_Address varchar(250),
                                   Pat_MedHistory varchar(500),
                                   Pat_BloodGroup varchar(10) NOT NULL
								   );
insert into Patient_personal_info values(1,'Dev',null,'Mehta','M','2001-01-31',9239420134,'dev@gmail.com','Ahmedabad',null,'A+ve');
insert into Patient_personal_info values(2,'Rahi',null,'Shah','F','2001-11-02',9239445324,'rahi@gmail.com','Ahmedabad',null,'B+ve');
insert into Patient_personal_info values(3,'Janvi',null,'Joshi','F','2000-02-02',9239412342,'janvi@gmail.com','Ahmedabad',null,'O+ve');
insert into Patient_personal_info values(4,'Raj',null,'Majmudar','M','1989-06-22',9124563427,'raj@gmail.com','Surat',null,'O+ve');
insert into Patient_personal_info values(5,'Raina',null,'Rai','F','1979-12-07',9898563427,'raina@gmail.com','Mumbai',null,'A-ve');

CREATE TABLE Department(Dept_ID varchar(6) PRIMARY KEY,
                        Dept_name varchar(50) NOT NULL
                        );
insert into Department values('Dept1','Cardiology');
insert into Department values('Dept2','Gastro');
insert into Department values('Dept3','GeneralSurgery');
insert into Department values('Dept4','Gynecology');
insert into Department values('Dept5','Neurology');
insert into Department values('Dept6','Physiotherapy');
insert into Department values('Dept7','Urology');


CREATE TABLE Doctor_info(Doc_ID varchar(6) PRIMARY KEY,
						 Doc_fname VARCHAR(20) NOT NULL,
						 Doc_mname VARCHAR(20),
						 Doc_lname VARCHAR(20) NOT NULL,
						 Doc_gender VARCHAR(2) NOT NULL,
						 Doc_DOB DATE NOT NULL,
						 Doc_contactno BIGINT NOT NULL,
						 Doc_emailID VARCHAR(50) unique check(doc_emailID=lower(doc_emailID)),
						 Doc_Address VARCHAR(250),
						 Doc_Specialist VARCHAR(50),
						 Doc_DeptID varchar(6),
                         FOREIGN KEY (Doc_DeptID) references Department(Dept_ID),
						 Doc_charge INT
						 );
insert into Doctor_info values('Doc01','Mauli',null,'Patel','F','1960-03-31',9867420134,'mauli@gmail.com','Ahmedabad','Gynecologist','Dept4',2000);
insert into Doctor_info values('Doc02','Jay',null,'Patel','M','1950-12-21',6347420134,'jay@gmail.com','Ahmedabad','Cardiologist','Dept1',5000);
insert into Doctor_info values('Doc03','Pranav',null,'Dava','M','1970-07-11',8947422334,'pranav@gmail.com','Vadodara','Surgeon','Dept3',5000);
-- insert into Doctor_info values('Doc09','Jay',null,'Patel','M','1950-12-21',6347420134,'jay1@gmail.com','Ahmedabad','Cardiologist','D1',5000);
select * from doctor_info;
select * from Doctor_info;
CREATE TABLE HODs (Doc_ID varchar(6),
                   Dept_ID varchar(6),
                   FOREIGN KEY (Doc_ID) REFERENCES Doctor_info(Doc_ID),
                   FOREIGN KEY (Dept_ID) REFERENCES Department(Dept_ID),
				   PRIMARY KEY (Doc_ID, Dept_ID)
                   );
INSERT INTO HODs VALUES ('Doc02','Dept1');
INSERT INTO HODs VALUES ('Doc01','Dept4');
INSERT INTO HODs VALUES ('Doc03','Dept3');


CREATE TABLE Appointment(App_ID  varchar(10) PRIMARY KEY,
                         Pat_ID INT,
                         Doc_ID varchar(6),
                         App_Date_Time timestamp NOT NULL ,
                         App_Description VARCHAR(200),
                         FOREIGN KEY (Pat_ID) REFERENCES Patient_personal_info(Pat_ID),
                         FOREIGN KEY (Doc_ID) REFERENCES Doctor_info(Doc_ID)
						 );
insert into appointment values('App101',1,'Doc02',current_timestamp(),'NewCase');
insert into appointment values('App102',2,'Doc01',current_timestamp(),'NewCase');
insert into appointment values('App103',1,'Doc02',current_timestamp(),'Followup');
insert into appointment values ('App104',3,'Doc01', '2019-12-19 03:14:07','NewCase');
insert into appointment values ('App105',3,'Doc01', '2020-01-01 03:20:10','Dressing');
insert into appointment values ('App106',4,'Doc02', '2020-02-09 05:50:10','NewCase');
insert into appointment values ('App107',4,'Doc02', '2020-02-09 08:20:50',null);

CREATE TABLE Visit(Visit_ID varchar(10),
                   App_ID  varchar(10),
                   Pat_weight INT NOT NULL,
                   Pat_height varchar(10) NOT NULL,
                   Disease_name VARCHAR(50),
                   Visit_charge INT,
			       FOREIGN KEY (App_ID) REFERENCES Appointment(App_ID),
                   PRIMARY KEY(Visit_ID, App_ID)
                   );
insert into visit values ('Vis101','App102',59,'5''6"','Cancer',500);
insert into visit values ('Vis102','App101',69,'5''9"','Dengue',800);
insert into visit values ('Vis103','App104',78,'6''0"','Malaria',700);
insert into visit values ('Vis104','App105',60,'5''4"','Broken Arm',800);
insert into visit values ('Vis105','App106',89,'5''9"','Cancer',800);

CREATE TABLE MEDICINES (Med_ID VARCHAR(10) PRIMARY KEY, 
                        Med_Name VARCHAR(50) NOT NULL,
                        Med_company VARCHAR(30),
                        Med_price INT NOT NULL,
                        Med_dose varchar(10) NOT NULL,
                        Med_type VARCHAR(30) 
                        );
insert into medicines values ('Med101','DAN-P','UNISON',15,'600mg','Anti inflammatory');
insert into medicines values ('Med102','DOLO','Torrent',20,'650mg','Paracetamol');
insert into medicines values ('Med103','Clavam','Zydus',120,'625mg','Anti biotic');
select * from medicines;
CREATE TABLE Test (Test_ID VARCHAR(5) PRIMARY KEY,
                   Test_Name VARCHAR(40) NOT NULL,
                   Test_Prereq VARCHAR(50)
                    );
insert into test values ('Test1','PPBS','Post meal');
insert into test values ('Test2','Lipid Profile','Fasting');
insert into test values ('Test3','Creatinine',null);
insert into test values ('Test4','TSH',null);
insert into test values ('Test5','Urine Culture',null);
insert into test values ('Test6','Blood Culture',null);

select * from test;

CREATE TABLE Treatment(Visit_ID varchar(10),
                       App_ID varchar(10),
                       Test_ID VARCHAR(5),
					   Test_Result boolean not null,
                       Current_Treatment varchar(200) default null,
                       Extra_Comment varchar(500) default null,
                       Current_Med varchar(150) default null,
                       PRIMARY KEY (Visit_ID, App_ID, Test_ID),
                       FOREIGN KEY (Visit_ID, App_ID) REFERENCES Visit(Visit_ID, App_ID),
                       FOREIGN KEY (Test_ID) REFERENCES Test(Test_ID),
                       FOREIGN KEY (Current_Med) REFERENCES MEDICINES(Med_ID) 
					   );
insert into treatment values ('Vis101','App102', 'Test1',1,'IV fluid',null,'Med101');
select * from treatment;

CREATE TABLE Rooms(Room_ID VARCHAR(5) PRIMARY KEY,
                   Room_Type varchar(40),
                   Room_Charge INT NOT NULL
                   );
INSERT INTO Rooms VALUES ('room1', 'Twin-sharing', 2500);
INSERT INTO Rooms VALUES ('room2', 'Deluxe', 5000);
INSERT INTO Rooms VALUES ('room3', 'OT2', 3500);
INSERT INTO Rooms VALUES ('room4', 'General Ward', 1000);
INSERT INTO Rooms VALUES ('room5', 'OT1', 3500);
INSERT INTO Rooms VALUES ('room6', 'Consultation-1', 0);
INSERT INTO Rooms VALUES ('room7', 'Consultation-2', 0);

CREATE TABLE Staff (Staff_ID VARCHAR(10) PRIMARY KEY,
                    Staff_fname VARCHAR(40) NOT NULL,
                    Staff_mname VARCHAR(40),
                    Staff_lname VARCHAR(40),
                    Staff_gender VARCHAR(2) NOT NULL,
                    Staff_contactno bigint NOT NULL,
                    Staff_type VARCHAR(30) ,
                    Staff_roomassigned1 VARCHAR(5) NOT NULL,
                    Staff_roomassigned2 VARCHAR(5),
                    Staff_dutystarttime time NOT NULL,
                    Staff_dutyendtime time NOT NULL,
                    Staff_holiday varchar(10),
                    Staff_DeptID varchar(6),
                    Staff_Charge int not null,
					FOREIGN KEY (Staff_DeptID) REFERENCES Department(Dept_ID),
                    FOREIGN KEY (Staff_roomassigned1) REFERENCES Rooms(Room_ID),
                    FOREIGN KEY (Staff_roomassigned2) REFERENCES Rooms(Room_ID)
                    );
insert into staff values ('S1','Deep',null, null,'M',9341568535,'wardboy','room4',null,'01:00:00','08:00:00','Wednesday','Dept1',500);
insert into staff values ('S2','Prakash',null, null,'M',9823416792,'assistant','room5',null,'08:00:00','01:00:00','Wednesday','Dept3',1000);
insert into staff values ('S3','Mamta',null, null,'F',9135968535,'nurse','room1','room3','09:00:00','05:00:00','Sunday','Dept4',500);

CREATE TABLE In_Patients (Pat_ID INT,
                          Addmission_Date_Time timestamp not null,
                          In_treatments Varchar(100),
                          Room_assigned VARCHAR(5) Not Null,
                          OT_assigned VARCHAR(5),
                          Operation_Date_Time timestamp,
                          Primary Key(Pat_ID,Addmission_Date_Time),
                          Foreign Key (Room_Assigned) REFERENCES Rooms(Room_ID),
                          Foreign Key (OT_assigned) REFERENCES Rooms(Room_ID),
                          Foreign Key (Pat_ID) references patient_personal_info(Pat_ID) 
                          );

insert into in_patients values(1, '2021-04-07 09:35:48', 'hospitalisation', 'room1', 'room3', '2021-04-17 04:06:02');
insert into in_patients values(2, '2021-04-14 10:17:02', 'Hospitalisation', 'room2', 'room5', '2021-04-17 04:07:31');

CREATE TABLE Billing_info(Bill_ID varchar(10) primary key,
                  Pat_ID INT NOT NULL,
                  Visit_ID varchar(10) NOT NULL,
                  App_ID varchar(10) NOT NULL,
                  Doc_ID varchar(6) NOT NULL,
                  Medicine_ID VARCHAR(10),
                  Room_ID VARCHAR(5),
                  No_of_Days INT NOT NULL,
                  Staff_ID VARCHAR(10) NOT NULL,
                  Health_Card boolean,
                  FOREIGN KEY (Visit_ID) REFERENCES Visit(Visit_ID),
                  FOREIGN KEY (App_ID) REFERENCES Appointment(App_ID),
                  FOREIGN KEY (Room_ID) REFERENCES Rooms(Room_ID),
                  FOREIGN KEY (Pat_ID) REFERENCES Patient_personal_info(Pat_ID),
                  FOREIGN KEY (Doc_ID) REFERENCES Doctor_info(Doc_ID),
                  FOREIGN KEY (Medicine_ID) REFERENCES Medicines(Med_ID)
				  );
insert into billing_info values ('Bill1',1,'Vis102','App101','Doc03','Med101','room1',3,'S3',1);
insert into billing_info values ('Bill2',3,'Vis103','App104','Doc01','Med103',null,0,'S1',0);
insert into billing_info values ('Bill3',2,'Vis101','App102','Doc02','Med102','room2',0,'S3',0);

-- Trigger1
-- Triggers when record is updated in the Medicines table. When value of any field is updated, we keep track of before and after values in the table “medicines_updates” for each field of the Medicines table. The “medicines_updates” table contains the fields change_date, field_name, before_value and after_value.

select * from MEDICINES;

create table medicines_updates(change_date timestamp, field_name varchar(50), before_value varchar(30), after_value varchar(30));

drop trigger if exists trigger1;
delimiter $$
create trigger trigger1 after update on MEDICINES
for each row
begin
    declare curr_date_time timestamp;
	select current_timestamp into curr_date_time;
    
    if (old.Med_ID != new.Med_ID) then
	    insert into medicines_updates values (curr_date_time, 'Med_ID',old.Med_ID,new.Med_ID);
    end if;
    
    if (old.Med_Name !=new.Med_Name) then
        insert into medicines_updates values (curr_date_time, 'Med_Name',old.Med_Name,new.Med_Name);
    end if;
    
    if (old.Med_company !=new.Med_company) then
        insert into medicines_updates values (curr_date_time, 'Med_Name',old.Med_company,new.Med_company);
    end if;
    
    if (old.Med_price !=new.Med_price) then
        insert into medicines_updates values (curr_date_time, 'Med_price',old.Med_price,new.Med_price);
    end if;
    
    if (old.Med_dose !=new.Med_dose) then
        insert into medicines_updates values (curr_date_time, 'Med_dose',old.Med_dose,new.Med_dose);
    end if;
    
    if (old.Med_type !=new.Med_type) then
        insert into medicines_updates values (curr_date_time, 'Med_type',old.Med_type,new.Med_type);
    end if;
end
$$
delimiter ;

-- Trigger2
-- This trigger checks 'Room_Charge' when user inserts or updates Rooom_Charge in Rooms table. If Room_Charge>10000, it won't allow to insert/update the record and will display appropriate error message (Room charge cannot exceed 10000! Couldn't perform the operation...).
drop trigger if exists trigger2_insert;
delimiter $$
create trigger trigger2_insert before insert on Rooms
for each row
begin
declare err_msg varchar(200);

if (new.Room_Charge>10000) then
set err_msg='Error: Room charge cannot exceed 10000! Couldn''t perform the operation...';
signal sqlstate '45123' set message_text=err_msg;
end if;
end
$$
delimiter ;

drop trigger if exists trigger2_update;
delimiter $$
create trigger trigger2_update before update on Rooms
for each row
begin
declare err_msg varchar(200);

if (new.Room_Charge>10000) then
set err_msg='Error: Room charge cannot exceed 10000! Couldn''t perform the operation...';
signal sqlstate '45123' set message_text=err_msg;
end if;
end
$$
delimiter ;


-- Trigger 3
-- Contact no. is not a 10 digit number then display message:"Invalid contact no" (Patient/Doctor/Staff)
drop trigger if exists trigger3_doc;
delimiter $$
create trigger trigger3_doc before insert on Doctor_info
for each row
begin
declare err_msg varchar(200);
if (length(new.Doc_contactno)!=10) then
set err_msg='Error: Invalid Contact No...';
signal sqlstate '45123' set message_text=err_msg;
end if;     
end
$$
delimiter ;

drop trigger if exists trigger3_pat;
delimiter $$
create trigger trigger3_pat before insert on patient_personal_info
for each row
begin
declare err_msg varchar(200);
if (length(new.Pat_contactno)!=10) then
set err_msg='Error: Invalid Contact No...';
signal sqlstate '45123' set message_text=err_msg;
end if;     
end
$$
delimiter ;

drop trigger if exists trigger3_staff;
delimiter $$
create trigger trigger3_staff before insert on staff
for each row
begin
declare err_msg varchar(200);
if (length(new.Staff_contactno)!=10) then
set err_msg='Error: Invalid Contact No...';
signal sqlstate '45123' set message_text=err_msg;
end if;     
end
$$
delimiter ;
select * from staff;
select * from patient_personal_info;

insert into Doctor_info values ('Doc03','A','B','C','M','1950-05-19',9999999999,'abd@gmail.com','ahd','cardio','Dep2',1000); 
insert into Doctor_info values ('Doc04','Reema','A','Patel','F','1960-11-09',3333999999,'reema@gmail.com','ahd','surgeon','Dep3',1000); 
insert into Doctor_info values ('Doc05','Aakash',null,'Choksi','M','1965-03-12',3333999,'aakash@gmail.com','ahd','surgeon','Dep3',850); 

-- Trigger 4
-- This trigger will delete all child records from appointment, billing info, and in-patients tables when patient record is deleted from the Patient_personal_info table.
drop trigger if exists trigger4a;
delimiter $$
create trigger trigger4a before delete on Patient_personal_info
for each row
begin
     delete from Appointment where Appointment.Pat_ID=old.Pat_ID;
     delete from Billing_info where Billing_info.Pat_ID=old.Pat_ID;
     delete from In_Patients where In_Patients.Pat_ID=old.Pat_ID;
end
$$
delimiter ;

drop trigger if exists trigger4b;
delimiter $$
create trigger trigger4b before delete on Appointment
for each row
begin
     delete from Visit where Visit.App_ID=old.App_ID;
end
$$
delimiter ;

drop trigger if exists trigger4c;
delimiter $$
create trigger trigger4c before delete on Visit
for each row
begin
     delete from Treatment where Treatment.App_ID=old.App_ID and Treatment.Visit_ID=old.Visit_ID;
end
$$
delimiter ;
select * from patient_personal_info;
select * from appointment;

select * from appointment;
insert into visit values ('Vis101','App102',59,'5''6"','Cancer',500);
insert into visit values ('Vis102','App101',69,'5''9"','Dengue',800);
insert into visit values ('Vis103','App104',78,'6''0"','Malaria',700);
insert into visit values ('Vis104','App105',60,'5''4"','Broken Arm',800);
insert into visit values ('Vis105','App106',89,'5''9"','Cancer',800);

select * from treatment;
select * from test;
insert into test values ('Test1','PPBS','Post meal');
insert into test values ('Test2','Lipid Profile','Fasting');
insert into test values ('Test3','Creatinine',null);
insert into test values ('Test4','TSH',null);
insert into test values ('Test5','Urine Culture',null);
insert into test values ('Test6','Blood Culture',null);

select * from medicines;
insert into medicines values ('Med101','DAN-P','UNISON',15,'600mg','Anti inflammatory');
insert into medicines values ('Med102','DOLO','Torrent',20,'650mg','Paracetamol');
insert into medicines values ('Med103','Clavam','Zydus',120,'625mg','Anti biotic');


insert into treatment values ('Vis101','App102', 'Test1',1,'IV fluid',null,'Med101');


delete from patient_personal_info where Pat_fname='Rahi';


-- Trigger 5
-- Trigger5: Before insert on Staff, if Staff_dutystarttime is equal to Staff_dutyendtime then print an error message, "Duty start time cannot be same as Duty end time..."
drop trigger if exists trigger5;
DELIMITER $$
CREATE TRIGGER trigger5 BEFORE INSERT ON Staff 
FOR EACH ROW BEGIN
DECLARE err_msg varchar(200);
if(new.Staff_dutystarttime = new.Staff_dutyendtime) THEN
set err_msg = 'Error: Duty start time cannot be same as Duty end time...'; 
signal sqlstate '45123' set message_text = err_msg; 
end if;
END
$$
DELIMITER ;








-- Procedure1
-- Procedure that displays appointment details (App_ID | Doc_ID | Doc_DeptID | App_Date_Time) of patients 

drop procedure if exists display_patient_appointment_info;
delimiter $$
CREATE PROCEDURE display_patient_appointment_info()
BEGIN
   declare r_patient_id varchar(50);
   declare finished integer default 0;
   declare c_patient_id cursor for select distinct Patient_personal_info.Pat_ID from Patient_personal_info;
   declare continue handler for not found set finished=1;
   
   open c_patient_id;
   
   getpatient_id:loop
       fetch c_patient_id into r_patient_id;
       if finished=1 then
           leave getpatient_id;
	   end if;
       
       select r_patient_id as 'Patient ID';
       select distinct Appointment.App_ID, Doctor_info.Doc_ID, Doctor_info.Doc_DeptID, Appointment.App_Date_Time from Patient_personal_info natural join Appointment natural join Doctor_info where r_patient_id=Patient_personal_info.Pat_ID;
       
   end loop getpatient_id;
   close c_patient_id;
       
END
$$
delimiter ;

call display_patient_appointment_info();

-- Procedure2
-- Procedure to display the outdoor patients info (patients who are not in patients)
drop procedure if exists display_out_patient;
delimiter $$
CREATE PROCEDURE display_out_patient()
BEGIN
   SELECT * from patient_personal_info where Pat_ID not in (SELECT Pat_ID from in_patients);
END
$$
delimiter ;

call display_out_patient();
select * from patient_personal_info;

-- Procedure3a
-- Year wise appointments 
drop procedure if exists display_yearwise_appointments;
delimiter $$
CREATE PROCEDURE display_yearwise_appointments(which_year year)
BEGIN
   SELECT * from appointment where year(appointment.app_date_time)=which_year;
END
$$
delimiter ;
-- Procedure3b
-- Year wise patient visits
drop procedure if exists display_yearwise_visits;
delimiter $$
CREATE PROCEDURE display_yearwise_visits(which_year year)
BEGIN
   SELECT visit.Visit_ID,appointment.Pat_ID,patient_personal_info.Pat_fname,patient_personal_info.Pat_DOB from visit natural join appointment natural join patient_personal_info where year(appointment.app_date_time)=which_year;
END
$$
delimiter ;

call display_yearwise_appointments(2020);
select * from visit;

insert into appointment values ('App104',3,'Doc01', '2019-12-19 03:14:07','NewCase');
insert into appointment values ('App105',3,'Doc01', '2020-01-01 03:20:10','Dressing');
insert into appointment values ('App106',4,'Doc02', '2020-02-09 05:50:10','NewCase');
insert into appointment values ('App107',4,'Doc02', '2020-02-09 08:20:50',null);

select * from patient_personal_info;



-- Procedure4
-- Procedure that displays patient id wise bill details
-- drop procedure if exists patientid_wise_bill_details;
-- delimiter $$
-- CREATE PROCEDURE patientid_wise_bill_details(patientid int)
-- BEGIN
--       select distinct billing_info.Bill_ID, billing_info.Pat_ID, visit.visit_charge, doctor_info.Doc_charge, medicines.Med_price, rooms.room_charge, billing_info.no_of_days, staff.staff_charge from billing_info natural join visit natural join appointment natual join doctor_info natural join medicines natural join rooms natural join staff where billing_info.Pat_ID=patientid;
-- END
-- $$
-- delimiter ;

-- call patientid_wise_bill_details(3);


-- Procedure4
-- Display details of patients who took the appointment for this month.
drop procedure if exists pat_this_month;
delimiter $$
CREATE PROCEDURE pat_this_month()
BEGIN
   declare r_pat_id varchar(50);
   declare finished integer default 0;
   declare c_pat_id cursor for select distinct appointment.pat_id from appointment;
   declare continue handler for not found set finished=1;
   
   open c_pat_id;
   
   getpat_id:loop
       fetch c_pat_id into r_pat_id;
       if finished=1 then
           leave getpat_id;
	   end if;
       
       -- select * from emp where month(joining_date)=month(current_date());
	   select distinct patient_personal_info.Pat_ID, patient_personal_info.Pat_contactno, patient_personal_info.Pat_fname,patient_personal_info.Pat_gender from appointment natural join patient_personal_info where month(appointment.app_date_time)=month(current_date()) and year(appointment.app_date_time)=year(current_date());

   end loop getpat_id;
   close c_pat_id;
       
END
$$
delimiter ;

call pat_this_month();
select * from patient_personal_info;
select * from appointment;

-- Procedure5
-- Display details of patients who took the appointment on weekend
drop procedure if exists display_patients_on_weekend;
delimiter $$
CREATE PROCEDURE display_patients_on_weekend()
BEGIN
	 select patient_personal_info.Pat_ID,patient_personal_info.Pat_fname, patient_personal_info.Pat_contactno,appointment.App_ID, appointment.App_Date_Time,dayofweek(appointment.App_Date_Time) from appointment natural join patient_personal_info where dayofweek(appointment.app_date_time)=1 or dayofweek(appointment.app_date_time)=7;
     -- select count(patient_personal_info.Pat_ID) from appointment natural join patient_personal_info where dayofweek(appointment.app_date_time)=1 or dayofweek(appointment.app_date_time)=7;

END
$$
delimiter ;

call display_patients_on_weekend();

-- Procedure5
-- Display details of patients who took the appointment on weekend
drop procedure if exists display_patients_on_weekend;
delimiter $$
CREATE PROCEDURE display_patients_on_weekend()
BEGIN
	-- select patient_personal_info.Pat_ID,patient_personal_info.Pat_fname, patient_personal_info.Pat_contactno,appointment.App_ID, appointment.App_Date_Time,dayofweek(appointment.App_Date_Time) from appointment natural join patient_personal_info where dayofweek(appointment.app_date_time)=1 or dayofweek(appointment.app_date_time)=7;
            declare finished int default 0;

            declare r_Pat_ID int;
            declare r_Pat_fname varchar(20);
            declare r_Pat_contactno bigint;
            declare r_App_ID varchar(10);
            declare r_App_Date_Time timestamp;

            declare c_display_patients_on_weekend cursor for select p.Pat_ID, p.Pat_fname, p.Pat_contactno, a.App_ID, a.App_Date_Time from patient_personal_info p natural join appointment a where dayofweek(a.app_date_time)=1 or dayofweek(a.app_date_time)=7;
            declare continue handler for not found set finished = 1;
            
            open c_display_patients_on_weekend;
            c_loop: loop
                  fetch c_display_patients_on_weekend into r_Pat_ID, r_Pat_fname, r_Pat_contactno, r_App_ID, r_App_Date_Time;
                  if finished = 1 then
			leave c_loop;
		  end if;
                  select r_Pat_ID as "PAT_ID", r_Pat_fname as "PAT FNAME", r_Pat_contactno as "PAT CONTACTNO", r_App_ID as "APP ID", r_App_Date_Time as "APP DATE TIME";
            end loop;

END
$$
delimiter ;


-- Function1
-- A function with parameter blood group. It returns total number of patients of that bloodgroup.
drop function if exists patient_bloodgroup;
delimiter $$
CREATE FUNCTION patient_bloodgroup(bloodgroup varchar(10)) RETURNS int
deterministic

BEGIN
declare answer int;
	select count(Patient_personal_info.Pat_ID) from Patient_personal_info where Patient_personal_info.Pat_BloodGroup=bloodgroup into answer;
    return answer;
END
$$
delimiter ;

select patient_bloodgroup('A+ve');
select patient_bloodgroup('B+ve');
select patient_bloodgroup('O-ve');

-- Function2
-- Returns number of patients on day i. (1=Sunday, 2=Monday, 3=Tuesday, 4=Wednesday, 5=Thursday, 6=Friday, 7=Saturday) [Day number is a parameter]
drop function if exists total_patients_on_this_day;
delimiter $$
CREATE FUNCTION total_patients_on_this_day(dayno int) RETURNS int
deterministic

BEGIN
declare answer int;
	select count(patient_personal_info.Pat_ID) from appointment natural join patient_personal_info where dayofweek(appointment.app_date_time)=dayno into answer;
    return answer;
END
$$
delimiter ;
select total_patients_on_this_day(7);

-- Procedure6 (in continuation of 2nd function)
drop procedure if exists patient_count_msg;
delimiter $$
CREATE PROCEDURE patient_count_msg(dayno int)
BEGIN
	if (select total_patients_on_this_day(dayno)>2) then
      select 'Many patients on this day!!';
    else
       select 'Not many patients on this day!';
    end if;
END
$$
delimiter ;

call patient_count_msg(7);

-- Function3
-- Function with parameter patient id that returns the current age of that patient
drop function if exists age;
delimiter $$
CREATE FUNCTION age(patientid int) RETURNS int
deterministic

BEGIN
declare answer int;
declare DOB date;
select pat_dob from patient_personal_info where patient_personal_info.Pat_ID=patientid into DOB;
	select DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(),DOB)), '%Y')+0 AS age into answer;
    return answer;
END
$$
delimiter ;
select age(1);

-- Procedure7 (in continuation of 3rd function)
drop procedure if exists patient_age_msg;
delimiter $$
CREATE PROCEDURE patient_age_msg(patientid int)
BEGIN
	if (select age(patientid)>18) then
      select 'Patient is a Major';
    else
       select 'Minor Patient';
    end if;
END
$$
delimiter ;

call patient_age_msg(1);

  --  SELECT DISTINCT
--     Billing_info.Bill_ID,
--     Patient_personal_info.Pat_ID,
--     Visit.Visit_charge,
--     Doctor_info.Doc_charge,
--     MEDICINES.Med_price,
--     Billing_info.No_of_Days * Rooms.Room_Charge,
--     Staff.Staff_Charge +(
--         SUM(
--             Visit.Visit_charge + Doctor_info.Doc_charge + MEDICINES.Med_price +
--             (Billing_info.No_of_Days * Rooms.Room_Charge
--         ) + Staff.Staff_Charge
--     )
-- FROM
--     Billing_info
-- NATURAL JOIN Patient_personal_info NATURAL JOIN Visit NATURAL JOIN Doctor_info NATURAL JOIN MEDICINES WHERE Patient_personal_info.Pat_ID = '1';
 


-- Functio4
-- identify_hod(doc_id,dept_id)
-- if the doctor (doc_id) is the HOD of the department (dept_id), it returns true, otherwise false.


drop function if exists identify_hod;
delimiter $$
create function identify_hod(doctorid varchar(6),departmentid varchar(6)) returns boolean
deterministic
begin
	declare answer boolean;
	declare doc varchar(50);
    declare dept varchar(50);
    -- select Doc_ID from HODs where (HODs.Dept_ID=departmentid and HODs.Doc_ID=doctorid) into doc;
    select Doc_ID from HODs where HODs.Doc_ID=doctorid into doc;
    if doc = null  then
		set answer=0;
	else
        select dept_id from HODs where HODs.doc_id=doc into dept;
        if (departmentid =dept) then
		     set answer=1;
		else
             set answer=0;
		end if;
	end if;
	return answer;
end
$$
delimiter ;
select * from department;
-- INSERT INTO HODs VALUES ('Doc02','Dept1');
-- INSERT INTO HODs VALUES ('Doc01','Dept4');
 select identify_hod ('Doc02','Dept4');
select identify_hod ('Doc01','Dept4');

select * from hods;

-- Function3
-- no_of_visits(pat_id)
-- A function that returns the number of times the patient has visited the hospital.
-- drop function if exists total_patients_on_this_day;
-- delimiter $$
-- CREATE FUNCTION total_patients_on_this_day() RETURNS int
-- deterministic

-- BEGIN
-- declare answer int;
-- 	select count(Patient_personal_info.Pat_ID) from Patient_personal_info where Patient_personal_info.Pat_BloodGroup=bloodgroup into answer;
--     return answer;
-- END
-- $$
-- delimiter ;

