CREATE DATABASE smoke;

CREATE TABLE useraccounts (
    accountId INT NOT NULL AUTO_INCREMENT,
    accountName VARCHAR(150) NOT NULL,
    dateOfBirth DATE NOT NULL,
    email VARCHAR(50) NOT NULL,
    fName VARCHAR(50) NOT NULL,
    lName VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    profilePicture VARCHAR(255) NOT NULL DEFAULT './uploads/placeholder.png',
    PRIMARY KEY (accountId)
);

CREATE TABLE games (
    gameId INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(150) NOT NULL,
    description VARCHAR(500) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    publishDate DATE NOT NULL,
    publisher VARCHAR(150) NOT NULL,
    coverImage VARCHAR(255) NOT NULL,
    PRIMARY KEY (gameId)
);

CREATE TABLE reviews (
    reviewId INT NOT NULL AUTO_INCREMENT,
    gameId INT NOT NULL,
    accountId INT NOT NULL,
    subject VARCHAR(100) NOT NULL,
    description VARCHAR(500) NOT NULL,
    rating int NOT NULL,
    reviewDate DATE NOT NULL,
    PRIMARY KEY (reviewId),
    FOREIGN KEY (gameId) REFERENCES games(gameId),
    FOREIGN KEY (accountId) REFERENCES userAccounts(accountId)
);

INSERT INTO userAccounts (accountName, dateOfBirth, email, fName, lName, password, profilePicture) VALUES 
('GigaGenius445', '1980-02-26', 'sheldoncooper@gmail.com', 'Sheldon', 'Cooper', 'feaaed0dfc8164b293ff48616f588ee97c0d1e88c82dbd60ad477c14ebe66167fb97586d52fa967cc5aa3101217c70fa5fd5e9ff7bfe370a6e23c2520dd7c85d', './uploads/sheldonCooper.jpg');

INSERT INTO games (name, description, genre, publishDate, publisher, coverImage) VALUES 
('Scam Grandma', 'Scam Grandma is a devilishly entertaining strategy game where players step into the shoes of a cunning scammer attempting to outwit Grandma, a surprisingly savvy senior citizen. Prepare to craft clever phishing schemes, design elaborate phone call ruses, and navigate through Grandmas growing arsenal of anti-scam skills. Each level challenges you to adapt as Grandma learns new tricks to thwart your plans. Can you stay one step ahead and become the ultimate master of deception?', 'Action', '2006-05-17', 'Lilypad Lagoon',  'uploads/scamGrandma.png'),

('Solid Warrior: Fabric Lullaby', 'Solid Warrior: Fabric Lullaby is a mesmerizing metroidvania adventure where players unravel the secrets of a forgotten world woven entirely from fabric. You play as the Solid Warrior, a stoic yet valiant figure mysteriously stitched into existence to combat the creeping decay threatening this patchwork realm. Traverse interconnected areas, from velvet forests to tangled thread mines, as you discover new abilities and piece together the truth behind the enigmatic Fabric Lullaby.', 'Metroidvania', '2022-12-24', 'Team Orange', 'uploads/silksong.png'),

('Learn Python With Rob Schneider', 'Learn Python With Rob Schneider is an educational yet wildly entertaining game where actor and comedian Rob Schneider takes you on a coding journey like no other. Dive into an interactive Python programming curriculum with Schneider as your quirky and supportive mentor. Through hilarious commentary, fun challenges, and skit-like mini-games, you will learn the fundamentals of Python programming, from variables to loops and beyond.', 'Education', '2015-05-11', 'EA', 'uploads/learnPython.png'),

('Peter Griffin’s Vocaloid Jamboree Epic ',  'Get ready to groove in Peter Griffin’s Vocaloid Jamboree Epic! Join the beloved Family Guy character on a hilarious, rhythm-fueled journey through Vocaloid-inspired tracks. Tap, swipe, and match beats as Peter performs outrageous dance moves alongside iconic Vocaloid personas in vibrant, anime-styled stages. Unlock quirky costumes, remixes, and bonus levels for epic challenges. It’s absurd, chaotic, and totally Griffintastic—your rhythm skills have never been tested like this!', 'Rhythm', '2017-03-06', 'Crypton Future Media, INC.', './uploads/peterMiku.png'),

('Sonic Succumbs to the Unbearable Pressures of Life', 'In Sonic Succumbs to Unbearable Pressures of Life, players descend into the crumbling psyche of a broken hero. The once-vivid world is now twisted and bleak, plagued by echoes of regret and fear. Sonic’s journey is fraught with harrowing choices, suffocating self-doubt, and eerie remnants of his former glory. The game forces players to confront unsettling truths, navigate shattered realities, and face the raw vulnerability of a legend spiraling toward despair.', 'Educational', '2012-05-20',  'SEGA',  './uploads/sonicSadge.png'),

('Elon Musk Conquers Capitalism: Part One', 'Elon Musk Conquers Capitalism is a satirical strategy game where players embody Elon Musk, aiming to dominate the world economy. You navigate corporate empires, innovate futuristic technologies, and tackle rival magnates in a quest to reshape capitalism. Balance public perception, media influence, and resource management to succeed. Will you redefine global systems or face corporate collapse? The future of capitalism is in your hands!', 'Tycoon', '2024-04-26', 'Threads', './uploads/YiLongMa.png'),
  
('Elon Musk Conquers Capitalism: Part Two', 'Elon Musk Conquers Capitalism: Part Two immerses players in a futuristic battle for economic dominance. As Elon Musk, pioneer cutting-edge technologies, outsmart rival tycoons, and challenge societal norms. Balance ambition with ethics while navigating intense strategy and explosive scenarios. Will you redefine capitalism or succumb to its power? The choice is yours in this dynamic continuation.', 'Souls-Like', '2025-03-23', 'Threads', './uploads/YiLongMa2.png'),

('White Guy Simulator', 'In White Guy Simulator, you take the place of your average middle-class white guy. Explore riveting activities such as: driving to work, driving back home, enjoying mayonnaise, shop at Costco™, bland flavourless food, and so much more. Navigate your way through work: attempting to impress your boss, make small talk with coworkers, talk with clients, and many many more. Embrace humor and simplicity to just meander through everyday life until you retire.', 'Simulator', '2024-12-05', 'Mayonnaise Inc.', './uploads/white.png'),

('Vloggers vs Being a Decent Human', 'Dive into the outrageous satire of Vloggers vs Being a Decent Human, a game where you’ll juggle viral stunts, questionable ethics, and public backlash. Navigate through the chaotic highs of internet fame while deciding if you’ll stay true to your morals or sell your soul for views. Can you conquer the algorithm without losing your humanity?', 'Tower Defense', '2025-01-31', 'SodaCap', './uploads/loganPaul.png');

INSERT INTO reviews (gameId, accountId, subject, description, rating, reviewDate) VALUES 
(1, 1, 'Review of Scam Grandma', 'Ah, Scam Grandma. An amusing title for an even more peculiar concept—though I must admit, the notion of devising a video game centering on cyber-schemes and fraudulent escapades was initially met with skepticism. However, much like the works of Sir Isaac Newton, it surprised me with its depth and precision. In conclusion, Scam Grandma is a surprisingly engaging title that offers thrills, humor, and a surprising amount of intellectual stimulation. I shall rate it 4 out of 5 stars.', 4, '2016-05-25');