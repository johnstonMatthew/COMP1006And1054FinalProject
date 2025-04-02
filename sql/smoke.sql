-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2025 at 10:37 PM
-- Server version: 8.0.39
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smoke`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `gameId` int NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `publishDate` date NOT NULL,
  `publisher` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `coverImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`gameId`, `name`, `description`, `genre`, `publishDate`, `publisher`, `coverImage`) VALUES
(1, 'Scam Grandma', 'Scam Grandma is a devilishly entertaining strategy game where players step into the shoes of a cunning scammer attempting to outwit Grandma, a surprisingly savvy senior citizen. Prepare to craft clever phishing schemes, design elaborate phone call ruses, and navigate through Grandmas growing arsenal of anti-scam skills. Each level challenges you to adapt as Grandma learns new tricks to thwart your plans. Can you stay one step ahead and become the ultimate master of deception?', 'Action', '2006-05-17', 'Lilypad Lagoon', 'uploads/scamGrandma.png'),
(2, 'Solid Warrior: Fabric Lullaby', 'Solid Warrior: Fabric Lullaby is a mesmerizing metroidvania adventure where players unravel the secrets of a forgotten world woven entirely from fabric. You play as the Solid Warrior, a stoic yet valiant figure mysteriously stitched into existence to combat the creeping decay threatening this patchwork realm. Traverse interconnected areas, from velvet forests to tangled thread mines, as you discover new abilities and piece together the truth behind the enigmatic Fabric Lullaby.', 'Metroidvania', '2022-12-24', 'Team Orange', 'uploads/silksong.png'),
(3, 'Learn Python With Rob Schneider', 'Learn Python With Rob Schneider is an educational yet wildly entertaining game where actor and comedian Rob Schneider takes you on a coding journey like no other. Dive into an interactive Python programming curriculum with Schneider as your quirky and supportive mentor. Through hilarious commentary, fun challenges, and skit-like mini-games, you will learn the fundamentals of Python programming, from variables to loops and beyond.', 'Education', '2015-05-11', 'EA', 'uploads/learnPython.png'),
(4, 'Peter Griffin’s Vocaloid Jamboree Epic ', 'Get ready to groove in Peter Griffin’s Vocaloid Jamboree Epic! Join the beloved Family Guy character on a hilarious, rhythm-fueled journey through Vocaloid-inspired tracks. Tap, swipe, and match beats as Peter performs outrageous dance moves alongside iconic Vocaloid personas in vibrant, anime-styled stages. Unlock quirky costumes, remixes, and bonus levels for epic challenges. It’s absurd, chaotic, and totally Griffintastic—your rhythm skills have never been tested like this!', 'Rhythm', '2017-03-06', 'Crypton Future Media, INC.', './uploads/peterMiku.png'),
(5, 'Sonic Succumbs to the Unbearable Pressures of Life', 'In Sonic Succumbs to Unbearable Pressures of Life, players descend into the crumbling psyche of a broken hero. The once-vivid world is now twisted and bleak, plagued by echoes of regret and fear. Sonic’s journey is fraught with harrowing choices, suffocating self-doubt, and eerie remnants of his former glory. The game forces players to confront unsettling truths, navigate shattered realities, and face the raw vulnerability of a legend spiraling toward despair.', 'Educational', '2012-05-20', 'SEGA', './uploads/sonicSadge.png'),
(6, 'Elon Musk Conquers Capitalism: Part One', 'Elon Musk Conquers Capitalism is a satirical strategy game where players embody Elon Musk, aiming to dominate the world economy. You navigate corporate empires, innovate futuristic technologies, and tackle rival magnates in a quest to reshape capitalism. Balance public perception, media influence, and resource management to succeed. Will you redefine global systems or face corporate collapse? The future of capitalism is in your hands!', 'Tycoon', '2024-04-26', 'Threads', './uploads/YiLongMa.png'),
(7, 'Elon Musk Conquers Capitalism: Part Two', 'Elon Musk Conquers Capitalism: Part Two immerses players in a futuristic battle for economic dominance. As Elon Musk, pioneer cutting-edge technologies, outsmart rival tycoons, and challenge societal norms. Balance ambition with ethics while navigating intense strategy and explosive scenarios. Will you redefine capitalism or succumb to its power? The choice is yours in this dynamic continuation.', 'Souls-Like', '2025-03-23', 'Threads', './uploads/YiLongMa2.png'),
(8, 'White Guy Simulator', 'In White Guy Simulator, you take the place of your average middle-class white guy. Explore riveting activities such as: driving to work, driving back home, enjoying mayonnaise, shop at Costco™, bland flavourless food, and so much more. Navigate your way through work: attempting to impress your boss, make small talk with coworkers, talk with clients, and many many more. Embrace humor and simplicity to just meander through everyday life until you retire.', 'Simulator', '2024-12-05', 'Mayonnaise Inc.', './uploads/white.png'),
(9, 'Vloggers vs Being a Decent Human', 'Dive into the outrageous satire of Vloggers vs Being a Decent Human, a game where you’ll juggle viral stunts, questionable ethics, and public backlash. Navigate through the chaotic highs of internet fame while deciding if you’ll stay true to your morals or sell your soul for views. Can you conquer the algorithm without losing your humanity?', 'Tower Defense', '2025-01-31', 'SodaCap', './uploads/loganPaul.png');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int NOT NULL,
  `gameId` int NOT NULL,
  `accountId` int NOT NULL,
  `subject` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rating` int NOT NULL,
  `reviewDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `gameId`, `accountId`, `subject`, `description`, `rating`, `reviewDate`) VALUES
(1, 1, 2, 'Review of Scam Grandma', 'Ah, Scam Grandma. An amusing title for an even more peculiar concept—though I must admit, the notion of devising a video game centering on cyber-schemes and fraudulent escapades was initially met with skepticism. However, much like the works of Sir Isaac Newton, it surprised me with its depth and precision. In conclusion, Scam Grandma is a surprisingly engaging title that offers thrills, humor, and a surprising amount of intellectual stimulation. I shall rate it 4 out of 5 stars.', 4, '2016-05-25'),
(2, 3, 1, 'Pretty Annoying', ' Now I enjoy me some Python and I tolerate Rob Schneider, BUT when you put the two together you get an abomination that needs to be wiped from the world. Nails on a chalkboard in a compliment to this monstrosity. DO NOT BUY. ', 2, '2025-03-23'),
(3, 2, 4, 'Waaaah Scary!!!!', 'Me b1g baby, me scared of scary game', 2, '2025-03-23'),
(4, 1, 1, 'Pretty Good', ' The game is quite good, the AI that you face off against learns rapidly and can provide a decent challenge and forces you to think on your feet.\r\nThe game is not without flaws though, the graphic for a game released in 2006 is quite basic and the gameplay loop can get a little repetitive at time.\r\nBut overall the game is good.', 3, '2025-03-24'),
(10, 4, 11, 'Friggin Sweet', 'Peter Griffin’s Vocaloid Jamboree Epic is freakin’ sweet! The rhythm mechanics kept me grooving like Quagmire on karaoke night. The visuals were colorful enough to make Stewie’s teddy bear, Rupert, jealous. My one gripe? No chicken fight bonus round! But hey, who knew Vocaloids and Griffin charm were such a winning combo? If Lois asks, tell her it’s an educational game. Five clams outta five!', 5, '2025-03-25'),
(11, 5, 9, 'Fantastic but, too sad for me', 'Okay, so, Sonic Succumbs to the Unbearable Pressures of Life? Picture this: our blue hedgehog battling existential crises instead of Eggman. The gameplay is emotionally draining but weirdly cathartic—like eating a tub of ice cream after a breakup. I cried. Twice. The soundtrack? Hauntingly beautiful. Overall, it’s like therapy, but with more hedgehogs. Ten out of ten, would emotionally implode again. ', 5, '2025-03-25'),
(12, 2, 9, 'An Intergalactic Fabric of Excellence: Rajesh’s Take on Solid Warrior: Fabric Lullaby', ' Solid Warrior: Fabric Lullaby? Oh, my stars and garters, it’s a rollercoaster of intergalactic intrigue with a side of mind-bending puzzles! The art style is so beautiful, I wept a little—okay, a lot. The gameplay is smoother than Sheldon’s argument for string theory. It’s like Metroid and Castlevania had a baby and dressed it in silk. Just beware of the bosses; they’re scarier than Howard’s mom yelling ‘HOWARD!’', 4, '2023-08-10'),
(13, 6, 12, 'Three Stones With One Bird', ' Behave or get ban-banned', 3, '2025-03-25'),
(14, 2, 1, 'Doubter', 'Bait Used to Be Believable', 3, '2025-03-26'),
(15, 8, 12, 'Erm Pretty Offensive', 'As a white guy, this is outrageously offensive. We white guy’s go through so many horrible things in our lives that the game might fun of and trivializes.\r\nDO NOT BUY THIS. Stupid Cuck Wokes ', 1, '2025-03-29'),
(16, 9, 11, 'Friggin Sweet', ' Yeah, so Vloggers vs Being a Decent Human? It’s like if clickbait and chaos had a baby, and that baby went on a caffeine bender. You got influencers pulling wild stunts, and you’re just tryin’ to keep ‘em from breaking, like, every moral code known to man. It’s fun but also makes you go, ’Wow, humanity’s doomed.’ Kinda like Quagmire on social media—hilarious, but terrifying. 4/5 would play again, if only to feel morally superior. Freakin’ sweet!', 4, '2025-03-29'),
(17, 7, 11, 'Friggin Sweet', ' Yeah, so I played Elon Musk Conquers Capitalism: Part Two, and, uh, it’s basically Musk running around like Iron Man, throwing Teslas at corporate villains. It’s insane, but strangely addictive. The graphics? About as good as those car commercials where they splice in stock footage. Storyline? A fever dream that someone clearly wrote in three Red Bulls deep. Would I play it again? Maybe, after I recover from the Elon overload. In short, it’s wild—and kind of fun.', 3, '2025-03-30'),
(20, 8, 9, 'Friggin Sweet', ' Oh my stars, this game is heavenly. ', 4, '2025-03-31'),
(21, 3, 9, 'Rob Schneider Sucks', ' He big poopoo', 1, '2025-03-31'),
(24, 8, 2, 'As a White Guy I’m Disappointed', ' As Sheldon Cooper, I must say, playing White Guy Simulator is an exercise in futility. The lack of intellectual challenge was appalling, the gameplay was as derivative as Penny’s dinner choices, and don’t get me started on the absence of scientific accuracy. The protagonist’s storyline was tedious, offering no growth or intriguing complexity. In summary, I wouldn’t even assign this game a ‘bazinga.’ It’s not worth the electrons it’s programmed on.', 1, '2025-03-31'),
(26, 3, 17, 'I’m Wataru I Like', 'ああ、著名なロブ・シュナイダーと Python プログラミングの芸術をフィーチャーしたゲームです!まさに、なぞなぞとバラをジャグリングしているような、奇妙な組み合わせです。ユーモア、教育、予期せぬ魅力が最も演劇的な方法で融合されています。メカニックは魅力的ですが、真のハイライトはその風変わりなストーリーテリングです。コーディングがパフォーマンスアートになるステージ！まさにアンコールにふさわしい！', 5, '2025-04-01'),
(27, 5, 2, 'Sheldon’s Scientific Critique of Sonic’s Existential Spiral', 'While Sonic Succumbs to the Unbearable Pressures of Life attempts to explore Sonic’s psyche, its execution is flawed. The narrative is intriguing yet scientifically implausible, much like Penny debating quantum mechanics. The graphics suffice, but the portrayal of a hedgehog’s emotional breakdown lacks realism. Overall, it’s interesting but fundamentally flawed, much like Leonard’s rocket propulsion prototype.', 2, '2025-04-01'),
(28, 9, 7, 'It’s Fine', ' I mean the graphics are appealing and I always appreciate making fun of Logan Paul. But the gameplays boring and repetitive. Doesn’t do it for me', 3, '2025-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `accountId` int NOT NULL,
  `accountName` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lName` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `profilePicture` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT './uploads/placeholder.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`accountId`, `accountName`, `dateOfBirth`, `email`, `fName`, `lName`, `password`, `profilePicture`) VALUES
(1, 'test', '2005-04-24', 'test.admin@admin.com', 'Admin', 'admin', '724028e8183a07cc60a7cfd757e89959811e77229c5d0b26531cb99eed1c2eb4c1f9a7057fa0a4ab934c7524e0299903820dae2bc5f9ddcc00d15ef0b754ba3d', './uploads/admin.png'),
(2, 'GigaGenius445', '1980-02-26', 'sheldoncooper@gmail.com', 'Sheldon', 'Cooper', 'feaaed0dfc8164b293ff48616f588ee97c0d1e88c82dbd60ad477c14ebe66167fb97586d52fa967cc5aa3101217c70fa5fd5e9ff7bfe370a6e23c2520dd7c85d', './uploads/sheldonCooper.jpg'),
(3, 'BigSexyMan69420', '1980-06-13', 'howardwolowitz@hotmail.com', 'Howard', 'Wolowitz', 'ce6cb8f55e398bc3839b5e16aff146016768edcc9e186208a60006420a4f408e21d84927b4293fb838085d964f0bf2e51d85ebb5a07bdb9f3642156216a384a9', './uploads/howard.jpg'),
(4, 'BigBaby31', '1981-03-21', 'stanley.fredrick@cogeco.ca', 'Stanley', 'Fredrick', '4eca46efde8c96f8e2e9750223849b6c7c6e27648429be1dae80d9fc253a3682f2752510adfbb2f27eef27608b463a4a0ea6a5f6f50fd281c79085fbbe97834f', './uploads/baby.jpg'),
(7, 'experimentalTheory435', '1980-05-17', 'leonardhofstadter@gmail.com', 'Leonard', 'Hofstadter', 'b48c511bb83317d9be50f4351ec6351e63e4ae6d17b11ee00b586d6f7ed25d642fb2d2d0b901689d1571ca57cffa7850e97c4d84375a4c0546443299e844ffd1', './uploads/leonard.jpg'),
(8, 'sheldonLover4843', '1979-12-17', 'amy.ferrahFowler@cogeco.ca', 'Amy', 'Farrah Fowler', '8a924a3c025c833f47aa8b67918a27bcbe6f6472a7588dcf84618b0411a462b920647f24441bd4a1e28d654bb1b8a63ce07596863088194fbb07bc6fafdb867f', './uploads/amy.jpg'),
(9, 'GalacticGamerRaj', '1981-10-06', 'rajesh.koothrappali@hotmail.com', 'Rajesh', 'Koothrappali', '50ede3a8d39b070d6c2ec8b148a4120e05bb445bc340514e1fe30bc0da58da9c9a98ea9205dcd0e6b5ff7bdb77a235250c20413303f6497c30b387b59d821142', './uploads/raj.png'),
(11, 'The_Family_Guy', '2012-02-27', 'petergriffin@lkdsb.com', 'Peter', 'Griffin', 'c24dd5c362fb1f1717646df2cff521a29edc3a4c36f01d49973772a6b186aef79e56384665712c882923700bc3fa0ffe6dacd099e656883d6374669473a2a917', './uploads/petter.png'),
(12, 'The_Red_Devil', '2023-03-03', 'thedevil.banban@hotmail.com', 'Ban', 'Ban', 'c196578c4317191324dccaeaad4a0692d94152f79101288e47f2176c7c5f111030f379bf2c1952847ffaeb8231d2b9221c55fe6bbdb2911b58afe5b70fab8067', './uploads/garten-of-banban-2-logo.png'),
(13, 'Trololololo', '1934-09-04', 'trololo.trolololo@hotmail.com', 'Eduard', 'Khil', '5c65ecb2f9f3e884321a0c840f972c7bd923bf92bae068267e756e90eb7662a0d4ad19a5cb1c9e6b8f7eba17c20a9322dea6247556f86ecbfec73e100d8724e8', './uploads/trolo.jpg'),
(16, 'testAccount2’', '1986-03-04', 'testing.test@gmail.com', 'test', 'test', '0fff0dea024546159309dc18948349d53ba4bf2882eca95b7a46b49061896599f63e48175b3510741a0bb3388d56f40ee43071beec893e873aa79bdf8fad23f4', './uploads/placeholder.png'),
(17, 'wataruhibikifan90', '1962-01-01', 'thisiswhoiam@shadow.com', 'emmalyssaa', 'saucedup', 'cd3bb6920ddcb60fd7eb4ce9ef52e61a5c8822ef38abe3c122b9e0699592e584207b26ebe4195bcafa4f8fcc105348110f8a77a62cb95ce7aed09b81b9c7c0b7', './uploads/baby.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gameId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `gameId` (`gameId`),
  ADD KEY `accountId` (`accountId`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`accountId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `gameId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `accountId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
