SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `basket_world` ;
USE `basket_world` ;

-- -----------------------------------------------------
-- Table `basket_world`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`users` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) CHARACTER SET 'latin1' COLLATE 'latin1_german2_ci' NOT NULL ,
  `password` VARCHAR(40) CHARACTER SET 'latin1' COLLATE 'latin1_german2_ci' NOT NULL ,
  `validated` TINYINT(1) NOT NULL DEFAULT 0 ,
  `created` DATETIME NOT NULL ,
  `lastconnect` DATETIME NOT NULL ,
  `email` VARCHAR(255) CHARACTER SET 'latin1' COLLATE 'latin1_german2_ci' NOT NULL ,
  `presentation` TEXT CHARACTER SET 'latin1' COLLATE 'latin1_german2_ci' NOT NULL ,
  `birthdate` DATE NULL ,
  `gender` TINYINT UNSIGNED NOT NULL COMMENT 'Male:0, Female:1' ,
  `ip` VARCHAR(32) NOT NULL ,
  `avatar` VARCHAR(255) CHARACTER SET 'latin1' COLLATE 'latin1_german2_ci' NOT NULL ,
  `inactive` TINYINT(1) NOT NULL DEFAULT 0 ,
  `waiting` TINYINT(1) NOT NULL DEFAULT 0 ,
  `group` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT 'member:0, moderator:1, gamemaster:2, anim_rp:3, admin:4' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 115
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_german2_ci;


-- -----------------------------------------------------
-- Table `basket_world`.`friends`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`friends` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`friends` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `from_user_id` INT UNSIGNED NOT NULL ,
  `to_user_id` INT UNSIGNED NOT NULL ,
  `confirm` TINYINT(1) NOT NULL ,
  `created` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_amis_users1`
    FOREIGN KEY (`from_user_id` )
    REFERENCES `basket_world`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_amis_users2`
    FOREIGN KEY (`to_user_id` )
    REFERENCES `basket_world`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `basket_world`.`countries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`countries` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`countries` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `country` VARCHAR(64) NOT NULL ,
  `flag` VARCHAR(128) NOT NULL COMMENT 'Will make a default flag.' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `country_UNIQUE` (`country` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basket_world`.`seasons`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`seasons` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`seasons` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `year` SMALLINT UNSIGNED NOT NULL ,
  `start_date` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_german2_ci;


-- -----------------------------------------------------
-- Table `basket_world`.`divisions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`divisions` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`divisions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `hierarchy` INT UNSIGNED NOT NULL ,
  `name` VARCHAR(64) NOT NULL ,
  `country_id` INT UNSIGNED NOT NULL ,
  `season_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_divisions_countries1`
    FOREIGN KEY (`country_id` )
    REFERENCES `basket_world`.`countries` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_divisions_seasons1`
    FOREIGN KEY (`season_id` )
    REFERENCES `basket_world`.`seasons` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `basket_world`.`teams`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`teams` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`teams` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT UNSIGNED NULL DEFAULT NULL ,
  `division_id` INT UNSIGNED NOT NULL ,
  `name` VARCHAR(64) NOT NULL ,
  `logo` VARCHAR(255) NOT NULL ,
  `gymnasium_name` VARCHAR(128) NOT NULL ,
  `places_assises` MEDIUMINT UNSIGNED NOT NULL ,
  `places_vip` MEDIUMINT UNSIGNED NOT NULL ,
  `adjoints` TINYINT UNSIGNED NOT NULL DEFAULT 0 ,
  `attaches` TINYINT UNSIGNED NOT NULL DEFAULT 0 ,
  `eplucheurs` TINYINT UNSIGNED NOT NULL DEFAULT 0 ,
  `medecins` TINYINT UNSIGNED NOT NULL DEFAULT 0 ,
  `kines` TINYINT UNSIGNED NOT NULL DEFAULT 0 ,
  `chasseurs` TINYINT UNSIGNED NOT NULL DEFAULT 0 ,
  `stats` TINYINT UNSIGNED NOT NULL DEFAULT 0 ,
  `confiance` TINYINT UNSIGNED NOT NULL ,
  `cash` INT NOT NULL ,
  `matos` TINYINT UNSIGNED NOT NULL ,
  `tenues` TINYINT UNSIGNED NOT NULL ,
  `muscu` TINYINT UNSIGNED NOT NULL ,
  `supporters` INT UNSIGNED NOT NULL ,
  `com_politique_gestion` TINYINT UNSIGNED NOT NULL COMMENT 'nothing:0, not_relegated:1, middle:2, top:3, champion:4' ,
  `com_ambition` TINYINT UNSIGNED NOT NULL COMMENT 'trading:0, formation:1' ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_teams_divisions1`
    FOREIGN KEY (`division_id` )
    REFERENCES `basket_world`.`divisions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_teams_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `basket_world`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 27
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `basket_world`.`rankings`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`rankings` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`rankings` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `division_id` INT UNSIGNED NOT NULL ,
  `team_id` INT UNSIGNED NOT NULL ,
  `points` TINYINT UNSIGNED NOT NULL ,
  `played` TINYINT UNSIGNED NOT NULL ,
  `victories` TINYINT UNSIGNED NOT NULL ,
  `defeats` TINYINT UNSIGNED NOT NULL ,
  `points_scored` SMALLINT UNSIGNED NOT NULL ,
  `points_against` SMALLINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_classements_divisions1`
    FOREIGN KEY (`division_id` )
    REFERENCES `basket_world`.`divisions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_classements_teams1`
    FOREIGN KEY (`team_id` )
    REFERENCES `basket_world`.`teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 25
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_german2_ci;


-- -----------------------------------------------------
-- Table `basket_world`.`press_releases`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`press_releases` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`press_releases` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `team_id` INT UNSIGNED NOT NULL ,
  `title` VARCHAR(128) CHARACTER SET 'latin1' COLLATE 'latin1_german2_ci' NOT NULL ,
  `description` TEXT CHARACTER SET 'latin1' COLLATE 'latin1_german2_ci' NOT NULL ,
  `created` DATETIME NOT NULL ,
  `modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_communiques_teams1`
    FOREIGN KEY (`team_id` )
    REFERENCES `basket_world`.`teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_german2_ci;


-- -----------------------------------------------------
-- Table `basket_world`.`friendly_match_requests`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`friendly_match_requests` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`friendly_match_requests` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `from_team_id` INT UNSIGNED NOT NULL ,
  `to_team_id` INT UNSIGNED NOT NULL ,
  `confirm` TINYINT(1) NOT NULL ,
  `created` DATETIME NOT NULL ,
  `home` TINYINT(1) NOT NULL ,
  `date_match` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_friendly match requests_teams1`
    FOREIGN KEY (`from_team_id` )
    REFERENCES `basket_world`.`teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_friendly match requests_teams2`
    FOREIGN KEY (`to_team_id` )
    REFERENCES `basket_world`.`teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 23
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `basket_world`.`transactions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`transactions` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`transactions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `team_id` INT UNSIGNED NOT NULL ,
  `amount` INT NOT NULL ,
  `type` TINYINT UNSIGNED NOT NULL COMMENT 'billeterie:0, sponsors:1, subventions:2, boutique:3, transferts:4, divers:5, salaires:6, personnels:7, entretien:8, formation:9' ,
  `created` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_economies_teams1`
    FOREIGN KEY (`team_id` )
    REFERENCES `basket_world`.`teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 809
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_german2_ci;


-- -----------------------------------------------------
-- Table `basket_world`.`trainers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`trainers` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`trainers` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `team_id` INT UNSIGNED NULL DEFAULT NULL ,
  `first_name` VARCHAR(64) CHARACTER SET 'latin1' COLLATE 'latin1_german2_ci' NOT NULL ,
  `name` VARCHAR(64) CHARACTER SET 'latin1' COLLATE 'latin1_german2_ci' NOT NULL ,
  `age` SMALLINT UNSIGNED NOT NULL ,
  `country_id` INT UNSIGNED NOT NULL ,
  `level` SMALLINT UNSIGNED NOT NULL ,
  `style` TINYINT UNSIGNED NOT NULL COMMENT 'offensive:0, defensive:1, equal:2l' ,
  `salary` INT UNSIGNED NOT NULL ,
  `price` INT UNSIGNED NOT NULL ,
  `available` TINYINT(1) NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_trainers_teams1`
    FOREIGN KEY (`team_id` )
    REFERENCES `basket_world`.`teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trainers_countries1`
    FOREIGN KEY (`country_id` )
    REFERENCES `basket_world`.`countries` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 79
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_german2_ci;


-- -----------------------------------------------------
-- Table `basket_world`.`events`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`events` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`events` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `team_id` INT UNSIGNED NOT NULL ,
  `text` TEXT CHARACTER SET 'latin1' COLLATE 'latin1_german2_ci' NOT NULL ,
  `created` DATETIME NOT NULL ,
  `historical` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_events_teams1`
    FOREIGN KEY (`team_id` )
    REFERENCES `basket_world`.`teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 85
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_german2_ci;


-- -----------------------------------------------------
-- Table `basket_world`.`players`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`players` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`players` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `country_id` INT UNSIGNED NOT NULL ,
  `first_name` VARCHAR(64) NOT NULL ,
  `name` VARCHAR(64) NOT NULL ,
  `age` TINYINT UNSIGNED NOT NULL ,
  `height` TINYINT UNSIGNED NOT NULL ,
  `salary` INT UNSIGNED NOT NULL ,
  `skill` SMALLINT UNSIGNED NOT NULL ,
  `shoot` TINYINT UNSIGNED NOT NULL ,
  `3points` TINYINT UNSIGNED NOT NULL ,
  `dribble` TINYINT UNSIGNED NOT NULL ,
  `assist` TINYINT UNSIGNED NOT NULL ,
  `rebound` TINYINT UNSIGNED NOT NULL ,
  `block` TINYINT UNSIGNED NOT NULL ,
  `steal` TINYINT UNSIGNED NOT NULL ,
  `defense` TINYINT UNSIGNED NOT NULL ,
  `form` TINYINT UNSIGNED NOT NULL ,
  `experience` MEDIUMINT UNSIGNED NOT NULL ,
  `spirit` TINYINT UNSIGNED NOT NULL COMMENT 'aggressive:0, calm:1, vicous:2, timid:3' ,
  `injury` TINYINT UNSIGNED NOT NULL ,
  `speciality` TINYINT UNSIGNED NOT NULL COMMENT 'dunker:0, nasher:1, blocker:2' ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_players_countries1`
    FOREIGN KEY (`country_id` )
    REFERENCES `basket_world`.`countries` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 54254
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `basket_world`.`matches`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`matches` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`matches` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `home_team_id` INT UNSIGNED NOT NULL ,
  `visitor_team_id` INT UNSIGNED NOT NULL ,
  `start_date` DATETIME NOT NULL ,
  `home_points` SMALLINT UNSIGNED NULL DEFAULT NULL ,
  `visitor_points` SMALLINT UNSIGNED NULL DEFAULT NULL ,
  `normal_spectators` MEDIUMINT UNSIGNED NOT NULL ,
  `vip_spectators` MEDIUMINT UNSIGNED NOT NULL ,
  `finished` TINYINT(1) NOT NULL ,
  `type` TINYINT UNSIGNED NOT NULL COMMENT 'cup:0, league:1, friendly:2' ,
  PRIMARY KEY (`id`) ,
  INDEX `id_equipe_dom` (`home_team_id` ASC) ,
  INDEX `id_equipe_ext` (`visitor_team_id` ASC) ,
  INDEX `buts_dom` (`home_points` ASC) ,
  INDEX `buts_ext` (`visitor_points` ASC) ,
  CONSTRAINT `fk_matches_teams1`
    FOREIGN KEY (`home_team_id` )
    REFERENCES `basket_world`.`teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_matches_teams2`
    FOREIGN KEY (`visitor_team_id` )
    REFERENCES `basket_world`.`teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 181
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_german2_ci;


-- -----------------------------------------------------
-- Table `basket_world`.`grades_matches`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`grades_matches` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`grades_matches` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `match_id` INT UNSIGNED NOT NULL ,
  `user_id` INT UNSIGNED NOT NULL ,
  `grade` TINYINT UNSIGNED NOT NULL ,
  `created` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_notes_matchs_matches1`
    FOREIGN KEY (`match_id` )
    REFERENCES `basket_world`.`matches` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notes_matchs_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `basket_world`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `basket_world`.`goals`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`goals` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`goals` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `description` TEXT CHARACTER SET 'latin1' COLLATE 'latin1_german2_ci' NOT NULL ,
  `visible` TINYINT(1) NOT NULL DEFAULT 1 ,
  `auto` TINYINT(1) NOT NULL DEFAULT 0 ,
  `points` SMALLINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_german2_ci;


-- -----------------------------------------------------
-- Table `basket_world`.`users_goals`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`users_goals` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`users_goals` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `goal_id` INT UNSIGNED NOT NULL ,
  `user_id` INT UNSIGNED NOT NULL ,
  `created` DATETIME NOT NULL ,
  `gm_valid_user_id` INT UNSIGNED NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_obj_membre_objectifs1`
    FOREIGN KEY (`goal_id` )
    REFERENCES `basket_world`.`goals` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_obj_membre_users1`
    FOREIGN KEY (`gm_valid_user_id` )
    REFERENCES `basket_world`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_goals_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `basket_world`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_german2_ci;


-- -----------------------------------------------------
-- Table `basket_world`.`instructions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`instructions` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`instructions` (
  `id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(128) CHARACTER SET 'latin1' COLLATE 'latin1_german2_ci' NOT NULL ,
  `description` TEXT CHARACTER SET 'latin1' COLLATE 'latin1_german2_ci' NOT NULL ,
  `created` DATETIME NOT NULL ,
  `modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 27
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_german2_ci;


-- -----------------------------------------------------
-- Table `basket_world`.`rumors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`rumors` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`rumors` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `division_id` INT UNSIGNED NOT NULL ,
  `user_id` INT UNSIGNED NOT NULL ,
  `title` VARCHAR(255) NOT NULL ,
  `created` DATETIME NOT NULL ,
  `from` TINYINT UNSIGNED NOT NULL COMMENT 'press:0, fan:1, player:2, coach:3' ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_rumeurs_divisions1`
    FOREIGN KEY (`division_id` )
    REFERENCES `basket_world`.`divisions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rumeurs_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `basket_world`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `basket_world`.`transferts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`transferts` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`transferts` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `player_id` INT UNSIGNED NOT NULL ,
  `acquire_team_id` INT UNSIGNED NOT NULL ,
  `sell_team_id` INT UNSIGNED NOT NULL ,
  `gm_watch` INT UNSIGNED NOT NULL ,
  `created` DATETIME NOT NULL ,
  `finish_date` DATETIME NOT NULL ,
  `first_price` INT UNSIGNED NOT NULL ,
  `current_price` INT UNSIGNED NOT NULL ,
  `sold` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_transferts_teams2` (`acquire_team_id` ASC) ,
  CONSTRAINT `fk_transferts_players1`
    FOREIGN KEY (`player_id` )
    REFERENCES `basket_world`.`players` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transferts_teams2`
    FOREIGN KEY (`acquire_team_id` )
    REFERENCES `basket_world`.`teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transferts_teams3`
    FOREIGN KEY (`sell_team_id` )
    REFERENCES `basket_world`.`teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transferts_users1`
    FOREIGN KEY (`gm_watch` )
    REFERENCES `basket_world`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 121
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_german2_ci;


-- -----------------------------------------------------
-- Table `basket_world`.`players_teams`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`players_teams` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`players_teams` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `team_id` INT UNSIGNED NOT NULL ,
  `player_id` INT UNSIGNED NOT NULL ,
  `default_position` TINYINT UNSIGNED NOT NULL COMMENT 'Meneur:0, Arrière:1, Ailier_shooter:2, Ailier_fort:3, Pivot:4' ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_players_teams_players1`
    FOREIGN KEY (`player_id` )
    REFERENCES `basket_world`.`players` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_players_teams_teams1`
    FOREIGN KEY (`team_id` )
    REFERENCES `basket_world`.`teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basket_world`.`matches_players`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`matches_players` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`matches_players` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `match_id` INT UNSIGNED NOT NULL ,
  `players_team_id` INT UNSIGNED NOT NULL ,
  `position` TINYINT UNSIGNED NOT NULL COMMENT 'Meneur:0, Arrière:1, Ailier_shooter:2, Ailier_fort:3, Pivot:4, Réserve:5' ,
  `play_time` TIME NOT NULL DEFAULT 0 ,
  `2pts_attempts` SMALLINT UNSIGNED NULL DEFAULT NULL ,
  `2pts_scored` SMALLINT UNSIGNED NULL DEFAULT NULL ,
  `3pts_attempts` SMALLINT UNSIGNED NULL DEFAULT NULL ,
  `3pts_scored` SMALLINT UNSIGNED NULL DEFAULT NULL ,
  `rebounds_offensive` SMALLINT UNSIGNED NULL DEFAULT NULL ,
  `rebounds_defensive` SMALLINT UNSIGNED NULL DEFAULT NULL ,
  `freethrows_attempts` SMALLINT UNSIGNED NULL DEFAULT NULL ,
  `freethrows_scored` SMALLINT UNSIGNED NULL DEFAULT NULL ,
  `assists` SMALLINT UNSIGNED NULL DEFAULT NULL ,
  `steals` SMALLINT UNSIGNED NULL DEFAULT NULL ,
  `blocks` SMALLINT UNSIGNED NULL DEFAULT NULL ,
  `fouls` SMALLINT UNSIGNED NULL DEFAULT NULL ,
  `injury` SMALLINT UNSIGNED NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_players_matches_matches1`
    FOREIGN KEY (`match_id` )
    REFERENCES `basket_world`.`matches` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_matches_players_players_teams1`
    FOREIGN KEY (`players_team_id` )
    REFERENCES `basket_world`.`players_teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basket_world`.`vips`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`vips` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`vips` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT UNSIGNED NOT NULL ,
  `created` DATETIME NOT NULL ,
  `end_date` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_vip_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `basket_world`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basket_world`.`strategies`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`strategies` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`strategies` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `team_id` INT UNSIGNED NOT NULL ,
  `match_id` INT UNSIGNED NOT NULL ,
  `type` TINYINT UNSIGNED NOT NULL COMMENT 'press:0, mantoman:1, zone:2, triangle:3, pick:4, quick:5, _3points:6' ,
  `condition` INT NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_strategy_teams1`
    FOREIGN KEY (`team_id` )
    REFERENCES `basket_world`.`teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_strategy_matches1`
    FOREIGN KEY (`match_id` )
    REFERENCES `basket_world`.`matches` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basket_world`.`trainings`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`trainings` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`trainings` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `team_id` INT UNSIGNED NOT NULL ,
  `weekday` TINYINT NOT NULL ,
  `type` TINYINT UNSIGNED NOT NULL COMMENT 'rest:0, shoot:1, _3points:2, dribble:3, assist:4, rebound:5, block:6, steal:7, defense:8' ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_trainings_teams1`
    FOREIGN KEY (`team_id` )
    REFERENCES `basket_world`.`teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basket_world`.`youth_investments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`youth_investments` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`youth_investments` (
  `id` INT UNSIGNED NOT NULL ,
  `team_id` INT UNSIGNED NOT NULL ,
  `amount` SMALLINT UNSIGNED NOT NULL ,
  `created` DATETIME NOT NULL ,
  `modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_youth_training_centers_teams1`
    FOREIGN KEY (`team_id` )
    REFERENCES `basket_world`.`teams` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basket_world`.`actions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`actions` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`actions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(64) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basket_world`.`actions_matches`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`actions_matches` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`actions_matches` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `match_id` INT UNSIGNED NOT NULL ,
  `player1_id` INT UNSIGNED NOT NULL ,
  `player2_id` INT UNSIGNED NULL DEFAULT NULL ,
  `action_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_actions_matches_matches1`
    FOREIGN KEY (`match_id` )
    REFERENCES `basket_world`.`matches` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_actions_matches_players1`
    FOREIGN KEY (`player1_id` )
    REFERENCES `basket_world`.`players` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_actions_matches_players2`
    FOREIGN KEY (`player2_id` )
    REFERENCES `basket_world`.`players` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_actions_matches_actions1`
    FOREIGN KEY (`action_id` )
    REFERENCES `basket_world`.`actions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basket_world`.`languages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`languages` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`languages` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `language` VARCHAR(64) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basket_world`.`action_descriptions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`action_descriptions` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`action_descriptions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `long_description` TEXT NOT NULL ,
  `action_id` INT UNSIGNED NOT NULL ,
  `language_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_action_descriptions_actions1`
    FOREIGN KEY (`action_id` )
    REFERENCES `basket_world`.`actions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_action_descriptions_languages1`
    FOREIGN KEY (`language_id` )
    REFERENCES `basket_world`.`languages` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basket_world`.`player_names`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`player_names` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`player_names` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(64) NULL ,
  `country_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_player_names_countries1`
    FOREIGN KEY (`country_id` )
    REFERENCES `basket_world`.`countries` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basket_world`.`player_first_names`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`player_first_names` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`player_first_names` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(64) NULL ,
  `country_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_player_first_names_countries1`
    FOREIGN KEY (`country_id` )
    REFERENCES `basket_world`.`countries` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basket_world`.`team_names`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `basket_world`.`team_names` ;

CREATE  TABLE IF NOT EXISTS `basket_world`.`team_names` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(64) NULL ,
  `in_use` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
