USE f36im;

CREATE TABLE IF NOT EXISTS dogs (
  ID INT PRIMARY KEY AUTO_INCREMENT,
  name TEXT,
  breed TEXT,
  gender TEXT,
  age FLOAT,
  size TEXT,
  personality TEXT,
  description TEXT,
  adopter INT,
  image TEXT
);
