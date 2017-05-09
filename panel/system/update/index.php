<?php
var_dump($db->query("ALTER TABLE `tutor` ADD fact TEXT DEFAULT NULL"));
var_dump($db->query("ALTER TABLE `tutor` ADD info TEXT DEFAULT NULL"));
var_dump($db->query("ALTER TABLE `tutor` ADD fact_uz TEXT DEFAULT NULL"));
var_dump($db->query("ALTER TABLE `tutor` ADD info_uz TEXT DEFAULT NULL"));