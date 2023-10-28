drop database hms;

create database hms;
use  hms;


CREATE TABLE patient_users(
  pid varchar(255) NOT NULL,
  pemail varchar(255) NOT NULL,
  ppassword varchar(255) NOT NULL,
  PRIMARY KEY (pid)
);

CREATE TABLE staff_users(
  sid varchar(255) NOT NULL,
  semail varchar(255) NOT NULL,
  spassword varchar(255) NOT NULL,
  position varchar(255) NOT NULL,
  PRIMARY KEY (sid)
);  

CREATE TABLE patient_profile (
  pid varchar(255) NOT NULL,
  first_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  gender enum('M','F') NOT NULL,
  city varchar(255) NOT NULL,
  country varchar(255) NOT NULL,
  birth_date varchar(255) NOT NULL,
  age int(10) NOT NULL,
  FOREIGN KEY (pid) REFERENCES patient_users (pid)
);

CREATE TABLE doctor_profile(
  sid varchar(255) NOT NULL,
  first_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  gender enum('M','F') NOT NULL,
  city varchar(255) NOT NULL,
  country varchar(255) NOT NULL,
  birth_date varchar(255) NOT NULL,
  age int(10) NOT NULL,
  specialization varchar(255) not null,
  department varchar(255) not null,
  designation varchar(255) not null,
  FOREIGN KEY (sid) REFERENCES staff_users (sid)
);



CREATE TABLE nurse_profile(
  
  sid varchar(255) NOT NULL,
  first_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  gender enum('M','F') NOT NULL,
  city varchar(255) NOT NULL,
  country varchar(255) NOT NULL,
  birth_date varchar(255) NOT NULL,
  age int(10) NOT NULL,
  status varchar (255) not null,
  designation varchar(255) not null,

  FOREIGN KEY (sid) REFERENCES staff_users (sid)
);

CREATE TABLE receptionist_profile(
  sid varchar(255) NOT NULL,
  first_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  gender enum('M','F') NOT NULL,
  city varchar(255) NOT NULL,
  country varchar(255) NOT NULL,
  birth_date varchar(255) NOT NULL,
  age int(10) NOT NULL,
 
  designation varchar(255) not null,
  FOREIGN KEY (sid) REFERENCES staff_users (sid)
  
);



CREATE TABLE appoinments(
  ap_id int(25) NOT NULL,
  pid varchar(255) NOT NULL,
  sid varchar(255) NOT NULL,
  pfirst_name varchar(255) NOT NULL,
  plast_name varchar(255) NOT NULL,
  dfirst_name varchar(255) NOT NULL,
  dlast_name varchar(255) NOT NULL,
  ddepartment varchar(255) not null,
  dspecialist varchar(255) not null,
  appoinment_status varchar(255) not null,
  booked_by varchar(255) NOT NULL,
  PRIMARY KEY (ap_id),
  FOREIGN KEY (pid) REFERENCES patient_users (pid),
  FOREIGN KEY (sid) REFERENCES staff_users (sid)
);

CREATE TABLE nurse_assignment(
  ass_id int (25) not null,
  pid varchar(255) NOT NULL,
  sid varchar(255) NOT NULL,
  pfirst_name varchar(255) NOT NULL,
  plast_name varchar(255) NOT NULL,
  dfirst_name varchar(255) NOT NULL,
  dlast_name varchar(255) NOT NULL,
  ddepartment varchar(255) not null,
  dspecialist varchar(255) not null,
  n_id varchar(255) not null,
  PRIMARY KEY (ass_id),
  FOREIGN KEY (pid) REFERENCES patient_users (pid),
  FOREIGN KEY (sid) REFERENCES staff_users (sid)
  

);

CREATE TABLE patient_pre_assessment(
  ppass_id int (25) not null,
  sid varchar(255)not null,
  pid varchar(255) NOT NULL,
  n_id varchar(255) NOT NULL,
  pfirst_name varchar(255) NOT NULL,
  plast_name varchar(255) NOT NULL,
  bp varchar(255) NOT NULL,
  temp varchar(255) NOT NULL,
  diabetes varchar(255) not null,
  PRIMARY KEY (ppass_id),
  FOREIGN KEY (pid) REFERENCES patient_users (pid),
  FOREIGN KEY (sid) REFERENCES staff_users (sid)
  
);

CREATE TABLE diagnostics(
  d_id int (25) not null,
  pid varchar(255) NOT NULL,
  sid varchar(255) NOT NULL,
  disease varchar(255) NOT NULL,
  prescription varchar(255) NOT NULL,
  PRIMARY KEY (d_id),
  FOREIGN KEY (pid) REFERENCES patient_users (pid),
  FOREIGN KEY (sid) REFERENCES staff_users (sid)

);

CREATE TABLE lab_assistant_profile(
  
  sid varchar(255) NOT NULL,
  first_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  gender enum('M','F') NOT NULL,
  city varchar(255) NOT NULL,
  country varchar(255) NOT NULL,
  birth_date varchar(255) NOT NULL,
  age int(10) NOT NULL,
  
  designation varchar(255) not null,

  FOREIGN KEY (sid) REFERENCES staff_users (sid)
);

CREATE TABLE pharmacist_profile(
  
  sid varchar(255) NOT NULL,
  first_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  gender enum('M','F') NOT NULL,
  city varchar(255) NOT NULL,
  country varchar(255) NOT NULL,
  birth_date varchar(255) NOT NULL,
  age int(10) NOT NULL,

  designation varchar(255) not null,

  FOREIGN KEY (sid) REFERENCES staff_users (sid)
);

CREATE TABLE lab_requests(
  l_id int (25) not null,
  pid varchar(255) NOT NULL,
  sid varchar(255) NOT NULL,
  pfname varchar(255) NOT NULL,
  plname varchar(255) NOT NULL,
  test varchar(255) NOT NULL,
  status varchar(255) not null,
  
  PRIMARY KEY (l_id),
  FOREIGN KEY (pid) REFERENCES patient_users (pid),
  FOREIGN KEY (sid) REFERENCES staff_users (sid)

);

CREATE TABLE test_results(
  ts_id int (25) not null,
  assisstant_id varchar(255) not null,
  pid varchar(255) NOT NULL,
  sid varchar(255) NOT NULL,
  
  result varchar(255) NOT NULL,
  
  
  PRIMARY KEY (ts_id),
  FOREIGN KEY (pid) REFERENCES patient_users (pid),
  FOREIGN KEY (sid) REFERENCES staff_users (sid)

);






