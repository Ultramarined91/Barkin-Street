USE f36im;

CREATE TABLE IF NOT EXISTS users (
  ID INT PRIMARY KEY AUTO_INCREMENT,
  name TEXT,
  contact INT,
  email TEXT,
  housing TEXT,
  experience TEXT,
  username TEXT,
  password TEXT
);
