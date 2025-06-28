CREATE TABLE class_periods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    period_name VARCHAR(100),
    start_time TIME,
    end_time TIME
);
-- Routine table to store all assignments
CREATE TABLE IF NOT EXISTS `class_routine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `day_of_week` tinyint(1) NOT NULL COMMENT '1=Monday, 2=Tuesday, etc.',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_assignment` (`class_id`,`section_id`,`period_id`,`day_of_week`),
  KEY `teacher_id` (`teacher_id`),
  KEY `period_id` (`period_id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
