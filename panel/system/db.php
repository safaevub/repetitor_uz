<?php
if (!defined('PANEL_INDEX')) {
	die('GO TO INDEX');
}
class DB extends mysqli{

	public function getGroupList() {
		$sql = "SELECT * FROM `group` ORDER BY `order_by` ASC";
		return $this->getList($this->query($sql));
	}

    public function saveGroup($id, $name, $name_uz, $orderBy) {
        if (empty($id)) {
            if ($stmt = $this->prepare("INSERT INTO `group` (`name`, `name_uz`, `order_by`) VALUES (?, ?, ?)")) {
                $stmt->bind_param('ssi', $name, $name_uz, $orderBy);
                if ($stmt->execute()) {
                    return $this->insert_id;
                } else {
                    return false;
                }
            } else die($this->error);
        } else {
            $stmt = $this->prepare("UPDATE `group` SET `name` = ?, `name_uz` = ?, `order_by` = ? WHERE id = ?");
            $stmt->bind_param('ssii', $name, $name_uz, $orderBy, $id);
            return $stmt->execute();
        }
    }
	public function getSubjectList() {
		$sql = "SELECT * FROM `subject` ORDER BY `order_by` ASC";
		return $this->getList($this->query($sql));
	}

    public function saveSubject($id, $name, $name_uz, $orderBy) {
        if (empty($id)) {
            if ($stmt = $this->prepare("INSERT INTO `subject` (`name`, `name_uz`, `order_by`) VALUES (?, ?, ?)")) {
                $stmt->bind_param('ssi', $name, $name_uz, $orderBy);
                if ($stmt->execute()) {
                    return $this->insert_id;
                } else {
                    return false;
                }
            } else die($this->error);
        } else {
            $stmt = $this->prepare("UPDATE `subject` SET `name` = ?, `name_uz` = ?, `order_by` = ? WHERE id = ?");
            $stmt->bind_param('ssii', $name, $name_uz, $orderBy, $id);
            return $stmt->execute();
        }
    }
	public function getLocationList() {
		$sql = "SELECT * FROM `location` ORDER BY `order_by` ASC";
		return $this->getList($this->query($sql));
	}

    public function saveLocation($id, $name, $name_uz, $orderBy) {
        if (empty($id)) {
            if ($stmt = $this->prepare("INSERT INTO `location` (`name`, `name_uz`, `order_by`) VALUES (?, ?, ?)")) {
                $stmt->bind_param('ssi', $name, $name_uz, $orderBy);
                if ($stmt->execute()) {
                    return $this->insert_id;
                } else {
                    return false;
                }
            } else die($this->error);
        } else {
            $stmt = $this->prepare("UPDATE `location` SET `name` = ?, `name_uz` = ?, `order_by` = ? WHERE id = ?");
            $stmt->bind_param('ssii', $name, $name_uz, $orderBy, $id);
            return $stmt->execute();
        }
    }
	public function getLessonList() {
		$sql = "SELECT `lesson`.*, `subject`.`name` as subject_name FROM `lesson` JOIN `subject` ON `subject`.`id` = `lesson`.`subject_id` ORDER BY `subject`.`order_by` ASC, `lesson`.`order_by` ASC";
		return $this->getList($this->query($sql));
	}

    public function saveLesson($id, $name, $name_uz, $subjectId, $orderBy, $ifExam) {
        if (empty($id)) {
            if ($stmt = $this->prepare("INSERT INTO `lesson` (`name`, `name_uz`, `subject_id`, `order_by`, `if_exam`) VALUES (?, ?, ?, ?, ?)")) {
                $stmt->bind_param('ssiii', $name, $name_uz, $subjectId, $orderBy, $ifExam);
                if ($stmt->execute()) {
                    return $this->insert_id;
                } else {
                    die(' ERROR: ' . $this->error);
                    return false;
                }
            } else die($this->error);
        } else {
            $stmt = $this->prepare("UPDATE `lesson` SET `name` = ?, `name_uz` = ?, `subject_id` = ?, `order_by` = ?, `if_exam` = ? WHERE id = ?");
            $stmt->bind_param('ssiiii', $name, $name_uz, $subjectId, $orderBy, $ifExam, $id);
            return $stmt->execute();
        }
    }

	public function getTutorList($page) {
        global $config, $pagination;
        $per_page = isset($config['per_page']) ? $config['per_page'] : 15;
        $pagination->setRPP($per_page);
        $pagination->setTotal($this->getTutorCount());
        $limit = " LIMIT ". ($per_page * ($page - 1)) .", ".$per_page;
		$sql = "SELECT `tutor`.*, DATE_FORMAT(`tutor`.`dob`, '%d.%m.%Y') as `dob`, `location`.`name` as location_name FROM `tutor` JOIN `location` ON `location`.`id` = `tutor`.`location_id` ORDER BY `tutor`.`id` DESC".$limit;
		return $this->getList($this->query($sql));
	}

	public function getTutorById($id) {
        $sql = "SELECT `tutor`.*, DATE_FORMAT(`tutor`.`dob`, '%d.%m.%Y') as `dob`, `location`.`name` as location_name FROM `tutor` JOIN `location` ON `location`.`id` = `tutor`.`location_id` WHERE `tutor`.id = ".$id;
		$result = $this->query($sql);
        if ($result) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
	}

    public function getTutorCount() {
        $sql = "SELECT COUNT(id) as `count` FROM `tutor`";
        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public function saveTutor($id, $name, $gender, $image, $phone, $email, $dob, $locationId, $livingRegionId, $livingAddr, $servingDist, $eduLevel, $toHome, $edu, $exp, $edu_uz, $exp_uz, $teach_lang, $rating, $fact, $info, $fact_uz, $info_uz) {
        if (empty($id)) {
            if ($stmt = $this->prepare("INSERT INTO `tutor` (`name`, `gender`, `image`, `phone`, `email`, `dob`, `location_id`, `living_region_id`, `living_addr`, `serving_dist`, `edu_level`, `to_home`, `edu`, `exp`, `edu_uz`, `exp_uz`, `teach_lang`, `rating`, `fact`, `info`, `fact_uz`, `info_uz`) VALUES (?, ?, ?, ?, ?, STR_TO_DATE(?, '%d.%m.%Y'), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
                $stmt->bind_param('ssssssiississsssssssss', $name, $gender, $image, $phone, $email, $dob, $locationId, $livingRegionId, $livingAddr, $servingDist, $eduLevel, $toHome, $edu, $exp, $edu_uz, $exp_uz, $teach_lang, $rating, $fact, $info, $fact_uz, $info_uz);
                if ($stmt->execute()) {
                    return $this->insert_id;
                } else {
                    die(' ERROR: ' . $this->error);
                    return false;
                }
            } else die($this->error);
        } else {
            $stmt = $this->prepare("UPDATE `tutor` SET `name` = ?, `gender` = ?, `image` = ?, `phone` = ?, `email` = ?, `dob` = STR_TO_DATE(?, '%d.%m.%Y'), `location_id` = ?, `living_region_id` = ?, `living_addr` = ?, `serving_dist` = ?, `edu_level` = ?, `to_home` = ?, `edu` = ?, `exp` = ?, `edu_uz` = ?, `exp_uz` = ?, `teach_lang` = ?, `rating` = ?, `fact` = ?, `info` = ?, `fact_uz` = ?, `info_uz` = ? WHERE id = ?");
            $stmt->bind_param('ssssssiississsssssssssi',  $name, $gender, $image, $phone, $email, $dob, $locationId, $livingRegionId, $livingAddr, $servingDist, $eduLevel, $toHome, $edu, $exp, $edu_uz, $exp_uz, $teach_lang, $rating, $fact, $info, $fact_uz, $info_uz, $id);
            return $stmt->execute();
        }
    }

	public function getRegionList() {
		$sql = "SELECT `region`.*, `location`.`name` as location_name FROM `region` JOIN `location` ON `location`.`id` = `region`.`location_id` ORDER BY `region`.`order_by` ASC, `location`.`order_by` ASC";
		return $this->getList($this->query($sql));
	}

    public function saveRegion($id, $name, $nameUz, $locationId, $orderBy) {
        if (empty($id)) {
            if ($stmt = $this->prepare("INSERT INTO `region` (`name`, `name_uz`, `location_id`, `order_by`) VALUES (?, ?, ?, ?)")) {
                $stmt->bind_param('ssii', $name, $nameUz, $locationId, $orderBy);
                if ($stmt->execute()) {
                    return $this->insert_id;
                } else {
                    die(' ERROR: ' . $this->error);
                    return false;
                }
            } else die($this->error);
        } else {
            $stmt = $this->prepare("UPDATE `region` SET `name` = ?, `name_uz` = ?, `location_id` = ?, `order_by` = ? WHERE id = ?");
            $stmt->bind_param('ssiii',  $name, $nameUz, $locationId, $orderBy, $id);
            return $stmt->execute();
        }
    }

    public function getShortList($table, $sort) {
        $sql = "SELECT id, name FROM `" . $table . (!empty($sort)? "` ORDER BY `" . $sort . "`" : '`');
        return $this->getList($this->query($sql));
    }

    public function remove($table, $id) {
        return $this->query("DELETE FROM `".$table."` WHERE id = ".intval($id));
    }

    public function getById($table, $id) {
        if ($result = $this->query("SELECT * FROM `".$table."` WHERE id = ".intval($id))) {
            return $result->fetch_assoc();
        }
        return false;
    }
	
	public function getList($result) {
		if (!isset($result) && $result === FALSE) {
			return null;
		}
		$array = array();
		while ($row = $result->fetch_assoc()) {
			$array[] = $row;
		}
		return $array;
	}

    function prepare($sql) {
        global $config;
        $stmt = parent::prepare($sql);
        if ($stmt === false && $config['debug'] === true) {
            die('SQL: ' . $sql . ' ERROR: ' . $this->error);
        }
        return $stmt;
    }

    function query($sql) {
        global $config;
        $result = parent::query($sql);
        if ($result === false && $config['debug'] === true) {
            die('SQL: ' . $sql . ' ERROR: ' . $this->error);
        }
        return $result;
    }

    public function saveTutorRegion($tutorId, $regions) {
        $this->query("DELETE FROM `tutor_region` WHERE `tutor_id` = ". $tutorId);
        foreach($regions as $region) {
            $this->query("INSERT INTO `tutor_region` (`tutor_id`, `region_id`) VALUES (".$tutorId.", ".$region.")");
        }
    }

    public function getTutorRegion($tutorId) {
        $result = $this->query("SELECT `region_id` FROM `tutor_region` WHERE `tutor_id` = " . $tutorId);
        $array = array();
        while($row = $result->fetch_assoc()){
            $array[] = $row['region_id'];
        }
        return $array;
    }

    public function getTeachingList($tutor = null) {
        $where = "";
        if ($tutor != null) {
            $where = " WHERE `tutor`.`id` = ".$tutor;
        }
        $sql = "SELECT `teaching`.`id`, `tutor`.`id` as `tutor_id`, `tutor`.`name` as `tutor_name`, `lesson`.id as `lesson_id`, `lesson`.`name` as `lesson_name`, `teaching`.`subject_id`, `subject`.`name` as `subject_name`, `teaching`.`experience`, `experience`.name as `experience_name`, `price`, `teaching`.`price_group`, `price_group`.name as `price_group_name`, `lesson_duration` FROM `teaching` LEFT JOIN `tutor` ON `teaching`.`tutor_id` = `tutor`.`id` LEFT JOIN `subject` ON `teaching`.`subject_id` = `subject`.`id` LEFT JOIN `lesson` ON `teaching`.`lesson_id` = `lesson`.`id` LEFT JOIN `experience` ON `teaching`.`experience` = `experience`.`id` LEFT JOIN `price_group` ON `teaching`.`price_group` = `price_group`.`id`" . $where;
        return $this->getList($this->query($sql));
    }

    public function saveTeaching($id, $subject_id, $lesson_id, $tutor_id, $experience, $price, $priceGroup, $lessonDuration)
    {
        if (empty($id)) {
            if ($stmt = $this->prepare("INSERT INTO `teaching` (`subject_id`, `lesson_id`, `tutor_id`, `experience`, `price`, `price_group`, `lesson_duration`) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
                $stmt->bind_param('iiiiiii', $subject_id, $lesson_id, $tutor_id, $experience, $price, $priceGroup, $lessonDuration);
                if ($stmt->execute()) {
                    return $this->insert_id;
                } else {
                    die(' ERROR: ' . $this->error);
                    return false;
                }
            } else die($this->error);
        } else {
            $stmt = $this->prepare("UPDATE `teaching` SET `subject_id` = ?, `lesson_id` = ?, `tutor_id` = ?, `experience` = ?, `price` = ?, `price_group` = ?, `lesson_duration` = ? WHERE id = ?");
            $stmt->bind_param('iiiiiiii', $subject_id, $lesson_id, $tutor_id, $experience, $price, $priceGroup, $lessonDuration, $id);
            return $stmt->execute();
        }
    }

    public function getPageList() {
        $sql = "SELECT id, name, name_uz, url FROM page";
        return $this->getList($this->query($sql));
    }

    public function savePage($id, $name, $name_uz, $url, $content, $content_uz)
    {
        if (empty($id)) {
            if ($stmt = $this->prepare("INSERT INTO `page` (`name`, `name_uz`, `url`, `content`, `content_uz`) VALUES (?, ?, ?, ?, ?)")) {
                var_dump($stmt->bind_param('sssss', $name, $name_uz, $url, $content, $content_uz));
                if ($stmt->execute()) {
                    return $this->insert_id;
                } else {
                    die(' ERROR: ' . $this->error);
                    return false;
                }
            } else die($this->error);
        } else {
            $stmt = $this->prepare("UPDATE `page` SET `name` = ?, `name_uz` = ?, `url` = ?, `content` = ?, `content_uz` = ? WHERE id = ?");
            $stmt->bind_param('sssssi', $name, $name_uz, $url, $content, $content_uz, $id);
            return $stmt->execute();
        }
    }

    public function getTutorDocs($id) {
        $sql = "SELECT * FROM `tutor_doc` WHERE `tutor_id` = ".intval($id);
        return $this->getList($this->query($sql));
    }

    public function saveTutorDoc($id, $name, $name_uz, $fileName, $tutor_id) {
        if (empty($id)) {
            if ($stmt = $this->prepare("INSERT INTO `tutor_doc` (`name`, `name_uz`, `doc`, `tutor_id`) VALUES (?, ?, ?, ?)")) {
                $stmt->bind_param('sssi', $name, $name_uz, $fileName, $tutor_id);
                if ($stmt->execute()) {
                    return $this->insert_id;
                } else {
                    die(' ERROR: ' . $this->error);
                    return false;
                }
            } else die($this->error);
        } else {
            $stmt = $this->prepare("UPDATE `tutor_doc` SET `name` = ?, `name_uz` = ?, `doc` = ?, `tutor_id` = ? WHERE id = ?");
            $stmt->bind_param('sssii', $name, $name_uz, $fileName, $tutor_id, $id);
            return $stmt->execute();
        }
    }

    public function getTutorReviews($id) {
        $sql = "SELECT `tr`.*, `t`.name as tutor FROM `tutor_review` as `tr` LEFT JOIN tutor as `t` ON `tr`.tutor_id = `t`.id WHERE `tutor_id` = ".intval($id);
        return $this->getList($this->query($sql));
    }

    public function saveReview($id, $tutor_id, $review, $review_uz, $reviewer, $mark) {
        if (empty($id)) {
            if ($stmt = $this->prepare("INSERT INTO `tutor_review` (`tutor_id`, `review`, `review_uz`, `reviewer`, `mark`) VALUES (?, ?, ?, ?, ?)")) {
                $stmt->bind_param('isssi', $tutor_id, $review, $review_uz, $reviewer, $mark);
                if ($stmt->execute()) {
                    return $this->insert_id;
                } else {
                    die(' ERROR: ' . $this->error);
                    return false;
                }
            } else die($this->error);
        } else {
            $stmt = $this->prepare("UPDATE `tutor_review` SET `tutor_id` = ?, `review` = ?, `review_uz` = ?, `reviewer` = ?, `mark` = ? WHERE id = ?");
            $stmt->bind_param('isssii', $tutor_id, $review, $review_uz, $reviewer, $mark, $id);
            return $stmt->execute();
        }
    }

    public function newOrdersCount() {
        $sql = "SELECT COUNT(*) as `count` FROM orders WHERE order_status = 1";
        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public function getOrderList($page) {
        global $config, $pagination;
        $per_page = isset($config['per_page']) ? $config['per_page'] : 15;
        $pagination->setRPP($per_page);
        $pagination->setTotal($this->getTutorCount());
        $limit = " LIMIT ". ($per_page * ($page - 1)) .", ".$per_page;
        $sql = "SELECT `orders`.*, GROUP_CONCAT(order_tutors.tutor_id SEPARATOR ',') as tutors FROM `orders` LEFT JOIN order_tutors ON orders.id = order_tutors.order_id GROUP BY orders.id ORDER BY `orders`.`order_status` ASC, id ASC ".$limit;
        return $this->getList($this->query($sql));
    }

    public function saveOrder($id, $name, $phone, $email, $comment, $order_status, $system_comment) {
        if (empty($id)) {
            if ($stmt = $this->prepare("INSERT INTO `orders` (`name`, `phone`, `email`, `comment`, `order_status`, `system_comment`, `order_date`) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
                $stmt->bind_param('ssssisi', $name, $phone, $email, $comment, $order_status, $system_comment, time());
                if ($stmt->execute()) {
                    return $this->insert_id;
                } else {
                    die(' ERROR: ' . $this->error);
                    return false;
                }
            } else die($this->error);
        } else {
            if ($order_status == 3) {
                $closed_date = time();
                $stmt = $this->prepare("UPDATE `orders` SET `name` = ?, `phone` = ?, `email` = ?, `comment` = ?, `order_status` = ?, `system_comment` = ?, `closed_date` = ? WHERE id = ?");
                $stmt->bind_param('ssssisii', $name, $phone, $email, $comment, $order_status, $system_comment, $closed_date, $id);
            } else {
                $stmt = $this->prepare("UPDATE `orders` SET `name` = ?, `phone` = ?, `email` = ?, `comment` = ?, `order_status` = ?, `system_comment` = ? WHERE id = ?");
                $stmt->bind_param('ssssisi', $name, $phone, $email, $comment, $order_status, $system_comment, $id);
            }
            return $stmt->execute();
        }
    }

    public function ordersCount($int) {
        $sql = "SELECT COUNT(*) as `count` FROM orders WHERE order_status = ".intval($int);
        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public function saveOrderTutor($id, $tutor_ids) {
        $this->query("DELETE FROM `order_tutors` WHERE `order_id` = ". $id);
        foreach($tutor_ids as $tutor_id) {
            $this->query("INSERT INTO `order_tutors` (`order_id`, `tutor_id`) VALUES (".$id.", ".$tutor_id.")");
        }
    }
}