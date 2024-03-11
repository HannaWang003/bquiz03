CREATE TABLE `db033`.`poster` 
(`id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
`name` TEXT NOT NULL , 
`poster` TEXT NOT NULL , 
`sh` INT NOT NULL , 
`rank` INT NOT NULL , 
`ani` INT NOT NULL , 
PRIMARY KEY (`id`)) 
ENGINE = InnoDB;

CREATE TABLE `db033`.`movie` 
(`id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
`no` INT NOT NULL , 
`name` TEXT NOT NULL , 
`date` DATE NOT NULL , 
`session` TEXT NOT NULL , 
`qt` INT NOT NULL , 
`seats` TEXT NOT NULL , 
PRIMARY KEY (`id`)) 
ENGINE = InnoDB;


INSERT INTO `poster` 
(`id`, `name`, `poster`, `sh`, `rank`, `ani`) 
VALUES 
(NULL, '03A02', '03A02.jpg', '1', '2', '2'),
(NULL, '03A03', '03A03.jpg', '1', '3', '3'),
(NULL, '03A04', '03A04.jpg', '1', '4', '2'),
(NULL, '03A05', '03A05.jpg', '1', '5', '3'),
(NULL, '03A06', '03A06.jpg', '1', '6', '1'),
(NULL, '03A07', '03A07.jpg', '1', '7', '2');

INSERT INTO `movie` 
(`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `movie`, `poster`, `intro`, `sh`, `rank`) 
VALUES 
(NULL, '院線片2', '2', '1:30', '2024-03-12', '泰山職訓', '泰山', '03B02v.mp4', '03B02.png', '院線片2介紹、院線片2介紹、院線片2介紹、院線片2介紹、', '1', '2'),
(NULL, '院線片3', '3', '1:30', '2024-03-11', '泰山職訓', '泰山', '03B03v.mp4', '03B03.png', '院線片3介紹、院線片3介紹、院線片3介紹、院線片3介紹、', '1', '3'),
(NULL, '院線片2', '4', '1:30', '2024-03-12', '泰山職訓', '泰山', '03B04v.mp4', '03B04.png', '院線片4介紹、院線片4介紹、院線片4介紹、院線片4介紹、', '1', '4'),
(NULL, '院線片2', '2', '1:30', '2024-03-13', '泰山職訓', '泰山', '03B05v.mp4', '03B05.png', '院線片5介紹、院線片5介紹、院線片5介紹、院線片5介紹、', '1', '5'),
(NULL, '院線片2', '1', '1:30', '2024-03-12', '泰山職訓', '泰山', '03B06v.mp4', '03B06.png', '院線片6介紹、院線片6介紹、院線片6介紹、院線片6介紹、', '1', '6'),
(NULL, '院線片2', '3', '1:30', '2024-03-11', '泰山職訓', '泰山', '03B07v.mp4', '03B07.png', '院線片7介紹、院線片7介紹、院線片7介紹、院線片7介紹、', '1', '7'),
(NULL, '院線片2', '1', '1:30', '2024-03-10', '泰山職訓', '泰山', '03B08v.mp4', '03B08.png', '院線片8介紹、院線片8介紹、院線片8介紹、院線片8介紹、', '1', '8'),
(NULL, '院線片2', '2', '1:30', '2024-03-10', '泰山職訓', '泰山', '03B09v.mp4', '03B09.png', '院線片9介紹、院線片9介紹、院線片9介紹、院線片9介紹、', '1', '9');
