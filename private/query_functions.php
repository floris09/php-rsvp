<?php

  function find_all($table) {
    global $db;

    $sql = "SELECT * FROM $table";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_user($username) {
    global $db;

    $sql = "SELECT * FROM users ";
    $sql .= "WHERE username='$username'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_wedding_guests($wedding_id) {
    global $db;

    $sql = "SELECT * FROM guests ";
    $sql .= "WHERE wedding_id=$wedding_id";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
